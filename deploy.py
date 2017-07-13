#!/usr/bin/env python3
# -*- coding: utf-8 -*-


import functools
import logging
import os
import shutil
import subprocess

from babel.support import Translations
import click
import confuse
import ipdb  # NOQA
import jinja2

# LOGGING
# Setup console logging
log = logging.getLogger('devconf')
logging.basicConfig(format='%(message)s')


def dumps(content, path):
    log.info('Exporting to {}'.format(path))
    with open(path, 'w') as out:
        out.writelines(content)


def mkdirs(path):
    if not os.path.exists(path):
        log.debug('Creating path: {}'.format(path))
        os.makedirs(path)


def ext_url(path, static=False):
    path_build = os.path.abspath(os.environ['PATH_BUILD'])
    locale = os.environ['LOCALE']
    lang = locale.split('_')[0]
    path = path.strip()
    if path[0] == '/':
        path = path.lstrip('/')
        if static:
            path = os.path.join(path_build, path)
        else:
            path = os.path.join(path_build, lang, path)
        path = 'file://{}'.format(path)
    else:
        path = os.path.join(path_build, path)
        path = 'file://{}'.format(path)
    return path


# CONFIG
# overide default location of the config.yaml file
os.environ['DEVCONFDIR'] = './'
config = confuse.Configuration('devconf')

# Define the supported sites available
# SITES = tuple(list(config['sites'].get()) + ['all'])

# BUILD
PATH_BUILD = './build'

# TEMPLATES
# Set-up Template loading
PATH_TEMPLATES = './templates'
_loader = jinja2.FileSystemLoader(PATH_TEMPLATES)

# FIXME: move this to 'init' command or something...
locale_dir = './i18n'

extensions = ['jinja2.ext.i18n', 'jinja2.ext.with_']

jinja2_env = jinja2.Environment(loader=_loader,
                                autoescape=True,
                                extensions=extensions)
# add the ext to the jinja environment
jinja2_env.filters['url'] = ext_url
jinja2_env.filters['static'] = functools.partial(ext_url, static=True)

PATH_STATIC = './static'


@click.group()
@click.option('--quiet', '-q', is_flag=True, default=False)
@click.option('--debug', '-d', is_flag=True, default=False)
def cli(quiet, debug):
    if quiet:
        log.setLevel(logging.WARN)
    elif debug:
        log.setLevel(logging.DEBUG)
    else:
        log.setLevel(logging.INFO)


def _clean(build=True):
    if build and os.path.exists(PATH_BUILD):
        log.debug('Cleaning up old builds in {}'.format(PATH_BUILD))
        shutil.rmtree(PATH_BUILD)


@cli.command('build')
@click.option('--branch', '-b', type=str, default='devel')
@click.option('--clean', '-c', is_flag=True, default=False)
def build(branch, clean):
    # Clean up the previous build
    _clean(build=True)

    static_path = PATH_STATIC
    # Copy out all the static files to root of output directory
    for _path in os.listdir(static_path):
        from_path = os.path.join(static_path, _path)
        to_path = os.path.join(PATH_BUILD, _path)
        if os.path.exists(to_path):
            log.warning('"static" path already exists: {}'.format(to_path))
        else:
            log.debug(
                'Copying "static" to build dir: {}'.format(to_path))
            shutil.copytree(from_path, to_path)

    templates = (
        'index.html',
        'media-policy.html',
        'coc.html',
        'speaker-agreement.html',
        'cz/index.html',
        'cz/2017/index.html',
        'cz/2017/roadshow-bratislava.html',
        'cz/2017/roadshow-prague.html',
        'cz/2018/index.html',
        )

    os.environ['PATH_BUILD'] = os.path.abspath(PATH_BUILD)

    # Now build all the pages for the site
    for path in templates:
        # [/]{{site}}/template.html
        site = path.split('/')[0] if '/' in path else ''

        params = {
            # FIXME: only if DEBUG on, otherwise don't include private keys
            '__site': site,
            '__branch': branch,
            'path': path,
            'flags_path': {
                'en': '/images/lang_flag_en.svg',
                'cs': '/images/lang_flag_cs.svg',
                'sk': '/images/lang_flag_sk.svg',
            },
        }

        locales = ['en_US', 'cs_CZ', 'sk_SK']
        for locale in locales:
            params['locale'] = locale
            os.environ['LOCALE'] = locale
            lang = locale.split('_')[0]
            params['lang'] = lang
            translations = Translations.load(locale_dir, [locale])
            jinja2_env.install_gettext_translations(translations, newstyle=True)

            # Render the template
            template = jinja2_env.get_template(path)
            content = template.render(**params)

            # FIXME: WHY NOT USING BRANCH?

            # Save the rendered page to disk
            dest_file = os.path.join(PATH_BUILD, lang, path)
            # create the directory struct where the file will live
            mkdirs(os.path.dirname(dest_file))
            # dump the rendered file
            dumps(content, dest_file)

            assert os.path.exists(dest_file)


@cli.command('i18n')
@click.argument('action', nargs=-1)
def i18n(action):
    '''
    Create the folder structure (no whitespace after the commas!!!)
    > mkdir -pv ./i18n/{en_US,cs_CZ,sk_SK}/LC_MESSAGES/
    > pybabel -v extract -F babel.cfg -o ./i18n/messages.pot ./

    Init/Update
    3.1 Init
    > pybabel init -l en_US -d ./i18n -i ./i18n/messages.pot
    > pybabel init -l cs_CZ -d ./i18n -i ./i18n/messages.pot
    > pybabel init -l sk_SK -d ./i18n -i ./i18n/messages.pot

    3.2 Update
    > pybabel update -l en_US -d ./i18n -i ./i18n/messages.pot
    > pybabel update -l cs_CZ -d ./i18n -i ./i18n/messages.pot
    > pybabel update -l sk_SK -d ./i18n -i ./i18n/messages.pot

    Compile
    > pybabel compile -f -d ./i18n

    What if the strings change? Create a new messages.pot and merge the changes:
    > pybabel update -d ./i18n -i ./i18n/messages.pot
    '''

    languages = ['en_US', 'cs_CZ', 'sk_SK']
    if 'init' in action:
        cmd = 'pybabel init -l {} -d ./i18n -i ./i18n/messages.pot'
        for lang in languages:
            subprocess.run(cmd.format(lang), shell=True)

    if 'update' in action:
        cmd = 'pybabel update -l {} -d ./i18n -i ./i18n/messages.pot'
        for lang in languages:
            subprocess.run(cmd.format(lang), shell=True)

    if 'compile' in action:
        cmd = 'pybabel compile -f -d ./i18n'
        subprocess.run(cmd, shell=True)


if __name__ == '__main__':
    cli(obj={})

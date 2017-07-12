#!/usr/bin/env python3
# -*- coding: utf-8 -*-


# from functools import partial
import logging
import os
import shutil

from babel.support import Translations
import click
import confuse
import ipdb  # NOQA
import jinja2


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
locale_dir = './i18n'
msgdomain = 'html'
default_locale = 'en_US'
list_of_desired_locales = ['en', 'cs', 'sk']
extensions = ['jinja2.ext.i18n', 'jinja2.ext.with_']

'''
Create the folder structure (no whitespace after the commas!!!)
> mkdir -pv ./il8n/{en_US,cs_CZ,sk_SK}/LC_MESSAGES/
> pybabel -v extract -F babel.config -o ./il8n/messages.pot ./

Init/Update
3.1 Init
> pybabel init -l zh_CN -d ./lang -i ./lang/messages.pot

3.2 Update
> pybabel update -l zh_CN -d ./lang -i ./lang/messages.pot

Compile
> pybabel compile -f -d ./lang
'''

translations = Translations.load(locale_dir, list_of_desired_locales)
jinja2_env = jinja2.Environment(loader=_loader,
                                autoescape=True,
                                extensions=extensions)
jinja2_env.install_gettext_translations(translations)

PATH_STATIC = './static'

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


def ext_url(path):
    base_url = os.path.abspath(os.environ['BASE_URL'])
    path = path.strip()
    if path[0] == '/':
        path = path.lstrip('/')
        path = os.path.join(base_url, path)
        path = 'file://{}'.format(path)
    return path


# add the ext to the jinja environment
jinja2_env.filters['url'] = ext_url


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
@click.option('--clean', '-c', is_flag=True, default=False)
def build(clean):
    # FIXME this should be configurable to '' or 'https://basesite.tld/'
    sites = ['cz']

    for site in sites:
        log.info('Building site: {}'.format(site))

        if site == 'cz':
            _clean(build=True)
            _build_cz()

        else:
            log.warn('Unknown site: {}'.format(site))


def _build_cz():
    dest_basedir = 'cz'

    templates = ('cz/index.html',
                 'media-policy.html',
                 'coc.html',
                 'speaker-agreement.html',
                 'cz/2017/index.html',
                 'cz/2017/roadshow-bratislava.html',
                 'cz/2017/roadshow-prague.html',
                 'cz/2018/index.html',
                 )

    # prepare the build
    path_build = os.path.join(PATH_BUILD, dest_basedir)
    mkdirs(path_build)

    # FIXME: move this to 'init' command or something...
    if not os.path.exists(locale_dir):
        mkdirs(locale_dir)

    params = {
        'site': 'DevConf.cz',
        'logo_svg': 'images/devconf-cz-webopt.svg',
    }

    for _template in templates:
        # Copy out all the static files for that page
        for _path in os.listdir(PATH_STATIC):
            from_path = os.path.join(PATH_STATIC, _path)
            to_path = os.path.join(path_build, _path)
            if not os.path.exists(to_path):
                log.debug('Copying "static" to build dir: {}'.format(to_path))
                shutil.copytree(from_path, to_path)

        os.environ['BASE_URL'] = os.path.join(path_build)

        # Render the template
        template = jinja2_env.get_template(_template)
        content = template.render(**params)

        # Save the rendered page to disk
        _t = _template
        _t = _t.replace('cz/', '') if 'cz/' in _t else _t
        dest_file = os.path.join(path_build, _t)

        # create the directory struct where the file will live
        mkdirs(os.path.dirname(dest_file))

        # dump the rendered file
        dumps(content, dest_file)


if __name__ == '__main__':
    cli(obj={})

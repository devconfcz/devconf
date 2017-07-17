#!/usr/bin/env python3
# -*- coding: utf-8 -*-

import logging
import os
import shutil
import subprocess

import confuse
import click
import ipdb  # NOQA

from devconf.flask_app import render_template

# Setup console logging
log = logging.getLogger('devconf')


def mkdirs(path):
    if not os.path.exists(path):
        log.debug('Creating path: {}'.format(path))
        os.makedirs(path)


def _clean_build():
    path_build = os.environ['PATH_BUILD']
    if os.path.exists(path_build):
        log.debug('Cleaning up old builds in {}'.format(path_build))
        shutil.rmtree(path_build)


def _copy_static():
    path_static = os.environ['PATH_STATIC']
    path_build = os.environ['PATH_BUILD']
    # Copy out all the static files to root of output directory
    for _path in os.listdir(path_static):
        from_path = os.path.join(path_static, _path)
        to_path = os.path.join(path_build, _path)
        if os.path.exists(to_path):
            log.warning('"static" path already exists: {}'.format(to_path))
        else:
            log.debug('Copying "static" to build dir: {}'.format(to_path))
            shutil.copytree(from_path, to_path)


def _get_config(config_path):
    config = os.path.expanduser(os.path.abspath(config_path))
    # CONFIG - overide default location of the config.yaml file
    os.environ['APPDIR'] = config
    config = confuse.Configuration('app')
    return config


# BUILD path
PATH_BUILD = os.path.abspath('./build')
os.environ['PATH_BUILD'] = PATH_BUILD

# STATIC files path
PATH_STATIC = os.path.abspath('./static')
os.environ['PATH_STATIC'] = PATH_STATIC


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


@cli.command('build')
@click.argument('config', type=str, default='./')
@click.option('--branch', '-b', type=str, default='devel')
def build(config, branch):

    # FIXME: not using branch!

    # Clean up the previous build
    _clean_build()
    _copy_static()

    config = _get_config(config)
    templates = config['templates'].get()
    locales = config['locales'].get()

    # Build all the pages for the site
    pages = []
    for path in templates:
        for locale in locales:
            pages.append(render_template(path, locales, save=True))

    return pages


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
    if 'extract' in action:
        cmd = 'pybabel -v extract -F babel.cfg -o ./i18n/messages.pot ./'
        subprocess.run(cmd, shell=True)

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


@cli.command('serve')
def serve():
    '''
    Launch flask application to serve up the pages dynamically
    '''

    from devconf.flask_app import app
    # FIXME: why doesn't debug info log when running this way?
    app.run(debug=True)


if __name__ == '__main__':
    cli(obj={})

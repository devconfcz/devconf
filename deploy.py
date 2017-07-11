#!/usr/bin/env python3
# -*- coding: utf-8 -*-


# from functools import partial
import logging
import os
import shutil

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

SITE_ROOT = ''

# BUILD
PATH_BUILD = './build'

# TEMPLATES
# Set-up Template loading
PATH_TEMPLATES = './templates'
jinja2_env = jinja2.Environment(loader=jinja2.FileSystemLoader(PATH_TEMPLATES))

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
        os.makedirs(path)


def filter_static(path, _id=None, alt=None, classes=None, style=None):
    path = os.path.join(PATH_STATIC, path)

    if not path:
        raise ValueError("path can not be null!")
    if not os.path.exists(path):
        log.warn('WARN: FILE NOT FOUND: {}'.format(path))

    alt = alt if alt else _id

    _html = '<img id="{}" alt="{}" style="{}" src="{}"'
    _html = _html.format(_id, alt, style, path)
    return _html


def url(path, classes=None):
    path = href(path)
    _html = '<a href="{}" class="{}"'
    _html = _html.format(path)
    return _html


def href(path):
    global SITE_ROOT
    _html = os.path.join(SITE_ROOT, path)
    return _html


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
@click.option('--clean', '-c', is_flag=True, default=False)
def build(clean):
    # FIXME this should be configurable to '' or 'https://basesite.tld/'
    global SITE_ROOT
    SITE_ROOT = ''

    sites = ['cz']
    # sites = SITES if site == 'all' else [site]
    # sites = SITES if site == 'all' else [site]

    for site in sites:
        log.info('Building site: {}'.format(site))

        if site == 'cz':
            if clean:
                log.debug('Cleaning up old builds in {}'.format(PATH_BUILD))
                # FIXME: move this out into _clean()
                # and turn into a separate 'clean' cmd for CLI
                shutil.rmtree(PATH_BUILD)
            _build_cz()

        else:
            log.warn('Unknown site: {}'.format(site))


def _build_cz():
    path = 'cz'

    params = {
        # 'base_url': 'https://devconf.cz/',
        'base_url': '',
    }

    # jinja2_env.filters['static'] = filter_static

    page = os.path.join(path, 'index.html')
    template = jinja2_env.get_template(page)
    content = template.render(**params)

    # prepare the build
    path_build = os.path.join(PATH_BUILD, path)
    mkdirs(path_build)

    for _path in os.listdir(PATH_STATIC):
        from_path = os.path.join(PATH_STATIC, _path)
        to_path = os.path.join(path_build, _path)
        if not os.path.exists(to_path):
            log.debug('Creating new path: {}'.format(to_path))
            shutil.copytree(from_path, to_path)

    path_page = os.path.join(PATH_BUILD, page)
    dumps(content, path_page)


if __name__ == '__main__':
    cli(obj={})

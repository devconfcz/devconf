#!/usr/bin/env python3
# -*- coding: utf-8 -*-

import functools
import logging
import os

from babel.support import Translations
import confuse
from flask import Flask
import ipdb  # NOQA
import jinja2


def dumps(content, path):
    log.info('Exporting to {}'.format(path))
    with open(path, 'w') as out:
        out.writelines(content)


def ext_url(path, static=False, lang=None):
    path = path.strip()
    path_build = os.environ['PATH_BUILD']
    locale = os.environ.get('LOCALE', 'en_US')
    lang = lang or locale.split('_')[0]
    if path[0] == '/':
        path = path.lstrip('/')  # path.join only joins if no leading '/'
        if static:
            path = os.path.join(path_build, path)
        else:
            path = os.path.join(path_build, lang, path)
    else:
        path = os.path.join(path_build, path)

    path = 'file://{}'.format(path)
    return path


def rel_url(path, static=False, lang=None):
    path = path.strip()
    locale = os.environ.get('LOCALE', 'en_US')
    lang = lang or locale.split('_')[0]
    if path[0] == '/' and static:
        path = path.lstrip('/')  # path.join only joins if no leading '/'
        path = os.path.join(lang, path)
    new_path = '{}'.format(path)
    return new_path


def _get_jinja2_env(path_templates):
    _loader = jinja2.FileSystemLoader(path_templates)
    extensions = ['jinja2.ext.i18n', 'jinja2.ext.with_']
    env = jinja2.Environment(
        loader=_loader,
        autoescape=jinja2.select_autoescape(
            disabled_extensions=('txt',), default_for_string=True,
            default=True),
        extensions=extensions)
    return env


def render_template(path, locale='en_us', save=False, path_build=None,
                    path_static=None, path_templates=None, path_locale=None):
    env = os.environ
    os.environ['PATH_BUILD'] = path_build = path_build or env.get(
        'PATH_BUILD', './build')
    os.environ['PATH_STATIC'] = path_static = path_static or env.get(
        'PATH_STATIC', './static')
    os.environ['PATH_TEMPLATES'] = path_templates = path_templates or env.get(
        'PATH_TEMPLATES', './templates')
    path_locale = path_locale or os.environ.get('PATH_LOCALE', './i18n')

    # grab the jinja2 environment to work with
    jinja2_env = _get_jinja2_env(path_templates)

    # add the ext to the jinja environment
    if save:
        jinja2_env.filters['url'] = ext_url
        jinja2_env.filters['static'] = functools.partial(ext_url, static=True)
    else:
        jinja2_env.filters['url'] = rel_url
        jinja2_env.filters['static'] = functools.partial(rel_url, static=True)

    params = {
        'path': path,
    }

    os.environ['LOCALE'] = locale
    translations = Translations.load(path_locale, [locale])
    jinja2_env.install_gettext_translations(translations, newstyle=True)

    lang = locale.split('_')[0]
    params['lang'] = lang

    # Render the template
    template = jinja2_env.get_template(path)
    content = template.render(**params)

    # FIXME: WHY NOT USING BRANCH?

    # Save the rendered page to disk
    dest_file = os.path.join(path_build, lang, path)
    dest_path = os.path.dirname(dest_file)
    # create the directory struct where the file will live
    if not os.path.exists(dest_path):
        os.makedirs(dest_path)
    # dump the rendered file
    dumps(content, dest_file)
    assert os.path.exists(dest_file)

    return content


# LOGGING
# Setup console logging
log = logging.getLogger('devconf')
logging.basicConfig(format='%(message)s')

# CONFIG
# overide default location of the config.yaml file
os.environ['APPDIR'] = os.path.abspath('./')
config = confuse.Configuration('app')

app = Flask(__name__)


@app.route('/')
def hello_world():
    return render_template('index.html', save=False)


if __name__ == '__main__':
    app.run()

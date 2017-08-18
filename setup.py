#!/usr/bin/env python3
# -*- coding: utf-8 -*-

from setuptools import setup

VERSION = '0.1'

long_description = '''Builder scripts for DevConf sites'''

setup_info = dict(
    # Metadata
    name='devconf',
    version=VERSION,
    author='Chris Ward',
    author_email='cward@redhat.com',
    description=long_description,
    long_description=long_description,
    # Package info
    packages=['devconf', ],
    scripts=[
        'bin/devconf-mail',
    ],
    install_requires=[
        'comdev',
    ],
)


setup(**setup_info)

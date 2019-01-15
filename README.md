# DevConf

This project fully contains all sources used to build https://devconf.cz and other DevConf (by Red Hat) event sites.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

To build the static pages, python >= 3.4 is required! It's recommended to install in a python 3 virtual environment.

```
virtualenv-3 ~/virtenvs/devconf --no-site-packages

source ~/virtenvs/devconf/bin/activate

python3 -m pip install devconf
```

To deploy static pages to Firebase, install `firebase-tools`

```
sudo npm install -g firebase-tools
```

### Building

What follows is a step by step guide to help get your static pages building

Open the project page and run `comdev build` with no options to prepare build using absolute url's.

```
cd ~/repos/devconf
comdev devconf build
```

This results in a fully populated, deploy-able build being saved to `./builds`.

### Deployment

Unless pushing to the default DevConf development Firebase project, you will need to
run `firebase login` and update the project value in `.firebaserc`.

Then, to build and deploy to firebase hosting, run

```
comdev devconf build -r
firebase deploy build
```

## Building Python packages

Make sure to bump devconf package version in setup.py.

The following instructions are for building and uploading updated python packages 
for testing.

Make sure setuptools, wheel and twine packages are updated and you 
are registered over at https://test.pypi.org/account/register/.

```
python3 -m pip install --upgrade setuptools wheel
python3 -m pip install --upgrade twine
```

Then, Build the packages and upload to the test reposity.

```
python3 setup.py sdist bdist_wheel
twine upload --repository-url https://test.pypi.org/legacy/ dist/*
```

Finally, test installation:

```
python3 -m pip install --index-url https://test.pypi.org/simple/ devconf
```

## Authors

* **Chris Ward** - [kejbaly2](https://github.com/kejbaly2)

See also the list of [contributors](https://github.com/devconfcz/devconf/contributors) who participated in this project.

## Aknowledgements

* *[Wikipedia](http://wikipedia.org)* - for multiple images and information

## License

This project is licensed under the GPLv3 License - see the [LICENSE.md](LICENSE) file for details

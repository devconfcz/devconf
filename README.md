# DevConf

This project fully contains all sources used to build https://devconf.cz and other DevConf (by Red Hat) event sites.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

To build the static pages, install `comdev` python package (py3 only!).

```
pip install comdev
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

Then, to deploy, just run

```
firebase deploy build
```

## Authors

* **Chris Ward** - [kejbaly2](https://github.com/kejbaly2)

See also the list of [contributors](https://github.com/devconfcz/devconf/contributors) who participated in this project.

## Aknowledgements

* ** Wikipedia ** - for multiple images and information

## License

This project is licensed under the GPLv3 License - see the [LICENSE.md](LICENSE) file for details

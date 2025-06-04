![DevConf logo](./assets/media/logo/devconf-only/devconf.png)

# DevConf

This branch contains prep work for new devconf.info web design.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

Website itself is based on [PHP Composer](https://getcomposer.org/) with the template rendering [Jigsaw](https://jigsaw.tighten.co/). For more information about Jigsaw, visit Jigsaw documentation for [Templates & Partials](https://jigsaw.tighten.co/docs/content-blade/) and for [Assets](https://jigsaw.tighten.co/docs/compiling-assets/).

### Prerequisites

If you want the dev environment containerized could use a `toolbx`. Once the `toolbx` is created you can enter it and follow along as usual.

```bash
$ toolbox create --distro fedora --release f42 devconf
...
$ toolbox enter devconf
```

We use `composer` for building and serving locally, and `npm` for generating CSS and JS assets. For adding non-breaking whitespaces to blog posts we use `vlna`

```bash
$ sudo dnf install composer npm vlna
```

To install the relevant packages for building and serving:

```bash
$ composer install
```

To be able to regenerate CSS and JS assets:

```bash
$ npm install
```

### Building

Once you have all steps from Prerequisities successfully complete, you can build the DevConf webiste by following command:

```bash
$ ./vendor/bin/jigsaw build             # for development builds
$ ./vendor/bin/jigsaw build production  # for production builds
```

Keep in mind, you have to be in root folder of devconf:devel repository

Any changes in the `./assets` folder requires `npm` to run before building with jigsaw:

```bash
$ npm run prod
```

### Deployment

For previewing the build locally:

```bash
$ ./vendor/bin/jigsaw serve
```

By default, the content will be available under http://localhost:8000

## Blog Posts

For blog posts, we require to use utility `vlna` in order to add non-breaking spaces where needed. Use following command (replace {file} by actual file name).

```bash
$ vlna -x 266E6273703B -r -v KkSsVvZzOoUuAaIi {file}.md
```

For example:

```bash
$ vlna -x 266E6273703B -r -v KkSsVvZzOoUuAaIi ./source/_posts/submitting-a-proposal-for-devconf-cz-2025.md
```

## Authors

- **Josef Ridky** - [jridky](https://github.com/jridky)

Thanks to all of the [contributors](https://github.com/devconfcz/devconf/contributors) as well who participated in this project!

## License

This project is licensed under the GPLv3 License - see the [LICENSE.md](LICENSE.md) file for details

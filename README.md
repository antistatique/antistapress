# Antistapress
A project template for Wordpress using [Bedrock](https://github.com/roots/bedrock) from roots.io & the [Toolbox Generator](https://github.com/frontend/generator-toolbox) from Antistatique

## ✅ What you'll need (locally)
- PHP >= 5.6 ([A good environment practice on MacOs Sierra](https://getgrav.org/blog/macos-sierra-apache-multiple-php-versions))
- MySQL
- Ruby >= 1.9
- [nodejs >= 7.6](https://nodejs.org/en/download/) 
- [npm](https://nodejs.org/en/download/)
- [composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
- [capistrano](https://github.com/capistrano/capistrano) (> 3.1.0)
- [capistrano-composer](https://github.com/capistrano/composer)
- [generator-toolbox](https://github.com/frontend/generator-toolbox)

## 🤖 Generator
You can use our nice & customized Antistapress Generator©

https://github.com/antistatique/antistapress-generator

```
$ npm install -g @antistatique/antistapress-generator
```

or

```
$ yarn global add @antistatique/antistapress-generator
```

you can then generate a brand new Wordpress environment by just typing the following command.

```
$ antistapress-generator -n [project-name] -t [theme-name]
```

More info on [antistatique/antistatique-generator](https://github.com/antistatique/antistatique-generator)


## 👉 Step by step tutorial

Firstly, copy the **environment** specific configuration file: 

```
$ mv .env.example .env
```

Edit the configuration `.env` to reflect your environments information (database, username, salts, etc...)

Create the new database locally & set your hosts to `localhost` & apache vhost configuration's root to `/path/to/site/web`

Generate the **styleguide**
```
$ yo toolbox
```
> Here, you can follow the prompts, more info on [frontend/generator-toolbox](https://github.com/frontend/generator-toolbox)

Install all the dependencies (core, plugins & styleguide) with:

```
$ composer install
```

> You'll probably have an error with the ACF license (see below). Don't forget to mention the license key of this premium package in `.env` under `ACF_PRO_KEY`.

Access WP admin at `http://[site-domain]/wp/wp-admin` and follow the installation procedure.

You can then **activate** your custom **theme** on `http://[site-domain]/wp/wp-admin/themes.php`

## 💄 Theme

#### Styleguide
You have to init the styleguide using
```
$ gulp init
```

You can serve the styleguide using:
```
$ gulp serve
```


> More info about this generator & our styleguide philosophy: http://frontend.github.io/toolbox/installation.html

## 🛠 Plugins
#### ACF 
Don't forget to fill the acf-pro license key in the `.env` configuration file

#### Installation
To add a plugin, use `$ composer require <namespace>/<packagename>`. 
If it's from WordPress Packagist then the namespace is always wpackagist-plugin.

#### Update
To update a dependency, update the version number in the `composer.json` file & run:

#### WPML
You need to add a package targetting the download link of the package on the WPML website. Theses *download-link*, *package-name* & *version-number* can be found in the download page of your own [account](https://wpml.org/account/downloads/).

```json
{
  "type": "package",
  "package": {
    "name": "PACKAGE_NAME_HERE(wpml-multilingual-cms)",
    "type": "wordpress-plugin",
    "version": "VERSION_NUMBER_HERE(3.6.3)",
    "dist": {
      "type": "zip",
      "url": "DOWNLOAD_LINK_HERE"
    },
    "require" : {
      "composer/installers": "~1.0"
    }
  }
}
```

and then, you can add a line in the `require` section:
```
"require": {
	"wpml-multilingual-cms": "3.6.3"
}
```
> You can do that for every WPML packages

`$ composer update`

#### Wordpress theme
The theme is located in `/web/app/themes/THEME_NAME`.

#### [lumberjack](https://github.com/Rareloop/lumberjack)
We curently use the starter theme Lumberjack. It uses twig as a templating system. You'll get more info here 

The assets (js, css, vendors) are registered & linked in `lumberjack/src/Functions/Assets.php`


## 🚀 Deploy 
```
$ bundle install
```

Edit your `config/deploy/` stage/environment configs to set the roles/servers and connection options.

Before your first deploy, run `bundle exec cap <stage> deploy:check` to create the necessary folders/symlinks.

Add your `.env` file to `shared/` in your deploy_to path on the remote server for all the stages you use (ex: `/srv/www/example.com/shared/.env`)

Run the normal deploy command: `bundle exec cap <stage> deploy`

* Deploy: `bundle exec cap production deploy`
* Rollback: `bundle exec cap production deploy:rollback`

## ⚗ Improvements 
- Adds WPML as a package
- Create a cli interface (as it has been done for the toolbox-generator) to make it easier to follow the configuration (database, project name, template name, etc..)
- Decide if the choice I've made for a starter theme (Lumberjack) is the good one. Other candidates includes:
  - [sage (roots.io)](https://roots.io/sage/) Unfortunately, sage (from roots.io) recently chose to support the blade templating system.
  - [Timber Starter theme](https://github.com/timber/starter-theme)
  - [sprig](https://github.com/zach-adams/sprig)

# Antistapress
A project template for Wordpress using [Bedrock](https://github.com/roots/bedrock) from roots.io & the [Toolbox Generator](https://github.com/frontend/generator-toolbox) from Antistatique

## ✅ What you'll need (locally)
- PHP >= 5.6 ([A good environment practice on MacOs Sierra](https://getgrav.org/blog/macos-sierra-apache-multiple-php-versions))
- MySQL
- Ruby >= 1.9
- [npm](https://nodejs.org/en/download/)
- [composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
- [capistrano](https://github.com/capistrano/capistrano) (> 3.1.0)
- [capistrano-composer](https://github.com/capistrano/composer)
- [generator-toolbox](https://github.com/frontend/generator-toolbox)

## 👉 Step by step tutorial

Firstly, install all the dependencies (core, plugins & styleguide)

`$ composer install`

`$ npm install`

Create a new database locally

Copy the environment specific configuration file: `$ mv .env.example .env`

Edit the configuration `.env` to reflect your environments information (database, username, salts, etc...)

Set your site vhost document root to `/path/to/site/web`

Access WP admin at `http://[site-domain].com/wp/wp-admin` and follow the installation procedure.

## 🛠 Plugins
#### ACF 
Don't forget to fill the acf-pro license key in the `.env` configuration file

#### Installation
To add a plugin, use `$ composer require <namespace>/<packagename>`. 
If it's from WordPress Packagist then the namespace is always wpackagist-plugin.

#### Update
To update a dependency, update the version number in the `composer.json` file & run:

`$ composer update`

## 💄 Theme

#### Styleguide
You have to init the styleguide using
`$ gulp init`

You can serve the styleguide using:
`$ gulp serve`.

##### Current issue

We got an issue with the following vendors scripts: `tooltip` & `popover`. They have been removed from the vendors included list.

More info about this generator & our styleguide philosophy: http://frontend.github.io/toolbox/installation.html

#### Wordpress theme
The theme is located in `/web/app/themes/antistapress`.

If you want to change the template folder name, you'll have to subsequently update the the filepath or name referenced in the following file:
- `.gitignore`
- `.stylelintrc`
- `gulp_config.json`
- The `style.css` located in your template.

#### [Timber/starter-theme](https://github.com/timber/starter-theme)
We curently use the starter theme from Timber. It use twig as a templating system. You'll get more infos here 

The assets (js, css, vendors) are registered in `function.php`


## 🚀 Deploy 
`$ gem install capistrano`

`$ gem install capistrano-composer`

Edit your `config/deploy/` stage/environment configs to set the roles/servers and connection options.

Before your first deploy, run `bundle exec cap <stage> deploy:check` to create the necessary folders/symlinks.

Add your `.env` file to `shared/` in your deploy_to path on the remote server for all the stages you use (ex: `/srv/www/example.com/shared/.env`)

Run the normal deploy command: `bundle exec cap <stage> deploy`

* Deploy: `cap production deploy`
* Rollback: `cap production deploy:rollback`

## ⚗ Improvements 
- Create a cli interface (as it has been done for the toolbox-generator) to make it easier to follow the configuration (database, project name, template name, etc..)
- Find the js conflict error with bootstrap.tooltip.js 

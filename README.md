# Antistapress
A project template for Wordpress using [Bedrock](https://github.com/roots/bedrock) from roots.io & the [Toolbox Generator](https://github.com/frontend/generator-toolbox) from Antistatique and using vagrant for the local environment virtualization.

## ✅ What you'll need (locally)
* Ruby >= 1.9
* [npm](https://nodejs.org/en/download/)
* [composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
* [capistrano](https://github.com/capistrano/capistrano) (> 3.1.0)
* [capistrano-composer](https://github.com/capistrano/composer)
* [generator-toolbox](https://github.com/frontend/generator-toolbox)
* [Ansible](http://docs.ansible.com/ansible/intro_installation.html#latest-releases-via-pip) >= 2.2
* [Virtualbox](https://www.virtualbox.org/wiki/Downloads) >= 4.3.10
* [Vagrant](https://www.vagrantup.com/downloads.html) >= 1.8.5
* [vagrant-bindfs](https://github.com/gael-ian/vagrant-bindfs#installation) >= 0.3.1 (Windows users may skip this)
* [vagrant-hostmanager](https://github.com/smdahlen/vagrant-hostmanager#installation)

## 👉 Step by step tutorial
Firstly edit `trellis/group_vars/development/wordpress_sites.yml` & `trellis/group_vars/development/wordpress_sites.yml` to reflect you environment (site domain, etc). You shoud edit everywhere a `antistapress` is present.

Go to the site directory `cd trellis` & launch the dev environment `vagrant up`

Then go to the site directory `cd ../site` and install all the dependencies (core, plugins & styleguide).

`$ composer install`

`$ yarn`

Access you site at the domain you specified. The WP admin is accessible at `http://[site-domain]/wp/wp-admin`. Follow the WP installation procedure.

## 🛠 Plugins
#### ACF 
Don't forget to fill the acf-pro license key in the `vault.yml` configuration file :
```ACF_PRO_KEY=blablabla-license-key```

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

> More info about this generator & our styleguide philosophy: http://frontend.github.io/toolbox/installation.html

#### Wordpress theme
The theme is located in `/web/app/themes/antistapress`.

If you want to change the template folder name, you'll have to subsequently update the the filepath/name referenced in the following file:s
- `gulp_config.json`
- The `style.css` located in your template.

#### [lumberjack](https://github.com/Rareloop/lumberjack)
We curently use the starter theme Lumberjack. It uses twig as a templating system. You'll get more info here 

The assets (js, css, vendors) are registered & linked in `lumberjack/src/Functions/Assets.php`


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
- Adds WPML as a package
- Create a cli interface (as it has been done for the toolbox-generator) to make it easier to follow the configuration (database, project name, template name, etc..)
- Decide if the choice I've made for a starter theme (Lumberjack) is the good one. Other candidates includes:
  - [sage (roots.io)](https://roots.io/sage/) Unfortunately, sage (from roots.io) recently chose to support the blade templating system.
  - [Timber Starter theme](https://github.com/timber/starter-theme)
  - [sprig](https://github.com/zach-adams/sprig)

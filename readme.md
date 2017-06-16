# English DZ Social Network
[![Build Status](https://travis-ci.org/CaddyDz/English.svg?branch=master)](https://travis-ci.org/CaddyDz/English)
[![Laravel](https://img.shields.io/badge/Powered%20by-Laravel%20Framework-red.svg)](https://laravel.com/)
[![Gitter](https://img.shields.io/gitter/room/EnglishDz/Lobby.svg?style=flat-square)](https://gitter.im/EnglishDz/Lobby)
[![StyleCI](https://styleci.io/repos/69740118/shield?branch=master)](https://styleci.io/repos/69740118)  

This is the underlying source code of the English DZ Social Networking website.  
The website addresses All active Algerians seeking to either learn or have fun and chat in English online.

### You can check live changes [here](http://englishdz.herokuapp.com/)
PS: Heroku is not using a [CDN](https://en.wikipedia.org/wiki/Content_delivery_network) so the app may feel slower  
## System Requirements

The following are required to function properly.

*	[PHP 5.6+](http://php.net/manual/en/install.php)
* [Laravel 5.4+](https://laravel.com/docs/5.4#installation)
* [MySQL 5.6+](https://dev.mysql.com/doc/refman/5.7/en/installing.html)
*	[Composer](https://getcomposer.org/doc/00-intro.md)

## Installation

Automated installation coming soon

**Clone the project (replace **Name** with a name of your choice)**

``` shell
$ git clone --depth 1 https://github.com/CaddyDz/English Name
```

### Install the project dependencies using [Composer](https://getcomposer.org/)

``` shell
$ cd Name && composer install
```

### Create environment variables (change values according to your environment)

``` shell
$ cp .env.example .env
```

### Generate application key

``` shell
$ php artisan key:generate
```

### Set up the database

**Create a MySQL Database named english**

``` shell
php artisan migrate --seed
```

### Finally run the application

``` shell
php artisan serve
```

Hit ``http://127.0.0.1:8000`` using your favorite browser

## Contributing

Feel free to contribute through pull requests or by submitting ideas, feature requests or open issues.  

### License

English Dz Social Networking website is open-sourced software licensed under the [GNU General Public License version 3](https://opensource.org/licenses/GPL-3.0)

# Laravel Database backup plugin
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://scrutinizer-ci.com/g/webelightdev/laravel-dbbackup/badges/build.png?b=master)](https://scrutinizer-ci.com/g/webelightdev/laravel-dbbackup/build-status/master)
[![StyleCI](https://styleci.io/repos/68374707/shield)](https://styleci.io/repos/68374707/shield)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/webelightdev/laravel-dbbackup/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/webelightdev/laravel-dbbackup/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/webelightdev/laravel-dbbackup/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/webelightdev/laravel-dbbackup/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/webelightdev/laravel-dbbackup.svg?style=flat-square)](https://packagist.org/packages/webelightdev/laravel-dbbackup)

Simple package that allows to take database backup manually or automatically into your configured filesystem.

For Laravel 5.1.* & 5.2.*,  Notifications through `SMS` and  `Email` only check this branch.

For Laravel 5.3, We will gonna introduce Notifications through `SMS`, `Email`, `Slack`, `Push Notification` in next release.

Currently only `Mysql` supported but we will soon release `Pgsql` support as well.

To take database backup, fire this command
```
php artisan dbbackup:run
```

## Requirements
- PHP >= 5.5.9
- Laravel Filesystem
- Mysql Installed (`mysqldump`)

## Installation
 To install fire following command
 ```
 composer require webelightdev/laravel-dbbackup dev-master
 ```
 Go to `config/app.php`, Add following Service Provider in `providers => []`
 ```
 Webelightdev\LaravelDbBackup\DbBackupServiceProvider::class,
 ```
 
 `composer dump-autoload` will be required
 
 To publish config file,
 ```
 php artisan vendor:publish
 ```
# Laravel Database backup plugin
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://scrutinizer-ci.com/g/webelightdev/laravel-dbbackup/badges/build.png?b=master)](https://scrutinizer-ci.com/g/webelightdev/laravel-dbbackup/build-status/master)
[![StyleCI](https://styleci.io/repos/68374707/shield)](https://styleci.io/repos/68374707/shield)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/webelightdev/laravel-dbbackup/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/webelightdev/laravel-dbbackup/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/webelightdev/laravel-dbbackup/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/webelightdev/laravel-dbbackup/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/webelightdev/laravel-dbbackup.svg?style=flat-square)](https://packagist.org/packages/webelightdev/laravel-dbbackup)

Take Database backup in Laravel using following command
```
php artisan run:dbbackup
```
Let's take backup of specific tables only using following command
```
php artisan run:dbbackup --tables=table1,table2,table3
```
Ahaa Supercool, You can use this command to backup your Log tables separatly.

## Requirements
- Laravel Filesystem
- Mysql Installed (`mysqldump`)

## Installation
To get the latest version of Laravel DbBackup, run following using Composer :
```
composer require webelightdev/laravel-dbbackup dev-master
```
Or, you may manually update require block and run `composer update`
```
	"require": {
	    "webelightdev/laravel-dbbackup": "dev-master"
	}
```

Once Laravel DbBackup is installed, You need to register the Service Provider in `config/app.php`, Add following in `providers` :
```
Webelightdev\LaravelDbBackup\DbBackupServiceProvider::class,
```
 
`composer dump-autoload` will be required.

To publish the config,
```
php artisan vendor:publish --provider="Webelightdev\LaravelDbBackup\DbBackupServiceProvider"
```
## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
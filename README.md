# NemosMiner Monitoring Server

This is the server side software to compliment the monitoring tab in [NemosMiner](https://github.com/nemosminer/NemosMiner).

Written by Grant Emsley. BTC Donations are appreciated: 16Qf1mEk5x2WjJ1HhfnvPnqQEi2fvCeity

## Requirements
* Apahe
* MySQL database
* PHP (tested on PHP 7, may run on other versions)

## Installation

* Copy web directory to your server's web root
* Rename `private/config.sample.php` to `config.php` and edit with your database settings
* Make sure access to the `private` directory is restricted - if your webserver honors the `.htaccess` file that is included, it should be

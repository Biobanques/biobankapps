Biobankapps 
============================

Biobankapps use the Yii2 framework. It's an MVC Framework to enhance productivity.

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install from an Archive File

Get The last Github Archive.

Create a MySQL database
'''
create database biobankapps;
use biobankapps;
source /<absolutePath>/biobankapps/database/biobankapps-setup.sql
'''

Run the migration scripts
sudo php ./yii migrate




CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```



**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.


TESTING
-------------
Biobankapps is now built into the online server mananging the continuous integration CircleCI.


UPGRAFES VIA COMPOSER

To upgrade via composer , you need to install the asset plugin first:
php /usr/local/bin/composer global require "composer-plugin-api:1.1.0"
php /usr/local/bin/composer global require "fxp/composer-asset-plugin:v1.2.2"

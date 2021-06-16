dynamikaweb/yii2-factory-component
==================================
![php version](https://img.shields.io/packagist/php-v/dynamikaweb/yii2-factory-component)
![pkg version](https://img.shields.io/packagist/v/dynamikaweb/yii2-factory-component)
![license](https://img.shields.io/packagist/l/dynamikaweb/yii2-factory-component)
![quality](https://img.shields.io/scrutinizer/quality/g/dynamikaweb/yii2-factory-component)
![build](https://img.shields.io/scrutinizer/build/g/dynamikaweb/yii2-factory-component)

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```SHELL
$ composer require dynamikaweb/yii2-factory-component "*"
```

or add

```JSON
"dynamikaweb/yii2-factory-component": "*"
```

to the `require` section of your `composer.json` file.

How to use
----------

### PHP 7.4 or Higher ###
`common/configs/main.php`
```PHP
<?php

use dynamikaweb\fc\FactoryComponent as FC;
use common\models\ConfigModel;

return [
    'components' => [
        // other components ...
        'mailer' => FC::build('yii\swiftmailer\Mailer', fn() => [
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => ConfigModel::getInstance()->mail_host,
                'username' => ConfigModel::getInstance()->mail_username,
                'password' => ConfigModel::getInstance()->mail_password,
                'port' => ConfigModel::getInstance()->mail_port,
                'encryption' => ConfigModel::getInstance()->mail_encryption
            ],
            'useFileTransport' => false,
        ]),
    ]
];
```


### Older PHP version ###
`common/configs/main.php`
```PHP
<?php

use dynamikaweb\fc\FactoryComponent as FC;
use common\models\ConfigModel;

return [
    'components' => [
        // other components ...
        'mailer' => FC::build('yii\swiftmailer\Mailer', function() {
            $cfg = ConfigModel::getInstance();
            return [
                'viewPath' => '@common/mail',
                'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => $cfg->mail_host,
                    'username' => $cfg->mail_username,
                    'password' => $cfg->mail_password,
                    'port' => $cfg->mail_port,
                    'encryption' => $cfg->mail_encryption
                ],
                'useFileTransport' => false,
            ];
        }),
    ]
];
```

--------------------------------------------------------------------------------------------------------------
[![dynamika soluções web](https://avatars.githubusercontent.com/dynamikaweb?size=12)](https://dynamika.com.br)
This project is under [BSD-3-Clause](https://opensource.org/licenses/BSD-3-Clause) license.

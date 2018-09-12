<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-Ru',
    'name' => 'Q&A Land',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
        'modules' => [
                     'admin' => [
             'class' => 'app\modules\admin\Module',
   
         ],
            
            'questions' => [
            'class' => 'app\modules\questions\Module',
        ],
            'answers' => [
            'class' => 'app\modules\answers\Module',
        ],
            
        'uprofile' => [
            'class' => 'app\modules\uprofile\Module',
        ],
        'rbac' => [
            'class' => 'mdm\admin\Module',
             'controllerMap' => [
                 'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    /* 'userClassName' => 'app\models\User', */
                    'idField' => 'id',
                    'usernameField' => 'username',

                ],
            ],
           'layout' => 'left-menu',
            'mainLayout' => '@app/modules/admin/views/layouts/admin.php',
            
        ]
      
    ],
        'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'gii/*',
            'debug/*',
            'user-profile/*',
            'questions/*',
            'uprofile/*',
            'que/*'
//            'admin/*',
//            'rbac/*',
//            'post/index'
            

        ]
    ],
    'components' => [
        'questions' => 'app\modules\questions\models\Questions',
        'profile' => [
            'class' => 'app\modules\uprofile\models\UserProfile'
        ],
                'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'tytFfWbEzw7bSArpU2lAMdRuNkVCc6AJ',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
  'user' => [
            'identityClass' => 'app\models\User',
            'loginUrl' => ['site/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;

<?php

    return array(

        "DB_DSN"                => "mysql",
        "DB_HOST"               => "..your host(e.g:localhost/server address)..",
        "DB_NAME"               => "..your database name..",
        "DB_USER"               => "..database username..",
        "DB_PASS"               => "..database password..",
        'DB_CHARSET'            => 'utf8',

        "DEFAULT_CONTROLLER"    => "welcome",
        "DEFAULT_METHOD"        => "",

        'root'                  => str_replace("\\", "/", dirname(dirname(__DIR__))) . "/",
        "HELPERS_PATH"          => str_replace("\\", "/", dirname(dirname(__DIR__))) . "/core/helper/",

        "VIEWS_PATH"            => str_replace("\\", "/", dirname(__DIR__)) . "/views/",
        "CONTROLLERS_PATH"      => str_replace("\\", "/", dirname(__DIR__)) . "/controllers/",
        "MODELS_PATH"           => str_replace("\\", "/", dirname(__DIR__)) . "/models/",

        "IMG_PATH"              => str_replace("\\", "/", dirname(__DIR__)) . "/resources/img/",
        "UPLOAD_PATH"           => str_replace("\\", "/", dirname(__DIR__)) . "/resources/upload/",
        "JS_PATH"               => str_replace("\\", "/", dirname(__DIR__)) . "/resources/js/",
        "CSS_PATH"              => str_replace("\\", "/", dirname(__DIR__)) . "/resources/css/",

        "EXPIRY_1HOUR"          => 3600,
        "EXPIRY_1DAY"           => 86400,
        "EXPIRY_1WEEK"          => 604800,
        "EXPIRY_2WEEKS"         => 1209600,
        "COOKIE_DOMAIN"         => '',
        "COOKIE_PATH"           => '/',
        "COOKIE_SECURE"         => false,
        "COOKIE_HTTP"           => true,

        "ENCRYPTION_KEY"        => "3¥‹a0cd@!$251Êìcef08%&",
        "HMAC_SALT"             => "a8C7n7^Ed0%8Qfd9K4m6d$86Dab",
        "HASH_KEY"              => "z4D8Mp7Jm5cH",
        "HASH_COST_FACTOR"      => "10",

        "EMAIL_SMTP_DEBUG"      => 3,
        "EMAIL_SMTP_AUTH"       => true,
        "EMAIL_SMTP_SECURE"     => "ssl",
        "EMAIL_SMTP_HOST"       => "SMTP host",
        "EMAIL_SMTP_PORT"       => 465,
        "EMAIL_SMTP_USERNAME"   => "username",
        "EMAIL_SMTP_PASSWORD"   => "password",
        "EMAIL_FROM"            => "info@domain.com",
        "EMAIL_FROM_NAME"       => "Facade PHP Framework",
        "EMAIL_REPLY_TO"        => "no-reply@domain.com",
        "ADMIN_EMAIL"           => "your email",

        "PAGINATION_DEFAULT_LIMIT" => 10
    );
?>

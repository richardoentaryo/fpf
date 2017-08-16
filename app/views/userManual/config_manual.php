<div class="col-md-9">
    <p class="lead">
        <b>Configurations User Guide</b>
    </p>

    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading"><b>Database configurations</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    You MUST configure the database settings in every new projects, for each projects developed locally or via online server may use different database settings especially online servers.
                </p>

                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        "DB_DSN"                => "mysql", <br>
                        "DB_HOST"               => "..your host(e.g:localhost/server address)..", <br>
                        "DB_NAME"               => "..your database name..", <br>
                        "DB_USER"               => "..database username..", <br>
                        "DB_PASS"               => "..database password..", <br>
                        'DB_CHARSET'            => 'utf8',
                    </span>
                </div>

                <ul class='pull-left'>
                    <li><strong>DB_DSN(Database Service Name)</strong> field will be used to control the PDO driver. There are several options with DSN supported by application such as:
                        <code>mysql</code> for mySql DBMS, <code>pgsql</code> for postgreSql DBMS, <code>sqlsrv</code> for SqlServer DBMS, and <code>firebird</code> for firebird DBMS</li>
                    <li><strong>DB_HOST</strong> field is used to store the exact location of your database address (usually IP addresses).</li>
                    <li><strong>DB_NAME</strong> field for storing the database name. This field also used when creating new database via CLI migration command.</li>
                    <li><strong>DB_USER</strong> field for database username.</li>
                    <li><strong>DB_PASS</strong> field for database password.</li>
                </ul>
            </div>

            <div class="panel-heading"><b>Default Controller configurations</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    This configuration is optional which means it can be used as it is now or it can be editted if user wants another controller to be the default controller.
                </p>

                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        "DEFAULT_CONTROLLER"    => "welcome", <br>
                        "DEFAULT_METHOD"        => "",
                    </span>
                </div>

                <ul class='pull-left'>
                    <li><strong>DEFAULT_CONTROLLER</strong> the name of the controller file to be set as the default controller.</li>
                    <li><strong>DEFAULT_METHOD</strong> if set, that method will be called from default controller.</li>
                </ul>
            </div>

            <div class="panel-heading"><b>Cookies configurations</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    Contains the configuration settings of cookies reference. These are the fully customizable cookies settings and it is customizable.
                </p>

                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        "EXPIRY_1HOUR"          => 3600, <br>
                        "EXPIRY_1DAY"           => 86400, <br>
                        "EXPIRY_1WEEK"          => 604800, <br>
                        "EXPIRY_2WEEKS"         => 1209600, <br>
                        "COOKIE_PATH"           => '/',
                    </span>
                </div>

                <ul class='pull-left'>
                    <li><strong>EXPIRY_1HOUR</strong> specifies the expiry time of the cookies to only 1 hour.</li>
                    <li><strong>EXPIRY_1DAY</strong> specifies the expiry time of the cookies to only 1 day.</li>
                    <li><strong>EXPIRY_1WEEK</strong> specifies the expiry time of the cookies to only 1 week.</li>
                    <li><strong>EXPIRY_2WEEKS</strong> specifies the expiry time of the cookies to only 2 weeks.</li>
                    <li><strong>COOKIE_PATH</strong> specifies the domain storage path.</li>
                </ul>
            </div>

            <div class="panel-heading"><b>Encryption configurations</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    These are few optional configurations for encryption reference.
                </p>

                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        "ENCRYPTION_KEY"        => "3¥‹a0cd@!$251Êìcef08%&", <br>
                        "HMAC_SALT"             => "a8C7n7^Ed0%8Qfd9K4m6d$86Dab", <br>
                        "HASH_KEY"              => "z4D8Mp7Jm5cH",
                    </span>
                </div>

                <ul class='pull-left'>
                    <li><strong>ENCRYPTION_KEY</strong> specifies the expiry time of the cookies to only 1 hour.</li>
                    <li><strong>HMAC_SALT</strong> specifies the Message Authentication Code for openssl.</li>
                    <li><strong>HASH_KEY</strong> specifies the key string for openssl.</li>
                </ul>
            </div>

            <div class="panel-heading"><b>Email configurations</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    Same with few configurations above, these field of configurations are not mandatory but customizable. Which means can be editted or leave the config as it is when not going to be utilized.
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        "EMAIL_SMTP_USERNAME"   => "username", <br>
                        "EMAIL_SMTP_PASSWORD"   => "password", <br>
                        "EMAIL_FROM"            => "info@domain.com", <br>
                        "EMAIL_FROM_NAME"       => "Facade PHP Framework", <br>
                        "EMAIL_REPLY_TO"        => "no-reply@domain.com",
                    </span>
                </div>
            </div>

        </div>

    </div>

</div>

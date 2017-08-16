<div class="col-md-9">
    <p class="lead">
        <b>CLI User Guide</b>
    </p>

    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading"><b>Installing Facade using Composer</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    For installing Facade framework using composer there are few steps:<br>
                    - Open the command line<br>
                    - Change your CLI path to your server directory (e.g: htdocs)<br>
                    - Then type code below<br>
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        composer create-project fpf/facadephpframework "your project name" v1.2
                    </span>
                </div>
            </div>

            <div class="panel-heading"><b>Add, change, or remove 3rd party libraries</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    Managing 3rd party libraries using composer is relatively simple.<br>
                    Add, modify, or remove your library by manually edit composer.json under "require" header.<br>
                    After you've done modify the library package, execute "composer update" in CLI.
                </p>
            </div>

            <div class="panel-heading"><b>Builder Commands - Create Controller</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    You dont have to manually create the Controller classes, instead you can use Builder Commands via CLI.<br>
                    With only simple command within CLI you can have the your controllers with basic structure in instant.<br>
                    Here is the example CLI command to create Controller.<br>
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        php builder build controller:"controller name"
                    </span>
                </div>
            </div>

            <div class="panel-heading"><b>Builder Commands - Create model</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    Quite similar with controller creation. <br>
                    Builder Commands can also create model via CLI.<br>
                    Below is the example CLI command to create Model.<br>
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        php builder build model:"model name"
                    </span>
                </div>
            </div>

            <div class="panel-heading"><b>Builder Commands - Migration and database creation</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    For creating new database you only have to set database name and database environment.<br>
                    Next, execute the command below to create new database.<br>
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        php builder build migrate:createdb
                    </span>
                </div>
                <br><br>
                <p>
                    Firstly you will have to ensure that the database profile configurations has already been set. <br>
                    Database configuration can be editted in configuration file (see configuration guide).<br>
                    After the configurations are done, you can proceed with preparing queries.<br>
                    The queries has to be dumped inside App->config->imigrant.php file in order to be migrated<br>
                    CLI migration command is below ("up" for creation and "down" is for termination)<br>
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        php builder build migrate:"up/down"
                    </span>
                </div>
            </div>

        </div>

    </div>

</div>

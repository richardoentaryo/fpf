<div class="col-md-9">
    <p class="lead">
        <b>Helper User Guide</b>
    </p>

    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading"><b>Load Helpers Into Controller</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    FPF is embedded with few helper functions, and you can call those from controller using this command:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        $this->loadHelper($helperName);
                    </span>
                </div>
                <p>
                    As shown above, calling a helper requires the helper's name itself. <br>
                    An helper's name are written in a format like this : helpername_helper.php. <br>
                    So,  if you want to call an array_helper.php don't put the whole filename into parameter but, just simply write "array" as the parameter.
                </p><br>

                <p>
                    Now the functions from helper can be utilized. To use those functions, use this command inside a controller :
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        $this->functionName($optionalParam);
                    </span>
                </div>
            </div>

            <div class="panel-heading"><b>Create Your Own Helper Functions</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    Let's start with the filename itself. When you foing to create the helper file make sure the name has followed the helper naming rule.
                    It is simple, just put "_helper.php" in the end of the filename. For example :
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        yourCustomHelper_helper.php
                    </span>
                </div>
                <p>
                    <strong>NOTE!</strong> CLI doesn't accomodate helper file creation, so you have to create helper files manually.
                </p><div class="row"></div><br>

                <p>
                    Next is the structure of your custom helper functions will be. <br>
                    First you have to understand that helper function is a file that ONLY contains functions,
                    it is not a class so you cannot instantiate them inside a controller. <br><br>
                    Here is the basic structure of an helper:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        &lt;?php <br>
                            &emsp;&emsp;function one(){ <br>
                                &emsp;&emsp;&emsp;&emsp;return false; <br>
                            &emsp;&emsp;} <br>
                            &emsp;&emsp;function two($string){ <br>
                                &emsp;&emsp;&emsp;&emsp;return $string; <br>
                            &emsp;&emsp;} <br>
                        ?&gt;
                    </span>
                </div>
            </div>

        </div>

    </div>

</div>

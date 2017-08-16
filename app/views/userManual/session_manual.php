<div class="col-md-9">
    <p class="lead">
        <b>Session User Guide</b>
    </p>

    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading"><b>General Session Usage</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">

                <p>
                    Session support in PHP consists of a way to preserve certain data across subsequent accesses.
                    Session is where user can create and modify as they want. <br>
                    Usually sessions is used to temporarily save informations from user login, shopping cart, etc.<br><br>

                    Create new session:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        Session::set($key, $value);
                    </span>
                </div>
                <ul class='pull-left'>
                    <li><strong>$key</strong> represents session's identifier key.</li>
                    <li><strong>$value</strong> represents session's content.</li>
                </ul><div class="row"></div><br>

                <p>
                    Get session's content or data:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        Session::get($key);
                    </span>
                </div>
                <ul class='pull-left'>
                    <li><strong>$key</strong> represents session's identifier key.</li>
                </ul><div class="row"></div><br>

                <p>
                    Delete a session:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        Session::dismiss($key);
                    </span>
                </div>
                <ul class='pull-left'>
                    <li><strong>$key</strong> represents session's identifier key.</li>
                </ul><div class="row"></div><br>

                <p>
                    Get a session's content and then remove it immediately:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        Session::getAndDestroy($key);
                    </span>
                </div>
                <ul class='pull-left'>
                    <li><strong>$key</strong> represents session's identifier key.</li>
                </ul><div class="row"></div><br>

                <p>
                    Reset session by clearing all existing sessions:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        Session::remove($keep);
                    </span>
                </div>
                <ul class='pull-left'>
                    <li><strong>$keep</strong>
                        an optional boolean parameter.
                        By default this parameter is set to false which means session will remove all the sessions completely.
                        If it set to be true then it's only replacing the current session id with a new one, and keep the current session information.
                    </li>
                </ul>

            </div>

            <div class="panel-heading"><b>CSRF Session Token</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    Cross-Site Request Forgery or CSRF is a user-specific code implementation in all form submissions that prevents the illegal usage of user's important datas.
                    All information involving CSRF tokens are stored inside session.<br><br>

                    For generating new CSRF token, get the token value and time, FPF has already simplify it into functions. <br>
                    Here is the PHP code implementation example.<br><br>

                    Generate new CSRF token inside session.
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        Session::generateCsrfToken();
                    </span>
                </div>

                <p>
                    Get the CSRF token. <br>
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        Session::getCsrfToken();
                    </span>
                </div>

                <p>
                    Get the CSRF token time. <br>
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        Session::getCsrfTokenTime();
                    </span>
                </div>

            </div>

            <div class="panel-heading"><b>One Time Usage Session (Capsule)</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    Well, there are many terms when comes to a session that can only be accessed only one time, in FPF we call this "Capsule". <br>
                    This session is essential for storing in most cases some errors from error handling.<br><br>

                    Fill the Capsule with contents:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        Capsule::fill($content);
                    </span>
                </div>
                <ul class='pull-left'>
                    <li><strong>$content</strong> is a mandatory parameter for adding contents into Capsule. User can insert multiple contents using this function.</li>
                </ul><div class="row"></div><br>

                <p>
                    Access Capsule Contents:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        Capsule::spill();
                    </span>
                </div>
                <ul class='pull-left'>
                    <li><strong>spill()</strong> There might be more than one values inside Capsule, so spill() function will return imploded array as one string.</li>
                </ul><div class="row">

            </div>

        </div>

    </div>

</div>

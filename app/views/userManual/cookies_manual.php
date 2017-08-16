<div class="col-md-9">
    <p class="lead">
        <b>Cookies User Guide</b>
    </p>

    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading"><b>General Cookies Usage</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    FPF provide several functions that will help users when working with cookies.<br>
                    General use of cookies including: create, get, update, and delete cookies.<br><br>

                    Create new cookies:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        Cookies::set($name, $value, $time);
                    </span>
                </div>
                <ul class='pull-left'>
                    <li><strong>$name</strong> mandatory parameter required for setting the key of the cookie.</li>
                    <li><strong>$value</strong> mandatory parameter required for setting the contents of the cookie.</li>
                    <li><strong>$time</strong> optional parameter can be used for setting the duration of the cookie. By default it will set to one day from the configuration.</li>
                </ul><div class="row"></div><br>

                <p>
                    Access a cookie's value:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        Cookies::get($name);
                    </span>
                </div>
                <ul class='pull-left'>
                    <li><strong>$name</strong> mandatory parameter required for getting the cookie values via its key.</li>
                </ul><div class="row"></div><br>

                <p>
                    Update a cookie:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        Cookies::update($name, $value);
                    </span>
                </div>
                <ul class='pull-left'>
                    <li><strong>$name</strong> mandatory parameter required for setting the key of the cookie.</li>
                    <li><strong>$value</strong> mandatory parameter required for setting the contents of the cookie.</li>
                    <li><strong>IMPORTANT!</strong> if there is no cookie found by it's key, then update() function will create new cookies according to $name and $value given.</li>
                </ul><div class="row"></div><br>

                <p>
                    Remove a cookie:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        Cookies::destroy($name);
                    </span>
                </div>
                <ul class='pull-left'>
                    <li><strong>$name</strong> mandatory parameter required for deleting certain cookie via it's key.</li>
                </ul><div class="row"></div><br>

            </div>

        </div>

    </div>

</div>

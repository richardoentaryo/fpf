<div class="col-md-9">
    <p class="lead">
        <b>Controller User Guide</b>
    </p>

    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading"><b>Calling a view</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    For calling a simple view from a controller.
                    Note that all views must be inside "views" folder to be successfuly called by the controller.
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        $this->view->forge("view name");
                    </span>
                </div>
            </div>

            <div class="panel-heading"><b>Calling a view with header and footer template</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    In order to call some view templates simultaneously there are some requirements.<br>
                    - Header and footer templates must be inside headers and footers folder.<br>
                    - Content page must placed outside headers and footers folder.<br>
                    If those conditions have been passed you can call them using:<br>
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        $this->view->forgeWithLayouts("header file name", "content file name", "footer file name");
                    </span>
                </div>
            </div>

            <div class="panel-heading"><b>Pass data into a view</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    Data can be passed to the views from controller using prepared data.
                    The data must be an array for example :
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        $passData = array("value1" => "this is value 1", "value2" => "nothing");
                    </span>
                </div>
                <br><br>
                <p>
                    Those prepared datas are going to be included into view output buffer so the view can access that.
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        $this->view->forge("view1", $passData);
                    </span>
                </div>
            </div>

            <div class="panel-heading"><b>Redirection</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    Controller has a feature to safely redirects URL.<br>
                    This can be used for jumping from one controller to another.
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        $this->redirect("controller name/method");
                    </span>
                </div>
            </div>

        </div>

    </div>

</div>

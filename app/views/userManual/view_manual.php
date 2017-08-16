<div class="col-md-9">
    <p class="lead">
        <b>View User Guide</b>
    </p>

    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading"><b>CSS pathing</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    You can use 2 options for importing CSS to the view.<br>
                    The first one is using absolute path which is not quite flexible, <br>
                    and the second one is to use CDN or Content Delivery Network provided by Twitter Bootstrap.<br>
                    CDN is flexible and reliable but it requires internet connection while basic pathing CSS doesn't.<br><br>

                    Code for absolute path CSS import:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        link rel="stylesheet" type="text/css" href="../app/resources/css/bootstrap.min.css"
                    </span>
                </div>
                <br><br>

                <p>
                    Code for importing CSS using CDN:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"
                    </span>
                </div>
                <br><br>

            </div>

            <div class="panel-heading"><b>form action</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    There are few different approach that can be used in handling form action.<br>
                    Facade framework utilizing basic PHP form action handling.<br>
                    So you can do 2 different approach using form action.<br>
                    - calling parent controller's method.<br>
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        form action="validate" method="POST"
                    </span>
                </div>
                <br><br>

                <p>
                    The code above will call the validate method of the view's controller.<br>
                    The other way is to use absolute path form action.<br>
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        form action="/localhost/FPF/controller3/method1" method="POST"
                    </span>
                </div>
                <br><br>

                <p>
                    Assuming the domain name is FPF, the code above will call method1 of the controller3 via redirection.
                </p>
            </div>

            <div class="panel-heading"><b>Parent controller</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    Because of the MVC pattern design, every view can access public method of it's parent controller.<br>
                    Simply use basic PHP object oriented code like this one:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        $this->controller->methodName;
                    </span>
                </div>
            </div>

        </div>

    </div>

</div>

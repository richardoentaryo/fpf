<div class="col-md-9">
    <p class="lead">
        <b>File Upload User Guide</b>
    </p>

    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading"><b>General File Upload Usage</b></div>
            <div class="panel-body" style="padding:20px auto; font-family:lucida console; font-size:9pt;">
                <p>
                    We know that developing a good websites always need a media to support it's functionality and appearance. <br>
                    So, we create a feature called uploader to help you when uploading file into the website with neat. <br><br>

                    Below is an example of doing file upload in FPF:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                        $fileUpload = new Uploader(); <br>
                		$uploadResult = $fileUpload->upload('fileInputName'); <br>
                		$uploadInfo = $fileUpload->getUploadInfo(); <br>
                    </span>
                </div>
                <p>
                    Here is an explanation from the code segment above. <br>
                    The very first thing to do when you are going to do uploading a file via uploader is instancing the Uploader object. <br>
                    Uploader has a function called upload() which returns boolean value, true when upload success and otherwise it will return false value. <br>
                    It is necessary to get upload information like the name of the file that we have uploaded itself, so we can further process that informations.
                </p><br>

                <p>
                    In case you want to get the error(s) when the upload attempt failed, we also provide a function that can help you with that:
                </p>
                <div class="col-md-12 well well-sm">
                    <span style="color:#a52508; font-family:courier new,Helvetica,sans-serif; margin:0 auto">
                		$uploadErros = $fileUpload->getErrors();
                    </span>
                </div>

            </div>

        </div>

    </div>

</div>

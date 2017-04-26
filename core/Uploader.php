<?php

class Uploader
{
    private $errors = [];

    private $uploadInfo = [];

    private $defaultImgPath = null;

    // path is default to image, customizeable
    // takes custom extension params using array type
    public function upload($file, $customPath = null, $ext = array("jpeg","jpg","png","pdf","txt","doc","docx","xls","xlsx"))
    {
        $isValid = true;

        //$file_name = $_FILES[$file]['name'];
        $file_name = preg_replace('/\s+/', '_', $_FILES[$file]['name']);
        $file_size = $_FILES[$file]['size'];
        $file_tmp  = $_FILES[$file]['tmp_name'];
        $file_type = $_FILES[$file]['type'];
        $file_exts = strtolower(end(explode('.',$_FILES[$file]['name'])));

        if(self::validateFileName($file_name)        == false) { $isValid = false; }
        if(self::validateNameLength($file_name)      == false) { $isValid = false; }
        if(self::validateSize($file_size)            == false) { $isValid = false; }
        if(self::validateExtension($ext, $file_exts) == false) { $isValid = false; }

        if($isValid == true)
        {
            // do upload file
            $isUploaded = true;

            // move the uploaded file to desired path
            // by default the uploaded files are stored in upload folder inside resources
            try
            {
                $fixPath = Config::get("UPLOAD_PATH");

                if($customPath != null) { $fixPath = $customPath; }

                move_uploaded_file($file_tmp, $fixPath . $file_name);

                $this->uploadInfo['name'] = $file_name;
                $this->uploadInfo['size'] = $file_size;
                $this->uploadInfo['path'] = $fixPath . $file_name;
            }
            catch (Exception $e)
            {
                $isUploaded = false;
            }

            if($isUploaded == true && empty($this->errors) == true)
            {
                return true;
            }
            else
            {
                $this->errors[] = "Upload error! file was not uploaded.";

            }
            return false;

        }
        else
        {
            // dont upload file
            return false;
        }
    }

    // file name must be alpha numeric characters
    // dashes(-,_) also permitted
    public function validateFileName($filename)
    {
        if(preg_match("`^[-0-9A-Z_\.]+$`i",$filename))
        {
            return true;
        }
        else
        {
            $this->errors[] = "File name should contain only alphanumerics and dashes";
            return false;
        }
    }

    // file name should not exceed 225 characters
    public function validateNameLength($filename)
    {
        if(mb_strlen($filename,"UTF-8") > 225)
        {
            $this->errors[] = 'File name exceeding 225 characters';
        }
        else
        {
            return true;
        }
        return false;
    }

    // file size should not exceed the upload limit
    public function validateSize($filesize)
    {
        if($filesize > 20971521)
        {
            $this->errors[] = 'File size exceeding the upload limit';
        }
        else
        {
            return true;
        }
        return false;
    }

    // check the file extension with allowed extension set provided
    public function validateExtension($extensions, $fileExt)
    {
        if(in_array($fileExt,$extensions) == false)
        {
            $this->errors[] = "extension not allowed, please use supported file format.";
        }
        else
        {
            return true;
        }
        return false;
    }

    public function getErrors()
    {
        return implode(' | ', $this->errors);
    }

    public function getUploadInfo()
    {
        return $this->uploadInfo;
    }
}
?>

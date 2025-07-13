<?php

namespace Src\Classes;

class ClassUpload
{
    public function uniqueUploadFile($tmpName, $path)
    {
     move_uploaded_file($tmpName, $path);
        return true;
    }
}


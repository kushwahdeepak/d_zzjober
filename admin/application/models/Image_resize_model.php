<?php

Class Image_resize_model extends CI_Model
{   
    function __construct()
    {
        parent::__construct();
    }

    function resizeCustomImage($path="", $size="")
    {
        if (isset($_FILES['image']['name']) and ($_FILES['image']['name']!='')) 
        {

            $target_dir = $path;

            $date = new DateTime();
            $name = $date->getTimestamp();
            $path_parts = pathinfo($_FILES['image']['name']);
            $fileName = $name . "_" . "0" . "." . $path_parts["extension"];
            
            $target_dir = $target_dir.$fileName;

            if(move_uploaded_file($_FILES['image']["tmp_name"], $target_dir))
            { 
                 //file permission
                chmod ($target_dir, 0777);

                // for big img
                $large_width = $this->getWidth($target_dir);
                $large_height = $this->getHeight($target_dir);

                $max_width = $size; 
                if ($large_width > $max_width)
                {
                    $scale = $max_width/$large_width;
                    $this->resizeImage($target_dir,$large_width,$large_height,$scale);
                }
                else
                {
                    $scale = 1;
                    $this->resizeImage($target_dir,$large_width,$large_height,$scale);
                }
                return $fileName;
            }
            return "";
        }
    }

    function resizeImage($image,$width,$height,$scale) 
    {
        list($imagewidth, $imageheight, $imageType) = getimagesize($image);
        $imageType = image_type_to_mime_type($imageType);
        $newImageWidth = ceil($width * $scale);
        $newImageHeight = ceil($height * $scale);
        $newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
        switch($imageType) {
            case "image/gif":
                $source=imagecreatefromgif($image); 
                break;
            case "image/pjpeg":
            case "image/jpeg":
            case "image/jpg":
                $source=imagecreatefromjpeg($image); 
                break;
            case "image/png":
            case "image/x-png":
                $source=imagecreatefrompng($image); 
                break;
        }
        imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
        
        switch($imageType) {
            case "image/gif":
                imagegif($newImage,$image); 
                break;
            case "image/pjpeg":
            case "image/jpeg":
            case "image/jpg":
                imagejpeg($newImage,$image,90); 
                break;
            case "image/png":
            case "image/x-png":
                imagepng($newImage,$image);  
                break;
        }
        
        chmod($image, 0777);
        return $image;
    }

    // Resize product img
    function resizeProductImage($image,$width,$height,$scale) 
    {
        list($imagewidth, $imageheight, $imageType) = getimagesize($image);
        $imageType = image_type_to_mime_type($imageType);
        $newImageWidth = ceil($width * $scale);
        $newImageHeight = $height;
        $newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
        switch($imageType) {
            case "image/gif":
                $source=imagecreatefromgif($image); 
                break;
            case "image/pjpeg":
            case "image/jpeg":
            case "image/jpg":
                $source=imagecreatefromjpeg($image); 
                break;
            case "image/png":
            case "image/x-png":
                $source=imagecreatefrompng($image); 
                break;
        }
        imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
        
        switch($imageType) {
            case "image/gif":
                imagegif($newImage,$image); 
                break;
            case "image/pjpeg":
            case "image/jpeg":
            case "image/jpg":
                imagejpeg($newImage,$image,90); 
                break;
            case "image/png":
            case "image/x-png":
                imagepng($newImage,$image);  
                break;
        }
        
        chmod($image, 0777);
        return $image;
    }


    //You do not need to alter these functions
    function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale, $option="auto")
    {
        list($imagewidth, $imageheight, $imageType) = getimagesize($image);
        $imageType = image_type_to_mime_type($imageType);
        
        $newImageWidth = ceil($width * $scale);
        $newImageHeight = ceil($height * $scale);
        $newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
        switch($imageType) {
            case "image/gif":
                $source=imagecreatefromgif($image); 
                break;
            case "image/pjpeg":
            case "image/jpeg":
            case "image/jpg":
                $source=imagecreatefromjpeg($image); 
                break;
            case "image/png":
            case "image/x-png":
                $source=imagecreatefrompng($image); 
                break;
        }
        imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
        switch($imageType) {
            case "image/gif":
                imagegif($newImage,$thumb_image_name); 
                break;
            case "image/pjpeg":
            case "image/jpeg":
            case "image/jpg":
                imagejpeg($newImage,$thumb_image_name,90); 
                break;
            case "image/png":
            case "image/x-png":
                imagepng($newImage,$thumb_image_name);  
                break;
        }
        chmod($thumb_image_name, 0777);
        return $thumb_image_name;
    }

    //You do not need to alter these functions
    function getHeight($image) 
    {
        $size = getimagesize($image);
        $height = $size[1];
        return $height;
    }

    //You do not need to alter these functions
    function getWidth($image) 
    {
        $size = getimagesize($image);
        $width = $size[0];
        return $width;
    }



}
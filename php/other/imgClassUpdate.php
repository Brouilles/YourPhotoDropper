<?php
class generateThumbnail 
{
    static function generate($img, $name, $folder, $max_size)
    {
        //remove extension
        $name = substr($name,0,-4);

        //Image size, Width and Height
        list($width, $height) = getimagesize($img);

        //Create Image
        if($width < $height) //portrait image
        {
            
        }
        else if($width > $height)//landscape image
        {
           
        }
    }
}   
?>
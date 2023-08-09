<?php
namespace App\Modules\Image;

class Saver
{
    public function save($image, string $mediaType, string $fileName)
    {
        if (\preg_match('/(.*\/png)/', $mediaType)) {
            \imagepng($image, WWW_ROOT . 'img' . DS . $fileName);
        } elseif (\preg_match('/(.*\/jpeg|.*\/jpg)/', $mediaType)) {
            \imagejpeg($image, WWW_ROOT . 'img' . DS . $fileName);
        }
    }
}

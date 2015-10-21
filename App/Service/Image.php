<?php

namespace App\Service;

class Image
{
    public static function getMime($file)
    {
        $imageType = exif_imagetype($file);
        $imageMime = image_type_to_mime_type($imageType);

        return $imageMime;
    }

    public static function write ($im, $subscript) {
        $imageColor = imagecolorallocate($im, 0, 0, 0);
        imagestring($im, 5, 0, 0, $subscript, $imageColor);
        return $im;
    }

    public function writeImage($tmpName, $user, $config)
    {
        if ($tmpName === '') {
            throw new \Exception('no file is selected');
        }

        $imageMime = self::getMime($tmpName);

        if (!in_array($imageMime, $config['allowed_mimes'])) {
            throw new \Exception('file is not an image or image type not allowed');
        }

        if (!is_dir($config['upload_dir'] . $user)) {
            mkdir($config['upload_dir'] . $user, 0644, true);
        }

        $fileName = $user . '/' . time();

        if (!move_uploaded_file($tmpName, $config['upload_dir'] . $fileName)) {
            throw new \Exception('file not valid');
        }

        return 'http://' . $_SERVER['SERVER_NAME'] . '/image/' . $fileName;
    }
}
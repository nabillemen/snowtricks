<?php

namespace Utils;

class Resizer
{
    public static function crop($path, $width, $height) {
        $dimensions = getimagesize($path);

        if (!is_array($dimensions)) {
            throw new \InvalidArgumentException('The image at path '.$path.' does not exist...');
        }
        if ($width < 1 || $height < 1) {
            throw new \InvalidArgumentException('The given dimensions are not valid...');
        }

        if ($dimensions[0] < $width) {
            $x = 0;
            $width = $dimensions[0];
        } else {
            $x = ($dimensions[0] - $width) / 2;
        }
        if ($dimensions[1] < $height) {
            $y = 0;
            $height = $dimensions[1];
        } else {
            $y = ($dimensions[1] - $height) / 2;
        }

        $resource = imagecrop(imagecreatefromjpeg($path), array(
            'x' => $x,
            'y' => $y,
            'width' => $width,
            'height' => $height
        ));
        imagejpeg($resource, $path);
    }
}

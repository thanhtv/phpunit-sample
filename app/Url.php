<?php
namespace App;

class Url
{
    public function slug($string, $separator = '-', $maxLength = 96)
    {
        $title = iconv('UTF-8', 'ASCII//IGNORE', $string);
        $title = preg_replace("%[^-/+|\w ]%", '', $title);
        $title = strtolower(trim(substr($title, 0, $maxLength), '-'));
        $title = preg_replace("/[\/_|+ -]+/", $separator, $title);

        return $title;
    }
}
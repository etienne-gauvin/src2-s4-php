<?php
class Tools {

    public static function debug($something) {
        echo '<pre>', var_dump($something), '</pre>';
    }

    public static function trimWords($phrase, $max_words) {
        $phrase_array = explode(' ',$phrase);
        if(count($phrase_array) > $max_words && $max_words > 0)
            $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...';
        return $phrase;
    }

}
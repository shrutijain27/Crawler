<?php
/**
 * Created by PhpStorm.
 * User: shruti
 * Date: 10/7/15
 * Time: 11:06 AM
 */

class Utils {

    static function cleanData($input) {
        $pattern = array("\\n\\t","\\n","\\t","u' ", "'" );
        $replace =  " " ;
        return str_replace($pattern, $replace, $input);     //replace tabs with space
    }

    static  function TrimData($input){

        return preg_replace('/\s+/', '', $input);
    }

}
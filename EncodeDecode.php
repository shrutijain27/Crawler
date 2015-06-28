<?php
/**
 * Created by PhpStorm.
 * User: shruti
 * Date: 26/6/15
 * Time: 4:55 PM
 */
    //$file = 'accounts.json';
    $data = file_get_contents('./4.json');

    $array = json_decode($data, true);
    $id = 1;

    foreach ($array as &$element) {
        //$element["_id"]=$id++;
        $a = array("_id"=>$id++);
        $element= array("index"=>$a) + $element;

    }
var_dump($array);

    $new_file  = json_encode($array);
    file_put_contents('output.json',$new_file);


?>




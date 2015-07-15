    <?php
    /*
     *  Script takes json file as input and convert it into another
     *    json file with data format acceptable by curl
     *    Input - Crawled_data.json
     *    Output -LaptopData.json
     */

    //contain function to clean json data
    include "Utils.php";
    ini_set("display_errors", "0");
    error_reporting(E_ALL);

    //load json file
    $json_data = file_get_contents('./Crawled_data.json');
    $fp = fopen('./LaptopData.json', 'a');

    //decode json data
    $json_array = json_decode( $json_data, True);

    for($element=0;$element< count($json_array);$element++) {
        $json_array[$element] = array("index"=>array("_id"=>$json_array[$element]['model_id'],"_type"=>'data'))
                                + $json_array[$element];

        $string = json_encode($json_array[$element]);
        //write encoded element to another file
        fwrite($fp, json_encode($json_array[$element])."\n");
    }

        fclose($fp);     //close json file

    ?>




    <?php
    /*
     *  Script takes json file as input and convert it into another
     *    json file with data format acceptable by curl
     *    Input - Crawled-data.json
     *    Output -Laptop_Specs.json
     */

    //contain function to clean json data
    include "Utils.php";

    //load json file
    $json_data = file_get_contents('./Crawled-data.json');

    //decode json data
    $json_array = json_decode( $json_data, True);

    for($i=0;$i< count($json_array);$i++) {
        //call cleanData()
        $json_array[$i] = Utils::cleanData($json_array[$i]);
        $single_element = $json_array[$i];
        for($j=0;$j < count($single_element);$j++){
            //trim every record
              $single_element['PartNumber'] =   Utils::TrimData($single_element['PartNumber']);
              $single_element['ModelId']    =   Utils::TrimData($single_element['ModelId']);
              $single_element['Brand']      =   Utils::TrimData($single_element['Brand']);
              $single_element['ram']        =   Utils::TrimData($single_element['ram']);
              $single_element['model']      =   Utils::TrimData($single_element['model']);

        }
    }

    //open new json file in append mode
    $fp = fopen('./Laptop_Specs.json', 'a');

    foreach ($json_array as &$element)    {
        //add id and type field
        $a = array("_id"=>$element['ModelId']) + array("_type"=>'data');

        //add new fields in beginning
        $element= array("index"=>$a) + $element;
        //write encoded element to another file
        fwrite($fp, json_encode($element));
        //write newline char in end of every element
        fwrite($fp,"\n");
    }
    fclose($fp);     //close json file


    ?>




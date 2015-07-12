    <?php
    /**
     *
     * Created by PhpStorm.
     * User: shruti
     * Date: 8/7/15
     * Time: 12:32 PM
     */
    include "Utils.php";                    //Class for Data cleaning
    require_once  'vendor/autoload.php';

    use \Predis;
    Predis\Autoloader::register();

    $client = new Predis\Client([           //Connect to Redis Client
        "hosts" => "localhost",
        "port" => "6379"
    ]);

    //store file contents in data variable
    $json_data = file_get_contents('./Crawled-data.json');

    //decode the json data into array variable
    $json_array = json_decode($json_data, true);

    //Clean entire file data
    for($i=0;$i < count($json_array);$i++) {                 
        $json_array[$i] = Utils::cleanData($json_array[$i]);
    }


    //Creating Hashmap in redis
    foreach ($json_array as $element) {
        //serialize each element before storing as redis accept string
        $serial_data = serialize($element);
        //store partnumber in key var
        $key = $element['ModelId'];
        //replace spaces in partnumber field
        $key = str_replace(" " ,"",$key);
        //create hashmap using partnumber as key
         $client->hmset('Laptop_Specification',$key,$serial_data );

    }
    ?>

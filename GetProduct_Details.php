<?php
/*
 * read data from redis by passing a key
 * it returns corresponding value stored
 *
 * Created by PhpStorm.
 * User: ShrutiJain
 * Date: 9/7/15
 * Time: 1:11 PM
 */
include "SearchPage-view.php";
require_once  'vendor/autoload.php';
use \Predis;
Predis\Autoloader::register();

$client = new Predis\Client([
    "hosts" => "localhost",
    "port" => "6379"
]);

if(isset($_GET['id']))
{   $q = $_GET['id'];

    $value = $client->hgetall('Laptop_Specification');
    $single_value = $value[$q];
    $unserialised_data = unserialize($single_value);

}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="outer" style="padding-top: 30px ">

    <div class="image" style="width: 50px ;" >
        <img src="<?php echo $unserialised_data['image'][0] ;?> ">
    </div>

    <div class="specs "style="padding-top: 20px">
     Brand :  <?php echo  $unserialised_data['Brand'] ;?> <br>
     Price :  <?php echo  $unserialised_data['offer'][0] ;?><br>
     RAM   :  <?php echo  $unserialised_data['ram']; ?><br>
    SOFTWARE :<?php echo  $unserialised_data['included_software'][0] ;?><br>
    MODEL :   <?php echo  $unserialised_data['model'][0] ;?><br>
     PART NUMBER :  <?php echo  $unserialised_data['PartNumber'] ;?><br>
     Model Id  <?php echo  $unserialised_data['ModelId'];?> <br>

    </div>

</div>

</body>
</html>

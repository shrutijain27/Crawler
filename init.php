<?php
/**
 * Created by PhpStorm.
 * User: shruti
 * Date: 1/7/15
 * Time: 11:14 AM
 */

require_once  'vendor/autoload.php';
$es = new Elasticsearch\Client([ 'hosts' => ['localhost']
            ]);
                 //create a connection to localhost in es

?>









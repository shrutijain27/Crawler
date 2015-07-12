<?php
/**
 * File loads data into elastic and creates bulk index on it
 *
 * Created by PhpStorm.
 * User: shruti
 * Date: 9/7/15
 * Time: 3:31 PM
 */

//specify parameters for url in curl
$search_host = 'localhost';
$search_port = '9200';
$index = 'elastic-index';
$doc_type = 'data';
$header = array('Content-Type: multipart/Laptop-Specification-data');
$doc_id = 1;

//load json file
$json_doc = file_get_contents('./Crawled-formattedData.json');

//decode File before loading to elastic
$json_doc = json_decode($json_doc,true);

//$baseuri is url for curl
$baseUri = 'http://'.$search_host.':'.$search_port.'/'.$index.'/'.$doc_type.'/'.$doc_id;

$ci = curl_init();
curl_setopt($ci, CURLOPT_URL, $baseUri);
curl_setopt($ci, CURLOPT_PORT, $search_port);
curl_setopt($ci, CURLOPT_TIMEOUT, 200);
curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ci, CURLOPT_HTTPHEADER, $header);
curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ci, CURLOPT_POSTFIELDS, $json_doc);

$result = json_decode(curl_exec($ci));

?>
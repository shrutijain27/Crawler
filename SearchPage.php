
<?php

session_start();

$search_id = uniqid();
$array_values = array();
$array_values = $_GET;

$_SESSION['search_id']

//$_SESSION['searchbox'] = $_GET['Searchbox'];
//foreach($_GET['brand'] as $selected_brand){
//    $brands[] = $selected_brand;
//
//}
//$_SESSION['brand']=$brand;
//
//foreach($_GET['ram'] as $selected_ram){
//    $ram_features[] = $selected_ram;
//
//}
//$_SESSION['ram'] =$ram_features;
//
//$_SESSION['price'] = $_GET['Price'];







include "template.php";
require_once 'init.php';

ini_set("display_errors", "0");
error_reporting(E_ALL);




// if something set
if( true )
{
    $filters = array();                 //filter array
    $queryString = array();             //querystring array
    if(!empty ($_GET['Searchbox'])){    //search box input

        $search_keyword = $_GET['Searchbox'];
        $queryString['bool']['must']['query_string'] = array('default_field'=>'model','query'=>$search_keyword);


    }

    if(!empty($_GET['brand'])){
// Loop to store  values of individual checked checkbox.

        $brands = array();
        foreach($_GET['brand'] as $selected_brand){
            $brands[] = $selected_brand;


        }

        $filters['bool']['must'][]['terms']['brand'] = $brands;     //filter


    }
    if(!empty($_GET['ram'])){
// Loop to store  values of individual checked checkbox.
        $ram_features = array();
        foreach($_GET['ram'] as $selected_ram){
            $ram_features[] = $selected_ram;

        }
        $filters['bool']['must'][]['terms']['ram'] = $ram_features;

    }

    if(!empty($_GET['Price'])){
// Loop to store  values of individual checked checkbox.

        $price_features = explode("-",$_GET['Price']);
        $min_price = $price_features[0];
        $max_price = $price_features[1];
        $filters['bool']['must'][]['range']['offer']= array("from"=>$min_price,"to"=>$max_price);
    }

    $params['index'] = 'laptopindex';
    $params['type']  = 'data';
    $params['from'] ='0';
    $params['size'] ='20';


    if(count($filters) > 0 || count($queryString) > 0 ){ // hit query only when get values
        $final_Query = array();
        $final_Query['filtered'] = array(
            "filter" => $filters,
            "query" => $queryString
        );

        //facets for unique value selection
//        $facet['ram']['terms'] = array("field"=>"ram", "all_terms"=>true,"order"=>"term");
//        $facet['brand']['terms'] = array("field"=>"brand", "all_terms"=>true,"order"=>"term");

        $params['body'] = array(
            'query' => $final_Query,
//                'facets'=> $facet
        );

        $query_results  = $es->search($params);

    }


    if($query_results['hits']['total']>=1)                //store results of query in $results
    {
        $results = $query_results['hits']['hits'];
    }
    else
    {
        echo(" No matching results ");
    }

if(isset($results)){

    $show_per_page = 10;
    $total_pages = ceil(count($results)/$show_per_page);

    $start = $_GET['start'];
    $offset = 10;

    $outArray = array_slice($results, $start, $offset);
    foreach($outArray as $r){
?>

<div class="inner" style="height: 200px ;width: 200px ;float:left; padding-top: 20px
                    ;padding-left: 20px; padding-bottom: 60px; ">

        <div class="image-div">
            <img src = "<?php echo  $r['_source']['image'] ?> "/>
        </div>
        <div class="Offer"><?php echo $r['_source']['offer'] ; ?></div>
<div>
    <a href="GetProduct_Details.php?id=<?php echo $r['_source']['model_id'];
    ?>"><?php echo $r['_source']['model']; ?></a>
</div>

</div>

<?php
    }
}
}
 ?>
</div>


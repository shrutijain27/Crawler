<?php

/*
 * Search ElasticDb
 * Display initial data
 * Send corresponding partNumber field to Details page of url clicked
 * call details page
 */
include "Utils.php";
include "SearchPage-view.php";
require_once 'init.php';

if(isset($_GET['q']) )
{
    $q = $_GET['q'];

    $params['index'] = 'index_elastic';
    $params['type']  = 'data';

    $filters = array();
    /*
    $x = array();
    $x[]['should']['term']['ram'] = '2gb';
    $x[]['should']['term'][]
    */
    $filters['bool']['should']['term']['model'] = $q;

   //$filters['bool']['should']['bool'] = $x;

    $myQuery = array();
    $myQuery['filtered'] = array(
        "filter" => $filters
    );

    $params['body'] = array(
        'query' => $myQuery
    );

    $query  = $es->search($params);                         //call search() in elasticsearch

    if($query['hits']['total'] >1)                         //store results of query in $results
    {
        $results = $query['hits']['hits'];
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Elastic Search |es </title>
</head>


<body>

<?php
if(isset($results)){
 ?>
    <div class="results" style=" width: 1000px ;height:1000px ;" >
 <?php
    foreach($results as $r){
?>



        <div class="inner" style=" height: 150px ;width: 150px ;float:right; padding-top: 20px
                    ;padding-left: 20px; padding-bottom: 60px;   ">
               
                
               <div class="image-div">
                <img src = "<?php echo  $r['_source']['image'][0] ?> "/>
                </div>
                <div class="Offer"><?php echo $r['_source']['offer'][0] ; ?></div>
                <div>
                <a href="GetProduct_Details.php?id=<?php $a = Utils::TrimData($r['_source']['ModelId']);
                echo $a; ?>"><?php echo $r['_source']['model'][0]; ?></a>
                </div>
            </div>

<?php

    }

?>
 </div>
<?php
}
?>

</body>
</html>


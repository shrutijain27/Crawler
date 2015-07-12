<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Elastic Search |es </title>
</head>
<style>
    .top-li{
        float: left;
        border-left:1px solid #990000;
        height:30px;
        list-style:none;
        font:20  ;
        font-family:sans-serif;
        padding: 13px 20px 0 20px;
    }
</style>

<body>


<div class = "top-bar" style=" background-color:lightseagreen;height: 100px; width:1400px; ">


    <div class="image">

            <img src="images/logo91.gif"  style="padding-left: 30px;padding-right:30px;float:left;
            padding-right: 20px;/>

    </div>

    <div class="form-div "  >
        <form name="form1" action="SearchPage.php" method = "get">
            <input name = "q" style="color: #666; background-color:#fff;" autocomplete="off"
                   role="textbox" size="50px" width="40px"
                   aria-autocomplete="list" aria-haspopup="true"
                   placeholder="Search for products or brands" autofocus="" />
            <input type = "submit" name ="submit" value = "search"  />
        </form>
       <a href="SearchPage-view.php" style="float:right; font-family:sans-serif ;padding-right: 150px">HOME</a>

    </div>

    <ul >
        <li class="top-li" >ASUS</li><li class="top-li"> LENOVO </li><li class="top-li">SAMSUNG</li>
        <li class="top-li">APPLE</li><li class="top-li">SONY</li><li class="top-li">ACER</li>
        <li class="top-li">DELL</li><li class="top-li">HP</li><li class="top-li">TOSHIBA</li>
    </ul>

</div>





</body>
</html>
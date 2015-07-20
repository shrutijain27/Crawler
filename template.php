

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
        <form name="Searchform" action="SearchPage.php" method = "get">
            <input name = "Searchbox" style="color: #666; background-color:#fff;" autocomplete="on"
                   role="textbox" size="50px" width="40px"
                   aria-autocomplete="list" aria-haspopup="true"
                   placeholder="Search for products or brands" autofocus="" />
            <input type = "submit" name ="submit" value = "search"  />
        </form>
       <a href="template.php" style="float:right; font-family:sans-serif ;padding-right: 150px">HOME</a>
    </div>

</div>

<div style="float: left;width: 100%">
<div class="left-bar" style="background-color: lightseagreen ;width:15%;float: left;">
    <form name="Searchform" action="SearchPage.php" method="get">
        BRAND<br>

        <input type="checkbox"  name="brand[]" id="brand-1" value="asus">ASUS<br>
        <input type="checkbox" name="brand[]" id="brand-2" value="lenovo">LENOVO<br>
        <input type="checkbox" name="brand[]" id="brand-3" value="dell">DELL<br>
        <input type="checkbox" name="brand[]" id="brand-4" value="acer">ACER<br>
        <input type="checkbox" name="brand[]" id="brand-5" value="apple">APPLE<br>
        <input type="checkbox" name="brand[]" id="brand-6" value="sony">SONY<br>
        <input type="checkbox" name="brand[]" id="brand-7" value="hp">HP<br><br><br>


        RAM<br>
        <input type="checkbox" name="ram[]" id="ram-1" value="2">2GB<br>
        <input type="checkbox" name="ram[]" id="ram-2" value="4">4GB<br>
        <input type="checkbox" name="ram[]" id="ram-3" value="8">8GB<br><br><br>

        PRICE<br>
        <input type="checkbox" name="Price" id="price-1" value="10000-20000">10000-20000<br>
        <input type="checkbox" name="Price" id="price-2" value="20000-30000">20000-30000<br>
        <input type="checkbox" name="Price" id="price-3" value="30000-40000">30000-40000<br>
        <input type="checkbox" name="Price" id="price-3" value="40000-50000">40000-50000<br>
    <br><br>

    <input type="submit" name="submit" value="submit"  />

<!--        <input type = "hidden" id ="Current_page" name="Current_page " value="--><?php //echo ($current_page+1); ?><!--">-->
    </form>


</div>



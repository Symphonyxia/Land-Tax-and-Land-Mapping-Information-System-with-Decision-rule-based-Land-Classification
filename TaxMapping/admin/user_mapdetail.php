<?php
include('security.php');

include('user_include/header.php');
include('user_include/navbar.php');
?>

<style>
   
  
   #container1
    {
        width: 500px;
        float: left;
        margin: 10px;
        color: black;
    }
    
    #container2
    {
        width: 400px;
        float: left;
        margin: 10px;
        color: black;
        background-color: red;
    }

    


</style>



<style>
   
    #container1
    {
        width: 400px;
        float: left;
        
        margin: 10px;
        color: black;
    }
    
    #container2
    {
        width: 400px;
        float: left;
        margin-left: 50px;
        margin: 10px;
        color: black;
    }

    



</style>

  <div class="container">

   
    <div class="card shadow mb-4">
  <div class="card-header py-8">
    <div id="container1" >
    <div id="col1">
    
    <img src="img/scr3.jpg" usemap="#image_map">
<map name="image_map">
  <area alt="5649-A" title="5649-A" href="user_map.php" coords="131,281 198,182 222,150 312,174 414,202 410,220 342,329 359,339 289,442 269,431 277,417 163,355 174,312 130,287 " shape="polygon">
</map>
    </div>
</div>

<div id="container2" style="background-color: #4e73df;">

    <div id="col2">
    <h3 class="font-weight-bold text-center">Land Information</h1>
    </div>
    <hr>
    <dl>
    <dd>Area(ha.): 3</dd>
    <dd>Tax Status: 100, year</dd>
    <dd>Market Value: 1000000</dd>
    </dl>
</div>

</div>

</div>
</div>

</div>
<?php
include('user_include/scripts.php');
include('user_include/footer.php');
?>
<!DOCTYPE html>
<html>
<?php
//session_start();
$er = 0;

require("config.php");
include('db_connect.php');

if(isset($_SESSION['SESS_LOGGEDIN'])) {
	$_SESSION['SESS_USERID'];
}

else
{
require("header.php");	
}
?>
<body>
<h1></h1>


<div class="container">
    <div class="row">
   
   <div class="col-md-2 ">
  <div class="listgroup">
    <h3>Стоимость</h3>
    <input hidden id="hidden_minimum_price" value="500"/>
    <input hidden id="hidden_maximum_price" value="5000"/>
    <p id="price_show">500 - 5000</p>
    <div id="price_range"></div>
</div>
<div class="mt-3 list-group"><h3>Предмет</h3>
    
    <div class="list-group-item checkbox">
        <label><input type="checkbox" class="common_selector subject" value="Physics"> Физика</label>
    </div>
    <div class="list-group-item checkbox">
        <label><input type="checkbox" class="common_selector subject" value="Math"> Математика</label>
    </div>
    <div class="list-group-item checkbox">
        <label><input type="checkbox" class="common_selector subject" value="IELTS"> IELTS</label>
    </div>
    <div class="list-group-item checkbox">
        <label><input type="checkbox" class="common_selector subject" value="SAT"> SAT</label>
    </div>
    <div class="list-group-item checkbox">
        <label><input type="checkbox" class="common_selector subject" value="Biology"> Биология</label>
    </div>
    <div class="list-group-item checkbox">
        <label><input type="checkbox" class="common_selector subject" value="Chemistry"> Химия</label>
    </div>
    <div class="list-group-item checkbox">
        <label><input type="checkbox" class="common_selector subject" value="NUFYPET"> NUFYPET</label>
    </div>

    
    </div>
    </div>
    <div class="col-md-10">
      <br>
      <h1>Доступные курсы</h1>
      
    
    
    <div class="mt-3 row card-columns filter_data">
        
    </div>
    </div>
    </div>
    
    <style>
#loading {
        text-align:center;
        background: url('loader.gif') no-repeat center;
        height: 150px;
        
    }
</style>
<script>
$(document).ready(function(){
        filter_data();
        
        function filter_data()
        {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();
            var subject = get_filter('subject');
            $.ajax({
                url:"fetch_data.php",
                method:"POST",
                data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, subject:subject},
                success:function(data){
                    $('.filter_data').html(data);
                }
            });
        }
        function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }
        
        
        $('.common_selector').click(function(){
           filter_data(); 
        });
        
         $('#price_range').slider({
        range:true,
        min:500,
        max:5000,
        values:[500, 5000],
        step:10,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });
    });
</script>
</div>
<?php require("footer.php") ?>
</body>
</html>




<?php
session_start();
$er = 0;
require("config.php");
include("db_connect.php");
if($_SESSION['SESS_USERTYPE'] == 'admin') {
    $id=$_GET['id'];  
    $username=$_GET['username'];
    
}
else {
    header("Location:login.php");
} 

require("header.php");
?><style>
    #delete:hover {
     color:blue;
     text-decoration: underline;
     font-size: 120%;
    }
</style>
<div class="container">
    <h1>Занятия ученика: <?php echo $username; ?></h1>
    <div class="d-flex">
<button class="btn btn-success" onclick="paid();">Изменить статус на оплачено</button>
<button class="btn-primary btn ml-auto ml-2" onclick="showtable();">Обновить</button>
</div>
    
    <div class="result"></div>
    <div class="mt-3 row card-columns final_data">
    
</div>
</div>
<script>
    $(document).ready(function(){
        show_table();
});

        function show_table()
        {   
            var customer_id = <?php echo $id; ?>;
            console.log(customer_id);
            $.ajax({
                url:"showtable_students_admin.php",
                method:"POST",
                data:{customer_id:customer_id},
                success:function(data){
                    $('.final_data').html(data);
                }
            });

        }
        

function ensure(booking_id) { 
            var result = confirm('Вы уверены что хотите отменить урок');
            
            if (result == true) { 
                deleteCourse(booking_id);
            } else { 
                alert("Без изменений!")
            }
    
} 
function deleteCourse(booking_id){

$.ajax({
                    url:'delete_appointment.php?id=<?php echo $id ?>',
                    data:{booking_id:booking_id},
                    method:"POST",
                    success:function(data){
                          show_table();
                          alert("Успешно удалено!");
                          
                    }
      });
}
function paid(){
    var bookings = collect('check');
                    console.log(bookings);
    if(bookings.length > 0){
    $.ajax({
                    
                    url:'payment.php',
                    data:{bookings:bookings},
                    method:"POST",
                    success:function(text){
                        $('.result').html(text);
                          show_table();
                          alert("Статус изменен на оплачено!");
                          
                    }
      });
    }
    else{
        alert("Выберите занятия!");
    }
    
}
function collect(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

</script>
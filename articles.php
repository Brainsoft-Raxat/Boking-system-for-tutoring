

<?php
include("db_connect.php"); // database connection is here
require "header.php";
?>
<div class="container">
    <style>
        img {
        max-width:100%;
max-height:100%;
        }
        
    </style>
<?php
//////Displaying Data/////////////
$id=$_GET['id'];  
// Collecting data from query string
if(!is_numeric($id)){ // Checking data it is a number or not
echo "Data Error";    
exit;
}

$query="SELECT * FROM posts where id='".$id."'";

$statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
if($total_row > 0)
 { 
  foreach($result as $row)
  { ?>
  
  <div class="col-md-8 blog-main">
      <h1 class="pb-4 mb-4 font-italic border-bottom">
         Новостной блог от It's Time!
      </h1>

      <div class="blog-post">
        <h2 class="blog-post-title"><?php echo $row["title"]; ?></h2>
        <p class="blog-post-meta"><?php echo $row['created_at'];?>
        <hr>
       <div class="content-markdown"><?php echo $row['body'];?></div>

    </div>
  
  
  <?php

}
     
 }else{
echo $connect->error;
}
?> 
</div>
<?php
require("footer.php");
////////////////////  
?>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/marked/0.8.2/marked.min.js"></script>
<script>
    $(document).ready(function(){
        $(".content-markdown").each(function(){
            var content = $(this).text();
            var markedContent = marked(content);
            $(this).html(markedContent);
        });
    });
</script>
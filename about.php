  <?php
  require("config.php");
  include("db_connect.php");
  require("header.php"); 
  $results_per_page = 8;
  ?>
  
<div class="container">
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">It's Time в Кокшетау</h1>
      
    <p class="lead my-3">Since 2018.</p></div>
  </div>
    <div class="row mb-2">
<?php
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $results_per_page;

   $query = "
    SELECT * FROM posts ORDER BY id DESC LIMIT $start_from," .$results_per_page;
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 
 if($total_row > 0)
 { 
  foreach($result as $row)
  {
      ?>
   <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">News</strong>
          <h3 class="mb-0"><?php echo $row["title"]; ?></h3>
          <div class="mb-1 text-muted"><?php echo $row['created_at'];?></div>
          <p class="card-text mb-auto"><?php echo $row['slug'];?></p>
          <a href="articles.php?id=<?php echo $row['id'] ?>" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img rounded" width="200" height="250" src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>">
                  </div>
      </div>
    </div>
   
   <?php
  }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;


  
  ?>
    </div>
    
    <nav aria-label="Page navigation example">
  <ul class="pagination">
       <li class="page-item <?php if ($page==1){  echo " disabled"; }?>"><a class="page-link" href="about.php?page=<?php echo $page-1 ?>">Previous</a></li>
      <?php 
$sql = "SELECT COUNT(id) AS total FROM posts";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
  
for ($i=1; $i<=$total_pages; $i++) {  ?>   
            <li class='page-item <?php if ($i==$page){  echo " disabled active"; }?>'><a class='page-link' href='about.php?page=<?php echo $i ?>'><?php echo $i ?></a></li>
            <?php
    
}; ?>
<li class="page-item <?php if ($page==$total_pages){  echo " disabled"; }?>"><a class="page-link" href="about.php?page=<?php echo $page+1 ?>">Next</a></li>
  </ul>
</nav>
        

</div>
  
  <?php require "footer.php" ?>

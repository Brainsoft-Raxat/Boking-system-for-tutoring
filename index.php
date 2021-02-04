<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald&amp;display=swap" rel="stylesheet">
	<title>It's Time!</title>
</head>
<body>

<?php require "header.php" ?>
<header id="header-title" class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center"  >
  <h1  class="main-title">It's Time!</h1>
  <p style="color:#D3D3D3;" class="lead">Наша онлайн платформа для поиска лучших репититоров в вашем городе.</p>
</header>
<div id="block" class="position-relative overflow-hidden p-3 p-md-5 m-md-2 rounded text-center" 
style="background-color: #f19972;">
    
    <div class="col-md-5 5 mx-auto " >
    
    <h1 class="display-4 font-weight-normal">Хотите найти доступные курсы от нашего центра?</h1>
    <p class="lead font-weight-normal">Переходите по ссылке ниже</p>
    <a class="btn btn-outline-dark" href="courses.php">Найти курсы</a>
  </div>
  <div class="product-device shadow-sm d-none d-md-block"></div>
  <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>

<div class="jumbotron" id="news"  >
    <div class="container"  >
        
      <h1   class="display-3">Новостной блог от нашего центра</h1>
      <p></p>
      <p><a class="btn btn-outline-light btn-lg"  href="about.php" role="button">Перейти в новостнуую ленту »</a></p>
    </div>
  </div>
<div class="d-flex flex-wrap">
</div>

<div class="container">
    
    <!-- Example row of columns -->
    <div class="row">
        <div class="detail-view" style="background-image: url(https://www.google.com/url?sa=i&url=https%3A%2F%2Fmhaworks.com%2Fprojects%2Fecu-pirate-tutoring-center%2F&psig=AOvVaw3MnjKvVBUdXtUPJ8IWvyfW&ust=1581831234870000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCOjQjOTq0ucCFQAAAAAdAAAAABAP);"></div>
    <script>
        var zoomBoxes = document.querySelectorAll('.detail-view');
        // Extract the URL

	zoomBoxes.forEach(function(image) {
	  var imageCss = window.getComputedStyle(image, false),
	    imageUrl = imageCss.backgroundImage
	                       .slice(4, -1).replace(/['"]/g, '');
	 	  // Get the original source image
	  var imageSrc = new Image();
	  imageSrc.onload = function() {
	    var imageWidth = imageSrc.naturalWidth,
	        imageHeight = imageSrc.naturalHeight,
	        ratio = imageHeight / imageWidth;

	    // Adjust the box to fit the image and to adapt responsively
	    var percentage = ratio * 100 + '%';
	    image.style.paddingBottom = percentage;
	    // Zoom and scan on mousemove
	    image.onmousemove = function(e) {
	      // Get the width of the thumbnail
	      var boxWidth = image.clientWidth,
          // Get the cursor position, minus element offset
	          x = e.pageX - this.offsetLeft,
	          y = e.pageY - this.offsetTop,
	          // Convert coordinates to % of elem. width & height
	          xPercent = x / (boxWidth / 100) + '%',
	          yPercent = y / (boxWidth * ratio / 100) + '%';
	      // Update styles w/actual size
	      Object.assign(image.style, {
	        backgroundPosition: xPercent + ' ' + yPercent,
	        backgroundSize: imageWidth + 'px'
	      });
	    };
    // Reset when mouse leaves
	    image.onmouseleave = function(e) {
	      Object.assign(image.style, {
	        backgroundPosition: 'center',
	        backgroundSize: 'cover'
	      });
	    };
	  }
	  imageSrc.src = imageUrl;
	});
    </script>
      <div class="col-md-4">
        <h2>Доступные цены</h2>
        <img src="/img/itstime1.jpg" class="img-thumbnail">
      </div>
      <div class="col-md-4">
        <h2>Индивидуальный подход</h2>
        <img src="/img/itstime3.jpg" class="img-thumbnail">
      </div>
      <div class="col-md-4">
        <h2>Качественное обучение</h2>
        <img src="/img/itstime5.jpg" class="img-thumbnail">
      </div>
    </div>
  </div>


 <?php require "footer.php" ?>
</body>
</html>
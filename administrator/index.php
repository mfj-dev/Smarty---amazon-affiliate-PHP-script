<?php
    session_start();
    include 'security/xss-security.php';
    include 'includes/connection.inc.php';
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
    include 'PHP/basic.php';
    include 'PHP/visits.php';
	$current1='current';
	$current2='';
	$current3='';
	$current4='';
	$current5='';
	$current6='';
	$current7='';
	$current8='';
include 'PHP/logincode.php';
?>
<!DOCTYPE html>
<html lang="en" class="no-js" ng-app>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Smarty - Admin panel for controlling website</title>
		<meta name="description" content="Loading Effects for Grid Items with CSS Animations" />
		<meta name="keywords" content="css animation, loading effect, google plus, grid items, masonry" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/admin.css" />
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/modernizr.custom.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.min.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		<script src="bootstrap/js/npm.js"></script>
		<script src="charts/Chart.js"></script>
		<script>
		var bootstrapButton = $.fn.button.noConflict() // return $.fn.button to previously assigned value
        $.fn.bootstrapBtn = bootstrapButton            // give $().bootstrapBtn the Bootstrap functionality
		</script>
		<script>
     
     // Code that uses other library's $ can follow here.
      </script>
	</head>
	<body>
	<!-- Admin panel Header ------ START -->
	<div id="admin-header">
	<?php
    include 'HTML/admin-header.html';
    ?>
	</div>
	<!-- Admin panel Header ------ END -->
	<br><br>
	
	<!-- ADMIN WRAPPER ------ START -->
	
	<!-- Side page of the Admin panel ------ START -->
     <div class="one-sixth-column big-screen">
	 <div id="admin-side-page">
	<?php
    include 'HTML/admin-side-page.html';
    ?>
	</div>
	</div>
	<!-- Side page of the Admin panel ------ END -->
	
    <div class="fifth-sixth-column">
	<!-- Breadcrumbs for admin panel ------ START -->
        <ol class="breadcrumb">
             <li><a href="index.php"><span class="glyphicon glyphicon-home "></span>Home</a></li>
             <li><a href="#" class="active">Dashboard</a></li>
         </ol>
    <!-- Breadcrumbs for admin panel ------ END -->	
	
	<!-- Visits statistics (Total, monthly, weekly and daily)------ START -->
	<?php
    include 'HTML/visits.html';
    ?>
	<!-- Visits statistics (Total, monthly, weekly and daily)------ END -->
	
    <div class="half-column">
    <!-- Total visits by countries ------ START -->
    <?php
    foreach ($connread->query($visitors_country_count_query) as $row) { 
         if($row['countcountries']>4){
             include 'HTML/country-visit-with-data.html';
         }
         else if($row['countcountries']<=4){
             include 'HTML/country-visit-empty.html';
         }
    }
    ?>
    <!-- Total visits by countries ------ END -->
    </div>
	   <div class="half-column">
    <!-- Total visits by countries ------ START -->
    <?php
    foreach ($connread->query($visitors_city_count_query) as $row) { 
         if($row['countcities']>4){
             include 'HTML/city-visit-with-data.html';
         }
         else if($row['countcities']<=4){
             include 'HTML/city-visit-empty.html';
         }
    }
    ?>
    <!-- Total visits by countries ------ END -->
    </div>
    <div class="half-column">
    <!-- Total visits by last six months ------ START -->
    <?php
    include 'HTML/six-months-visit.html';
    ?>
    <!-- Total visits by countries ------ END -->
	 </div>	  
    <div class="half-column">
    <!-- Total visits by last six months ------ START -->
    <?php
    include 'HTML/seven-days-visit.html';
    ?>
    <!-- Total visits by countries ------ END -->
	 </div>
	</div>
	 <div class="clearfix"></div>
	 	<br/>
		<script src="js/masonry.pkgd.min.js"></script>
		<script src="js/imagesloaded.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/AnimOnScroll.js"></script>
		<script>
			new AnimOnScroll( document.getElementById( 'grid' ), {
				minDuration : 0.4,
				maxDuration : 0.7,
				viewportFactor : 0.2
			} );
		</script>
		<!-- ADMIN WRAPPER ------ END -->
	</body>
</html>
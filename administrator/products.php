<?php
session_start();
include 'security/xss-security.php';
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/basic.php';
$current1 = '';
$current2 = '';
$current3 = '';
$current4='current';
$current5='';
$current6='';
$current7='';
$current8='';
include 'PHP/logincode.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Smarty - Admin panel for controlling website</title>
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/admin.css"/>
    <link rel="stylesheet" type="text/css" href="css/default.css"/>
    <link rel="stylesheet" type="text/css" href="css/component.css"/>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="bootstrap/js/angular.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/npm.js"></script>
    <script src="charts/Chart.js"></script>
 <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css"> 
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>
		 <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>
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
        <li><a href="" class="active">Products</a></li>
    </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
  <div class="content-empty">
 <a href="add-product.php" class="btn btn-primary">Add product</a>
 <div class="clearfix"></div>
 </div>
    <div class="content">
        	<div class="table-responsive">
  <table class="table" id="table_id" class="display">
  <thead>
  <tr>
    <th>Product id</th>
    <th>Product name</th>
	<th>Product image</th>
	<th>Product review</th>
	<th>Number of visits</th>	
	<th>Edit product</th>
	<th>Delete product</th>
  </tr>
  </thead>
    <tbody>
  <?php
    foreach ($connread->query($products_query) as $row) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            if($row['product_image']!=''){
            $this_product_image = $row['product_image'];
            }
			else{
			$this_product_image='add-image.jpg';
			}
            $product_url = $row['product_url'];
            $product_title_tag = $row['product_title_tag'];
            $product_price = $row['product_price'];
            $product_review = $row['product_review'];
            $first_paragraf_product_review = substr($product_review, 0, 155);
            $product_visits_query = "SELECT COUNT(*) as visits FROM product_popularity WHERE product_url='$product_url'";
            foreach ($connread->query($product_visits_query) as $row) {
            $num_of_product_visits = $row['visits'];

  ?>
  <tr>
    <td><?php echo $product_id;?></td>
    <td><?php echo $product_name;?></td>
	<td><a href="add-product-image.php?id=<?php echo $product_id; ?>" data-toggle="tooltip" data-placement="right" title="Upload image"><img src="../img/<?php echo $this_product_image;?>"  class="img-thumbnail small-img" alt="<?php echo $product_name;?>"/></a></td>
	<td><?php echo html_entity_decode(strip_tags($first_paragraf_product_review),ENT_QUOTES);?>...</td>
	<td><?php echo $num_of_product_visits;?></td>
	<td><a href="edit-product.php?id=<?php echo $product_id; ?>"  data-toggle="tooltip" data-placement="left" title="Edit product"><span class="glyphicon glyphicon-pencil"></span></a></td>
	<td><a href="delete-product.php?id=<?php echo $product_id; ?>" data-toggle="tooltip" data-placement="left" title="Delete product"><span class="glyphicon glyphicon-trash"></span></a></td>
   </tr>
  <?php } ?>
  <?php } ?>
   </tbody>
  </table>
  <script>
  $(document).ready( function () {
    $('#table_id').DataTable();
} );
  </script>
</div>
</div>

<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/imagesloaded.js"></script>
<script src="js/classie.js"></script>
<script src="js/AnimOnScroll.js"></script>
<script>
    new AnimOnScroll(document.getElementById('grid'), {
        minDuration: 0.4,
        maxDuration: 0.7,
        viewportFactor: 0.2
    });
</script>
<!-- ADMIN WRAPPER ------ END -->
</body>
</html>
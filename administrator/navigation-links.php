<?php
session_start();
include 'security/xss-security.php';
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/basic.php';
include 'PHP/update-navigation-links.php';
$current1 = '';
$current2 = '';
$current3 = 'current';
$current4='';
$current5='';
$current6='';
$current7='';
$current8='';
include 'PHP/logincode.php';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smarty - Admin panel for controlling website</title>
    <meta name="description" content="Loading Effects for Grid Items with CSS Animations"/>
    <meta name="keywords" content="css animation, loading effect, google plus, grid items, masonry"/>
    <meta name="author" content="Codrops"/>
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
    <script src="ckeditor/ckeditor.js"></script>
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
        <li><a href="" class="active">Navigation links</a></li>
    </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
    <div class="content-empty">
        <div class="clearfix"></div>
    </div>
    <div class="content">
        <div id="sample">
            <div class="content-empty">
                <h1>
                   Edit website options
                </h1>

                <form action="" method="POST">
	<?php
    foreach ($connread->query($website_frontend_navigation_links_query) as $row) {
            $website_frontend_navigation_link1_name = $row['website_frontend_navigation_link1_name'];
            $website_frontend_navigation_link1_url = $row['website_frontend_navigation_link1_url'];
            $website_frontend_navigation_link2_name = $row['website_frontend_navigation_link2_name'];
            $website_frontend_navigation_link2_url = $row['website_frontend_navigation_link2_url'];
            $website_frontend_navigation_link3_name = $row['website_frontend_navigation_link3_name'];
            $website_frontend_navigation_link3_url = $row['website_frontend_navigation_link3_url'];
            $website_frontend_navigation_link4_name = $row['website_frontend_navigation_link4_name'];
            $website_frontend_navigation_link4_url = $row['website_frontend_navigation_link4_url'];
            $website_frontend_navigation_link5_name = $row['website_frontend_navigation_link5_name'];
            $website_frontend_navigation_link5_url = $row['website_frontend_navigation_link5_url'];
            $website_frontend_navigation_link6_name = $row['website_frontend_navigation_link6_name'];
            $website_frontend_navigation_link6_url = $row['website_frontend_navigation_link6_url'];
	?>
            <input type="text" value="<?php echo $website_frontend_navigation_link1_name; ?>" name="website_frontend_navigation_link1_name"  data-toggle="tooltip" data-placement="right" title="Edit first navigation link name"  class="form-control" required />
			<input type="text" disabled value="<?php echo $website_frontend_navigation_link1_url; ?>"  name="website_frontend_navigation_link1_url"  data-toggle="tooltip" data-placement="right" title="Edit first navigation link url"  class="form-control" required />
			<input type="text" value="<?php echo $website_frontend_navigation_link2_name; ?>" name="website_frontend_navigation_link2_name"  data-toggle="tooltip" data-placement="right" title="Edit second navigation link name"  class="form-control" required />
			<input type="text" value="<?php echo $website_frontend_navigation_link2_url; ?>"  name="website_frontend_navigation_link2_url"  data-toggle="tooltip" data-placement="right" title="Edit second navigation link url"  class="form-control" required />
			<input type="text" value="<?php echo $website_frontend_navigation_link3_name; ?>" name="website_frontend_navigation_link3_name"  data-toggle="tooltip" data-placement="right" title="Edit third navigation link name"  class="form-control" required />
			<input type="text" value="<?php echo $website_frontend_navigation_link3_url; ?>"  name="website_frontend_navigation_link3_url"  data-toggle="tooltip" data-placement="right" title="Edit third navigation link url"  class="form-control" required />
			<input type="text" value="<?php echo $website_frontend_navigation_link4_name; ?>" name="website_frontend_navigation_link4_name"  data-toggle="tooltip" data-placement="right" title="Edit fourth navigation link name"  class="form-control" required />
			<input type="text" value="<?php echo $website_frontend_navigation_link4_url; ?>"  name="website_frontend_navigation_link4_url"  data-toggle="tooltip" data-placement="right" title="Edit fourth navigation link url"  class="form-control" required />
			<input type="text" value="<?php echo $website_frontend_navigation_link5_name; ?>" name="website_frontend_navigation_link5_name"  data-toggle="tooltip" data-placement="right" title="Edit fifth navigation link name"  class="form-control" required />
			<input type="text" value="<?php echo $website_frontend_navigation_link5_url; ?>"  name="website_frontend_navigation_link5_url"  data-toggle="tooltip" data-placement="right" title="Edit fifth navigation link url"  class="form-control" required />
			<input type="text" value="<?php echo $website_frontend_navigation_link6_name; ?>" name="website_frontend_navigation_link6_name"  data-toggle="tooltip" data-placement="right" title="Edit sixth navigation link name"  class="form-control" required />
			<input type="text" value="<?php echo $website_frontend_navigation_link6_url; ?>"  name="website_frontend_navigation_link6_url"  data-toggle="tooltip" data-placement="right" title="Edit sixth navigation link url"  class="form-control" required />
			
<?php } ?>
<br>
                    <button type="submit" name="update_navigation" class="btn btn-primary">Update navigation links</button>
                </form>
				
                <br>
            </div>
        </div>
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
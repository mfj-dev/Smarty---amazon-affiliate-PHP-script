<?php
session_start();
include 'security/xss-security.php';
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/basic.php';
include 'PHP/update-website-options.php';
$current1 = '';
$current2 = 'current';
$current3 = '';
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
        <li><a href="" class="active">Site options</a></li>
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
			foreach ($connread->query($website_options_query) as $row) {
            $website_frontend_name = $row['website_frontend_name'];
            $website_frontend_title_tag = $row['website_frontend_title_tag'];
			$website_frontend_logo = $row['website_frontend_logo'];
            $website_frontend_facebook_url = $row['website_frontend_facebook_url'];
			$website_frontend_twitter_url = $row['website_frontend_twitter_url'];
            $website_frontend_youtube_url = $row['website_frontend_youtube_url'];
			$website_frontend_meta_tag = $row['website_frontend_meta_tag'];
            $website_frontend_description = $row['website_frontend_description'];
			$website_frontend_directory = $row['website_frontend_directory'];
            $website_frontend_h1 = $row['website_frontend_h1'];
            $website_frontend_email = $row['website_frontend_email'];
            $website_privacy_policy_content = $row['website_privacy_policy_content'];
			?>
            <input type="text" value="<?php echo $website_frontend_name; ?>" name="website_frontend_name" data-toggle="tooltip" data-placement="right" title="Edit website name"  class="form-control" required />
            <a href="upload-logo.php" data-toggle="tooltip" data-placement="right" title="Change website logo here">Change website logo here <span style="margin-left:10px;" class="glyphicon glyphicon-pencil"></span></a>
			<br/><br/>
			<input type="text"  value="<?php echo $website_frontend_title_tag; ?>"  name="website_frontend_title_tag" data-toggle="tooltip" data-placement="right" title="Edit website title tag here "  class="form-control" required />
		    <input type="text" value="<?php echo $website_frontend_facebook_url; ?>" name="website_frontend_facebook_url" data-toggle="tooltip" data-placement="right"  title="Edit  facebook url here "  class="form-control" required />
            <input type="text" value="<?php echo $website_frontend_twitter_url; ?>"  name="website_frontend_twitter_url" data-toggle="tooltip" data-placement="right"  title="Edit twitter url here "  class="form-control" required />
			<input type="text" value="<?php echo $website_frontend_youtube_url; ?>" name="website_frontend_youtube_url" data-toggle="tooltip" data-placement="right"  title="Edit youtube url here "  class="form-control" required />
            <select class="form-control" name="website_frontend_fonts" data-toggle="tooltip" data-placement="right"  title="Edit fonts for your website here">
                <option value="" disabled selected>
                    Choose font for website
                </option>
                <optgroup label="Regular fonts">
                    <option value="arial.css">
                        Arial
                    </option>
                    <option value="bookantiqua.css">
                        Book Antiqua
                    </option>
                    <option value="calibri.css">
                        Calibri
                    </option>
                    <option value="cambria.css">
                        Cambria
                    </option>
                    <option value="centurygothic.css">
                        Century Gothic
                    </option>
                    <option value="comicsans.css">
                        Comic Sans MS
                    </option>
                    <option value="georgia.css">
                        Georgia
                    </option>
                    <option value="mssansserif.css">
                        MS Sans Serif
                    </option>
                    <option value="palatino.css">
                        Palatino Linotype
                    </option>
                    <option value="tahoma.css">
                        Tahoma
                    </option>
                    <option value="timesnewroman.css">
                        Times New Roman
                    </option>
                </optgroup>
                <optgroup label="Web fonts">
                    <option value="aller.css">
                        Aller
                    </option>
                    <option value="droid.css">
                        Droid
                    </option>
                    <option value="firasans.css">
                        Fira Sans
                    </option>
                    <option value="lato.css">
                        Lato
                    </option>
                    <option value="OldStandard.css">
                        Old Standard
                    </option>
                    <option value="open_sans.css">
                        Open sans
                    </option>
                </optgroup>

            </select>   
			<br>
			<select class="form-control" name="website_frontend_color" data-toggle="tooltip" data-placement="right"  title="Edit color for your website here" >
                <option value="" disabled selected>
                    Choose color for website
                </option>
                <option value="aero.css">
                    Aero
                </option>
                <option value="blue.css">
                    Blue
                </option>
                <option value="blueberry.css">
                    Blueberry
                </option>
                <option value="bluebonnet.css">
                    Bluebonnet
                </option>
                <option value="brightlavender.css">
                    Bright Lavender
                </option>
                <option value="cafenoir.css">
                    Cafe Noir
                </option>
                <option value="chamoisee.css">
                    Chamoisee
                </option>
                <option value="chocolate.css">
                    Chocolate
                </option>
                <option value="coffee.css">
                    Coffee
                </option>
                <option value="darkgreen.css">
                    Dark Green
                </option>
                <option value="denim.css">
                    Denim
                </option>
                <option value="egyptianblue.css">
                    Egyptian Blue
                </option>
				<option value="eminence.css">
                        Eminence
                </option>
			    <option value="goldenbrown.css">
                        Gold Brown
                </option>
			    <option value="honolulublue.css">
                       Honolulu Blue
                </option>
				<option value="iceberg.css">
                   Iceberg       
                </option>
				<option value="imperialred.css">
                   Imperial red       
                </option>
                <option value="light-blue.css">
                    Light Blue
                </option>
            </select>
			<br>
			  <select class="form-control" name="website_frontend_product_count" data-toggle="tooltip" data-placement="right"  title="Change number of products at your frontend page">
                <option value="" disabled selected>
                    Choose number of products
                </option>
                <option value="3">
                    3
                </option>
                <option value="4">
                    4
                </option>
                <option value="5">
                    5
                </option>
				<option value="6">
                    6
                </option>
				<option value="7">
                    7
                </option>
				<option value="8">
                    8
                </option>
            </select>
			<br>
			<select class="form-control"  name="website_frontend_language" data-toggle="tooltip" data-placement="right"  title="Change language of your website">
                <option value="" disabled selected>
                    Choose language for website
                </option>
                <option value="en">
                    English
                </option>
				<option value="de">
                    German
                </option>
				<option value="it">
                    Italian
                </option>
				<option value="pt">
                    Portuguese
                </option>
				<option value="es">
                    Spanish
                </option>
            </select>
			<br>
			<select class="form-control" name="website_frontend_url_rewrite_status" data-toggle="tooltip" data-placement="right"  title="Important: This is part where you can change your urls to be more SEO friendly, but be carefull, you must take care of .httaccess content.">
                <option value="" disabled selected>
                    Make your URL's without parameters
                </option>
                <option value="0">
                    Url with parameters (default)
                </option>
				<option value="1">
                    Url without parameters (.htaccess rewriting)
                </option>
            </select>
			<br>
			<input value="<?php echo $website_frontend_h1; ?>" class="form-control"  name="website_frontend_h1" type="text" data-toggle="tooltip" data-placement="right"  title="Change your website H1 (title)"/>
            <input value="<?php echo $website_frontend_email; ?>" class="form-control"  name="website_frontend_email" type="text" data-toggle="tooltip" data-placement="right"  title="Change your website email"/>
 <h5><b>Website meta tag</b></h5>
 <textarea class="ckeditor" cols="80"  id="metatag"
                      name="website_frontend_meta_tag" rows="10" style="width: 480px;  padding-left:15px!important; height:180px;
    border-color: #66afe9; 
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
          box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);">
<?php echo $website_frontend_meta_tag; ?>
</textarea><br>
 <h5><b>Website description</b></h5>
<textarea class="ckeditor" cols="80" id="description"
                      name="website_frontend_description" rows="10" style="width: 480px;  padding-left:15px!important; height:180px;
    border-color: #66afe9; 
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
          box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);">
<?php echo $website_frontend_description; ?>
</textarea><br>
 <h5><b>Website privacy policy</b></h5>
<textarea class="ckeditor" cols="80" id="privacy"
                      name="website_privacy_policy_content"
                      rows="10" style="width: 480px;  padding-left:15px!important; height:180px;
    border-color: #66afe9; 
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
          box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);">
<?php echo $website_privacy_policy_content; ?>
</textarea><br>
<?php } ?>
                    <button type="submit" name="update_website" class="btn btn-primary">Update website</button>
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
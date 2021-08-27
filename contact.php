<?php 
session_start();
include 'security/xss-security.php';
include 'includes/connection.inc.php'; 
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'includes/language.php';
include 'includes/url-rewriting.php';
include 'includes/visitcount.php';
/**
 * THIS IS PART FOR SELECTING WEBSITE OPTIONS FROM DATABASE AND OUTPUT IT  ---- START
 */
$website_frontend_query = "SELECT * FROM website_frontend WHERE website_frontend_id=1";
foreach ($connread->query($website_frontend_query) as $row) {
    $website_frontend_logo = $row['website_frontend_logo'];
    $website_frontend_favicon = $row['website_frontend_favicon'];
    $website_frontend_meta_tag = $row['website_frontend_meta_tag'];
    $website_frontend_title_tag = $row['website_frontend_title_tag'];
    $website_frontend_fonts = $row['website_frontend_fonts'];
    $website_frontend_color = $row['website_frontend_color'];
	$website_frontend_directory=$row['website_frontend_directory'];
    $website_frontend_h1 = $row['website_frontend_h1'];
    $website_frontend_description = $row['website_frontend_description'];
	$website_frontend_product_count = $row['website_frontend_product_count'];
    /**
     * THIS IS PART FOR SELECTING WEBSITE OPTIONS FROM DATABASE AND OUTPUT IT  ---- END
     */
}
  if (isset($_POST['search'])) {
	 $q=$_POST['q'];
     header('Location:'.$web_root.'/search.php?q='.$q.'');
	 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- HEADER OF A CONTACT PAGE WITH LOGO AND TITLE TAG SPECIFIC FOR CONTACT PAGE -------- START -->
    <?php
    include 'includes/contact-header.php';
    ?>
    <!-- HEADER OF A CONTACT PAGE WITH LOGO AND TITLE TAG SPECIFIC FOR CONTACT PAGE -------- END -->

    <!-- HORIZONTAL NAVIGATION FOR DESKTOP AND MOBILE DEVICES -------- START -->
    <?php
    include 'includes/navigation.php';
    ?>
    <?php
    include 'includes/mobile-navigation.php';
    ?>
    <!-- HORIZONTAL NAVIGATION FOR DESKTOP AND MOBILE DEVICES -------- END -->

    <!-- MAIN CONTENT OF THE CONTACT PAGE -------- START -->
    <div id="content">
        <!-- BREADCRUMBS AREA, VERY IMPORTANT FOR SITE STRUCTURE AND SEO -------- START -->
        <ul id="crumbs">
            <li>
                <a href="index.php"><?php echo $website_frontend_navigation_link1_name; ?></a>
            </li>
            <li>
                <a href="<?php echo $website_frontend_navigation_link5_url; ?><?php echo $sufixwithoutpar; ?>"><?php echo $website_frontend_navigation_link5_name; ?></a>
            </li>
        </ul>
        <!-- BREADCRUMBS AREA, VERY IMPORTANT FOR SITE STRUCTURE AND SEO -------- END -->
        <div class="clearfix"></div>
        <!-- MAIN LEFT AREA, FOR PRODUCTS REVIEWS, BLOG, ETC... -------- START -->
        <div class="two-third-column">
            <h1><strong>Contact us</strong></h1>
          <div id="contact-form">
                <?php
                if (isset($_POST['send_message'])) {
                    //define the receiver of the email
                    $to = $website_frontend_email;
                    //define the subject of the email
                    //define the message to be sent. Each line should be separated with \n
                    $subject = '' . $_POST['fullname'] . ', ' . $_POST['email'] . '';
                    $message = '' . $_POST['message'] . '';
                    //define the headers we want passed. Note that they are separated with \r\n
                    $headers = 'From: ' . $_POST['fullname'] . '' . "\r\n" .
                        'Reply-To: ' . $_POST['fullname'] . '' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                    //send the email
                    mail($to, $subject, $message, $headers);
                    $OK = false;
                    // create database connection
                    // initialize prepared statement
                    // create SQL
                }
                ?>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="admin/alertify/alertify.js"></script>
	<script>
	 	function reset () {
			$("#toggleCSS").attr("href", "admin/alertify/alertify.default.css");
			alertify.set({
				labels : {
					ok     : "OK",
					cancel : "Cancel"
				},
				delay : 5000,
				buttonReverse : false,
				buttonFocus   : "ok"
			});
		}
	</script>
	<?php 
	if (isset($_POST['send_message'])) {
    echo 
	"<script>$(function(){alertify.alert('$contact_success');})</script>";
	}
	?>
               <form method="post" action="">              
                    <input placeholder="<?php echo $full_name; ?>" type="text" required name="fullname" class="textbox"/>
                    <div class="clearfix"></div>
                    <br>
                    <input type="email" placeholder="<?php echo $email; ?>" required name="email" class="textbox"/>
                    <div class="clearfix"></div>
                    <br>
                    <textarea name="message"  placeholder="<?php echo $msg; ?>" required></textarea>
                    <button class="button" type="submit" name="send_message"><?php echo $send_msg_btn; ?></button>
                </form>
            </div>
        </div>
        <!-- MAIN LEFT AREA, FOR PRODUCTS REVIEWS, BLOG, ETC... -------- END -->
        <!-- RIGHT SIDE AREA -------- START -->
        <div class="one-third-column">
            <?php include 'includes/side-page.php'; ?>
        </div>
        <!-- RIGHT SIDE AREA -------- END -->
    </div>
    <!-- MAIN CONTENT OF THE INDEX PAGE -------- END -->
    <div class="clearfix"></div>
    <br>

    <!-- FOOTER AREA -------- START -->
    <?php
    include 'includes/footer.php';
    ?>
    <!-- FOOTER AREA -------- END -->
    <div class="clearfix"></div>
    </div>
    </body>
</html>
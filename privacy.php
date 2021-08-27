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
    $website_frontend_h1 = $row['website_frontend_h1'];
    $website_frontend_description = $row['website_frontend_description'];
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
    <!-- HEADER OF A PRIVACY PAGE WITH LOGO AND TITLE TAG SPECIFIC FOR PRIVACY PAGE -------- START -->
    <?php
    include 'includes/privacy-header.php';
    ?>
    <!-- HEADER OF A PRIVACY PAGE WITH LOGO AND TITLE TAG SPECIFIC FOR PRIVACY PAGE -------- END -->

    <!-- HORIZONTAL NAVIGATION FOR DESKTOP AND MOBILE DEVICES -------- START -->
    <?php
    include 'includes/navigation.php';
    ?>
    <?php
    include 'includes/mobile-navigation.php';
    ?>
    <!-- HORIZONTAL NAVIGATION FOR DESKTOP AND MOBILE DEVICES -------- END -->

    <!-- MAIN CONTENT OF THE PRIVACY PAGE -------- START -->
    <div id="content">
        <!-- BREADCRUMBS AREA, VERY IMPORTANT FOR SITE STRUCTURE AND SEO -------- START -->
        <ul id="crumbs">
            <li>
                <a href="index.php"><?php echo $website_frontend_navigation_link1_name; ?></a>
            </li>
            <li>
                <a href="<?php echo $website_frontend_navigation_link6_url; ?><?php echo $sufixwithoutpar; ?>"><?php echo $website_frontend_navigation_link6_name; ?></a>
            </li>
        </ul>
        <!-- BREADCRUMBS AREA, VERY IMPORTANT FOR SITE STRUCTURE AND SEO -------- END -->
        <div class="clearfix"></div>
        <!-- MAIN LEFT AREA, FOR PRODUCTS REVIEWS, BLOG, ETC... -------- START -->
        <div class="two-third-column">
            <h1><strong>Privacy policy</strong></h1>
            <?php
            $privacy_policy_query = "SELECT website_privacy_policy_content FROM website_frontend WHERE website_frontend_id=1";
            foreach ($connread->query($privacy_policy_query) as $row) {
                $website_privacy_policy_content = $row['website_privacy_policy_content'];
                echo $website_privacy_policy_content;
                ?>
            <?php } ?>
        </div>
        <!-- MAIN LEFT AREA, FOR PRODUCTS REVIEWS, BLOG, ETC... -------- END -->
        <!-- RIGHT SIDE AREA -------- START -->
        <div class="one-third-column">
            <?php include 'includes/side-page.php'; ?>
        </div>
        <!-- RIGHT SIDE AREA -------- END -->
    </div>
    <!-- MAIN CONTENT OF THE PRIVACY PAGE -------- END -->
    <div class="clearfix"></div>
    <br>
    <?php include 'includes/footer.php'; ?>
    <div class="clearfix"></div>
    </div>
    </body>
</html>
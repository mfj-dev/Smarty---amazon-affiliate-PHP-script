<?php
session_start();
$q=$_GET['q'];
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
$web_root = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).""; 
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
	 header('Location:search.php?q='.$q.'');
	 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- HEADER OF A SEARCH PAGE WITH LOGO AND TITLE TAG SPECIFIC FOR INDEX PAGE -------- START -->
    <?php
    include 'includes/index-header.php';
    ?>
    <!-- HEADER OF A SEARCH PAGE WITH LOGO AND TITLE TAG SPECIFIC FOR INDEX PAGE -------- END -->
	
    <!-- HORIZONTAL NAVIGATION FOR DESKTOP AND MOBILE DEVICES -------- START -->
    <?php
    include 'includes/navigation.php';
    ?>
    <?php
    include 'includes/mobile-navigation.php';
    ?>
    <!-- HORIZONTAL NAVIGATION FOR DESKTOP AND MOBILE DEVICES -------- END -->
	
    <!-- MAIN CONTENT OF THE INDEX PAGE -------- START -->
    <div id="content">
        <!-- BREADCRUMBS AREA, VERY IMPORTANT FOR SITE STRUCTURE AND SEO -------- START -->
        <ul id="crumbs">
            <li>
                <a href="index.php">
				<?php echo $website_frontend_navigation_link1_name; ?></a>
            </li>
			<li>
	            <a href="">		
				<?php echo $search; ?>
                </a>
			</li>
        </ul>
        <!-- BREADCRUMBS AREA, VERY IMPORTANT FOR SITE STRUCTURE AND SEO -------- END -->
        <div class="clearfix"></div>
        <!-- MAIN LEFT AREA, FOR PRODUCTS REVIEWS, BLOG, ETC... -------- START -->
        <div class="two-third-column">
        <h1><strong><?php echo $search_results; ?></strong></h1>
		<?php
		$search_term_query = "SELECT * FROM products WHERE product_name LIKE '%$q%' OR product_review LIKE '%$q%'";
		foreach ($connread->query($search_term_query) as $row) {
		$searchtitle=$row['product_name'];
		$searchurl=$row['product_url'];
		?>
		<h3><strong><?php echo $searchtitle; ?></strong></h3>
		<p><a href="product<?php echo $sufixwithpar; ?><?php echo $searchurl; ?>"><u>product<?php echo $sufixwithpar; ?><?php echo $searchurl; ?></u></a></p>
	    <?php } ?>
		<?php
		$search_term_query2 = "SELECT * FROM blog WHERE blog_h1 LIKE '%$q%' OR blog_article LIKE '%$q%' OR blog_author LIKE '%$q%'";
		foreach ($connread->query($search_term_query2) as $row) {
		$searchtitle=$row['blog_h1'];
		$searchurl=$row['blog_url'];
		?>
			<h3><strong><?php echo $searchtitle; ?></strong></h3>
		<p><a href="blog-article<?php echo $sufixwithpar; ?><?php echo $searchurl; ?>"><u>blog-article<?php echo $sufixwithpar; ?><?php echo $searchurl; ?></u></a></p>
		<?php } ?>
		<?php
		$search_term_query3 = "SELECT * FROM product_categories WHERE product_category_h1 LIKE '%$q%'";
		foreach ($connread->query($search_term_query3) as $row) {
		$searchtitle=$row['product_category_h1'];
		$searchurl=$row['product_category_url'];
		?>
			<h3><strong><?php echo $searchtitle; ?></strong></h3>
		<p><a href="<?php echo $website_frontend_navigation_link2_url; ?><?php echo $sufixwithpar; ?><?php echo $searchurl; ?>"><u>
		<?php echo $website_frontend_navigation_link2_url; ?><?php echo $sufixwithpar; ?><?php echo $searchurl; ?></u></a></p>
	    <?php } ?>
		<?php
		$search_term_query4 = "SELECT * FROM product_brands WHERE product_brand_h1 LIKE '%$q%'";
		foreach ($connread->query($search_term_query4) as $row) {
		$searchtitle=$row['product_brand_h1'];
		$searchurl=$row['product_brand_url'];
		?>
			<h3><strong><?php echo $searchtitle; ?></strong></h3>
		<p><a href="<?php echo $website_frontend_navigation_link3_url; ?><?php echo $sufixwithpar; ?><?php echo $searchurl; ?>"><u>
		<?php echo $website_frontend_navigation_link3_url; ?><?php echo $sufixwithpar; ?><?php echo $searchurl; ?></u></a></p>
	    <?php } ?>
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
    <br/>
	
    <!-- FOOTER AREA -------- START -->
    <?php  
	include 'includes/footer.php'; 
	?>
    <!-- FOOTER AREA -------- END -->
    <div class="clearfix"></div>
    </div>
    </body>
</html>
<?php 
session_start();
include 'security/xss-security.php';
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'includes/language.php';
include 'includes/url-rewriting.php';
include 'includes/visitcount.php';
$this_brand_url = $_GET['url'];  // This is url of your brand that is used for selecting data from MYSQL database
include 'includes/brand-product-query.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- HEADER OF A BRAND PAGE WITH LOGO AND TITLE TAG SPECIFIC FOR BRAND PAGE -------- START -->
    <?php
    include 'includes/brand-header.php';
    ?>
    <!-- HEADER OF A BRAND PAGE WITH LOGO AND TITLE TAG SPECIFIC FOR BRAND PAGE  -------- END -->

    <!-- HORIZONTAL NAVIGATION FOR DESKTOP AND MOBILE DEVICES -------- START -->
    <?php
    include 'includes/navigation.php';
    ?>
    <?php
    include 'includes/mobile-navigation.php';
    ?>
    <!-- HORIZONTAL NAVIGATION FOR DESKTOP AND MOBILE DEVICES -------- END -->
    <?php
    foreach ($connread->query($this_brand_query) as $row) {
    $product_brand_id = $row['product_brand_id'];
    $product_brand = $row['product_brand'];
    $product_brand_url = $row['product_brand_url'];
    $best_product_query = "SELECT * FROM products WHERE product_brand_id=$product_brand_id ORDER by product_avg_rating DESC LIMIT 1";
    foreach ($connread->query($best_product_query) as $row) {
    $product_name = $row['product_name'];
                if($row['product_image']!=''){
                $product_image = $row['product_image'];
				}
			    else
			    {
			    $product_image = 'add-image.png';
			    }
    $product_url = $row['product_url'];
    $product_title_tag = $row['product_title_tag'];
    $product_review = $row['product_review'];
    $first_paragraf_product_review = substr($product_review, 0, strpos($product_review, "</p>") + 4);
    ?>
    <!-- MAIN CONTENT OF THE INDEX PAGE -------- START -->
    <div id="content">
        <!-- BREADCRUMBS AREA, VERY IMPORTANT FOR SITE STRUCTURE AND SEO -------- START -->
        <ul id="crumbs">
            <li>
                <a href="index.php"><?php echo $website_frontend_navigation_link1_name; ?></a>
            </li>
            <li>
                <a href="<?php echo $website_frontend_navigation_link3_url; ?><?php echo $sufixwithpar; ?><?php echo $product_brand_url; ?>"><?php echo $product_brand; ?></a>
            </li>
        </ul>
        <!-- BREADCRUMBS AREA, VERY IMPORTANT FOR SITE STRUCTURE AND SEO -------- END -->
        <div class="clearfix"></div>
        <!-- MAIN LEFT AREA, FOR PRODUCTS REVIEWS, BLOG, ETC... -------- START -->
        <div class="two-third-column">
            <img src="img/<?php echo $product_image; ?>" class="medium-left"
                 alt="<?php echo $product_title_tag; ?>"/>
            <?php } ?>
            <?php } ?>
            <?php
            $this_brand_query = "SELECT * FROM product_brands WHERE product_brand_url='$this_brand_url'";
            foreach ($connread->query($this_brand_query) as $row) {
                $this_brand_h1 = $row['product_brand_h1'];
                $best_product_query = "SELECT * FROM products WHERE product_brand_id=$product_brand_id ORDER by product_avg_rating DESC LIMIT 1";
                foreach ($connread->query($best_product_query) as $row) {
                    ?>
<h1><strong><?php echo $this_brand_h1; ?></strong></h1>
<?php echo $first_paragraf_product_review; ?>
<br/>
<a href="product<?php echo $sufixwithpar; ?><?php echo $product_url; ?>" class="button"/><?php echo $product_name; ?></a>
<?php } ?>
            <?php } ?>
            <?php
            if (!isset($product_name)) {
                echo '<div id="content">
<ul id="crumbs">
<li><a href="index.php">' . $website_frontend_navigation_link1_name . '</a></li>
<li><a href="'.$website_frontend_navigation_link3_url.''.$sufixwithpar.''.$product_brand_url.'">'.$product_brand.'</a></li>
</ul>
<div class="clearfix"></div>
<div class="two-third-column">';
            }
            ?>
            <div class="clearfix"></div>
            <div id="headings">
                <h2><?php echo $latest_reviews; ?></h2>
            </div>
            <?php
            foreach ($connread->query($this_brand_query) as $row) {
                $product_brand_id = $row['product_brand_id'];
                foreach ($connread->query($latest_product_query) as $row) {
                    $product_name = $row['product_name'];
                if($row['product_image']!=''){
                $product_image = $row['product_image'];
				}
			    else
			    {
			    $product_image = 'add-image.png';
			    }
                    $product_url = $row['product_url'];
                    $product_title_tag = $row['product_title_tag'];
                    $product_review = $row['product_review'];
                    $first_paragraf_product_review = substr($product_review, 0, strpos($product_review, "</p>") + 4);
                    $product_pros = $row['product_pros'];
                    $product_cons = $row['product_cons'];
                    ?>
                    <div class="short-review-box">
                        <img src="img/<?php echo $product_image; ?>"
                             alt="<?php echo $product_title_tag; ?>"/>

                        <h3><strong><?php echo $product_name; ?></strong></h3>
                        <?php echo $first_paragraf_product_review; ?>

                        <div class="clearfix"></div>
                        <div class="procon-container">
                            <p><span class="proicon"><?php echo $pro; ?>: <?php echo $product_pros; ?></span></p>

                            <p><span class="conicon"><?php echo $con; ?>: <?php echo $product_cons; ?></span></p>
                            <br/>
                            <a href="product<?php echo $sufixwithpar; ?><?php echo $product_url; ?>"
                               class="button"/><?php echo $read_review_btn; ?></a>
                        </div>
                        <br/>
                    </div>
                <?php } ?>
            <?php } ?>
            <?php if ($total_pages > 1) {
                include 'includes/brand-pagination.php';
            }
            ?>
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
<?php 
session_start();
include 'security/xss-security.php';
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'includes/language.php';
include 'includes/url-rewriting.php';
include 'includes/visitcount.php';
$product_url = $_GET['url'];
$ip=$_SERVER['REMOTE_ADDR'];

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
	 header('Location:search.php?q='.$q.'');
	 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- HEADER OF A BLOG PAGE WITH LOGO AND TITLE TAG SPECIFIC FOR PRODUCT PAGE -------- START -->
    <?php
    include 'includes/product-header.php';
    ?>
    <!-- HEADER OF A BLOG PAGE WITH LOGO AND TITLE TAG SPECIFIC FOR PRODUCT PAGE -------- END -->

    <!-- HORIZONTAL NAVIGATION FOR DESKTOP AND MOBILE DEVICES -------- START -->
    <?php
    include 'includes/navigation.php';
    ?>
    <?php
    include 'includes/mobile-navigation.php';
    ?>
    <!-- HORIZONTAL NAVIGATION FOR DESKTOP AND MOBILE DEVICES -------- END -->

    <!-- MAIN CONTENT OF THE PRODUCT PAGE -------- START -->
    <div id="content">
        <?php
        $this_product_query = "SELECT * FROM products WHERE product_url='$product_url'";
        foreach ($connread->query($this_product_query) as $row) {
        $product_category_id = $row['product_category_id'];
        $product_brand_id = $row['product_brand_id'];
        $this_category_query = "SELECT * FROM product_categories WHERE product_category_id='$product_category_id'";
        $this_brand_query = "SELECT * FROM product_brands WHERE product_brand_id='$product_brand_id'";
        foreach ($connread->query($this_category_query) as $row) {
        $product_category = $row['product_category'];
        $product_category_url = $row['product_category_url'];
        foreach ($connread->query($this_brand_query) as $row) {
        $product_brand = $row['product_brand'];
        $product_brand_url = $row['product_brand_url'];
        ?>
        <!-- BREADCRUMBS AREA, VERY IMPORTANT FOR SITE STRUCTURE AND SEO -------- START -->
        <ul id="crumbs">
            <li>
                <a href="index.php"><?php echo $website_frontend_navigation_link1_name; ?></a>
            </li>
            <li>
                <a href="<?php echo $website_frontend_navigation_link2_url; ?><?php echo $sufixwithpar; ?><?php echo $product_category_url; ?>"><?php echo $product_category; ?></a>
            </li>
            <li>
                <a href="<?php echo $website_frontend_navigation_link3_url; ?><?php echo $sufixwithpar; ?><?php echo $product_brand_url; ?>"><?php echo $product_brand; ?></a>
            </li>
            <li><a href="product<?php echo $sufixwithpar; ?><?php echo $product_url; ?>"><?php echo $product_name; ?></a></li>
        </ul>
        <!-- BREADCRUMBS AREA, VERY IMPORTANT FOR SITE STRUCTURE AND SEO -------- END -->
        <div class="clearfix"></div>
        <!-- MAIN LEFT AREA, FOR PRODUCTS REVIEWS, BLOG, ETC... -------- START -->
        <div class="two-third-column">
            <img src="img/<?php echo $product_image; ?>" class="medium-left"
                 alt="<?php echo $product_title_tag; ?>"/>

            <h1><strong><?php echo $product_name; ?></strong></h1>
            <?php echo $product_review; ?>
            <div class="clearfix"></div>
			 <h3><strong><?php echo $ovr_rating; ?></strong></h3>
			 <p><?php echo $rating_text; ?></p>
			 <div class="bigratebg">
            <div
                style="width:<?php echo $stars_width; ?>%; height:24px;  background:url('img/bigrate.png') no-repeat;"><span><?php echo $product_avg_rating; ?></span>
            </div>
			</div>
            <br/>

            <div id="procon-box">
                <p><span class="probigicon"><strong><?php echo $pro; ?>:</strong> <?php echo $product_pros; ?></span></p>

                <p><span class="conbigicon"><strong><?php echo $con; ?>:</strong> <?php echo $product_cons; ?></span></p>
            </div>
            <div class="clearfix"></div>
            <br/><br/>
            <a href="<?php echo $product_amazon_url; ?>" target="_blank" rel="nofollow" class="button"/><?php echo $buy_it_btn; ?> $ <?php echo number_format($product_price,2); ?></a>
            <?php } ?>
            <?php } ?>
            <?php } ?>
            <div class="clearfix"></div>
            <br/>
        </div>
        <!-- MAIN LEFT AREA, FOR PRODUCTS REVIEWS, BLOG, ETC... -------- END -->
        <!-- RIGHT SIDE AREA -------- START -->
        <div class="one-third-column">
            <?php include 'includes/side-page.php'; ?>
        </div>
        <!-- RIGHT SIDE AREA -------- END -->
    </div>
    <!-- MAIN CONTENT OF THE PRODUCT PAGE -------- END -->
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
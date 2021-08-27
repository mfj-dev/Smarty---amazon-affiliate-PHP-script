<?php
session_start();
include 'security/xss-security.php';
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'includes/language.php';
include 'includes/index-product-query.php';
include 'includes/url-rewriting.php';
include 'includes/visitcount.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- HEADER OF A INDEX PAGE WITH LOGO AND TITLE TAG SPECIFIC FOR INDEX PAGE -------- START -->
    <?php
    include 'includes/index-header.php';
    ?>
    <!-- HEADER OF A INDEX PAGE WITH LOGO AND TITLE TAG SPECIFIC FOR INDEX PAGE -------- END -->
	
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
                <a href="">
				<?php echo $website_frontend_navigation_link1_name; ?></a>
            </li>
        </ul>
        <!-- BREADCRUMBS AREA, VERY IMPORTANT FOR SITE STRUCTURE AND SEO -------- END -->
        <div class="clearfix"></div>
        <!-- MAIN LEFT AREA, FOR PRODUCTS REVIEWS, BLOG, ETC... -------- START -->
        <div class="two-third-column">
            <?php
            $best_product_query = "SELECT * FROM products ORDER by product_avg_rating DESC LIMIT 1";
            foreach ($connread->query($best_product_query) as $row) {
			if($row['product_image']!=''){
                $product_image = $row['product_image'];
				}
			else
			{
			    $product_image = 'add-image.png';
			}
                $product_title_tag = $row['product_title_tag'];
                ?>
                <img src="img/<?php echo $product_image; ?>"
                     class="medium-left"
                     title="<?php echo $product_title_tag; ?>" alt="<?php echo $product_title_tag; ?>"/>
            <?php } ?>
            <?php
            $website_frontend_query = "SELECT * FROM website_frontend WHERE website_frontend_id=1";
            foreach ($connread->query($website_frontend_query) as $row) {
                ?>
                <h1><strong><?php echo $website_frontend_h1; ?></strong></h1>
                <?php echo $website_frontend_description; ?>
            <?php } ?>
            <div class="clearfix"></div>
            <div id="headings">
                <h2><?php echo $latest_reviews; ?></h2>
            </div>
            <?php
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
                    <img src="img/<?php echo $product_image; ?>" alt="<?php echo $product_title_tag; ?>"/>

                    <h3><strong><?php echo $product_name; ?></strong></h3>

                    <div class="short-review-box-text">
                        <?php echo $first_paragraf_product_review; ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="procon-container">
                        <p><span class="proicon"><?php echo $pro; ?>: <?php echo $product_pros; ?></span></p>

                        <p><span class="conicon"><?php echo $con; ?>: <?php echo $product_cons; ?></span></p>
                        <br/>
                        <a href="product<?php echo $sufixwithpar; ?><?php echo $product_url; ?>" class="button"/><?php echo $read_review_btn; ?></a>
                    </div>
                    <br/>
                </div>
            <?php } ?>
            <?php if ($total_pages > 1) {
                include 'includes/index-pagination.php';
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
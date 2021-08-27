<div id="side-page">
<!-- HTML for SEARCH BAR -->
  
	<form id="tfnewsearch" method="post" action="">
		        <input type="text" required placeholder="<?php echo $search_placeholder;?>" class="tftextinput" name="q" size="21" maxlength="120"><input type="submit" value="<?php echo $search; ?>" name="search" class="tfbutton">
    </form>
	<div class="tfclear"></div>
    <h3><strong><?php echo $product_with_best_rtgs_h3; ?></strong></h3>
    <br/>
    <?php
    $best_product_query = "SELECT * FROM products ORDER by product_avg_rating DESC LIMIT 5";
    foreach ($connread->query($best_product_query) as $row) {
        $product_name = $row['product_name'];
        $product_url = $row['product_url'];
        $product_brand_title_tag = $row['product_title_tag'];
        $product_avg_rating = $row['product_avg_rating'];
        $stars_width = 20 * $product_avg_rating;
        ?>
        <div class="side-products">
<span><a
        href="product<?php echo $sufixwithpar; ?><?php echo $product_url; ?>"><?php echo $product_name; ?></a><span>
        </div>
        <div class="starsbg">
            <div
                style="width:<?php echo $stars_width; ?>%; height:12px;  background:url('img/stars.png') no-repeat;">
            </div>
        </div>
        <div class="clearfix"></div>
        <br/>
    <?php } ?>
    <h3><strong><?php echo $review_by_brands_h3; ?></strong></h3>
    <br/>
    <?php
    $product_brands_query = "SELECT * FROM product_brands ORDER by product_brand_id ASC";
    foreach ($connread->query($product_brands_query) as $row) {
        $product_brand_id = $row['product_brand_id'];
        $product_brand = $row['product_brand'];
        $product_brand_url = $row['product_brand_url'];
        $product_brand_title_tag = $row['product_brand_title_tag'];
        ?>
        <span><a
                href="<?php echo $website_frontend_navigation_link3_url; ?><?php echo $sufixwithpar; ?><?php echo $product_brand_url; ?>"
                title=""><?php echo $product_brand; ?></a></span>
        <div class="clearfix"></div>
        <br/>
    <?php } ?>
    <h3><strong><?php echo $review_by_ctgs_h3; ?></strong></h3>
    <br/>
    <?php
    $product_categories_query = "SELECT * FROM product_categories ORDER by product_category_id ASC";
    foreach ($connread->query($product_categories_query) as $row) {
        $product_category_id = $row['product_category_id'];
        $product_category = $row['product_category'];
        $product_category_image = $row['product_category_image'];
        $product_category_url = $row['product_category_url'];
        $product_category_title_tag = $row['product_category_title_tag'];
        ?>
        <span><a
                href="<?php echo $website_frontend_navigation_link2_url; ?><?php echo $sufixwithpar; ?><?php echo $product_category_url; ?>"
                title=""><?php echo $product_category; ?></a></span>
        <div class="clearfix"></div>
        <br/>
    <?php } ?>
    <h3><strong><?php echo $website_frontend_navigation_link4_name; ?></strong></h3>
    <br/>
    <?php
    $blog_articles_query = "SELECT blog_id, blog_h1, blog_article, DATE_FORMAT(blog_date,'%d. %m. %Y') as formated_blog_date, blog_image, blog_url, blog_title_tag, blog_author FROM blog ORDER by blog_date DESC LIMIT 2";
    foreach ($connread->query($blog_articles_query) as $row) {
        $blog_h1 = $row['blog_h1'];
        $blog_article = $row['blog_article'];
        $first_paragraf_blog_article = substr($blog_article, 0, strpos($blog_article, "</p>") + 4);
        $formated_blog_date = $row['formated_blog_date'];
        $blog_image = $row['blog_image'];
        $blog_url = $row['blog_url'];
        $blog_title_tag = $row['blog_title_tag'];
        $blog_author = $row['blog_author'];
        ?>
        <span><a href="blog-article<?php echo $sufixwithpar; ?><?php echo $blog_url; ?>"
                 title=""><?php echo $blog_h1; ?></a></span>
        <br/>
        <span class="small-blog-date"><?php echo $formated_blog_date; ?></span>
        <div class="clearfix"></div>
		</br>
    <?php } ?>
	<?php
    /**
    * THIS IS PART FOR SELECTING SOCIAL NETWORK URLS  FROM DATABASE AND OUTPUT IT  ---- 
    */
    $website_frontend_social_query = "SELECT * FROM website_frontend WHERE website_frontend_id=1";
    foreach ($connread->query($website_frontend_social_query) as $row) {
	$website_frontend_facebook_url=$row['website_frontend_facebook_url'];
	$website_frontend_twitter_url=$row['website_frontend_twitter_url'];
	$website_frontend_youtube_url=$row['website_frontend_youtube_url'];
    ?>
    <span id="more"> <a href="<?php echo $website_frontend_navigation_link4_url; ?><?php echo $sufixwithoutpar; ?>"><u><?php echo $more_link; ?></u></a></span>
	<h3><strong><?php echo $social_networks_h3; ?></strong></h3>
	<span id="fb"><a href="<?php echo $website_frontend_facebook_url; ?>" target="_blank"><?php echo $fb_link; ?></a></span>
	<div class="clearfix"></div>
    <span id="twitter"><a href="<?php echo $website_frontend_twitter_url; ?>" target="_blank"><?php echo $twitter_link; ?></a></span>
	<div class="clearfix"></div>
    <span id="youtube"><a href="<?php echo $website_frontend_youtube_url; ?>" target="_blank"><?php echo $youtube_link; ?></a></span>
	<?php } ?>
	<h3><strong><?php echo $newsletter; ?></strong></h3>
	<br/>
	<?php
    /**
    * THIS IS PART FOR INSERTING  USER EMAIL TO THE DATABASE  ---- 
    */
	$ip=$_SERVER['REMOTE_ADDR'];
	$register_website_visit = "INSERT INTO website_visitors(website_visitor_ip,website_visitors_datetime)
		 	  VALUES(:website_visitor_ip, NOW())";
	    $stmt = $connwrite->prepare($register_website_visit);
        // bind the parameters and execute the statement
        $stmt->bindParam(':website_visitor_ip', $ip, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        // execute and get number of affected rows
	if (isset($_POST['subscribe'])) {
	     $become_subscriber = "INSERT INTO mailing_list(mailing_list_email,mailing_list_date,mailing_list_ip)
		 	  VALUES(:mailing_list_email,NOW(),:mailing_list_ip)";
        // prepare the statement
        $stmt = $connwrite->prepare($become_subscriber);
        // bind the parameters and execute the statement
        $stmt->bindParam(':mailing_list_email', $_POST['mailing_list_email'], PDO::PARAM_STR);
        $stmt->bindParam(':mailing_list_ip', $ip, PDO::PARAM_STR);
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
        echo '<span id="subscribe-confirmation"> &#10003; '.$subsc_confirmation.'</span>';	
    	}
	 ?>
	<form method="POST" action="#">
	<input class="tftextinput" type="email" name="mailing_list_email" required placeholder="<?php echo $type_email; ?>" />
	<div class="clearfix"></div>
	<input type="submit"  value="<?php echo $subscribe_msg; ?>" name="subscribe" class="button">
    </form>
	<br/>
</div>
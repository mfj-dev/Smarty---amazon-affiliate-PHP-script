<?php
 if (isset($_POST['update_website'])) {
 if (isset($_POST['website_frontend_fonts'])){
       $insert_fonts=$_POST['website_frontend_fonts'];
    }
    else{
       $insert_fonts='tahoma.css';
    }
    if (isset($_POST['website_frontend_color'])){
       $insert_color=$_POST['website_frontend_color'];
    }
    else{
       $insert_color='egyptianblue.css';
    }
	if (isset($_POST['website_frontend_language'])){
       $insert_language=$_POST['website_frontend_language'];
    }
    else{
       $insert_language='en';
    }
	if (isset($_POST['website_frontend_product_count'])){
       $website_frontend_product_count=$_POST['website_frontend_product_count'];
    }
	else{
       $website_frontend_product_count='3';
    }
	if (isset($_POST['website_frontend_url_rewrite_status'])){
       $website_frontend_url_rewrite_status=$_POST['website_frontend_url_rewrite_status'];
    }
	else{
       $website_frontend_url_rewrite_status='0';
    }
 $OK = false;
        $update_website_options = 'UPDATE website_frontend SET website_frontend_name=:website_frontend_name, website_frontend_meta_tag=:website_frontend_meta_tag,
  website_frontend_title_tag=:website_frontend_title_tag,website_frontend_facebook_url=:website_frontend_facebook_url,website_frontend_twitter_url=:website_frontend_twitter_url,
  website_frontend_youtube_url=:website_frontend_youtube_url,
  website_frontend_description=:website_frontend_description,website_frontend_h1=:website_frontend_h1,
  website_frontend_email=:website_frontend_email,website_frontend_fonts=:website_frontend_fonts,website_frontend_color=:website_frontend_color,
  website_privacy_policy_content=:website_privacy_policy_content,website_frontend_language=:website_frontend_language,website_frontend_product_count=:website_frontend_product_count,
  website_frontend_url_rewrite_status=:website_frontend_url_rewrite_status  WHERE website_frontend_id=1';
        $stmt = $connwrite->prepare($update_website_options );
        // bind the parameters and execute the statement
        $stmt->bindParam(':website_frontend_name', $_POST['website_frontend_name'], PDO::PARAM_STR);
        $stmt->bindParam(':website_frontend_meta_tag', $_POST['website_frontend_meta_tag'], PDO::PARAM_STR);
        $stmt->bindParam(':website_frontend_title_tag', $_POST['website_frontend_title_tag'], PDO::PARAM_STR);
        $stmt->bindParam(':website_frontend_facebook_url', $_POST['website_frontend_facebook_url'], PDO::PARAM_STR);
		$stmt->bindParam(':website_frontend_twitter_url', $_POST['website_frontend_twitter_url'], PDO::PARAM_STR);
		$stmt->bindParam(':website_frontend_youtube_url', $_POST['website_frontend_youtube_url'], PDO::PARAM_STR);
        $stmt->bindParam(':website_frontend_description', $_POST['website_frontend_description'], PDO::PARAM_STR);
        $stmt->bindParam(':website_frontend_h1', $_POST['website_frontend_h1'], PDO::PARAM_STR);
        $stmt->bindParam(':website_frontend_email', $_POST['website_frontend_email'], PDO::PARAM_STR);
        $stmt->bindParam(':website_frontend_fonts', $insert_fonts, PDO::PARAM_STR);
        $stmt->bindParam(':website_frontend_color', $insert_color, PDO::PARAM_STR);
        $stmt->bindParam(':website_privacy_policy_content', $_POST['website_privacy_policy_content'], PDO::PARAM_STR);
		$stmt->bindParam(':website_frontend_language', $insert_language, PDO::PARAM_STR);
		$stmt->bindParam(':website_frontend_product_count', $website_frontend_product_count, PDO::PARAM_STR);
	    $stmt->bindParam(':website_frontend_url_rewrite_status', $website_frontend_url_rewrite_status, PDO::PARAM_STR);
// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
 }
 
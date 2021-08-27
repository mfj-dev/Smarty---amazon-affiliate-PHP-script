<?php
$website_options_query = "SELECT * FROM website_frontend WHERE website_frontend_id=1";
$website_frontend_navigation_links_query = "SELECT * FROM website_frontend_navigation_links WHERE website_frontend_navigation_link_id=1";
$products_query = "SELECT * FROM products ORDER by product_id ASC";
$category_query = "SELECT * FROM product_categories ORDER by product_category_id ASC";
$brands_query = "SELECT * FROM product_brands ORDER by product_brand_id ASC";
$product_categories_query = "SELECT * FROM product_categories ORDER by product_category_id ASC";
$mailing_list_query = "SELECT mailing_list_id, mailing_list_email, DATE_FORMAT(mailing_list_date,'%d. %m. %Y') as formated_mailing_list_date, mailing_list_ip FROM mailing_list ORDER by mailing_list_id ASC";
$blog_articles_query = "SELECT blog_id, blog_h1, blog_article, DATE_FORMAT(blog_date,'%d %M %Y') as formated_blog_date, blog_image, blog_url, blog_title_tag, blog_author FROM blog ORDER by blog_id ASC";
$admin_mail_query = "SELECT  * FROM admin_mail WHERE admin_mail_id=1";





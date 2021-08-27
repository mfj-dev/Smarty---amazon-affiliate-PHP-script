<?php 
session_start();
include 'security/xss-security.php';
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'includes/language.php';
include 'includes/url-rewriting.php';
include 'includes/visitcount.php';
$blog_url = $_GET['url'];
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
    /**
     * THIS IS PART FOR SELECTING WEBSITE OPTIONS FROM DATABASE AND OUTPUT IT  ---- END
     */
}
  if (isset($_POST['search'])) {
	 $q=$_POST['q'];
     header('Location:'.$web_root.'/search.php?q='.$q.'');
	 }
  if(isset($_POST['send_message'])) { 
  $OK = false;
  // create database connection
  // insert comment into database
        // create SQL
        $insert_comment_query = "INSERT INTO blog_comments(blog_url,blog_comments_fullname,blog_comments_email,blog_comments_text,blog_comments_date)
		 	  VALUES(:blog_url,:blog_comments_fullname,:blog_comments_email,:blog_comments_text,NOW())";
        // prepare the statement
        $stmt = $connwrite->prepare($insert_comment_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':blog_url', $blog_url, PDO::PARAM_STR);
        $stmt->bindParam(':blog_comments_fullname', $_POST['blog_comments_fullname'], PDO::PARAM_STR);
        $stmt->bindParam(':blog_comments_email', $_POST['blog_comments_email'], PDO::PARAM_STR);
        $stmt->bindParam(':blog_comments_text', $_POST['blog_comments_text'], PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
  }
  $blog_comments_count_query = "SELECT COUNT(*) as num FROM blog_comments WHERE blog_url='$blog_url' && blog_comments_status=1";
  foreach ($connread->query($blog_comments_count_query) as $row) {
    $num_of_blog_comments = $row['num'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- HEADER OF A BLOG PAGE WITH LOGO AND TITLE TAG SPECIFIC FOR BLOG ARTICLE PAGE -------- START -->
    <?php
    include 'includes/blog-article-header.php';
    ?>
    <!-- HEADER OF A BLOG PAGE WITH LOGO AND TITLE TAG SPECIFIC FOR BLOG ARTICLE PAGE -------- END -->

    <!-- HORIZONTAL NAVIGATION FOR DESKTOP AND MOBILE DEVICES -------- START -->
    <?php
    include 'includes/navigation.php';
    ?>
    <?php
    include 'includes/mobile-navigation.php';
    ?>
    <!-- HORIZONTAL NAVIGATION FOR DESKTOP AND MOBILE DEVICES -------- END -->

    <!-- MAIN CONTENT OF THE BLOG ARTICLE PAGE -------- START -->
    <div id="content">
        <?php
        foreach ($connread->query($this_blog_article_query) as $row) {
        ?>
        <!-- BREADCRUMBS AREA, VERY IMPORTANT FOR SITE STRUCTURE AND SEO -------- START -->
        <ul id="crumbs">
            <li>
                <a href="index.php"><?php echo $website_frontend_navigation_link1_name; ?></a>
            </li>
            <li>
                <a href="<?php echo $website_frontend_navigation_link4_url; ?><?php echo $sufixwithoutpar; ?>"><?php echo $website_frontend_navigation_link4_name; ?></a>
            </li>
            <li><a href="blog-article<?php echo $sufixwithpar; ?><?php echo $blog_url; ?>"><?php echo $blog_h1; ?></a></li>
        </ul>
        <!-- BREADCRUMBS AREA, VERY IMPORTANT FOR SITE STRUCTURE AND SEO -------- END -->
        <div class="clearfix"></div>
        <!-- MAIN LEFT AREA, FOR PRODUCTS REVIEWS, BLOG, ETC... -------- START -->
        <div class="two-third-column">
            <div id="blog-wrapper">
                <h2><strong><?php echo $blog_h1; ?></strong></h2>
                <img class="blog" src="img/<?php echo $blog_image; ?>" alt="<?php echo $blog_title_tag; ?>"/>
                <span class="blog-date"><strong><?php echo $formated_blog_date; ?>, <?php echo $by; ?> </strong><a
                        href="<?php echo $blog_author_url; ?>"
                        title="Click to see author page!"><strong><?php echo $blog_author; ?></strong></a></span>
                <?php echo $blog_article; ?>					
                <div class="clearfix"></div>
				<br>
				<div class="fb-comments" style="width:100%!important;" data-href="http://brankomatovic.net/smarty17/blog-article.php?url=<?php echo $blog_url;?>" data-numposts="5" data-mobile="Auto-detected" data-colorscheme="light"></div>
            </div>
            <?php } ?>
        </div>
        <!-- MAIN LEFT AREA, FOR PRODUCTS REVIEWS, BLOG, ETC... -------- END -->
        <!-- RIGHT SIDE AREA -------- START -->
        <div class="one-third-column">
            <?php
            include 'includes/side-page.php';
            ?>
        </div>
        <!-- RIGHT SIDE AREA -------- END -->
    </div>
    <!-- MAIN CONTENT OF THE BLOG ARTICLE PAGE -------- END -->

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
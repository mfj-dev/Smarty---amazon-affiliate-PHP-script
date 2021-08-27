<?php
session_start();
include 'security/xss-security.php';
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'includes/language.php';
include 'includes/blog-pages-query.php';
include 'includes/url-rewriting.php';
include 'includes/visitcount.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- HEADER OF A BLOG PAGE WITH LOGO AND TITLE TAG SPECIFIC FOR BLOG PAGE -------- START -->
    <?php
    include 'includes/blog-header.php';
    ?>
    <!-- HEADER OF A BLOG PAGE WITH LOGO AND TITLE TAG SPECIFIC FOR BLOG PAGE -------- END -->

    <!-- HORIZONTAL NAVIGATION FOR DESKTOP AND MOBILE DEVICES -------- START -->
    <?php
    include 'includes/navigation.php';
    ?>
    <?php
    include 'includes/mobile-navigation.php';
    ?>
    <!-- HORIZONTAL NAVIGATION FOR DESKTOP AND MOBILE DEVICES -------- END -->

    <!-- MAIN CONTENT OF THE BLOG PAGE -------- START -->
    <div id="content">
        <!-- BREADCRUMBS AREA, VERY IMPORTANT FOR SITE STRUCTURE AND SEO -------- START -->
        <ul id="crumbs">
            <li>
                <a href="index.php"><?php echo $website_frontend_navigation_link1_name; ?></a>
            </li>
            <li>
                <a href="<?php echo $website_frontend_navigation_link4_url; ?><?php echo $sufixwithoutpar; ?>"><?php echo $website_frontend_navigation_link4_name; ?></a>
            </li>
        </ul>
        <!-- BREADCRUMBS AREA, VERY IMPORTANT FOR SITE STRUCTURE AND SEO -------- END -->
        <div class="clearfix"></div>
        <!-- MAIN LEFT AREA, FOR PRODUCTS REVIEWS, BLOG, ETC... -------- START -->
        <div class="two-third-column">
            <?php
            $count_blog_articles_query = "SELECT COUNT(*) FROM blog";
            foreach ($connread->query($count_blog_articles_query) as $row) {
                $count_blog_articles = $row['COUNT(*)'];
                if ($count_blog_articles == '0') {
                    echo '<p>There is no articles here...</p>';
                }
            }
            ?>
            <?php
            foreach ($connread->query($blog_articles_query) as $row) {
                $blog_h1 = $row['blog_h1'];
                $blog_article = $row['blog_article'];
                $first_paragraf_blog_article = substr($blog_article, 0, strpos($blog_article, "</p>") + 4);
                $formated_blog_date = $row['formated_blog_date'];
                $blog_image = $row['blog_image'];
				if($row['blog_image']!=''){
                $blog_image = $row['blog_image'];
				}
			    else
			    {
			    $blog_image = 'add-blog-image.png';
			    }
                $blog_url = $row['blog_url'];
                $blog_title_tag = $row['blog_title_tag'];
                $blog_author = $row['blog_author'];
                $blog_author_url = $row['blog_author_url'];
				$blog_comments_count_query = "SELECT COUNT(*) as num FROM blog_comments WHERE blog_url='$blog_url' && blog_comments_status=1";
                foreach ($connread->query($blog_comments_count_query) as $row) {
                $num_of_blog_comments = $row['num'];
               }
                ?>
                <div id="blog-wrapper">
                    <h2><strong><?php echo $blog_h1; ?></strong></h2>
                    <img class="blog" src="img/<?php echo $blog_image; ?>" alt="<?php echo $blog_title_tag; ?>"/>
                    <span class="blog-date"><strong><?php echo $formated_blog_date; ?>, <?php echo $by; ?> </strong><a
                            href="<?php echo $blog_author_url; ?>"
                            title="Click to see author page!"><strong><?php echo $blog_author; ?></strong></a> </span>
                    <?php
                    echo $first_paragraf_blog_article;
                    ?>
                    <div class="clearfix"></div>
                    <br/>
                    <a href="blog-article<?php echo $sufixwithpar; ?><?php echo $blog_url; ?>" class="button"/><?php echo $read_article_btn; ?></a>
                    <div class="clearfix"></div>
                </div>
            <?php } ?>
            <?php if ($total_pages > 1) {
                include 'includes/blog-pagination.php';
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
    <!-- MAIN CONTENT OF THE BLOG PAGE -------- END -->
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
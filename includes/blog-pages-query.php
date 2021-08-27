<?php
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
     header('Location:search.php?q='.$q.'');
	 }
/*
Place code to connect to your DB here.

// How many adjacent pages should be shown on each side?
$adjacents = 3;

/*
First get total number of rows in data table.
If you have a WHERE clause in your query, make sure you mirror it here.
*/
$blog_count_query = "SELECT COUNT(*) as num FROM blog";
foreach ($connread->query($blog_count_query) as $row) {
    $num_of_articles = $row['num'];
    $limit = 2;
    $total_pages = ceil($num_of_articles / $limit);
}

/* Setup vars for query. */

if (isset($_GET['page'])) {                            //how many items to show per page
    $page = $_GET['page'];
} else {
    $page = 1;
}
if ($page)
    $start = ($page - 1) * $limit;            //first item to display on this page
else
    $start = 0;                                //if no page var is given, set start to 0

/* Get data. */
$blog_articles_query = "SELECT blog_id, blog_h1, blog_article, DATE_FORMAT(blog_date,'%d. %m. %Y') as formated_blog_date, blog_image, blog_url, blog_title_tag, blog_author, blog_author_url FROM blog ORDER by blog_id DESC LIMIT $start, $limit";


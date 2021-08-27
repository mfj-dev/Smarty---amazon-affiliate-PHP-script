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
	$website_frontend_product_count = $row['website_frontend_product_count'];
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
$this_category_query = "SELECT * FROM product_categories WHERE product_category_url='$this_category_url'";
foreach ($connread->query($this_category_query) as $row) {
    $product_category_id = $row['product_category_id'];
    $products_count_query = "SELECT COUNT(*) as num FROM products WHERE product_category_id=$product_category_id";
    foreach ($connread->query($products_count_query) as $row) {
        $num_of_products = $row['num'];
        $limit = $website_frontend_product_count;
        $total_pages = ceil($num_of_products / $limit);
    }
}
/* Setup vars for query. */

if (isset($_GET['page'])) {                            //how many items to show per page
    $page = $_GET['page'];
    $pageminus = $page - 1;
    $pageplus = $page + 1;
} else {
    $page = 1;
}
if ($page)
    $start = ($page - 1) * $limit;            //first item to display on this page
else
    $start = 0;                                //if no page var is given, set start to 0

/* Get data. */
$this_category_query = "SELECT * FROM product_categories WHERE product_category_url='$this_category_url'";
foreach ($connread->query($this_category_query) as $row) {
    $product_category_id = $row['product_category_id'];
    $latest_product_query = "SELECT * FROM products WHERE product_category_id=$product_category_id  ORDER by product_id DESC LIMIT $start, $limit";
}
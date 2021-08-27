<?php
/**
 * THIS IS PART FOR SELECTING WEBSITE OPTIONS FROM DATABASE AND OUTPUT IT  ---- START
 */
$this_blog_article_query = "SELECT blog_id, blog_h1, blog_article, DATE_FORMAT(blog_date,'%d. %m. %Y') as formated_blog_date, blog_image, blog_url, blog_title_tag, blog_author, blog_author_url FROM blog WHERE blog_url='$blog_url'";
foreach ($connread->query($this_blog_article_query) as $row) {
    $blog_h1 = $row['blog_h1'];
    $blog_article = $row['blog_article'];
    $first_paragraf_blog_article = substr($blog_article, 0, strpos($blog_article, "</p>") + 4);
	$blog_article_meta= substr($blog_article, 0, 150);
    $formated_blog_date = $row['formated_blog_date'];
    $blog_image = $row['blog_image'];
    $blog_url = $row['blog_url'];
    $blog_title_tag = $row['blog_title_tag'];
    $blog_author = $row['blog_author'];
	$blog_author_url = $row['blog_author_url'];


    /**
     * THIS IS PART FOR SELECTING WEBSITE OPTIONS FROM DATABASE AND OUTPUT IT  ---- END
     */
    ?>
    <title><?php echo $blog_title_tag; ?></title>
<?php } ?>
<meta name="description" content='<?php echo $blog_article_meta; ?>...'> 
<?php
$website_frontend_query = "SELECT * FROM website_frontend WHERE website_frontend_id=1";
foreach ($connread->query($website_frontend_query) as $row) {
    $website_frontend_logo = $row['website_frontend_logo'];
    $website_frontend_favicon = $row['website_frontend_favicon'];
    $website_frontend_meta_tag = $row['website_frontend_meta_tag'];
    $website_frontend_title_tag = $row['website_frontend_title_tag'];
    $website_frontend_fonts = $row['website_frontend_fonts'];
    $website_frontend_color = $row['website_frontend_color'];
    ?>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="admin/alertify/alertify.core.css" />
<link rel="stylesheet" href="admin/alertify/alertify.default.css" id="toggleCSS" />
<link rel="shortcut icon" href="img/<?php echo $website_frontend_favicon; ?>" />
   <link rel="stylesheet" href="css/main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />  
   <link rel="stylesheet" href="css/green_cup.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />  
<link rel="stylesheet" href="font_css/<?php echo $website_frontend_fonts; ?>" />  
<link rel="stylesheet" href="color_css/<?php echo $website_frontend_color; ?>" />  
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=737958509656384&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="fb-root"></div>
 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="admin/alertify/alertify.js"></script>
	<script>
		function reset () {
			$("#toggleCSS").attr("href", "admin/alertify/alertify.default.css");
			alertify.set({
				labels : {
					ok     : "OK",
					cancel : "Cancel"
				},
				delay : 5000,
				buttonReverse : false,
				buttonFocus   : "ok"
			});
		}
	</script>
	<?php 
	if (isset($_POST['send_message'])) {
	  if ($OK != 0) {
    echo 
	"<script>$(function(){alertify.alert('$comment_success');})</script>";
        } 
	}
	?>
<div id="wrapper">
<div id="header"><a href="index.php"><img src="<?php echo $website_frontend_logo; ?>" alt="<?php echo $website_frontend_title_tag; ?>" /></a></div>
<?php } ?>
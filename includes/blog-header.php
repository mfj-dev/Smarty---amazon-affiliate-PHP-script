<?php
/**
 * THIS IS PART FOR SELECTING WEBSITE OPTIONS FROM DATABASE AND OUTPUT IT  ---- START
 */
$website_frontend_navigation_links_query = "SELECT * FROM website_frontend_navigation_links WHERE website_frontend_navigation_link_id=1";
foreach ($connread->query($website_frontend_navigation_links_query) as $row) {
    $website_frontend_navigation_link4_name = $row['website_frontend_navigation_link4_name'];
    ?>
<?php } ?>
<?php
$website_frontend_query = "SELECT * FROM website_frontend WHERE website_frontend_id=1";
foreach ($connread->query($website_frontend_query) as $row) {
    $website_frontend_logo = $row['website_frontend_logo'];
    $website_frontend_favicon = $row['website_frontend_favicon'];
    $website_frontend_name = $row['website_frontend_name'];
    $website_frontend_meta_tag = $row['website_frontend_meta_tag'];
    $website_frontend_title_tag = $row['website_frontend_title_tag'];
    $website_frontend_fonts = $row['website_frontend_fonts'];
    $website_frontend_color = $row['website_frontend_color'];
    /**
     * THIS IS PART FOR SELECTING WEBSITE OPTIONS FROM DATABASE AND OUTPUT IT  ---- END
     */
    ?>
<title><?php echo $website_frontend_navigation_link4_name; ?> | <?php echo $website_frontend_name; ?></title>
<meta name="description" content="<?php echo $website_frontend_meta_tag; ?>"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="shortcut icon" href="img/<?php echo $website_frontend_favicon; ?>" />
   <link rel="stylesheet" href="css/main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />  
   <link rel="stylesheet" href="css/green_cup.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />  
<link rel="stylesheet" href="font_css/<?php echo $website_frontend_fonts; ?>" />  
<link rel="stylesheet" href="color_css/<?php echo $website_frontend_color; ?>" />  
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> 
</head>
<body>

<div id="wrapper">
<div id="header"><a href="index.php"><img src="<?php echo $website_frontend_logo; ?>" alt="<?php echo $website_frontend_title_tag; ?>" /></a></div>
<?php } ?>
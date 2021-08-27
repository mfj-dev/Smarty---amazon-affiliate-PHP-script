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
    $website_frontend_h1 = $row['website_frontend_h1'];
    $website_frontend_description = $row['website_frontend_description'];
    /**
     * THIS IS PART FOR SELECTING WEBSITE OPTIONS FROM DATABASE AND OUTPUT IT  ---- END
     */
    ?>
   <title><?php echo $website_frontend_title_tag; ?></title>
   <meta name="description" content="<?php echo $website_frontend_meta_tag; ?>"> 
   <meta http-equiv="content-type" content="text/html; charset=UTF-8">
   <link rel="shortcut icon" href="img/<?php echo $website_frontend_favicon; ?>" />
   <link rel="stylesheet" href="css/main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />  
   <link rel="stylesheet" href="css/green_cup.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />  
   <link rel="stylesheet" href="font_css/<?php echo $website_frontend_fonts; ?>" />  
   <link rel="stylesheet" href="color_css/<?php echo $website_frontend_color; ?>" />  
<?php
    /**
     * OPTIMIZING YOUR PAGES WITH REL TAG ---- START
     */
    if (isset($_GET['page']) && $page == $total_pages) {
        ?>
        <link rel="prev" href="index.php?page=<?php echo $pageminus; ?>">
    <?php } ?>
    <?php
    if (isset($_GET['page']) && $page == 1) {
        ?>
        <link rel="next" href="index.php?page=<?php echo $pageplus; ?>">
    <?php } ?>

    <?php
    if (isset($_GET['page']) && $page != 1 && $page != $total_pages) {
        /**
         * OPTIMIZING YOUR PAGES WITH REL TAG ---- END
         */
        ?>
        <link rel="prev" href="index.php?page=<?php echo $pageminus; ?>">
        <link rel="next" href="index.php?page=<?php echo $pageplus; ?>">
    <?php } ?>

   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> 
</head>
<body>
   <div id="wrapper">
       <div id="header">
	       <a href="index.php"><img src="<?php echo $website_frontend_logo; ?>" alt="<?php echo $website_frontend_title_tag; ?>" />
		   </a>
	   </div>
<?php } ?>
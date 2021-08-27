<?php
$website_frontend_query = "SELECT * FROM website_frontend WHERE website_frontend_id=1";
foreach ($connread->query($website_frontend_query) as $row) {
$website_frontend_logo = $row['website_frontend_logo'];
$website_frontend_favicon = $row['website_frontend_favicon'];
$website_frontend_meta_tag = $row['website_frontend_meta_tag'];
$website_frontend_title_tag = $row['website_frontend_title_tag'];
$website_frontend_fonts = $row['website_frontend_fonts'];
$website_frontend_color = $row['website_frontend_color'];
$website_frontend_url = $row['website_frontend_url'];
?>
<title><?php echo $website_frontend_title_tag; ?></title>
<meta name="description" content="<?php echo $website_frontend_meta_tag; ?>">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="shortcut icon"
      href="http://<?php echo $website_frontend_url; ?>/img/<?php echo $website_frontend_favicon; ?>"/>
<link rel="stylesheet" href="http://<?php echo $website_frontend_url; ?>/css/main.css"/>
  <link rel="stylesheet" href="css/green_cup.css" />  
<link rel="stylesheet"
      href="http://<?php echo $website_frontend_url; ?>/font_css/<?php echo $website_frontend_fonts; ?>"/>
<link rel="stylesheet"
      href="http://<?php echo $website_frontend_url; ?>/color_css/<?php echo $website_frontend_color; ?>"/>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
</head>
<body>

<div id="wrapper">
    <div id="header"><a href="http://<?php echo $website_frontend_url; ?>/index.php"><img
                src="img/<?php echo $website_frontend_logo; ?>" alt="<?php echo $website_frontend_title_tag; ?>"/></a>
    </div>
    <?php } ?>

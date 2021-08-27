<?php
$this_product_query = "SELECT * FROM products WHERE product_url='$product_url'";
foreach ($connread->query($this_product_query) as $row) {
    $product_name = $row['product_name'];
    $product_url =  $row['product_url'];
    $product_amazon_url = $row['product_amazon_url'];
    $product_name = $row['product_name'];
                if($row['product_image']!=''){
                $product_image = $row['product_image'];
				}
			    else
			    {
			    $product_image = 'add-image.png';
			    }
    $product_title_tag = $row['product_title_tag'];
    $product_review = $row['product_review'];
	$product_review_meta = substr($product_review, 0, 150);
    $first_paragraf_product_review = substr($product_review, 0, strpos($product_review, "</p>") + 4);
    $product_price = $row['product_price'];
    $product_pros = $row['product_pros'];
    $product_cons = $row['product_cons'];
    $product_avg_rating = $row['product_avg_rating'];
	$stars_width = 20 * $product_avg_rating;
	if ($product_avg_rating<=5&&$product_avg_rating>4.5&&$language=='en'){
	$rating_text='We will kindly reccomend you this product, it is excelent and provide great features to costumers. If you want best quality, than this is a product for you.';
	}
	else if ($product_avg_rating<=4.5&&$product_avg_rating>4&&$language=='en'){
	$rating_text='This product has a very good overall quality. Some tiny flaws but we could recomend it as a good potential purchase.';
	}
	else if ($product_avg_rating<=4&&$product_avg_rating>3.5&&$language=='en'){
	$rating_text='This product has a good and bad sides. You can try with it but you must take a care about our and other customers advices.';
	}
	else if ($product_avg_rating<=3.5&&$product_avg_rating>3&&$language=='en'){
	$rating_text='This product has an average quality. We think that there is much beter options for you.';
	}
	else if ($product_avg_rating<=3&&$language=='en'){
	$rating_text='We dona&#769;t recommend it all. It doesna&#769;t serve your needs and expectetaion.' ;
	}
	else if ($product_avg_rating<=5&&$product_avg_rating>4.5&&$language=='es'){
	$rating_text='Nosotros amablemente le recomiendo este producto, es excelente y ofrecer grandes caracter&#237;sticas para clientes. Si desea la mejor calidad, que esto es un producto para usted.';
	}
	else if ($product_avg_rating<=4.5&&$product_avg_rating>4&&$language=='es'){
	$rating_text='Este producto tiene una muy buena calidad en general. Algunos defectos diminutos pero podr&#237;amos recomiendo como un buen potencial de compra.';
	}
	else if ($product_avg_rating<=4&&$product_avg_rating>3.5&&$language=='es'){
	$rating_text='Este producto tiene una buena y malas caras. Usted puede tratar con &#233;l, pero se debe tomar un cuidado sobre nuestros clientes y otros consejos.';
	}
	else if ($product_avg_rating<=3.5&&$product_avg_rating>3&&$language=='es'){
	$rating_text='Este producto tiene una calidad media. Creemos que hay opciones mucho beter para usted.';
	}
	else if ($product_avg_rating<=3&&$language=='es'){
	$rating_text='No recomendamos el todo. Se no servir a sus necesidades y expectetaion.';
	}
	else if ($product_avg_rating <= 5 && $product_avg_rating> 4.5 && $language == 'it') {
    $rating_text = 'Vi Consigliamo cortesemente questo prodotto, &#233; eccellente e fornire grandi caratteristiche di clienti. Se volete la migliore qualit&#224;, che questo &#233; un prodotto per voi.';
    }
    else if ($product_avg_rating <= 4.5 && $product_avg_rating> 4 && $language == 'it') {
    $rating_text = 'Questo prodotto ha una buona qualit&#224; complessiva. Alcuni piccoli difetti, ma abbiamo potuto consigliare come un buon potenziale acquisto.';
    }
    else if ($product_avg_rating <= 4 && $product_avg_rating> 3.5 && $language == 'it') {
    $rating_text = 'Questo prodotto ha una buona e cattiva lati. Si pu&#242; provare con esso, ma si deve prendere una cura per i nostri e gli altri clienti consigli.';
    }
    else if ($product_avg_rating <= 3.5 && $product_avg_rating> 3 && $language == 'it') {
    $rating_text = 'Questo prodotto ha una qualit&#224;  media. Noi pensiamo che non ci sia possibilit&#224; molto beter per voi.';
    }
    else if ($product_avg_rating <= 3 && $language == 'it') {
    $rating_text = 'Ci no consiglio tutto. Si non servire le vostre esigenze e expectetaion.' ;
    }
	else if ($product_avg_rating <= 5 && $product_avg_rating> 4.5 && $language == 'de') { 
	$rating_text = 'Wir werden freundlicherweise empfehlen Sie dieses Produkt, es ist ausgezeichnet und bieten tolle Features, um Kunden. Wenn Sie m&ouml;chten, beste Qualit&auml;t, als dies ein Produkt f&uuml;r Sie.'; 
	} 
	else if ($product_avg_rating <= 4.5 && $product_avg_rating> 4 && $language == 'de') { 
	$rating_text = 'Dieses Produkt hat eine sehr gute Gesamtqualit&auml;t. Einige kleine Fehler, aber wir konnten es als eine gute m&ouml;glichen Kauf empfehlen.'; 
	} 
	else if ($product_avg_rating <= 4 && $product_avg_rating> 3.5 && $language == 'de') { 
	$rating_text = 'Dieses Produkt hat eine gute und schlechte Seiten. Sie k&ouml;nnen mit ihm versuchen, aber Sie m&uuml;ssen einen k&uuml;mmern uns um unsere Kunden und andere Ratschl&auml;ge zu nehmen.'; 
	} 
	else if ($product_avg_rating <= 3.5 && $product_avg_rating> 3 && $language == 'de') { 
	$rating_text = 'Dieses Produkt hat eine durchschnittliche Qualit&auml;t. Wir denken, dass es viel beter Optionen f&uuml;r Sie.'; 
	} 
	else if ($product_avg_rating <= 3 && $language == 'de') {
	$rating_text = 'Wir empfehlen nicht, sie alle. Es doesn&aacute;t Ihre Bed&uuml;rfnisse und expectetaion zu dienen.';
	}
	else if ($product_avg_rating<=5&&$product_avg_rating>4.5&&$language=='pt'){
	$rating_text='Vamos gentilmente recomendo-lhe este produto, &eacute; excelent e fornecer grandes recursos para clientes. Se voc&ecirc; quer a melhor qualidade, do que este &eacute; um produto para voc&ecirc;.';
	}
	else if ($product_avg_rating<=4.5&&$product_avg_rating>4&&$language=='pt'){
	$rating_text='Este produto tem uma qualidade muito boa em geral. Algumas pequenas falhas, mas poder&iacute;amos recomendo-o como um bom potencial de compra.';
	}
	else if ($product_avg_rating<=4&&$product_avg_rating>3.5&&$language=='pt'){
	$rating_text='Este produto tem uma lados bons e ruins. Voc&ecirc; pode tentar com ele, mas voc&ecirc; deve tomar um cuidado sobre nossos clientes e outros conselhos.';
	}
	else if ($product_avg_rating<=3.5&&$product_avg_rating>3&&$language=='pt'){
	$rating_text='Este produto tem uma qualidade m&eacute;dia. N&oacute;s achamos que h&aacute; op&ccedil;&otilde;es muito beter para voc&ecirc;.';
	}
	else if ($product_avg_rating<=3&&$language=='pt'){
	$rating_text='N&oacute;s n&atilde;o recomendamos tudo. Ele n&atilde;o atender &agrave;s suas necessidades e expectetaion.' ;
	}
    else{
    $rating_text='';
    }
    $product_category_id = $row['product_category_id'];
    $product_brand_id = $row['product_brand_id'];
    
	$register_product_visit = "INSERT INTO product_popularity(product_url,website_visitor_ip)
		 	  VALUES(:product_url,:website_visitor_ip)";
	    $stmt = $connwrite->prepare($register_product_visit);
        // bind the parameters and execute the statement
        $stmt->bindParam(':product_url', $product_url, PDO::PARAM_STR);
        $stmt->bindParam(':website_visitor_ip', $ip, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        // execute and get number of affected rows
    ?>
    <title><?php echo $product_title_tag; ?></title>
<?php } ?>
<?php
$website_frontend_query = "SELECT * FROM website_frontend WHERE website_frontend_id=1";
foreach ($connread->query($website_frontend_query) as $row) {
    $website_frontend_logo = $row['website_frontend_logo'];
    $website_frontend_name = $row['website_frontend_name'];
    $website_frontend_favicon = $row['website_frontend_favicon'];
    $website_frontend_meta_tag = $row['website_frontend_meta_tag'];
    $website_frontend_title_tag = $row['website_frontend_title_tag'];
    $website_frontend_fonts = $row['website_frontend_fonts'];
    $website_frontend_color = $row['website_frontend_color'];
    ?>
	<?php
    foreach ($connread->query($this_product_query) as $row) {
        ?>
<meta name="description" content="<?php echo $product_review_meta; ?>"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="shortcut icon" href="img/<?php echo $website_frontend_favicon; ?>" />
   <link rel="stylesheet" href="css/main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />  
   <link rel="stylesheet" href="css/green_cup.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />  
<link rel="stylesheet" href="font_css/<?php echo $website_frontend_fonts; ?>" />  
<link rel="stylesheet" href="color_css/<?php echo $website_frontend_color; ?>" />  
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> 
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
    <?php } ?>
<div id="wrapper">
<div id="header"><a href="index.php"><img src="<?php echo $website_frontend_logo; ?>" alt="<?php echo $website_frontend_title_tag; ?>" /></a></div>
<?php } ?>
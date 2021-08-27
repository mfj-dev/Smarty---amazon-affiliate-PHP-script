<?php
// THIS IS PART FOR WEBSITE FRONTEND DIFFERENT LANGUAGE CODES
$website_frontend_query = "SELECT * FROM website_frontend WHERE website_frontend_id=1";
foreach ($connread->query($website_frontend_query) as $row) {
$website_frontend_url_rewrite_status=$row['website_frontend_url_rewrite_status'];
switch ($website_frontend_url_rewrite_status) {
    case '0':
        $sufixwithpar='.php?url=';
		$sufixwithoutpar='.php';
        break;
	case '1':
        $sufixwithpar='/';
		$sufixwithoutpar='/';
        break;
		}
		}
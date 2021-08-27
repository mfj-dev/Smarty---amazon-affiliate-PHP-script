<?php
/* PART FOR COUNTING WEBSITE VISITORS --------------- START */
/* Part for taking visitors ip address and count country and location of visitor --------------- START */
if (!isset($_SESSION['views'])) { 
    $_SESSION['views'] = 0;
}

$_SESSION['views'] = $_SESSION['views']+1;
if ($_SESSION['views'] == 1) {
$ip = $_SERVER['REMOTE_ADDR'];
if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
    $ip = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
}
	$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
            if($query && $query['status'] == 'success') {
                 $mailing_list_location=''.$query['city'].', '.$query['regionName'].', '.$query ['country'].'';
				 $visitor_city=$query['city'];
				 $visitor_region=$query['regionName'];
				 $visitor_country=$query['country'];
				 $visitor_country_code=$query['countryCode'];
                 } else {
                 $mailing_list_location='Unable to get location';
            }
/* Part for taking visitors ip address and count country and location of visitor --------------- END */

/* Part for inserting every visitor data into database --------------- START */
		$OK = false;	
		$insert_visitor_query = "INSERT INTO visitors(visitors_ip,visitors_city,visitors_region,visitors_country,visitors_countrycode,visitors_visitdate)
		 	  VALUES(:visitors_ip,:visitors_city,:visitors_region,:visitors_country,:visitors_countrycode,NOW())";
        // prepare the statement
        $stmt = $connwrite->prepare($insert_visitor_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':visitors_ip', $ip, PDO::PARAM_STR);
		$stmt->bindParam(':visitors_city', $visitor_city, PDO::PARAM_STR);
		$stmt->bindParam(':visitors_region', $visitor_region, PDO::PARAM_STR);
		$stmt->bindParam(':visitors_country', $visitor_country, PDO::PARAM_STR);
		$stmt->bindParam(':visitors_countrycode', $visitor_country_code, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
/* Part for inserting every visitor data into database --------------- END */		

/* Part for selecting visitor count (daily, weekly, monthly and total) data from database --------------- START */		
		$visitors_query = "SELECT  COUNT(*) as countvisits FROM visitors";
		$monthly_visitors_query = "SELECT COUNT(*) as monthlycountvisits FROM visitors WHERE visitors_visitdate > DATE_SUB(NOW(), INTERVAL 1 MONTH)";	
		$weekly_visitors_query = "SELECT COUNT(*) as weeklycountvisits FROM visitors WHERE visitors_visitdate > DATE_SUB(NOW(), INTERVAL 1 WEEK)";	
		$daily_visitors_query = "SELECT COUNT(*) as dailycountvisits FROM visitors WHERE visitors_visitdate > DATE_SUB(NOW(), INTERVAL 1 DAY)";
/* Part for selecting visitor count (daily, weekly, monthly and total) data from database ---------------  END */			
		
/* Part for inserting and updating visitor statistics by country --------------- START */
		$visitor_countries_query = "SELECT  COUNT(*) as countryexist FROM   visitorcountries WHERE visitors_country='$visitor_country'";		
		foreach ($connread->query($visitor_countries_query) as $row) { 
		$countryexist=$row['countryexist'];
		
        if ($countryexist>0){		
		$this_country_query = "SELECT * FROM   visitorcountries WHERE visitors_country='$visitor_country'";
		foreach ($connread->query($this_country_query) as $row) { 
        $visitorcountrycount=$row ['visitorcountrycount'];
		$visitorcountryplus=$visitorcountrycount+1;
		$OK = false;
		$increment_country_visitor_query = "UPDATE visitorcountries  SET visitorcountrycount=:visitorcountrycount WHERE visitors_country='$visitor_country'";
		$stmt = $connwrite->prepare($increment_country_visitor_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':visitorcountrycount', $visitorcountryplus, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		}
		}
		
	    if ($countryexist==0){	
		$OK = false;
        $visitorcountryplus=1;		
		$insert_country_visitor_query = "INSERT INTO visitorcountries(visitors_country,visitorcountrycount)
		VALUES(:visitors_country,:visitorcountrycount)";
        // prepare the statement
        $stmt = $connwrite->prepare($insert_country_visitor_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':visitors_country', $visitor_country, PDO::PARAM_STR);
		$stmt->bindParam(':visitorcountrycount', $visitorcountryplus, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		}
		}
/* Part for inserting and updating visitor statistics by country --------------- END */


/* Part for inserting and updating visitor statistics by country --------------- START */
		$visitor_cities_query = "SELECT  COUNT(*) as cityexist FROM   visitorcities WHERE visitors_city='$visitor_city' AND visitors_countrycode	='$visitor_country_code'";		
		foreach ($connread->query($visitor_cities_query) as $row) { 
		$cityexist=$row['cityexist'];
        if ($cityexist>0){		
		$this_city_query = "SELECT * FROM  visitorcities WHERE visitors_city='$visitor_city' AND visitors_countrycode='$visitor_country_code'";
		foreach ($connread->query($this_city_query) as $row) { 
        $visitorcitycount=$row['visitorcitycount'];
		$visitorcitycountplus=$visitorcitycount+1;
		$OK = false;
		$increment_city_visitor_query = "UPDATE visitorcities SET visitorcitycount=:visitorcitycount WHERE visitors_city='$visitor_city' AND visitors_countrycode='$visitor_country_code'";
		$stmt = $connwrite->prepare($increment_city_visitor_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':visitorcitycount', $visitorcitycountplus, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		}
		}
		
	    if ($cityexist==0){	
		$OK = false;
        $visitorcitycountplus=1;		
		$insert_city_visitor_query = "INSERT INTO visitorcities (visitors_city,visitors_countrycode,visitorcitycount)
		VALUES(:visitors_city,:visitors_countrycode,:visitorcitycount)";
        // prepare the statement
        $stmt = $connwrite->prepare($insert_city_visitor_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':visitors_city', $visitor_city, PDO::PARAM_STR);
		$stmt->bindParam(':visitors_countrycode', $visitor_country_code, PDO::PARAM_STR);
		$stmt->bindParam(':visitorcitycount', $visitorcitycountplus, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		}
		}
}
/* Part for inserting and updating visitor statistics by country --------------- END */


		
/* PART FOR COUNTING WEBSITE VISITORS --------------- END */
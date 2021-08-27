<?php
/* Select daily, weekly, monthly and total visits --------------- START */
      $visitors_query = "SELECT  COUNT(*) as countvisits,COUNT(DISTINCT visitors_ip) as countuniquevisits FROM visitors";
	  $monthly_visitors_query = "SELECT COUNT(*) as monthlycountvisits,COUNT(DISTINCT visitors_ip) as monthlycountuniquevisits FROM visitors WHERE visitors_visitdate > DATE_SUB(NOW(), INTERVAL 1 MONTH)";	
	  $weekly_visitors_query = "SELECT COUNT(*) as weeklycountvisits, COUNT(DISTINCT visitors_ip) as weeklycountuniquevisits FROM visitors  WHERE visitors_visitdate > DATE_SUB(NOW(), INTERVAL 1 WEEK)";	
	  $daily_visitors_query = "SELECT COUNT(*) as dailycountvisits, COUNT(DISTINCT visitors_ip) as dailycountuniquevisits FROM visitors WHERE visitors_visitdate > DATE_SUB(NOW(), INTERVAL 1 DAY)";
      $visitors_country_count_query = "SELECT COUNT(*) as countcountries FROM   visitorcountries";
	  $visitors_city_count_query = "SELECT COUNT(*) as countcities FROM   visitorcountries";
      foreach ($connread->query($visitors_query) as $row) {  
      $countvisits =$row['countvisits'];
      $countuniquevisits =$row['countuniquevisits'];
      }
	  foreach ($connread->query($monthly_visitors_query) as $row) {  
      $monthlycountvisits =$row['monthlycountvisits'];
      $monthlycountuniquevisits =$row['monthlycountuniquevisits'];
      }
	  foreach ($connread->query($weekly_visitors_query) as $row) {  
      $weeklycountvisits =$row['weeklycountvisits'];
      $weeklycountuniquevisits =$row['weeklycountuniquevisits'];
      }
	  
	  foreach ($connread->query($daily_visitors_query) as $row) {  
      $dailycountvisits =$row['dailycountvisits'];
      $dailycountuniquevisits =$row['dailycountuniquevisits'];
      }
  /* Select daily, weekly, monthly and total visits --------------- END */  
   
  /* Select  total visits by countries --------------- START */	  
	  
	  /* Country with most website visitors --------------- START */
      $first_visitors_country_query = "SELECT * FROM   visitorcountries ORDER by visitorcountrycount DESC LIMIT 0,1";
      foreach ($connread->query($first_visitors_country_query) as $row) { 
	  $first_visitors_country=$row['visitors_country'];
	  $first_visitorcountrycount=$row['visitorcountrycount'];
	  $first_visitorcountrypercent=($first_visitorcountrycount/$countvisits)*100;
	  }
	   /* Country with most website visitors - --------------- END */
	  
	  /* Country with second most website visitors --------------- START */
      $second_visitors_country_query = "SELECT * FROM   visitorcountries ORDER by visitorcountrycount DESC LIMIT 1,1";
      foreach ($connread->query($second_visitors_country_query) as $row) { 
	  $second_visitors_country=$row['visitors_country'];
	  $second_visitorcountrycount=$row['visitorcountrycount'];
	  $second_visitorcountrypercent=($second_visitorcountrycount/$countvisits)*100;
	  }
	  /* Country with second most website visitors - --------------- END */
	  
	  /* Country with third most website visitors --------------- START */
	  $third_visitors_country_query = "SELECT * FROM   visitorcountries ORDER by visitorcountrycount DESC LIMIT 2,1";
      foreach ($connread->query($third_visitors_country_query) as $row) { 
	  $third_visitors_country=$row['visitors_country'];
	  $third_visitorcountrycount=$row['visitorcountrycount'];
	  $third_visitorcountrypercent=($third_visitorcountrycount/$countvisits)*100;
	  }
	  /* Country with third most website visitors --------------- END */
	  
	  /* Country with fourth most website visitors --------------- START */
	  $fourth_visitors_country_query = "SELECT * FROM   visitorcountries ORDER by visitorcountrycount DESC LIMIT 3,1";
      foreach ($connread->query($fourth_visitors_country_query) as $row) { 
	  $fourth_visitors_country=$row['visitors_country'];
	  $fourth_visitorcountrycount=$row['visitorcountrycount'];
	  $fourth_visitorcountrypercent=($fourth_visitorcountrycount/$countvisits)*100;
	  }
	  /* Country with fourth most website visitors --------------- END */
	  
	  /* Country with fifth most website visitors --------------- START */
	  $fifth_visitors_country_query = "SELECT * FROM   visitorcountries ORDER by visitorcountrycount DESC LIMIT 4,1";
      foreach ($connread->query($fifth_visitors_country_query) as $row) { 
	  $fifth_visitors_country=$row['visitors_country'];
	  $fifth_visitorcountrycount=$row['visitorcountrycount'];
	  $fifth_visitorcountrypercent=($fifth_visitorcountrycount/$countvisits)*100;
	  }	
	  /* Country with fifth most website visitors --------------- END*/
	  
   /* Select  total visits by countries --------------- END*/

   
   
   
   
   
   
   
   
   
     /* Select  total visits by cities --------------- START */	  
	  
	  /* City with most website visitors --------------- START */
      $first_visitors_city_query = "SELECT * FROM  visitorcities ORDER by visitorcitycount DESC LIMIT 0,1";
      foreach ($connread->query($first_visitors_city_query) as $row) { 
	  $first_visitors_city=$row['visitors_city'];
	  $first_visitors_countrycode=$row['visitors_countrycode'];
	  $first_visitorcitycount=$row['visitorcitycount'];
	  $first_visitorcitypercent=($first_visitorcitycount/$countvisits)*100;
	  }
	   /* City with most website visitors - --------------- END */
	  
	   /* City with second most website visitors --------------- START */
      $second_visitors_city_query = "SELECT * FROM  visitorcities ORDER by visitorcitycount DESC LIMIT 1,1";
      foreach ($connread->query($second_visitors_city_query) as $row) { 
	  $second_visitors_city=$row['visitors_city'];
	  $second_visitors_countrycode=$row['visitors_countrycode'];
	  $second_visitorcitycount=$row['visitorcitycount'];
	  $second_visitorcitypercent=($second_visitorcitycount/$countvisits)*100;
	  }
	   /* City with second most website visitors - --------------- END */
	 
	   /* City with third most website visitors --------------- START */
      $third_visitors_city_query = "SELECT * FROM  visitorcities ORDER by visitorcitycount DESC LIMIT 2,1";
      foreach ($connread->query($third_visitors_city_query) as $row) { 
	  $third_visitors_city=$row['visitors_city'];
	  $third_visitors_countrycode=$row['visitors_countrycode'];
	  $third_visitorcitycount=$row['visitorcitycount'];
	  $third_visitorcitypercent=($third_visitorcitycount/$countvisits)*100;
	  }
	   /* City with third most website visitors - --------------- END */
	  
	  /* City with fourth most website visitors --------------- START */
      $fourth_visitors_city_query = "SELECT * FROM  visitorcities ORDER by visitorcitycount DESC LIMIT 3,1";
      foreach ($connread->query($fourth_visitors_city_query) as $row) { 
	  $fourth_visitors_city=$row['visitors_city'];
	  $fourth_visitors_countrycode=$row['visitors_countrycode'];
	  $fourth_visitorcitycount=$row['visitorcitycount'];
	  $fourth_visitorcitypercent=($fourth_visitorcitycount/$countvisits)*100;
	  }
	   /* City with fourth most website visitors - --------------- END */
	   
	    /* City with fifth most website visitors --------------- START */
      $fifth_visitors_city_query = "SELECT * FROM  visitorcities ORDER by visitorcitycount DESC LIMIT 4,1";
      foreach ($connread->query($fifth_visitors_city_query) as $row) { 
	  $fifth_visitors_city=$row['visitors_city'];
	  $fifth_visitors_countrycode=$row['visitors_countrycode'];
	  $fifth_visitorcitycount=$row['visitorcitycount'];
	  $fifth_visitorcitypercent=($fifth_visitorcitycount/$countvisits)*100;
	  }
	   /* City with fifth most website visitors - --------------- END */
   /* Select  total visits by cities --------------- END*/
   
   
   
   
   
   
   
   
   
   
   
	  
	   
	  /* Month and year 0 months ago from now --------------- START */
	  $month0monthago = date("m", strtotime("0 month"));	
      $year0monthago = date("Y", strtotime("0 month"));	
	   /* Month and year 0 months ago from now --------------- END */
	  
	  /* Month and year 1months ago from now --------------- START */
	  $month1monthago = date("m", strtotime("-1 month"));	
      $year1monthago = date("Y", strtotime("-1 month"));	
      /* Month and year 1 months ago from now --------------- END */
	  
	  /* Month and year 2 months ago from now --------------- START */
	  $month2monthago = date("m", strtotime("-2 month"));	
      $year2monthago = date("Y", strtotime("-2 month"));	
      /* Month and year 2 months ago from now --------------- END */
	   
	  /* Month and year 3 months ago from now --------------- START */
	  $month3monthago = date("m", strtotime("-3 month"));	
      $year3monthago = date("Y", strtotime("-3 month"));	
      /* Month and year 3 months ago from now --------------- END */
	  
	  /* Month and year 4 months ago from now --------------- START */
	  $month4monthago = date("m", strtotime("-4 month"));	
      $year4monthago = date("Y", strtotime("-4 month"));	
      /* Month and year 4 months ago from now --------------- END */
	  
	  /* Month and year 5 months ago from now --------------- START */
	  $month5monthago = date("m", strtotime("-5 month"));	
      $year5monthago = date("Y", strtotime("-5 month"));	
      /* Month and year 5 months ago from now --------------- END */
	  

	  
	  /* Count visitors and visits this month --------------- START */
	  $thismonthago_visitors_query = "SELECT  COUNT(*) as count0monthago,COUNT(DISTINCT visitors_ip) as countunique0monthago FROM 
	  visitors WHERE YEAR(visitors_visitdate)=$year0monthago AND MONTH(visitors_visitdate)=$month0monthago";
	  foreach ($connread->query( $thismonthago_visitors_query) as $row) {
     $count0monthago=$row['count0monthago'];
	 $countunique0monthago=$row['countunique0monthago'];
      }	  
	  /* Count visitors and visits this month --------------- END*/
	  
	  /* Count visitors from 1 month ago --------------- START */
	  $onemonthago_visitors_query = "SELECT  COUNT(*) as count1monthago,COUNT(DISTINCT visitors_ip) as countunique1monthago FROM 
	  visitors WHERE YEAR(visitors_visitdate)=$year1monthago AND MONTH(visitors_visitdate)=$month1monthago";
	  foreach ($connread->query( $onemonthago_visitors_query) as $row) {
     $count1monthago=$row['count1monthago'];
	 $countunique1monthago=$row['countunique1monthago'];
      }
      /* Count visitors from 1 month ago --------------- END */	

	  /* Count visitors from 2 month ago --------------- START */
	  $twomonthago_visitors_query = "SELECT  COUNT(*) as count2monthago,COUNT(DISTINCT visitors_ip) as countunique2monthago FROM 
	 visitors WHERE YEAR(visitors_visitdate)=$year2monthago AND MONTH(visitors_visitdate)=$month2monthago";
	  foreach ($connread->query( $twomonthago_visitors_query) as $row) {
     $count2monthago=$row['count2monthago'];
	 $countunique2monthago=$row['countunique2monthago'];
      }	 
	  /* Count visitors from 2 month ago --------------- END */
	  
	  /* Count visitors from 3 month ago --------------- START */
	 $threemonthago_visitors_query = "SELECT  COUNT(*) as count3monthago,COUNT(DISTINCT visitors_ip) as countunique3monthago FROM 
	 visitors WHERE YEAR(visitors_visitdate)=$year3monthago AND MONTH(visitors_visitdate)=$month3monthago";
	  foreach ($connread->query( $threemonthago_visitors_query) as $row) {
     $count3monthago=$row['count3monthago'];
	 $countunique3monthago=$row['countunique3monthago'];
      }
	  /* Count visitors from 3 month ago --------------- START */
	  
	  /* Count visitors from 4 month ago --------------- START */
	 $fourmonthago_visitors_query = "SELECT  COUNT(*) as count4monthago,COUNT(DISTINCT visitors_ip) as countunique4monthago FROM 
	 visitors WHERE YEAR(visitors_visitdate)=$year4monthago AND MONTH(visitors_visitdate)=$month4monthago";
	 foreach ($connread->query( $fourmonthago_visitors_query) as $row) {
     $count4monthago=$row['count4monthago'];
	 $countunique4monthago=$row['countunique4monthago'];
      }
	  /* Count visitors from 4 month ago --------------- START */
	  
	 /* Count visitors from 5 month ago --------------- START */
	 $fivemonthago_visitors_query = "SELECT  COUNT(*) as count5monthago,COUNT(DISTINCT visitors_ip) as countunique5monthago FROM 
	 visitors WHERE YEAR(visitors_visitdate)=$year5monthago AND MONTH(visitors_visitdate)=$month5monthago";
	 foreach ($connread->query( $fivemonthago_visitors_query) as $row) {
     $count5monthago=$row['count5monthago'];
	 $countunique5monthago=$row['countunique5monthago'];
      }
	  /* Count visitors from 5 month ago --------------- START */
	  
	  /* Day and month 0 days ago from now --------------- START */
	  $day0daysago = date("d", strtotime("0 day"));	
	  $months0daysago = date("m", strtotime("0 day"));	
	   /* Day and month 0 days ago from now --------------- END */
	  
	  /* Day and month 1 days ago from now --------------- START */
	  $day1daysago = date("d", strtotime("-1 day"));	
	  $months1daysago = date("m", strtotime("-1 day"));	
	   /* Day and month 1 days ago from now --------------- END */
	   
	  /* Day and month 2 days ago from now --------------- START */
	  $day2daysago = date("d", strtotime("-2 day"));	
	  $months2daysago = date("m", strtotime("-2 day"));	
	   /* Day and month 2 days ago from now --------------- END */
	   
	  /* Day and month 3 days ago from now --------------- START */
	  $day3daysago = date("d", strtotime("-3 day"));	
	  $months3daysago = date("m", strtotime("-3 day"));	
	  /* Day and month 3 days ago from now --------------- END */
	  
	  /* Day and month 4 days ago from now --------------- START */
	  $day4daysago = date("d", strtotime("-4 day"));	
	  $months4daysago = date("m", strtotime("-4 day"));	
	   /* Day and month 4 days ago from now --------------- END */
	   
	   /* Day and month 5 days ago from now --------------- START */
	  $day5daysago = date("d", strtotime("-5 day"));	
	  $months5daysago = date("m", strtotime("-5 day"));	
	   /* Day and month 5 days ago from now --------------- END */
	   
	   /* Day and month 6 days ago from now --------------- START */
	  $day6daysago = date("d", strtotime("-6 day"));	
	  $months6daysago = date("m", strtotime("-6 day"));	
	   /* Day and month 6 days ago from now --------------- END */
	   
	  /* Day and month 7 days ago from now --------------- START */
	  $day7daysago = date("d", strtotime("-7 day"));	
	  $months7daysago = date("m", strtotime("-7 day"));	
	   /* Day and month 7 days ago from now --------------- END */
	   
	   
	  /* Count visitors from today --------------- START */
	  $today_visitors_query = "SELECT  COUNT(*) as counttoday,COUNT(DISTINCT visitors_ip) as countuniquetoday FROM 
	  visitors WHERE MONTH(visitors_visitdate)=$months0daysago AND DAY(visitors_visitdate)=$day0daysago";
	  foreach ($connread->query( $today_visitors_query) as $row) {
     $counttoday=$row['counttoday'];
	 $countuniquetoday=$row['countuniquetoday'];
      }
      /* Count visitors from today --------------- END */	
	  
	  /* Count visitors from 1 day ago --------------- START */
	  $onedaysago_visitors_query = "SELECT  COUNT(*) as count1daysago,COUNT(DISTINCT visitors_ip) as countunique1daysago FROM 
	  visitors WHERE MONTH(visitors_visitdate)=$months1daysago AND DAY(visitors_visitdate)=$day1daysago";
	  foreach ($connread->query($onedaysago_visitors_query) as $row) {
     $count1daysago=$row['count1daysago'];
	 $countunique1daysago=$row['countunique1daysago'];
      }
      /* Count visitors from 1 day ago --------------- END */	
	  
	   /* Count visitors from 2 day ago --------------- START */
	  $twodaysago_visitors_query = "SELECT  COUNT(*) as count2daysago,COUNT(DISTINCT visitors_ip) as countunique2daysago FROM 
	  visitors WHERE MONTH(visitors_visitdate)=$months2daysago AND DAY(visitors_visitdate)=$day2daysago ";
	  foreach ($connread->query($twodaysago_visitors_query) as $row) {
     $count2daysago=$row['count2daysago'];
	 $countunique2daysago=$row['countunique2daysago'];
      }
      /* Count visitors from 2 day ago --------------- END */	
	  
	  /* Count visitors from 3 day ago --------------- START */
	  $threedaysago_visitors_query = "SELECT  COUNT(*) as count3daysago,COUNT(DISTINCT visitors_ip) as countunique3daysago FROM 
	  visitors WHERE MONTH(visitors_visitdate)=$months3daysago AND DAY(visitors_visitdate)=$day3daysago ";
	  foreach ($connread->query($threedaysago_visitors_query) as $row) {
     $count3daysago=$row['count3daysago'];
	 $countunique3daysago=$row['countunique3daysago'];
      }
      /* Count visitors from 3 day ago --------------- END */	
	  
	   /* Count visitors from 4 day ago --------------- START */
	  $fourdaysago_visitors_query = "SELECT  COUNT(*) as count4daysago,COUNT(DISTINCT visitors_ip) as countunique4daysago FROM 
	  visitors WHERE MONTH(visitors_visitdate)=$months4daysago AND DAY(visitors_visitdate)=$day4daysago ";
	  foreach ($connread->query($fourdaysago_visitors_query) as $row) {
     $count4daysago=$row['count4daysago'];
	 $countunique4daysago=$row['countunique4daysago'];
      }
      /* Count visitors from 4 day ago --------------- END */ 
	  
	   /* Count visitors from 5 day ago --------------- START */
	  $fivedaysago_visitors_query = "SELECT  COUNT(*) as count5daysago,COUNT(DISTINCT visitors_ip) as countunique5daysago FROM 
	  visitors WHERE MONTH(visitors_visitdate)=$months5daysago AND DAY(visitors_visitdate)=$day5daysago ";
	  foreach ($connread->query($fivedaysago_visitors_query) as $row) {
     $count5daysago=$row['count5daysago'];
	 $countunique5daysago=$row['countunique5daysago'];
      }
      /* Count visitors from 5 day ago --------------- END */ 
	  
	   /* Count visitors from 6 day ago --------------- START */
	  $sixdaysago_visitors_query = "SELECT  COUNT(*) as count6daysago,COUNT(DISTINCT visitors_ip) as countunique6daysago FROM 
	  visitors WHERE MONTH(visitors_visitdate)=$months6daysago AND DAY(visitors_visitdate)=$day6daysago ";
	  foreach ($connread->query($sixdaysago_visitors_query) as $row) {
     $count6daysago=$row['count6daysago'];
	 $countunique6daysago=$row['countunique6daysago'];
      }
      /* Count visitors from 6 day ago --------------- END */ 
	  
	   /* Count visitors from 7 day ago --------------- START */
	  $sevendaysago_visitors_query = "SELECT  COUNT(*) as count7daysago,COUNT(DISTINCT visitors_ip) as countunique7daysago FROM 
	  visitors WHERE MONTH(visitors_visitdate)=$months7daysago AND DAY(visitors_visitdate)=$day7daysago ";
	  foreach ($connread->query($sevendaysago_visitors_query) as $row) {
     $count7daysago=$row['count7daysago'];
	 $countunique7daysago=$row['countunique7daysago'];
      }
      /* Count visitors from  7  day ago --------------- END */ 
<?php
$website_frontend_navigation_link2_url=$_POST['website_frontend_navigation_link2_url'];
$encoded_website_frontend_navigation_link2_url=htmlspecialchars ($website_frontend_navigation_link2_url, ENT_QUOTES);

$website_frontend_navigation_link3_url=$_POST['website_frontend_navigation_link3_url'];
$encoded_website_frontend_navigation_link3_url=htmlspecialchars ($website_frontend_navigation_link3_url, ENT_QUOTES);

$website_frontend_navigation_link4_url=$_POST['website_frontend_navigation_link4_url'];
$encoded_website_frontend_navigation_link4_url=htmlspecialchars ($website_frontend_navigation_link4_url, ENT_QUOTES);

$website_frontend_navigation_link5_url=$_POST['website_frontend_navigation_link5_url'];
$encoded_website_frontend_navigation_link5_url=htmlspecialchars ($website_frontend_navigation_link5_url, ENT_QUOTES);

$website_frontend_navigation_link6_url=$_POST['website_frontend_navigation_link6_url'];
$encoded_website_frontend_navigation_link6_url=htmlspecialchars ($website_frontend_navigation_link6_url, ENT_QUOTES);

foreach ($connread->query($website_frontend_navigation_links_query) as $row) {
    $website_frontend_navigation_link1_url = $row['website_frontend_navigation_link1_url'];
    $website_frontend_navigation_link2_url = $row['website_frontend_navigation_link2_url'];
    $website_frontend_navigation_link3_url = $row['website_frontend_navigation_link3_url'];
    $website_frontend_navigation_link4_url = $row['website_frontend_navigation_link4_url'];
    $website_frontend_navigation_link5_url = $row['website_frontend_navigation_link5_url'];
    $website_frontend_navigation_link6_url = $row['website_frontend_navigation_link6_url'];
    if (isset($_POST['update_navigation'])) {
        $OK = false;
        $update_frontend_navigation_links = 'UPDATE website_frontend_navigation_links SET website_frontend_navigation_link1_name=:website_frontend_navigation_link1_name,
 website_frontend_navigation_link2_name=:website_frontend_navigation_link2_name, website_frontend_navigation_link3_name=:website_frontend_navigation_link3_name, 
 website_frontend_navigation_link4_name=:website_frontend_navigation_link4_name, website_frontend_navigation_link5_name=:website_frontend_navigation_link5_name,
  website_frontend_navigation_link6_name=:website_frontend_navigation_link6_name,
  website_frontend_navigation_link2_url=:website_frontend_navigation_link2_url, 
 website_frontend_navigation_link3_url=:website_frontend_navigation_link3_url,website_frontend_navigation_link4_url=:website_frontend_navigation_link4_url,
 website_frontend_navigation_link5_url=:website_frontend_navigation_link5_url, website_frontend_navigation_link6_url=:website_frontend_navigation_link6_url WHERE website_frontend_navigation_link_id=1';
        $stmt = $connwrite->prepare($update_frontend_navigation_links);
        // bind the parameters and execute the statement
        $stmt->bindParam(':website_frontend_navigation_link1_name', $_POST['website_frontend_navigation_link1_name'], PDO::PARAM_STR);
        $stmt->bindParam(':website_frontend_navigation_link2_name', $_POST['website_frontend_navigation_link2_name'], PDO::PARAM_STR);
        $stmt->bindParam(':website_frontend_navigation_link3_name', $_POST['website_frontend_navigation_link3_name'], PDO::PARAM_STR);
        $stmt->bindParam(':website_frontend_navigation_link4_name', $_POST['website_frontend_navigation_link4_name'], PDO::PARAM_STR);
        $stmt->bindParam(':website_frontend_navigation_link5_name', $_POST['website_frontend_navigation_link5_name'], PDO::PARAM_STR);
        $stmt->bindParam(':website_frontend_navigation_link6_name', $_POST['website_frontend_navigation_link6_name'], PDO::PARAM_STR);
        $stmt->bindParam(':website_frontend_navigation_link2_url', $encoded_website_frontend_navigation_link2_url, PDO::PARAM_STR);
        $stmt->bindParam(':website_frontend_navigation_link3_url', $encoded_website_frontend_navigation_link3_url, PDO::PARAM_STR);
        $stmt->bindParam(':website_frontend_navigation_link4_url', $encoded_website_frontend_navigation_link4_url, PDO::PARAM_STR);
        $stmt->bindParam(':website_frontend_navigation_link5_url', $encoded_website_frontend_navigation_link5_url, PDO::PARAM_STR);
        $stmt->bindParam(':website_frontend_navigation_link6_url', $encoded_website_frontend_navigation_link6_url, PDO::PARAM_STR);
// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        rename('../' . $website_frontend_navigation_link2_url . '.php', '../' . $encoded_website_frontend_navigation_link2_url . '.php');
        rename('../' . $website_frontend_navigation_link3_url . '.php', '../' . $encoded_website_frontend_navigation_link3_url . '.php');
        rename('../' . $website_frontend_navigation_link4_url . '.php', '../' . $encoded_website_frontend_navigation_link4_url . '.php');
        rename('../' . $website_frontend_navigation_link5_url . '.php', '../' . $encoded_website_frontend_navigation_link5_url . '.php');
        rename('../' . $website_frontend_navigation_link6_url . '.php', '../' . $encoded_website_frontend_navigation_link6_url . '.php');
    }
}
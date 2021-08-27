<?php
/**
 * PHP CODE FOR CREATE NEW BLOG ARTICLE  ---- START
 */
$blog_url=$_POST['blog_url'];
$encoded_blog_url=htmlspecialchars ($blog_url, ENT_QUOTES);
if (isset($_POST['register_blog'])) {
   
        $OK = false;
        // create database connection
// initialize prepared statement
        // create SQL
        $register_blog_query = "INSERT INTO blog(blog_h1,blog_article,blog_date,blog_url,blog_title_tag, blog_author, blog_author_url)
		 	  VALUES(:blog_h1,:blog_article,NOW(),:blog_url,:blog_title_tag, :blog_author, :blog_author_url)";
        // prepare the statement
        $stmt = $connwrite->prepare($register_blog_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':blog_h1', $_POST['blog_h1'], PDO::PARAM_STR);
        $stmt->bindParam(':blog_article', $_POST['blog_article'], PDO::PARAM_STR);
        $stmt->bindParam(':blog_url', $encoded_blog_url, PDO::PARAM_STR);
        $stmt->bindParam(':blog_title_tag', $_POST['blog_title_tag'], PDO::PARAM_STR);
        $stmt->bindParam(':blog_author', $_POST['blog_author'], PDO::PARAM_STR);
        $stmt->bindParam(':blog_author_url', $_POST['blog_author_url'], PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        header('Location: blog-articles.php');
}
/**
 * PHP CODE FOR CREATE NEW BLOG ARTICLE  ---- END
 */
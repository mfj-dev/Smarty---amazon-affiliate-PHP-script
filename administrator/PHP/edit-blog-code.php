<?php
/**
 * PHP CODE FOR EDIT  BLOG ARTICLE  ---- START
 */
$blog_url=$_POST['blog_url'];
$encoded_blog_url=htmlspecialchars ($blog_url, ENT_QUOTES);
$blog_id = $_GET['id'];
$this_blog_article_query = "SELECT * FROM blog WHERE blog_id=$blog_id";
if (isset($_POST['update_blog_article'])) {
        $OK = false;
        $update_blog_article = 'UPDATE blog SET blog_h1=:blog_h1,blog_article=:blog_article, blog_date=NOW(),
  blog_url=:blog_url,blog_meta_tag=:blog_meta_tag,blog_title_tag=:blog_title_tag, blog_author=:blog_author,blog_author_url=:blog_author_url  WHERE blog_id=' . $blog_id . '';
        $stmt = $connwrite->prepare($update_blog_article);
        // bind the parameters and execute the statement
        $stmt->bindParam(':blog_h1', $_POST['blog_h1'], PDO::PARAM_STR);
        $stmt->bindParam(':blog_article', $_POST['blog_article'], PDO::PARAM_STR);
        $stmt->bindParam(':blog_url', $encoded_blog_url, PDO::PARAM_STR);
        $stmt->bindParam(':blog_meta_tag', $_POST['blog_meta_tag'], PDO::PARAM_STR);
        $stmt->bindParam(':blog_title_tag', $_POST['blog_title_tag'], PDO::PARAM_STR);
        $stmt->bindParam(':blog_author', $_POST['blog_author'], PDO::PARAM_STR);
        $stmt->bindParam(':blog_author_url', $_POST['blog_author_url'], PDO::PARAM_STR);
// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		echo "<script>window.location.replace('blog-articles.php')</script>";
		}
/**
 * PHP CODE FOR EDIT BLOG ARTICLE  ---- END
 */
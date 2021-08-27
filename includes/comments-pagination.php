<span><a class='page' href='<?php echo $web_root; ?>/comments.php?url=<?php echo $blog_url; ?>&&page=1'>First</a></span>
<?php
if ($total_pages>4  && $page>4){
$x = $page-3;
$last_page_minus_one=$total_pages-1;
while($x <=$last_page_minus_one) {
if ($x==$page){
$current='current';
}
else {
$current='';
}
    echo "<span><a class='page' id='$current' href='$web_root/comments.php?url=$blog_url&&page=$x'>$x</a></span>";
    $x++;
} 
}
else if ($total_pages>4  && $page<=4){
$x = 1;
$last_page_minus_one=$total_pages-1;
while($x <=$last_page_minus_one) {
if ($x==$page){
$current='current';
}
else {
$current='';
}
    echo "<span><a class='page' id='$current' ' href='$web_root/comments.php?url=$blog_url&&page=$x'>$x</a></span>";
    $x++;
} 
}

else if ($total_pages<=4){
$last_page_minus_one=$total_pages-1;
$x = 1;
while($x <=$last_page_minus_one) {
if ($x==$page){
$current='current';
}
else {
$current='';
}
    echo "<span><a class='page' id='$current'  href='$web_root/comments.php?url=$blog_url&&page=$x'>$x</a></span>";
    $x++;
} 
 

}
?>
<span><a class='page' id='<?php 
 if ($total_pages==$page){
 $currentlast='current';
 echo $currentlast;} 
 ?>'  href='<?php echo $web_root; ?>/comments.php?url=<?php echo $blog_url; ?>&&page=<?php echo $total_pages; ?>'><?php echo $total_pages; ?></a></span>
<span><a class='page' href='<?php echo $web_root; ?>/comments.php?url=<?php echo $blog_url; ?>&&page=<?php echo $total_pages; ?>'>Last</a></span>
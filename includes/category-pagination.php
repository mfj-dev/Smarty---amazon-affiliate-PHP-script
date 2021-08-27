<?php
/**
 * COMPLETE PAGINATION PHP CODE FOR CATEGORY PAGE ---- START
 */
$website_frontend_navigation_links_query = "SELECT * FROM website_frontend_navigation_links WHERE website_frontend_navigation_link_id=1";
foreach ($connread->query($website_frontend_navigation_links_query) as $row) {
    $website_frontend_navigation_link2_url = $row['website_frontend_navigation_link2_url'];
    echo "<span><a class='page' href='$website_frontend_navigation_link2_url.php?url=$this_category_url&&page=1'>$first_btn</a></span>";
    if ($total_pages > 4 && $page > 4) {
        $x = $page - 3;
        $last_page_minus_one = $total_pages - 1;
        while ($x <= $last_page_minus_one) {
            if ($x == $page) {
                $current = 'current';
            } else {
                $current = '';
            }
            echo "<span><a class='page' id='$current' href='$website_frontend_navigation_link2_url.php?url=$this_category_url&&page=$x'>$x</a></span>";
            $x++;
        }
    } else if ($total_pages > 4 && $page <= 4) {
        $x = 1;
        $last_page_minus_one = $total_pages - 1;
        while ($x <= $last_page_minus_one) {
            if ($x == $page) {
                $current = 'current';
            } else {
                $current = '';
            }
            echo "<span><a class='page' id='$current' ' href='$website_frontend_navigation_link2_url.php?url=$this_category_url&&page=$x'>$x</a></span>";
            $x++;
        }
    } else if ($total_pages <= 4) {
        $last_page_minus_one = $total_pages - 1;
        $x = 1;
        while ($x <= $last_page_minus_one) {
            if ($x == $page) {
                $current = 'current';
            } else {
                $current = '';
            }
            echo "<span><a class='page' id='$current'  href='$website_frontend_navigation_link2_url.php?url=$this_category_url&&page=$x'>$x</a></span>";
            $x++;
        }


    }
    ?>
    <span><a class='page' id='<?php
        if ($total_pages == $page) {
            $currentlast = 'current';
            echo $currentlast;
        }
        /**
         * COMPLETE PAGINATION PHP CODE FOR CATEGORY PAGE ---- END
         */
        ?>'
             href='<?php echo $website_frontend_navigation_link2_url; ?>.php?url=<?php echo $this_category_url; ?>&&page=<?php echo $total_pages; ?>'><?php echo $total_pages; ?></a></span>
    <span><a class='page'
             href='<?php echo $website_frontend_navigation_link2_url; ?>.php?url=<?php echo $this_category_url; ?>&&page=<?php echo $total_pages; ?>'><?php echo $last_btn; ?></a></span>
<?php } ?>
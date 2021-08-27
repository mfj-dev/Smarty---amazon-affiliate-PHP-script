<span><a class='page' href='index.php?page=1'><?php echo $first_btn; ?></a></span>
<?php
/**
 * COMPLETE PAGINATION PHP CODE FOR INDEX PAGE ---- START
 */
if ($total_pages > 4 && $page > 4) {
    $x = $page - 3;
    $last_page_minus_one = $total_pages - 1;
    while ($x <= $last_page_minus_one) {
        if ($x == $page) {
            $current = 'current';
        } else {
            $current = '';
        }
        echo "<span><a class='page' id='$current' href='index.php?page=$x'>$x</a></span>";
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
        echo "<span><a class='page' id='$current' ' href='index.php?page=$x'>$x</a></span>";
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
        echo "<span><a class='page' id='$current'  href='index.php?page=$x'>$x</a></span>";
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
     * COMPLETE PAGINATION PHP CODE FOR INDEX PAGE ---- END
     */
    ?>' href='index.php?page=<?php echo $total_pages; ?>'><?php echo $total_pages; ?></a></span>
<span><a class='page' href='index.php?page=<?php echo $total_pages; ?>'><?php echo $last_btn; ?></a></span>
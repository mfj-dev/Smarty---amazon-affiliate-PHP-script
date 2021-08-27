<!-- PAGE NAVIGATION FOR MOBILE DEVICES -------- START -->
<div id="mobile-nav">
    <a href="#" id="toggle"><img src="img/mobile-nav.png" id="nav-image"/></a><span
        id="small-navigation">Main menu</span><br/><br/>

    <div id="mobile-nav-link" style="display:none;">
        <?php
		/**
        * PART FOR SELECTING WEBSITE LINKS FROM DATABASE AND OUTPUT IT(YOU CAN CHANGE LINK NAMES AND URL'S IN ADMIN PANEL)  ---- START
        */
        $website_frontend_navigation_links_query = "SELECT * FROM website_frontend_navigation_links WHERE website_frontend_navigation_link_id=1";
        foreach ($connread->query($website_frontend_navigation_links_query) as $row) {
            $website_frontend_navigation_link1_name = $row['website_frontend_navigation_link1_name'];
            $website_frontend_navigation_link1_url = $row['website_frontend_navigation_link1_url'];
            $website_frontend_navigation_link2_name = $row['website_frontend_navigation_link2_name'];
            $website_frontend_navigation_link2_url = $row['website_frontend_navigation_link2_url'];
            $website_frontend_navigation_link3_name = $row['website_frontend_navigation_link3_name'];
            $website_frontend_navigation_link3_url = $row['website_frontend_navigation_link3_url'];
            $website_frontend_navigation_link4_name = $row['website_frontend_navigation_link4_name'];
            $website_frontend_navigation_link4_url = $row['website_frontend_navigation_link4_url'];
            $website_frontend_navigation_link5_name = $row['website_frontend_navigation_link5_name'];
            $website_frontend_navigation_link5_url = $row['website_frontend_navigation_link5_url'];
            $website_frontend_navigation_link6_name = $row['website_frontend_navigation_link6_name'];
            $website_frontend_navigation_link6_url = $row['website_frontend_navigation_link6_url'];
           /**
           * PART FOR SELECTING WEBSITE LINKS FROM DATABASE AND OUTPUT IT(YOU CAN CHANGE LINK NAMES AND URL'S IN ADMIN PANEL)  ---- END
           */
			?>

            <ul>
                <li>
                    <a href="index.php"><?php echo $website_frontend_navigation_link1_name; ?></a>
                </li>
                <li>
                    <a href="#" id="toggle1"><?php echo $website_frontend_navigation_link2_name; ?></a>

                </li>
                <div id="mobile-subnav-link" style="display:none;">
                    <ul>
                        <?php
                        $product_categories_query = "SELECT * FROM product_categories ORDER by product_category_id ASC";
                        foreach ($connread->query($product_categories_query) as $row) {
                            $product_category_id = $row['product_category_id'];
                            $product_category = $row['product_category'];
                            $product_category_image = $row['product_category_image'];
                            $product_category_url = $row['product_category_url'];
                            $product_category_title_tag = $row['product_category_title_tag'];
                            ?>
                            <li>
                                <a href="<?php echo $website_frontend_navigation_link2_url; ?><?php echo $sufixwithpar; ?><?php echo $product_category_url; ?>"> <?php echo $product_category; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <script>
                    $('#toggle1').click(function () {
                        $('#mobile-subnav-link').slideToggle('fast');
                        return false;
                    });
                </script>
                <li>
                    <a href="<?php echo $website_frontend_navigation_link4_url; ?><?php echo $sufixwithoutpar; ?>"><?php echo $website_frontend_navigation_link4_name; ?></a>
                </li>
                <li>
                    <a href="<?php echo $website_frontend_navigation_link5_url; ?><?php echo $sufixwithoutpar; ?>"><?php echo $website_frontend_navigation_link5_name; ?></a>
                </li>
                <li>
                    <a href="<?php echo $website_frontend_navigation_link6_url; ?><?php echo $sufixwithoutpar; ?>"><?php echo $website_frontend_navigation_link6_name; ?></a>
                </li>
            </ul>
        <?php } ?>
    </div>
</div>
<!-- PAGE NAVIGATION FOR MOBILE DEVICES -------- END -->
<script>
    $('#toggle').click(function () {
        $('#mobile-nav-link').slideToggle('fast');
        return false;
    });
</script>
<div id="footer">
    <?php
    $website_frontend_query = "SELECT * FROM website_frontend WHERE website_frontend_id=1";
    foreach ($connread->query($website_frontend_query) as $row) {
        $website_frontend_name = $row['website_frontend_name'];
        ?>
        <p><span><a href="index.php"><?php echo $website_frontend_name; ?></a>, 2014 - <?php echo $all_rights_reserved; ?></span></p>
    <?php } ?>
    <div class="clearfix"></div>
</div>
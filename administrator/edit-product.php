<?php
session_start();
include 'security/xss-security.php';
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/basic.php';
include 'PHP/visits.php';
include 'PHP/edit-product-code.php';
$current1 = '';
$current2 = '';
$current3 = '';
$current4='current';
$current5='';
$current6='';
$current7='';
$current8='';
 include 'PHP/logincode.php';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smarty - Admin panel for controlling website</title>
    <meta name="description" content="Loading Effects for Grid Items with CSS Animations"/>
    <meta name="keywords" content="css animation, loading effect, google plus, grid items, masonry"/>
    <meta name="author" content="Codrops"/>
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/admin.css"/>
    <link rel="stylesheet" type="text/css" href="css/default.css"/>
    <link rel="stylesheet" type="text/css" href="css/component.css"/>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="bootstrap/js/angular.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/npm.js"></script>
    <script src="charts/Chart.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script>
        var bootstrapButton = $.fn.button.noConflict() // return $.fn.button to previously assigned value
        $.fn.bootstrapBtn = bootstrapButton            // give $().bootstrapBtn the Bootstrap functionality
    </script>
    <style type="text/css">
        .hiddenClass {
            visibility: hidden;
        }

        .opacityZero {
            opacity: 0;
        }

        .opacityHalf {
            opacity: 0.5;
        }

        .opacityOne {
            opacity: 1;
        }

        .transVisibleClass {
            opacity: 1;

            -moz-transition: opacity 3s;
            -webkit-transition: opacity 3s;
            -o-transition: opacity 3s;
            transition: opacity 3s;
        }

        .transHiddenClass {
            opacity: 0;

            -moz-transition: opacity 3s;
            -webkit-transition: opacity 3s;
            -o-transition: opacity 3s;
            transition: opacity 3s;
        }
    </style>
   
    <script>

        // Code that uses other library's $ can follow here.
    </script>
</head>
<body>

<!-- Admin panel Header ------ START -->
<div id="admin-header">
    <?php
    include 'HTML/admin-header.html';
    ?>
</div>
<!-- Admin panel Header ------ END -->
<br><br>

<!-- ADMIN WRAPPER ------ START -->

<!-- Side page of the Admin panel ------ START -->
<div class="one-sixth-column big-screen">
    <div id="admin-side-page">
        <?php
        include 'HTML/admin-side-page.html';
        ?>
    </div>
</div>
<!-- Side page of the Admin panel ------ END -->

<div class="fifth-sixth-column">
    <!-- Breadcrumbs for admin panel ------ START -->
    <ol class="breadcrumb">
        <li><a href="index.php"><span class="glyphicon glyphicon-home "></span>Home</a></li>
        <li><a href="products.php" class="active">Products</a></li>
    </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
    <div class="content-empty">
        <div class="clearfix"></div>
    </div>
    <div class="content">
        <div id="sample">
            <div class="content-empty">
                <h1>
                    Edit product
                </h1>

             <form action="" method="POST">
            <?php
            foreach ($connread->query($this_product_query) as $row) {
            $product_name = $row['product_name'];
            $product_category_id = $row['product_category_id'];
            $product_brand_id = $row['product_brand_id'];
            $product_url = $row['product_url'];
            $product_amazon_url = $row['product_amazon_url'];
            $product_title_tag = $row['product_title_tag'];
            $product_price = $row['product_price'];
            $product_review = $row['product_review'];
            $product_pros = $row['product_pros'];
            $product_cons = $row['product_cons'];
            $product_avg_rating = $row['product_avg_rating'];
            ?>
			
			<?php } ?>
			<input required value="<?php echo $product_name; ?>"  class="form-control" data-toggle="tooltip" data-placement="right" title="You can edit your product name here." name="product_name" type="text"/>
			<input required value="<?php echo $product_url; ?>"  name="product_url"  class="form-control" data-toggle="tooltip" data-placement="right" title="Change your URL here. (Try to make it SEO friendly)" type="text"/>
			<input required value="<?php echo $product_amazon_url; ?>"  name="product_amazon_url"  class="form-control" data-toggle="tooltip" data-placement="right" title="Change your Amazon.com URL here." type="text"/>
			<input required value="<?php echo $product_title_tag; ?>"  name="product_title_tag"   class="form-control" data-toggle="tooltip" data-placement="right" title="Change your Title tag here. (Try to make it SEO friendly, 40- 70 characters)" type="text"/>
		<?php
        $this_product_category_query = "SELECT * FROM product_categories WHERE product_category_id=$product_category_id";
        foreach ($connread->query($this_product_category_query) as $row) {
        $product_category = $row['product_category'];
        ?>
        <input  class="form-control"   value="<?php echo $product_category; ?>" disabled type="text"/>
        <?php } ?>
            <div class="clearfix"></div>
        <?php
        $this_product_brand_query = "SELECT * FROM product_brands WHERE product_brand_id=$product_brand_id";
        foreach ($connread->query($this_product_brand_query) as $row) {
        $product_brand = $row['product_brand'];
        ?>
        <input  class="form-control" value="<?php echo $product_brand; ?>" disabled type="text"/>
        <?php } ?>
	    <label id="currency">&#36;</label><input class="form-control" style="padding-left:22px; border-radius:0px!important;" value="<?php echo $product_price; ?>" name="product_price" onkeypress="return isNumberKey(event)"
                                                 placeholder="0.00" id="number" type="number" min="0.00" step="0.01" data-toggle="tooltip" data-placement="right" 
			title="Add price of the product here!"/>
			<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
        return false;
    return true;
}    
</script>
<h5><b>Product review</b></h5>
<textarea name="product_review"  class="ckeditor" cols="80" id="editor1" rows="10" style="width: 480px;  padding-left:15px!important; height:180px;
    border-color: #66afe9; 
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
          box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);">
 <?php echo $product_review; ?>
</textarea>
<br>
<input required  id="proicon"  value="<?php echo $product_pros; ?>" name="product_pros"  class="form-control" data-toggle="tooltip" data-placement="right" title="Edit advantages of a product, some main positive characteristics!"  type="text"/>
<input required  id="conicon"  value="<?php echo $product_cons; ?>" name="product_cons"  class="form-control" data-toggle="tooltip" data-placement="right" title="Write some disadvantages of a product!"  type="text"/>
<input name="product_avg_rating"  value="<?php echo $product_avg_rating; ?>" onkeypress="return isNumber1(event)" id="number" class="form-control" type="number" min="0.00" max="5.00" step="0.01" data-toggle="tooltip" data-placement="right" title="Edit your product mark from 0.00 to 5.00!" />
<script>
function isNumber1(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
        return false;
    return true;
}    
</script>	
                    <button type="submit" name="update_product" class="btn btn-primary">Update product</button>
                </form>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
</div>
 <script type="text/javascript" src="number-polyfill-master/vendor/jquery/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="number-polyfill-master/number-polyfill.js"></script>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
            var trElem = document.createElement("tr"),
                tdElem1 = document.createElement("td"),
                tdElem2 = document.createElement("td"),
                inputElem = document.createElement("input");
            inputElem.setAttribute("name", "numberGenerated");
            inputElem.setAttribute("type", "number");
            tdElem1.appendChild(document.createTextNode("Dynamically generated element:"));
            tdElem2.appendChild(inputElem);
            trElem.appendChild(tdElem1);
            trElem.appendChild(tdElem2);
            $("table").append(trElem);
            $(inputElem).inputNumber();

            $("#disableNumberInput").click(function (event) {
                var $elem = $('input[name="numberDisablable"]').first();
                if ($elem.is(":disabled")) {
                    $elem.removeAttr("disabled");
                    $(this).attr("value", "Disable");
                } else {
                    $elem.attr("disabled", "disabled");
                    $(this).attr("value", "Enable");
                }
            });

            $("#hideNumberInputByClass").click(function (event) {
                var $elem = $('input[name="numberClassHidable"]').first();
                if ($elem.is(".hiddenClass")) {
                    $elem.removeClass("hiddenClass");
                    $(this).attr("value", "Hide");
                } else {
                    $elem.addClass("hiddenClass");
                    $(this).attr("value", "Show");
                }
            });

            $("#hideNumberInputByDisplay").click(function (event) {
                var $elem = $('input[name="numberDisplayHidable"]').first();
                if ($elem.css("display") == "none") {
                    $elem.css("display", "");
                    $(this).attr("value", "Hide");
                } else {
                    $elem.css("display", "none");
                    $(this).attr("value", "Show");
                }
            });

            $("#hideNumberInputByVisibility").click(function (event) {
                var $elem = $('input[name="numberVisibilityHidable"]').first();
                if ($elem.css("visibility") == "hidden") {
                    $elem.css("visibility", "visible");
                    $(this).attr("value", "Hide");
                } else {
                    $elem.css("visibility", "hidden");
                    $(this).attr("value", "Show");
                }
            });

            $("#hideNumberInputByOpacity").click(function (event) {
                var $elem = $('input[name="numberOpacityHidable"]').first();
                if ($elem.css("opacity") == "0") {
                    $elem.css("opacity", "1");
                    $(this).attr("value", "Hide");
                } else {
                    $elem.css("opacity", "0");
                    $(this).attr("value", "Show");
                }
            });

            $("#hideNumberInputByTransition").click(function (event) {
                var $elem = $('input[name="numberTransitionHidable"]').first();
                if ($elem.is(".transHiddenClass")) {
                    $elem.removeClass("transHiddenClass").addClass("transVisibleClass");
                    $(this).attr("value", "Hide");
                } else {
                    $elem.removeClass("transVisibleClass").addClass("transHiddenClass");
                    $(this).attr("value", "Show");
                }
            });
        });
        //]]>
    </script>
<div class="clearfix"></div>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/imagesloaded.js"></script>
<script src="js/classie.js"></script>
<script src="js/AnimOnScroll.js"></script>
<script>
    new AnimOnScroll(document.getElementById('grid'), {
        minDuration: 0.4,
        maxDuration: 0.7,
        viewportFactor: 0.2
    });
</script>
<!-- ADMIN WRAPPER ------ END -->
</body>
</html>
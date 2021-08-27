<?php
session_start();
include 'security/xss-security.php';
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/basic.php';
include 'PHP/visits.php';
include 'PHP/add-blog-code.php';
$current1 = '';
$current2 = '';
$current3 = '';
$current4='';
$current5='';
$current6='';
$current7='current';
$current8='';
 include 'PHP/logincode.php';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buzzybuz - Admin panel for controlling website</title>
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
        <li><a href="blog-articles.php" class="active">Blog articles</a></li>
    </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
    <div class="content-empty">
        <div class="clearfix"></div>
    </div>
    <div class="content">
        <div id="sample">
            <div class="content-empty">
                <h1>
                    Add blog article
                </h1>

                <form action="" method="POST">
                    <input type="text" placeholder="Blog post title (H1)"  name="blog_h1" class="form-control" data-toggle="tooltip" data-placement="right" title="Add your blog post H1 (title) here" required />
					<input type="text" required placeholder="Blog article SEO friendly URL"  name="blog_url" class="form-control" data-toggle="tooltip" data-placement="right" title="Add URL of a page here! Avoid hypens and put your keyword here! (ex:
                keyword1-keyword2)" required />
                    <input type="text" class="form-control" placeholder="Blog article title tag" class="left" name="blog_title_tag" data-toggle="tooltip" data-placement="right" 
					title="Add title tag of a page here! Write 40 - 70 characters! (ex: keyword1 - keyword2 |
                keyword3)" required />
               <input type="text"  placeholder="Blog article author"  name="blog_author" class="form-control"   data-toggle="tooltip" data-placement="right" 
					title="Add your fullname here! (ex: Jonh Smith)" required/>
			   <input type="text"  placeholder="Blog article author URL" name="blog_author_url" class="form-control"  data-toggle="tooltip" data-placement="right" 
			title="Add your author URL here! (ex: your Google+ profile)" required/>
<h5><b>Blog article</b></h5>
  <textarea name="blog_article"  class="ckeditor" cols="80" id="editor1" rows="10" style="width: 480px;  padding-left:15px!important; height:180px;
    border-color: #66afe9; 
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
          box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);">
 Write your blog article here...
</textarea><br/>
                    <button type="submit" name="register_blog"  class="btn btn-primary">Add blog article</button>
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
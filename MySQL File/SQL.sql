-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsql-ipg21.eigbox.net
-- Generation Time: Mar 22, 2015 at 10:12 AM
-- Server version: 5.5.32
-- PHP Version: 4.4.9
-- 
-- Database: `smartyempty`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` VALUES (1, 'smartyuser', 'smartypassword');

-- --------------------------------------------------------

-- 
-- Table structure for table `admin_mail`
-- 

CREATE TABLE `admin_mail` (
  `admin_mail_id` int(11) NOT NULL,
  `admin_mail_text` text NOT NULL,
  PRIMARY KEY (`admin_mail_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `admin_mail`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `blog`
-- 

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_h1` varchar(255) NOT NULL,
  `blog_article` text NOT NULL,
  `blog_date` datetime NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `blog_url` varchar(255) NOT NULL,
  `blog_meta_tag` text NOT NULL,
  `blog_title_tag` varchar(255) NOT NULL,
  `blog_author` varchar(100) NOT NULL,
  `blog_author_url` varchar(255) NOT NULL,
  PRIMARY KEY (`blog_id`),
  UNIQUE KEY `blog_url` (`blog_url`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `blog`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `blog_comments`
-- 

CREATE TABLE `blog_comments` (
  `blog_comments_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_url` varchar(255) NOT NULL,
  `blog_comments_fullname` varchar(255) NOT NULL,
  `blog_comments_email` varchar(255) NOT NULL,
  `blog_comments_text` text NOT NULL,
  `blog_comments_date` datetime NOT NULL,
  `blog_comments_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`blog_comments_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

-- 
-- Dumping data for table `blog_comments`
-- 

INSERT INTO `blog_comments` VALUES (8, 'online-marketer', 'Jovan', 'jovan@gmail.com', 'Just checking....', '2015-01-11 11:53:18', 1);
INSERT INTO `blog_comments` VALUES (6, 'make-a-lot-of-money', 'Pit', 'pit@gmail.com', 'I think, tha you are totaly right. Just keep it up good work. Cheers... :)', '2015-01-11 09:53:31', 1);
INSERT INTO `blog_comments` VALUES (5, 'online-marketer', 'Branko', 'Branko@gmail.com', 'OdliÄan tekst. Svaka Äast.', '2015-01-10 20:34:43', 1);
INSERT INTO `blog_comments` VALUES (38, 'online-marketer', 'Bane', 'bane@gmail.com', 'Good script...', '2015-03-12 20:56:39', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `mailing_list`
-- 

CREATE TABLE `mailing_list` (
  `mailing_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `mailing_list_email` varchar(255) NOT NULL,
  `mailing_list_date` datetime NOT NULL,
  `mailing_list_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`mailing_list_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `mailing_list`
-- 

INSERT INTO `mailing_list` VALUES (1, 'smartyphpscript@gmail.com', '2015-01-05 06:58:50', '77.105.53.96');
INSERT INTO `mailing_list` VALUES (5, 'brankomatovic83@gmail.com', '2015-03-17 10:55:08', '94.189.147.117');

-- --------------------------------------------------------

-- 
-- Table structure for table `product_brands`
-- 

CREATE TABLE `product_brands` (
  `product_brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_brand` varchar(100) NOT NULL,
  `product_brand_url` varchar(255) NOT NULL,
  `product_brand_title_tag` varchar(255) NOT NULL,
  `product_brand_h1` varchar(255) NOT NULL,
  `product_brand_meta_tag` text NOT NULL,
  PRIMARY KEY (`product_brand_id`),
  UNIQUE KEY `product_brand_url` (`product_brand_url`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `product_brands`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `product_categories`
-- 

CREATE TABLE `product_categories` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category` varchar(200) NOT NULL,
  `product_category_image` varchar(255) NOT NULL,
  `product_category_url` varchar(255) NOT NULL,
  `product_category_title_tag` varchar(255) NOT NULL,
  `product_category_h1` varchar(255) NOT NULL,
  `product_category_meta_tag` text NOT NULL,
  PRIMARY KEY (`product_category_id`),
  UNIQUE KEY `product_category_url` (`product_category_url`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `product_categories`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `product_popularity`
-- 

CREATE TABLE `product_popularity` (
  `product_popularity_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_url` varchar(255) NOT NULL,
  `website_visitor_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`product_popularity_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `product_popularity`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `products`
-- 

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `product_url` varchar(255) NOT NULL,
  `product_amazon_url` varchar(255) NOT NULL,
  `product_title_tag` varchar(255) NOT NULL,
  `product_category_id` int(150) NOT NULL,
  `product_brand_id` int(80) NOT NULL,
  `product_image` varchar(150) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_review` text NOT NULL,
  `product_pros` varchar(255) NOT NULL,
  `product_cons` varchar(255) NOT NULL,
  `product_avg_rating` float(5,2) NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_url` (`product_url`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `products`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `visitorcities`
-- 

CREATE TABLE `visitorcities` (
  `visitorcities_id` int(11) NOT NULL AUTO_INCREMENT,
  `visitors_city` varchar(255) NOT NULL,
  `visitors_countrycode` varchar(255) NOT NULL,
  `visitorcitycount` int(11) NOT NULL,
  PRIMARY KEY (`visitorcities_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `visitorcities`
-- 

INSERT INTO `visitorcities` VALUES (1, 'Belgrade', 'RS', 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `visitorcountries`
-- 

CREATE TABLE `visitorcountries` (
  `visitorcountries_id` int(11) NOT NULL AUTO_INCREMENT,
  `visitors_country` varchar(255) NOT NULL,
  `visitorcountrycount` int(11) NOT NULL,
  PRIMARY KEY (`visitorcountries_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `visitorcountries`
-- 

INSERT INTO `visitorcountries` VALUES (1, 'Serbia', 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `visitors`
-- 

CREATE TABLE `visitors` (
  `visitors_id` int(11) NOT NULL AUTO_INCREMENT,
  `visitors_ip` varchar(255) NOT NULL,
  `visitors_city` varchar(255) NOT NULL,
  `visitors_region` varchar(255) NOT NULL,
  `visitors_country` varchar(255) NOT NULL,
  `visitors_countrycode` varchar(255) NOT NULL,
  `visitors_visitdate` datetime NOT NULL,
  `visitors_visitpage` varchar(255) NOT NULL,
  PRIMARY KEY (`visitors_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `visitors`
-- 

INSERT INTO `visitors` VALUES (1, '79.175.118.74', 'Belgrade', 'Central Serbia', 'Serbia', 'RS', '2015-03-22 07:00:22', '');
INSERT INTO `visitors` VALUES (2, '79.175.118.74', 'Belgrade', 'Central Serbia', 'Serbia', 'RS', '2015-03-22 08:22:45', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `website_frontend`
-- 

CREATE TABLE `website_frontend` (
  `website_frontend_id` int(11) NOT NULL,
  `website_frontend_name` varchar(255) NOT NULL,
  `website_frontend_logo` varchar(255) NOT NULL,
  `website_frontend_favicon` varchar(255) NOT NULL,
  `website_frontend_meta_tag` text NOT NULL,
  `website_frontend_title_tag` varchar(255) NOT NULL,
  `website_frontend_facebook_url` varchar(255) NOT NULL,
  `website_frontend_twitter_url` varchar(255) NOT NULL,
  `website_frontend_youtube_url` varchar(255) NOT NULL,
  `website_frontend_h1` varchar(255) NOT NULL,
  `website_frontend_description` text NOT NULL,
  `website_frontend_fonts` varchar(50) NOT NULL,
  `website_frontend_color` varchar(50) NOT NULL,
  `website_frontend_directory` varchar(255) NOT NULL,
  `website_frontend_email` varchar(255) NOT NULL,
  `website_privacy_policy_content` text NOT NULL,
  `website_frontend_language` varchar(3) NOT NULL,
  `website_frontend_product_count` int(11) NOT NULL,
  `website_frontend_url_rewrite_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`website_frontend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `website_frontend`
-- 

INSERT INTO `website_frontend` VALUES (1, 'Smarty  - amazon affiliate PHP script', 'img/logo (9).png', 'logo-favicon.ico', '<p><strong>Lorem ipsum dolor sit amet</strong>, porro option cu vim, in dictas aperiri usu, an pri mazim viris affert. Ex usu facer constituam honestatis, ea sea liber labitur.</p>\r\n', 'Smarty  | amazon affiliate PHP script', 'https://www.facebook.com/some-group', 'https://twitter.com/some-page', 'https://youtube.com/some-page', 'Smarty - amazon afilliate PHP script', '<p><strong>Smarty</strong>&nbsp;&ndash;&nbsp;amazon affiliate is CMS for making amazon affiliate review&nbsp;website. There is plenty options to choose. Fonts, colors, many website options. Admin can create categories, brands, urls, title tags and other SEO options.&nbsp;</p>\r\n\r\n<p>There is admin panel created with Bootstrap where you can create your website by your wish and needs. Many options are here. From website statistics to mailing list of your users. You can edit and change your website and become succesfull amazon affiliate.&nbsp;</p>\r\n', 'tahoma.css', 'egyptianblue.css', '/smarty', 'smartyphpscript@webmail.com', '<p>This Privacy Policy governs the manner in which Smarty collects, uses, maintains and discloses information collected from users (each, a &quot;User&quot;) of the smarty.com website (&quot;Site&quot;). This privacy policy applies to the Site and all products and services offered by Smarty.</p>\r\n\r\n<p><strong>Personal identification information</strong></p>\r\n\r\n<p>We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, subscribe to the newsletter, and in connection with other activities, services, features or resources we make available on our Site. Users may be asked for, as appropriate, email address. Users may, however, visit our Site anonymously. We will collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site related activities.</p>\r\n\r\n<p><strong>Non-personal identification information</strong></p>\r\n\r\n<p>We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information.</p>\r\n\r\n<p><strong>Web browser cookies</strong></p>\r\n\r\n<p>Our Site may use &quot;cookies&quot; to enhance User experience. User&#39;s web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. User may choose to set their web browser to refuse cookies, or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.</p>\r\n\r\n<p><strong>How we use collected information</strong></p>\r\n\r\n<p>Smarty may collect and use Users personal information for the following purposes:</p>\r\n\r\n<p>- To improve customer service<br />\r\n&nbsp;&nbsp; &nbsp;Information you provide helps us respond to your customer service requests and support needs more efficiently.<br />\r\n- To personalize user experience<br />\r\n&nbsp;&nbsp; &nbsp;We may use information in the aggregate to understand how our Users as a group use the services and resources provided on our Site.<br />\r\n- To send periodic emails<br />\r\nWe may use the email address to send them information and updates pertaining to their order.&nbsp;</p>\r\n\r\n<p><strong>How we protect your information</strong></p>\r\n\r\n<p>We adopt appropriate data collection, storage and processing practices and security measures to protect against unauthorized access, alteration, disclosure or destruction of your personal information, username, password, transaction information and data stored on our Site.</p>\r\n\r\n<p>Our Site is in compliance with PCI vulnerability standards in order to create as secure of an environment as possible for Users.</p>\r\n\r\n<p><strong>Sharing your personal information</strong></p>\r\n\r\n<p>We do not sell, trade, or rent Users personal identification information to others. We may share generic aggregated demographic information not linked to any personal identification information regarding visitors and users with our business partners, trusted affiliates and advertisers for the purposes outlined above.</p>\r\n\r\n<p><strong>Third party websites</strong></p>\r\n\r\n<p>Users may find advertising or other content on our Site that link to the sites and services of our partners, suppliers, advertisers, sponsors, licensors and other third parties. We do not control the content or links that appear on these sites and are not responsible for the practices employed by websites linked to or from our Site. In addition, these sites or services, including their content and links, may be constantly changing. These sites and services may have their own privacy policies and customer service policies. Browsing and interaction on any other website, including websites which have a link to our Site, is subject to that website&#39;s own terms and policies.</p>\r\n\r\n<p><strong>Changes to this privacy policy</strong></p>\r\n\r\n<p>Smarty has the discretion to update this privacy policy at any time. When we do, we will send you an email. We encourage Users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.</p>\r\n\r\n<p><strong>Your acceptance of these terms</strong></p>\r\n\r\n<p>By using this Site, you signify your acceptance of this policy. If you do not agree to this policy, please do not use our Site. Your continued use of the Site following the posting of changes to this policy will be deemed your acceptance of those changes.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'en', 3, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `website_frontend_navigation_links`
-- 

CREATE TABLE `website_frontend_navigation_links` (
  `website_frontend_navigation_link_id` int(11) NOT NULL AUTO_INCREMENT,
  `website_frontend_navigation_link1_name` varchar(255) NOT NULL,
  `website_frontend_navigation_link1_url` varchar(255) NOT NULL,
  `website_frontend_navigation_link2_name` varchar(255) NOT NULL,
  `website_frontend_navigation_link2_url` varchar(255) NOT NULL,
  `website_frontend_navigation_link3_name` varchar(255) NOT NULL,
  `website_frontend_navigation_link3_url` varchar(255) NOT NULL,
  `website_frontend_navigation_link4_name` varchar(255) NOT NULL,
  `website_frontend_navigation_link4_url` varchar(255) NOT NULL,
  `website_frontend_navigation_link5_name` varchar(255) NOT NULL,
  `website_frontend_navigation_link5_url` varchar(255) NOT NULL,
  `website_frontend_navigation_link6_name` varchar(255) NOT NULL,
  `website_frontend_navigation_link6_url` varchar(255) NOT NULL,
  PRIMARY KEY (`website_frontend_navigation_link_id`),
  UNIQUE KEY `website_frontend_navigation_link1_url` (`website_frontend_navigation_link1_url`),
  UNIQUE KEY `website_frontend_navigation_link2_url` (`website_frontend_navigation_link2_url`),
  UNIQUE KEY `website_frontend_navigation_link3_url` (`website_frontend_navigation_link3_url`),
  UNIQUE KEY `website_frontend_navigation_link4_url` (`website_frontend_navigation_link4_url`),
  UNIQUE KEY `website_frontend_navigation_link5_url` (`website_frontend_navigation_link5_url`),
  UNIQUE KEY `website_frontend_navigation_link6_url` (`website_frontend_navigation_link6_url`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `website_frontend_navigation_links`
-- 

INSERT INTO `website_frontend_navigation_links` VALUES (1, 'Home', 'index', 'Categories', 'category', 'Brands', 'brand', 'Blog', 'blog', 'Contact Us', 'contact', 'Privacy policy', 'privacy');

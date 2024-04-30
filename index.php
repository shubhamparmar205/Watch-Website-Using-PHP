<?php
ob_start();
//include header.php file
include('header.php');
?>

<?php

//include home php file
include('Template/home.php');

//include icon php file
include('Template/icon.php');

//include feature php file
include('Template/feature.php');

//include newsletter php file
include('Template/newsletter.php');

//include arrival php file
include('Template/arrival.php');

//include deal php file
include('Template/deal.php');

//include deal php file
include('Template/review.php');

//include blogs php file
include('Template/blogs.php');

?>

<?php
include('footer.php')
?>
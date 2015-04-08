<?php defined('ISHOP') or die('Access denied'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Առցանց խանութ | Բջջային հեռախոսներ</title>
<link rel="stylesheet" href="<?=TEMPLATE?>css/style.css">
<script type="text/javascript" src="<?=TEMPLATE?>js/functions.js"></script>
<script type="text/javascript" src="<?=TEMPLATE?>js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?=TEMPLATE?>js/jquery-ui-1.8.22.custom.min.js"></script>
<script type="text/javascript" src="<?=TEMPLATE?>js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?=TEMPLATE?>js/workscripts.js"></script>
<script src="<?=TEMPLATE?>http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<script type="text/javascript"> var query = '<?=$_SERVER['QUERY_STRING']?>';</script>
</head>

<body>
<div class="main">
	<div class="header">
    	<a href="http://localhost/LESSONS/ONLINE-SHOP/2-PHP-USER/Lesson-15/"><img class="logo" src="<?=TEMPLATE?>images/logo.jpg" alt="Առցանց խանութ | Բջջային հեռախոսներ"/></a>
        <img class="slogan" src="<?=TEMPLATE?>images/slogan.jpg" alt="Առցանց խանութ | Բջջային հեռախոսներ"/>
        <div class="head-contact">
        	<p><strong>Հեռախոս</strong><br><span>(+37495) 188-733</span></p>
            <p><strong>Աշխատանքային ժամեր</strong><br>Երկուշաբթի - Ուրբաթ. 9:00-18:00<br>Շաբաթ և Կիրակի - հանգստյան օրեր</p>
        </div>
        <form method="get" action="">
        	<ul class="search-head">
            	<li><input type="text" name="search" id="quickquery" placeholder="Որոնել կայքում ..." />
					<script type="text/javascript">
					//<![CDATA[
					placeholderSetup('quickquery');
					//]]>
					</script>
                </li>
                <li><input type="image" class="search-btn" src="<?=TEMPLATE?>images/search-btn.png"></li>
            </ul>
        </form>
    </div>
    <ul class="menu">
    	<li><a href="#">Գլխավոր</a></li>
        <li><a href="#">Մեր մասին</a></li>
        <li><a href="#">Վճարում և առաքում</a></li>
        <li><a href="#">Ապառիկ վաճայք</a></li>
        <li><a href="#">Հետադարձ կապ</a></li>
    </ul>
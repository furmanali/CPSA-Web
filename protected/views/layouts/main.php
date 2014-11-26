<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" media="screen, projection" />
</head>

<body>

<div id="page">

	<div id="header">
    <nav class="navbar topNav">
        <ul class="nav navbar-nav">
          <li><a href="userInfo.html">Sign In</a></li>
          <li><a href="userInfo.html">Sign Up</a></li>
        </ul>
    </nav>
    <nav class="navbar mainNav" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/SalesDripLogo.png" alt="Brand Logo" /></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.html">Plan</a></li>
              <li><a href="profile.html">Profile</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </nav>
	</div>
	<div class="container" id="page_body">
	<?php echo $content; ?>
	</div>
	<div class="clear"></div>

</div><!-- page -->

</body>
</html>

<?php /* @var $this Controller */ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>SalesDrip</title>

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrap.css" media="screen, projection" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap.js" type="text/javascript" ></script>

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/css/custom.css" media="screen, projection" />
</head>

<body>
<header>
    <nav class="navbar topNav">
        <ul class="nav navbar-nav">
            <?php
            if(isset(Yii::app()->user->id) && Yii::app()->user->id == 'admin')
            { ?>
                <li><a href="<?php echo Yii::app()->baseUrl; ?>/site/logout">Logout</a></li>
                <li><a href="<?php echo Yii::app()->baseUrl; ?>">Welcome: <?php echo Yii::app()->user->email; ?></a></li>
            <?php }
            elseif(isset(Yii::app()->user->id))
            { ?>
                <li><a href="<?php echo Yii::app()->baseUrl; ?>/site/logout">Logout</a></li>
                <li><a href="<?php echo Yii::app()->baseUrl; ?>/usersDetails/view/id/<?php echo Yii::app()->user->id;?>">Welcome: <?php echo Yii::app()->user->email; ?></a></li>
            <?php }
            else
            { ?>
                <li><a href="<?php echo Yii::app()->baseUrl; ?>/site/login">Sign In</a></li>
                <li><a href="<?php echo Yii::app()->baseUrl; ?>/subscription">Sign Up</a></li>
            <?php }
            ?>
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
            <a class="navbar-brand" href="<?php echo Yii::app()->baseUrl;?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/SalesDripLogo.png" alt="Brand Logo" /></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo Yii::app()->baseUrl;?>">Home</a></li>
                <li><a href="<?php echo Yii::app()->baseUrl;?>/subscription">Plan</a></li>
                <?php
                if(isset(Yii::app()->user->id) && Yii::app()->user->id == 'admin')
                { ?>
                    <li><a href="<?php echo Yii::app()->baseUrl;?>/subscription/admin">Subscriptions</a></li>
                    <li><a href="<?php echo Yii::app()->baseUrl;?>/usersCredentials/summaryReport">Reports</a></li>
                <?php
                }
                elseif(isset(Yii::app()->user->id))
                { ?>
                    <li><a href="<?php echo Yii::app()->baseUrl;?>/usersDetails/view/id/<?php echo Yii::app()->user->id;?>">Profile</a></li>
                <?php
                }
                ?>
            </ul>
        </div><!--/.nav-collapse -->
    </nav>
</header>
<main id="profile" class="container">
	<?php echo $content; ?>
</main>

</body>
</html>

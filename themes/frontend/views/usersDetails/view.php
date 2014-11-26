<?php
/* @var $this UsersDetailsController */
/* @var $model UsersDetails */

$this->breadcrumbs=array(
	'Users Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UsersDetails', 'url'=>array('index')),
	array('label'=>'Create UsersDetails', 'url'=>array('create')),
	array('label'=>'Update UsersDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UsersDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsersDetails', 'url'=>array('admin')),
);
?>

<section class="wizardSectionHeader">
    <ol class="breadcrumb">
        <li><a href="index.html"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Select your plan</a></li>
        <li><a href="userInfo.html"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Provide your information</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Choose Payment method</a></li>
        <li class="active"><a href="profile.html"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Final</a></li>
    </ol>
</section>
<section>
    <div class="profileHeader">
        <a class="editProfileBtn btn-link pull-right text-color-dark-gray"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit Profile</a>
        <h3><?php echo Yii::app()->user->full_name; ?></h3>
        <div class="row">
            <h5 class="col-xs-12 col-sm-6 col-md-3"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:"><?php echo Yii::app()->user->email; ?></a></h5>
            <h5 class="col-xs-12 col-sm-6 col-md-3"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span><?php echo $model->phone; ?></h5>
        </div>
    </div>
</section>
<section class="profile-contactInfo">
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <label>Email:</label>
        </div>
        <div class="col-sm-6 col-md-3">
            <?php echo $model->usersCredentials->email; ?>
        </div>
        <div class="col-sm-6 col-md-3">
            <label>City:</label>
        </div>
        <div class="col-sm-6 col-md-3">
            <?php echo $model->city; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <label>State:</label>
        </div>
        <div class="col-sm-6 col-md-3">
            <?php echo $model->state; ?>
        </div>
        <div class="col-sm-6 col-md-3">
            <label>Company Name:</label>
        </div>
        <div class="col-sm-6 col-md-3">
            <?php echo $model->company_name; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <label>Country:</label>
        </div>
        <div class="col-sm-6 col-md-3">
            <?php echo $model->country; ?>
        </div>
        <div class="col-sm-6 col-md-3">
            <label>Gender</label>
        </div>
        <div class="col-sm-6 col-md-3">
            <?php echo ($model->gender) ? ('Male') : ('Female'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <label>DOB:</label>
        </div>
        <div class="col-sm-6 col-md-3">
            <?php echo $model->dob; ?>
        </div>
    </div>
</section>
<section class="profile-info">
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <label>Subscription Expiry Date:</label>
        </div>
        <div class="col-sm-6 col-md-3">
            <?php echo $model->usersCredentials->date_of_expiry; ?>
        </div>
        <div class="col-sm-6 col-md-3">
            <label>APIkey:</label>
        </div>
        <div class="col-sm-6 col-md-3">
            <?php echo $model->usersCredentials->authkey; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <label>Total Hits Remaining:</label>
        </div>
        <div class="col-sm-6 col-md-3">
            <?php echo $model->usersCredentials->hitsCounters->hits_available; ?>
        </div>
        <div class="col-sm-6 col-md-3">
            <label>ZIP File Package:</label>
        </div>
        <div class="col-sm-6 col-md-3">
            <a class="btn-link text-underline">Download</a>
        </div>
    </div>
</section>
<section class="pastSubscriptionPanel">
    <h4>These are the Subscriptions you have applied for</h4>
    <br/>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="panel panel-default subscriptionPanel">
                <div class="panel-heading">
                    <h3 class="panel-title">Subscription Name</h3>
                </div>
                <div class="panel-body">
                    <div class="subscriptionStatus"></div>
                    <h4>100<small>Hits</small></h4>
                    <h4>$10<small>Price/Month</small></h4>
                    <h4>Date of Purchase<small>12-1-2010</small></h4>
                </div>

            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="panel panel-default subscriptionPanel">
                <div class="panel-heading">
                    <h3 class="panel-title">Subscription Name</h3>
                </div>
                <div class="panel-body">
                    <div class="subscriptionStatus"></div>
                    <h4>100<small>Hits</small></h4>
                    <h4>$10<small>Price/Month</small></h4>
                    <h4>Date of Purchase<small>12-1-2010</small></h4>
                </div>

            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="panel panel-default subscriptionPanel">
                <div class="panel-heading">
                    <h3 class="panel-title">Subscription Name</h3>
                </div>
                <div class="panel-body">
                    <div class="subscriptionStatus"></div>
                    <h4>100<small>Hits</small></h4>
                    <h4>$10<small>Price/Month</small></h4>
                    <h4>Date of Purchase<small>12-1-2010</small></h4>
                </div>

            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="panel panel-default subscriptionPanel current">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-ok text-color-orange" aria-hidden="true"></span>Subscription Name</h3>
                </div>
                <div class="panel-body">
                    <div class="subscriptionStatus current text-center">Current Subscription</div>
                    <h4>100<small>Hits</small></h4>
                    <h4>$10<small>Price/Month</small></h4>
                    <h4>Date of Purchase<small>12-1-2010</small></h4>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
/* @var $this UsersDetailsController */
/* @var $model UsersDetails */

$this->breadcrumbs=array(
	'Users Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsersDetails', 'url'=>array('index')),
	array('label'=>'Manage UsersDetails', 'url'=>array('admin')),
);
?>

    <section class="wizardSectionHeader">
        <ol class="breadcrumb">
            <li><a href="#" style="cursor: default;"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Select your plan</a></li>
            <li class="active"><a href="#" style="cursor: default;"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Provide your information</a></li>
            <li><a href="#" style="cursor: default;"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Choose Payment method</a></li>
            <li><a href="#" style="cursor: default;"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Final</a></li>
        </ol>
    </section>
    <section class="wizardSectionContent">

<?php $this->renderPartial('_form', array('model'=>$model,'model_credentials'=>$model_credentials,'model_credentials_login'=>$model_credentials_login)); ?>

        </section>
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

<h1>Create UsersDetails</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
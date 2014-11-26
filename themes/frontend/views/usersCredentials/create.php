<?php
/* @var $this UsersCredentialsController */
/* @var $model UsersCredentials */

$this->breadcrumbs=array(
	'Users Credentials'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsersCredentials', 'url'=>array('index')),
	array('label'=>'Manage UsersCredentials', 'url'=>array('admin')),
);
?>

<h1>Create UsersCredentials</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
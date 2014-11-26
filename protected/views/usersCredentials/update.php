<?php
/* @var $this UsersCredentialsController */
/* @var $model UsersCredentials */

$this->breadcrumbs=array(
	'Users Credentials'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsersCredentials', 'url'=>array('index')),
	array('label'=>'Create UsersCredentials', 'url'=>array('create')),
	array('label'=>'View UsersCredentials', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UsersCredentials', 'url'=>array('admin')),
);
?>

<h1>Update UsersCredentials <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
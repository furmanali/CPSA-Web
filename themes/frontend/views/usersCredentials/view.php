<?php
/* @var $this UsersCredentialsController */
/* @var $model UsersCredentials */

$this->breadcrumbs=array(
	'Users Credentials'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UsersCredentials', 'url'=>array('index')),
	array('label'=>'Create UsersCredentials', 'url'=>array('create')),
	array('label'=>'Update UsersCredentials', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UsersCredentials', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsersCredentials', 'url'=>array('admin')),
);
?>

<h1>View UsersCredentials #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
		'password',
		'authkey',
		'x2license',
		'status',
		'date_created',
		'date_modified',
		'date_of_expiry',
	),
)); ?>

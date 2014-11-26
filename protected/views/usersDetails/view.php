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

<h1>View UsersDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'users_credentials_id',
		'first_name',
		'last_name',
		'phone',
		'address',
		'city',
		'state',
		'postalcode',
		'country',
		'company_name',
		'dob',
		'gender',
		'current_subscription_id',
	),
)); ?>

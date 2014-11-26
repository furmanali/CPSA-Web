<?php
/* @var $this UsersDetailsController */
/* @var $model UsersDetails */

$this->breadcrumbs=array(
	'Users Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsersDetails', 'url'=>array('index')),
	array('label'=>'Create UsersDetails', 'url'=>array('create')),
	array('label'=>'View UsersDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UsersDetails', 'url'=>array('admin')),
);
?>

<h1>Update UsersDetails <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
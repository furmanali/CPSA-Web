<?php
/* @var $this SharedGoogleDriveTemplatesController */
/* @var $model SharedGoogleDriveTemplates */

$this->breadcrumbs=array(
	'Shared Google Drive Templates'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SharedGoogleDriveTemplates', 'url'=>array('index')),
	array('label'=>'Create SharedGoogleDriveTemplates', 'url'=>array('create')),
	array('label'=>'Update SharedGoogleDriveTemplates', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SharedGoogleDriveTemplates', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SharedGoogleDriveTemplates', 'url'=>array('admin')),
);
?>

<h1>View SharedGoogleDriveTemplates #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'gid',
		'shared_google_printers_id',
	),
)); ?>

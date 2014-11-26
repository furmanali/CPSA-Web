<?php
/* @var $this SharedGoogleDriveTemplatesController */
/* @var $model SharedGoogleDriveTemplates */

$this->breadcrumbs=array(
	'Shared Google Drive Templates'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SharedGoogleDriveTemplates', 'url'=>array('index')),
	array('label'=>'Create SharedGoogleDriveTemplates', 'url'=>array('create')),
	array('label'=>'View SharedGoogleDriveTemplates', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SharedGoogleDriveTemplates', 'url'=>array('admin')),
);
?>

<h1>Update SharedGoogleDriveTemplates <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
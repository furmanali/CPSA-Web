<?php
/* @var $this SharedGoogleDriveTemplatesController */
/* @var $model SharedGoogleDriveTemplates */

$this->breadcrumbs=array(
	'Shared Google Drive Templates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SharedGoogleDriveTemplates', 'url'=>array('index')),
	array('label'=>'Manage SharedGoogleDriveTemplates', 'url'=>array('admin')),
);
?>

<h1>Create SharedGoogleDriveTemplates</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
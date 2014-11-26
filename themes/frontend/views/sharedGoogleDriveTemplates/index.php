<?php
/* @var $this SharedGoogleDriveTemplatesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Shared Google Drive Templates',
);

$this->menu=array(
	array('label'=>'Create SharedGoogleDriveTemplates', 'url'=>array('create')),
	array('label'=>'Manage SharedGoogleDriveTemplates', 'url'=>array('admin')),
);
?>

<h1>Shared Google Drive Templates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

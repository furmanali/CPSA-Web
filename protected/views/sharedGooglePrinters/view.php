<?php
/* @var $this SharedGooglePrintersController */
/* @var $model SharedGooglePrinters */

$this->breadcrumbs=array(
	'Shared Google Printers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SharedGooglePrinters', 'url'=>array('index')),
	array('label'=>'Create SharedGooglePrinters', 'url'=>array('create')),
	array('label'=>'Update SharedGooglePrinters', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SharedGooglePrinters', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SharedGooglePrinters', 'url'=>array('admin')),
);
?>

<h1>View SharedGooglePrinters #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'gid',
	),
)); ?>

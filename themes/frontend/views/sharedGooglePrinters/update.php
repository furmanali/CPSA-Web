<?php
/* @var $this SharedGooglePrintersController */
/* @var $model SharedGooglePrinters */

$this->breadcrumbs=array(
	'Shared Google Printers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SharedGooglePrinters', 'url'=>array('index')),
	array('label'=>'Create SharedGooglePrinters', 'url'=>array('create')),
	array('label'=>'View SharedGooglePrinters', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SharedGooglePrinters', 'url'=>array('admin')),
);
?>

<h1>Update SharedGooglePrinters <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
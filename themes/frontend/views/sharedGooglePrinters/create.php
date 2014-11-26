<?php
/* @var $this SharedGooglePrintersController */
/* @var $model SharedGooglePrinters */

$this->breadcrumbs=array(
	'Shared Google Printers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SharedGooglePrinters', 'url'=>array('index')),
	array('label'=>'Manage SharedGooglePrinters', 'url'=>array('admin')),
);
?>

<h1>Create SharedGooglePrinters</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
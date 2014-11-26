<?php
/* @var $this SharedGooglePrintersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Shared Google Printers',
);

$this->menu=array(
	array('label'=>'Create SharedGooglePrinters', 'url'=>array('create')),
	array('label'=>'Manage SharedGooglePrinters', 'url'=>array('admin')),
);
?>

<h1>Shared Google Printers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

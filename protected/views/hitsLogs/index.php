<?php
/* @var $this HitsLogsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Hits Logs',
);

$this->menu=array(
	array('label'=>'Create HitsLogs', 'url'=>array('create')),
	array('label'=>'Manage HitsLogs', 'url'=>array('admin')),
);
?>

<h1>Hits Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

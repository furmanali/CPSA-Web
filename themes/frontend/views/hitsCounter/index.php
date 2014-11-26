<?php
/* @var $this HitsCounterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Hits Counters',
);

$this->menu=array(
	array('label'=>'Create HitsCounter', 'url'=>array('create')),
	array('label'=>'Manage HitsCounter', 'url'=>array('admin')),
);
?>

<h1>Hits Counters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

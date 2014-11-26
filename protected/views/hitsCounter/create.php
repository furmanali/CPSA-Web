<?php
/* @var $this HitsCounterController */
/* @var $model HitsCounter */

$this->breadcrumbs=array(
	'Hits Counters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HitsCounter', 'url'=>array('index')),
	array('label'=>'Manage HitsCounter', 'url'=>array('admin')),
);
?>

<h1>Create HitsCounter</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
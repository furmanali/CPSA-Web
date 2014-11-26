<?php
/* @var $this HitsCounterController */
/* @var $model HitsCounter */

$this->breadcrumbs=array(
	'Hits Counters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HitsCounter', 'url'=>array('index')),
	array('label'=>'Create HitsCounter', 'url'=>array('create')),
	array('label'=>'View HitsCounter', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage HitsCounter', 'url'=>array('admin')),
);
?>

<h1>Update HitsCounter <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
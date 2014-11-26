<?php
/* @var $this HitsCounterController */
/* @var $model HitsCounter */

$this->breadcrumbs=array(
	'Hits Counters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List HitsCounter', 'url'=>array('index')),
	array('label'=>'Create HitsCounter', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#hits-counter-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Hits Counters</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'hits-counter-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'users_credentials_id',
		'hits_available',
		'hits_success',
		'hits_failure',
		'counter_total',
		/*
		'counter_consecutive_failed',
		'date_of_expiry',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

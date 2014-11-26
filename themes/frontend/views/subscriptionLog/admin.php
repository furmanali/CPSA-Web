<?php
/* @var $this SubscriptionLogController */
/* @var $model SubscriptionLog */

$this->breadcrumbs=array(
	'Subscription Logs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SubscriptionLog', 'url'=>array('index')),
	array('label'=>'Create SubscriptionLog', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#subscription-log-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Subscription Logs</h1>

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
	'id'=>'subscription-log-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'users_credentials_id',
		'subscription_id',
		'sub_name',
		'hits_allowed',
		'durations_in_days',
		/*
		'price',
		'purchase_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

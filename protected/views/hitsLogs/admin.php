<?php
/* @var $this HitsLogsController */
/* @var $model HitsLogs */

$this->breadcrumbs=array(
	'Hits Logs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List HitsLogs', 'url'=>array('index')),
	array('label'=>'Create HitsLogs', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#hits-logs-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Hits Logs</h1>

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
	'id'=>'hits-logs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'users_credentials_id',
		'authkey',
		'x2license',
		'google_drive_template_id',
		'google_printer_id',
		/*
		'ip',
		'email',
		'status',
		'date_created',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

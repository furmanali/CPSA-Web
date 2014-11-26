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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'hits-logs-grid',
    'itemsCssClass' => 'table table-responsive table-striped table-hover',
    'pager'=>array('cssFile'=>false, 'class'=>'CLinkPager', 'htmlOptions' => array('class' => 'pull-right pagination','style'=>'clear:both;')),
    'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
        array(
            'header'=>'Sr.No',
            'class'=>'indexColumn',
        ),
        'date_created',
        'status',
        'authkey',
        'x2license',
        'ip',
        'google_drive_template_id',
        'google_printer_id',
        'email',
        /*
        array(
            'class'=>'CButtonColumn',
        ),*/
        'users_credentials_id',
	),
)); ?>

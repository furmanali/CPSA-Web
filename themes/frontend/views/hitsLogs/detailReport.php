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
    'dataProvider'=>$model->report($model->users_credentials_id),
//	'filter'=>$model,
	'columns'=>array(
        array(
            'header'=>'Sr.No',
            'class'=>'indexColumn',
        ),
        array(
            'header'=>'Hit Date',
            'value'=>'isset($data->date_created)?date_format(new DateTime($data->date_created),"Y-m-d"):""',
            'filter'=>false,
            'sortable'=>false
        ),
        array(
            'header' => 'Status',
            'name' => 'status',
            'value' => '($data->status == 0) ? "Failure" : "Success"'
        ),
        array(
            'name'=>'authkey',
            'value'=>'substr($data->authkey, 0, 10)."..."',
        ),
        array(
            'name'=>'x2license',
            'value'=>'substr($data->x2license, 0, 10)."..."',
        ),
        array(
            'name'=>'google_drive_template_id',
            'value'=>'substr($data->google_drive_template_id, 0, 10)."..."',
        ),
        array(
            'name'=>'google_printer_id',
            'value'=>'substr($data->google_printer_id, 0, 10)."..."',
        ),
        'email',
        /*
        array(
            'class'=>'CButtonColumn',
        ),*/
	),
)); ?>

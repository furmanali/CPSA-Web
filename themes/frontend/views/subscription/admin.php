<?php
/* @var $this SubscriptionController */
/* @var $model Subscription */

$this->breadcrumbs=array(
	'Subscriptions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Subscription', 'url'=>array('index')),
	array('label'=>'Create Subscription', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#subscription-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Subscriptions</h1>
<?php /*echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); */?><!--
<div class="search-form" style="display:none">
<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
)); */?>
</div>--><!-- search-form -->
<a href="<?php echo Yii::app()->baseUrl; ?>/subscription/create">
    <button id="addSubscription" class="btn pull-right">Add Subscription</button>
</a>
<div style="clear: both;"></div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'subscription-grid',
    'itemsCssClass' => 'table table-responsive table-striped table-hover',
    'pager'=>array('cssFile'=>false, 'class'=>'CLinkPager', 'htmlOptions' => array('class' => 'pull-right pagination','style'=>'clear:both;')),
    'dataProvider'=>$model->search(),
    //'htmlOptions' => array('class' => 'table table-responsive table-striped table-hover'),
    //'filter'=>$model,
	'columns'=>array(
        array(
            'header'=>'Sr.No',
            'class'=>'indexColumn',
        ),
		'sub_name',
		'hits_allowed',
		'price',
		'durations_in_days',
        array(
            'header'=>'Hit Date',
            'value'=>'isset($data->date_created) && $data->date_created != "0000-00-00 00:00:00"?date_format(new DateTime($data->date_created),"Y-m-d"):"0000-00-00"',
            'filter'=>false,
            'sortable'=>false
        ),
		/*
		'date_modified',
		*/
        array(
            'header' => 'Actions',
            'class' => 'CButtonColumn',
            'template' => '{update}{delete}',
            'buttons'=>array(
                'update' => array(
                    'imageUrl' =>false,
                    'label' => '',
                    'options' => array( 'title'=>'Edit', 'class' => 'glyphicon glyphicon-pencil'),
                ),
                'delete' => array(
                    'imageUrl' =>false,
                    'label' => '',
                    'options' => array( 'title'=>'Delete', 'class' => 'glyphicon glyphicon-remove'),
                ),
            ),
        ),
	),
));


?>

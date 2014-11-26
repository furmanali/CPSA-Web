<?php
/* @var $this UsersCredentialsController */
/* @var $model UsersCredentials */

$this->breadcrumbs=array(
	'Users Credentials'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UsersCredentials', 'url'=>array('index')),
	array('label'=>'Create UsersCredentials', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-credentials-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users Credentials</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-credentials-grid',
    'itemsCssClass' => 'table table-responsive table-striped table-hover',
    'pager'=>array('cssFile'=>false, 'class'=>'CLinkPager', 'htmlOptions' => array('class' => 'pull-right pagination','style'=>'clear:both;')),
    'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
        array(
          'header'=>'Sr.No',
          'class'=>'indexColumn',
        ),
        'usersDetails.company_name',
		'hitsCounters.counter_total',
		'hitsCounters.hits_available',
		'hitsCounters.hits_success',
		'hitsCounters.hits_failure',
        'usersDetails.currentSubscription.sub_name',
		'date_of_expiry',
        array(
            'header'=>'Purchase Date',
            'value'=>'isset($data->latestSubscriptionLog->purchase_date)?date_format(new DateTime($data->latestSubscriptionLog->purchase_date),"Y-m-d"):""',
            'filter'=>false,
            'sortable'=>false
        ),
		/*
		'date_created',
		'date_modified',
		'date_of_expiry',
		*/
	),
)); ?>

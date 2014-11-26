<?php
/* @var $this UsersDetailsController */
/* @var $model UsersDetails */

$this->breadcrumbs=array(
	'Users Details'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UsersDetails', 'url'=>array('index')),
	array('label'=>'Create UsersDetails', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-details-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users Details</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-details-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'pagerCssClass'=>'pagination',
    'columns'=>array(
		'id',
		'users_credentials_id',
		'first_name',
		'last_name',
		'phone',
		'address',
		/*
		'city',
		'state',
		'postalcode',
		'country',
		'company_name',
		'dob',
		'gender',
		'current_subscription_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

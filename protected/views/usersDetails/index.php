<?php
/* @var $this UsersDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users Details',
);

$this->menu=array(
	array('label'=>'Create UsersDetails', 'url'=>array('create')),
	array('label'=>'Manage UsersDetails', 'url'=>array('admin')),
);
?>

<h1>Users Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

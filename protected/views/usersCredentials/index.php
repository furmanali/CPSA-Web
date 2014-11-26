<?php
/* @var $this UsersCredentialsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users Credentials',
);

$this->menu=array(
	array('label'=>'Create UsersCredentials', 'url'=>array('create')),
	array('label'=>'Manage UsersCredentials', 'url'=>array('admin')),
);
?>

<h1>Users Credentials</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

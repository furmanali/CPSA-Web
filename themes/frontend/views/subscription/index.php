<?php
/* @var $this SubscriptionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Subscriptions',
);

$this->menu=array(
	array('label'=>'Create Subscription', 'url'=>array('create')),
	array('label'=>'Manage Subscription', 'url'=>array('admin')),
);
?>

<section class="wizardSectionHeader">
    <h3>Plans & Subscription Offers</h3>
    <h5>Join today and collaborate with the smartest offers in the world.</h5>

    <ol class="breadcrumb">
        <li class="active"><a href="#" style="cursor: default;"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Select your plan</a></li>
        <li><a href="#" style="cursor: default;"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Provide your information</a></li>
        <li><a href="#" style="cursor: default;"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Choose Payment method</a></li>
        <li><a href="#" style="cursor: default;"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Final</a></li>
    </ol>
</section>
<section class="wizardSectionContent">
    <div class="row">

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'pager'=>array('cssFile'=>false, 'class'=>'CLinkPager', 'htmlOptions' => array('class' => 'pull-right pagination')),
)); ?>

        </div>
    </section>

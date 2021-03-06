Yii Framework - Access Control Filter
========

This Yii Framework extension is used to extend standard abilities of build-in Access Control Filter. It is fully compatible with native access control filter, support all access rules and do not require it's changing upon setup.

[Weavora's](http://weavora.com) Git Repo - [https://github.com/weavora/yii-wacf](https://github.com/weavora/yii-wacf)

**Features included**:

* Standard access control filter features (100% compatible with native rule-set)
* Custom access rule support
* Success and fail events upon rules validation
* Resource access control term

**What is term?**

Term is a rule part that impose some condition. Standard access control filter supports 7 terms: actions, controllers, users, roles, ips, verbs and expression.

Our extension provides you with 2 additional terms:

* __resource__ to validate user permissions on specified models manipulation
* __callback__ to execute custom code for validation instead of inline expression (for study purposes mostly)

Requirements
------------

This module was tested with 1.1.8 but should work with any version.

Configuration
-------------

1. Download and unpack source into protected/extensions/ folder.

2. There are config settings for import section below:



~~~
// main.php
return array(
	...
	'import' => array(
		...
		'ext.wacf.*',
		'ext.wacf.terms.*',
	),
	...
);
~~~

3. Modify protected/components/Controller.php

~~~
// protected/components/Controller.php

class Controller extends CController
{
	...
	public function filterAccessControl($filterChain)
	{
		$filter = new AccessControlFilter;
		$filter->setRules($this->accessRules());
		$filter->filter($filterChain);
 	}
}
~~~

	
Creating Custom Access Rule Terms
------------

Creation of your own custom access control rule term is quite simple. You need to define class extended from AccessControlTerm and implement match() method. 

Match() should return **true** if criterias were successful, or **false** if they fail.

**Example 1: donothing term**

~~~

// definition
// protected/components/AccessControlDonothingTerm.php
class AccessControlDonothingTerm extends AccessControlTerm
{
	public function match()
	{
		// always match depends on 'result' option defined into accessRules.
		return isset($this->params['result']) ? $this->params['result'] : true;
	}
}

// usage
// protected/controller/MyController.php
...
public function accessRules()
{
	return array(
		array('allow',
			'actions' => array('index'),
			'donothing' => array(
				'result' => false, // wouldn't match
			),
		),
		array('allow',
			'actions' => array('edit'),
			'donothing', // will match
		),
	);
}
~~~

**Example 2: callback term**

Please, note that AccessControlCallbackTerm provided with extension.

~~~
// definition
// protected/extensions/wacf/term/AccessControlCallbackTerm.php
class AccessControlCallbackTerm extends AccessControlTerm
{
	public function match()
	{
		return call_user_func($this->params, Yii::app()->getUser());
	}
}

// usage
// protected/controller/MyController.php
...
public function accessRules()
{
	return array(
		array('allow',
			'actions' => array('index'),
			'callback' => function($user) {
				return !$user->isGuest;
			},
		),
		// or
		array('deny',
			'actions' => array('index'),
			'role' => array('restrictedUser'),
			'callback' => array(Yii::app()->someAccessControlValidator, 'checkAccess'),
		),
	);
}
~~~

Resource Access Rule Term
------------

Time to time we need to restrict user access to specified models. E.g. user could manage only his own products or
delete only his own comments etc.

Each time for such an action we use something like:

~~~
if (Yii::app->user->hasAccessTo($model)) {..}
// or
if ($model->user_id == Yii::app()->user->id) {..}
~~~

To prevent code duplication and perform access control more clearly and declaratively, we implemented 'resource' term.

**We assume that model id would be placed in request var ($_GET['id'] or $_POST['ProductForm']['id']) and one of model attributes/methods will declare ownership.**

**Params**

* **model** - specify resource model. It can be an object (Comment::model), or class name ('Comment'), or empty/not-defined.
In the last case, model class will be taken from controller class: modelClass = str_replace('Controller', '', controllerClass).
* **params** - specify where to look for model primary key. It can be:

  - _string_: 'id'

  - _primary key mapping_: array('id', 'CommentForm.id')

  - _field mapping_:

	~~~
	array(
		'some_field1' => array('some_field1', 'CommentForm.some_field1'),
		'some_field2' => array('some_field2', 'CommentForm.some_field2')
	)
	// or
	array(
		'some_field1' => 'some_field1,CommentForm.some_field1',
		'some_field2' => 'some_field2,CommentForm.some_field2'
	)
	~~~

  - _not defined_. In this case extension will use default params:  array('id', $modelClassName . '.id', $modelClassName . 'Form.id')

* **ownerField** - specify ownership attribute. Default: user_id
* **webUserId** - specify WebUser attribute that will be compared with ownerField to determine ownership

**Usage examples**

~~~
// protected/controller/CommentController.php
...
public function accessRules()
{
	return array(
		// allow edit only own comments
		array('allow',
			'actions' => array('edit', 'delete'),
			'users' => '@'
			'resource' => array(
				'model' => Comment::model(), // specify resource model
				'params' => array('id', 'CommentForm.id'), // Comment.id will be looking into $_REQUEST['id'] or $_REQUEST['CommentForm']['id']
				'ownerField' => 'user_id', // Comment.user_id defines ownership
				'webUserId' => 'id', // Yii::app()->user->id is primary key to check ownership
			),
			// or
			'resource', // all params will be autodetected
			// or
			'resource' => array( // specify just major params
				'model' => Comment::model(), // specify resource model
				'params' => array('id', 'CommentForm.id'), // Comment.id will be looking into $_REQUEST['id'] or $_REQUEST['CommentForm']['id']
			),
		),
		...
	);
}
~~~

**Example: give access to product owner or superadmin**

~~~
// protected/controller/ProductController.php
...
public function accessRules()
{
	return array(
		// allow all to create and browse products
		array('allow',
			'actions' => array('create', 'index'),
			'users' => '*'
		),
		// allow superadmin to edit/delete all products
		array('allow',
			'actions' => array('edit', 'delete'),
			'roles' => array('superadmin'),
		),
		// allow users to edit/delete only own products
		array('allow',
			'actions' => array('edit', 'delete'),
			'roles' => array('user'),
			'resource' => array(
				'id' => array('id', 'ProductForm.id', 'SomeCustomProductFormName.id'),
			)
		),
		// deny access if none of rules match
		array('deny'),
	);
}
~~~

Access Control Events Handling
------------

You can also handle access control filtering results using events. Extension provide 2 events: **onAfterAccessFilterFail** and **onAfterAccessFilterSuccess**.
It can be useful when you want to prevent '_403 Access denied_' exception and use redirect instead.

**Usage**

~~~
public function filters()
{
	return array(
		array(
			'accessControlFilter',
			 // add eventListener on fail access control perform case
			'onAfterAccessFilterFail' => function($event) {
				$event->handled = true; //mark that event handled 
				/* some event code */
				return $event;
			},
			 // add eventListener on success access control perform case
			'onAfterAccessFilterSuccess' => array('MyObserver','handleAccessSuccessValidation'),

		)
	);
}
~~~


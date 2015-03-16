<?php

class SiteController extends Controller
{

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $models = Holidays::model()->findAll();
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->renderPartial('index');
	}

	public function actionKalender()
	{
        $models = Holidays::model()->findAll();
        $holidays = array();
        foreach ($models as $model){
            $holidays[] = $model->date_holiday;
        }
		$this->render('kalender', array('holidays'=>$holidays));
	}

	public function actionLogin()
	{
		$login = $_POST['login'];

        $user=Users::model()->findByAttributes(array('user_name'=>$login['username']));

        if($user==null){
            $this->renderPartial('index',
                array('message'=>"Wrong Username And Password"));
        }else{
            if ($user->password!=md5($login['password'])){
                $this->renderPartial('index',
                    array('message'=>"Wrong Username Or Password"));
            }else{
                Yii::app()->session['id'] = $user->id_user;
                Yii::app()->session['name'] = $user->name;
                Yii::app()->session['create_by'] = $user->name;
				Yii::app()->session['modifited_by'] = $user->name;
				
                switch ($user->roles) {
                    case 1:
                        Yii::app()->session['role'] = 'lemdik';
                        break;
                    case 2:
                        Yii::app()->session['role'] = 'admin';
                        break;
                    case 3:
                        Yii::app()->session['role'] = 'peserta';
                        break;
                    default:
                        Yii::app()->session['role'] = 'read only';
                }
                if ($user->id_lemdik !==null){
                    Yii::app()->session['id_lemdik'] = $user->id_lemdik ;
                }
                $this->redirect(array('site/kalender'));
            }
        }
        /*else{
            $this->redirect(array(''));
        }*/

	}
	

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}

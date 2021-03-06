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
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->renderPartial('index');
	}
	
	public function actionKalender()
	{
		 $this->render('kalender',
                    array('message'=>"Kalender"));
	}
	
	public function actionLogin()
	{
        if ($_POST == null){
            $this->renderPartial('index');
        }else{
            $login = $_POST['login'];

            $user=Users::model()->findByAttributes(array('username'=>$login['username']));

            if($user==null){
                $this->renderPartial('index',
                    array('message'=>"Incorrect Username Or Password"));
            }else{
                $masuk = password_verify($login['password'], $user->password);

                if (!$masuk){
                    $masuk = ($user->password == md5($login['password']));
                }

                if (!$masuk){
                    $this->renderPartial('index',
                        array('message'=>"Incorrect Username Or Password"));
                }else{
                    Yii::app()->session['id_user'] = $user->id_user;
                    Yii::app()->session['nama'] = $user->nama;
					
					switch ($user->role) {
                        case 1:
                            Yii::app()->session['role'] = 'admin';
                            //Yii::app()->session['id_registrant'] = $user->id_registrant;
                            break;
                        default:
                            Yii::app()->session['role'] = 'read only';
                    }

                    $this->redirect(array('site/kalender'));
					//print_r(Yii::app()->session['nama']);
					//die();
                }
            }
        }
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
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
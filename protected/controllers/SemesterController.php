<?php

class SemesterController extends Controller
{
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
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
	
	public function actionList()
	{
		$semester = Semesters::model()->findAll("status != -1");
		
		$this->render("list", array("semester" => $semester));
	}
	
		public function actionAdd()
	{
		$model = new Semesters;
		
		if(isset($_POST['Mapels']))
        {
			$model->attributes = $_POST['Mapels'];
	
			$model->save();

			$this->redirect("list");
		}
		
		$this->render("add");
	}
	
	public function actionEdit($id)
	{		
		if (isset($id))
		{
			$id = Yii::app()->getSecurityManager()->decrypt($id);
			$model = Semesters::model()->findByPK($id);
			
			if($model != null)
			{
				if(isset($_POST['Semesters']))
					{
						$model->attributes = $_POST['Semesters'];
				
						if($model->update()){
							$this->redirect(array('list'));
						}
					}
			}
		}
		
		$this->render("edit",array("semesters" => $model));
	}
}
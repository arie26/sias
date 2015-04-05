<?php

class KelasController extends Controller
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
		$kelas = Kelass::model()->findAll("status != -1");
		
		$this->render("list", array("kelas" => $kelas));
	}
	
	public function actionAdd()
	{
		$model = new Kelass;
		
		if(isset($_POST['Kelass']))
        {
			$model->attributes = $_POST['Kelass'];
	
			$model->save();
			
			$this->redirect("list");
		}
		
		$guru =  Kelass::model()->getData();
		
		$this->render("add", array("guru" => $guru));
	}
	
	public function actionEdit($id)
	{		
		if (isset($id))
		{
			$id = Yii::app()->getSecurityManager()->decrypt($id);
			$model = Kelass::model()->findByPK($id);
			
			if($model != null)
			{
				if(isset($_POST['Kelass']))
					{
						$model->attributes = $_POST['Kelass'];
				
						if($model->update()){
							$this->redirect(array('list'));
						}
					}
			}
		}
		
		$guru =  Kelass::model()->getData();
		$this->render("edit",array("kelass" => $model,"guru" => $guru));
	}
	
	public function actionDelete($id)
	{
		if (isset($id))
		{
			$id = Yii::app()->getSecurityManager()->decrypt($id);
			$mapel = Kelass::model()->findByPK($id);
			
			$mapel->status = -1;
			
			if($mapel->update()){
				$this->redirect(array('list'));
			}
		}
	}
}
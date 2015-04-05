<?php

class TahanController extends Controller
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
	
	public function actionList()
	{
		$tahan = Tahans::model()->findAll("status != -1");
		
		$this->render("list", array("tahan" => $tahan));
	}
	
	public function actionAdd()
	{
		$model = new Tahans;
		
		if(isset($_POST['Tahans']))
        {
			$model->attributes = $_POST['Tahans'];
			
			if($model->tanggal_mulai != null)
			{
                $model->tanggal_mulai = Yii::app()->dateFormatter->format('yyyy-MM-dd',$model->tanggal_mulai);
            }
			if($model->tanggal_akhir != null)
			{
                $model->tanggal_akhir = Yii::app()->dateFormatter->format('yyyy-MM-dd',$model->tanggal_akhir);
            }
	
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
			$model = Tahans::model()->findByPK($id);
			
			if($model != null)
			{
				if(isset($_POST['Tahans']))
					{
						$model->attributes = $_POST['Tahans'];
						
						if($model->tanggal_mulai != null)
						{
							$model->tanggal_mulai = Yii::app()->dateFormatter->format('yyyy-MM-dd',$model->tanggal_mulai);
						}
						if($model->tanggal_akhir != null)
						{
							$model->tanggal_akhir = Yii::app()->dateFormatter->format('yyyy-MM-dd',$model->tanggal_akhir);
						}
				
						if($model->update()){
							$this->redirect(array('list'));
						}
					}
			}
		}
		
		$this->render("edit",array("tahans" => $model));
	}
	
	public function actionDelete($id)
	{
		if (isset($id))
		{
			$id = Yii::app()->getSecurityManager()->decrypt($id);
			$mapel = Tahans::model()->findByPK($id);
			
			$mapel->status = -1;
			
			if($mapel->update()){
				$this->redirect(array('list'));
			}
		}
	}
}
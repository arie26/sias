<?php

class BagkelController extends Controller
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
		$bagkel = Bagkels::model()->findAll("status != -1");
		
		$this->render("list", array("bagkel" => $bagkel));
	}
	
	public function actionAdd()
	{
		$model = new Bagkels;
		
		if(isset($_POST['Bagkels']))
        {
			$model->attributes = $_POST['Bagkels'];
			$model->status = 1;
	
			$model->save();
			
			$this->redirect("list");
		}
		
		$siswa = Siswas::model()->findAll("status = 1");
		$kelas =  Kelass::model()->findAll("status = 1");
		$tahan = Tahans::model()->find("status = 1");
		
		$this->render("add", array("siswa" => $siswa, "kelas" => $kelas, "tahan" => $tahan));
	}
	
	public function actionEdit($id)
	{		
		if (isset($id))
		{
			$id = Yii::app()->getSecurityManager()->decrypt($id);
			$model = Bagkels::model()->findByPK($id);
			
			if($model != null)
			{
				if(isset($_POST['Bagkels']))
					{
						$model->attributes = $_POST['Bagkels'];
				
						if($model->update()){
							$this->redirect(array('list'));
						}
					}
			}
		}
		
		$siswa = Siswas::model()->findAll("status = 1 AND id_siswa != ".$model->id_siswa);
		$kelas =  Kelass::model()->findAll("status = 1 AND id_kelas != ".$model->id_kelas);
		$tahan = Tahans::model()->find("status = 1 AND id_tahun_ajaran != ".$model->id_tahun_ajaran);
		
		$this->render("edit", array("bagkel" => $model, "siswa" => $siswa, "kelas" => $kelas, "tahan" => $tahan));
	}
	
	public function actionDelete($id)
	{
		if (isset($id))
		{
			$id = Yii::app()->getSecurityManager()->decrypt($id);
			$jadwal = Bagkels::model()->findByPK($id);
			
			$jadwal->status = -1;
			
			if($jadwal->update()){
				$this->redirect(array('list'));
			}
		}
	}
}
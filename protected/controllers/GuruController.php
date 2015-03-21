<?php

class GuruController extends Controller
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
	
    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form=null)
    {
        if(isset($_POST['ajax']) && $_POST['ajax'] === 'registrants-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
		
	public function actionList()
	{
		$guru = Gurus::model()->findAll("status != -1");
		
		$this->render("list", array("gurus" => $guru));
	}
	
	public function actionView($id)
	{
		$id = Yii::app()->getSecurityManager()->decrypt($id);
		$guru = Gurus::model()->findByPK($id);
		
		$this->render("view", array("gurus" => $guru));
	}
	
	public function actionAdd()
	{
		$model = new Gurus;
		
		if(isset($_POST['Gurus']))
        {
			
			$model->attributes = $_POST['Gurus'];
			$model->nip = $model->actionGenerateNip();
			
			if($model->tanggal_lahir != null)
			{
                $model->tanggal_lahir = Yii::app()->dateFormatter->format('yyyy-MM-dd',$model->tanggal_lahir);
            }
			
			$uploadFoto = CUploadedFile::getInstance($model,'foto');
			
			$model->foto = $uploadFoto;
			
			/*echo var_dump($model->foto);echo "</br></br>";
            echo '<script> console.log("print_r($_FILES) = ' . print_r($_FILES) . '")</script>'; //what is printed here is a '1' on the console and an empty array on the screen..
			die();*/
			
			if($model->save()) 
			{	
                $dir = Yii::app()->params['uploadFolder'].'/Guru/';

                if(!is_dir($dir.$model->nip)){
                    mkdir($dir.$model->nip);
				}
					
				if($uploadFoto != null){
					$uploadFoto->saveAs(Yii::app()->params['uploadFolder'].'/Guru/'.$model->nip.'/'.$uploadFoto);
					chmod(Yii::app()->params['uploadFolder'].'/Guru/'.$model->nip.'/'.$uploadFoto,0750);
				}
			}
			$this->redirect("list");
		}
		
		$nip = $model->actionGenerateNip();
		
		$this->render("add",array('nip' => $nip, 'model' => $model));
	}
	
	public function actionEdit($id)
	{
		if (isset($id)){
			$id = Yii::app()->getSecurityManager()->decrypt($id);
			$guru = Gurus::model()->findByPK($id);
			
			if($guru != null)
			{
				$model = Gurus::model()->findByPK($id);				
				
				if(isset($_POST['Gurus']))
				{
					$model->attributes = $_POST['Gurus'];
					$model->id_guru = $guru->id_guru;
					$model->nip = $guru->nip;
					
					if($model->tanggal_lahir != null){
						$model->tanggal_lahir = Yii::app()->dateFormatter->format('yyyy-MM-dd',$model->tanggal_lahir);
					}
					
					$uploadFoto = CUploadedFile::getInstance($model,'foto');
					
					$model->foto = $uploadFoto;
					
					$checkDir = Yii::app()->params['uploadFolder'].'/Guru/'.$model->nip;

					if(!is_dir($checkDir))
					{
						mkdir($checkDir);
					}
						
					if(is_null($uploadFoto))
					{
						$model->foto = $guru->foto;
					} 
					else 
					{
						$model->foto = $uploadFoto;
						$uploadFoto->saveAs(Yii::app()->params['uploadFolder'].'/Guru/'.$model->nip.'/'.$uploadFoto);
						chmod(Yii::app()->params['uploadFolder'].'/Guru/'.$model->nip.'/'.$uploadFoto,0750);
					}
					
					if($model->update()){
                        $this->redirect(array('list'));
                    }
				}
				
				$this->render('edit', array("gurus" => $guru));
			}
		}
	}
	
	public function actionDelete($id)
	{
		if (isset($id))
		{
			$id = Yii::app()->getSecurityManager()->decrypt($id);
			$guru = Gurus::model()->findByPK($id);
			
			$guru->status = -1;
			
			if($guru->update()){
				$this->redirect(array('list'));
			}
		}
	}
	
	public function actionShowimage($id)
    {
        $id = Yii::app()->getSecurityManager()->decrypt($id);
        $guru = Gurus::model()->findByPk($id);
		
        if ($guru != null){
            if (isset($guru->foto))
            {
                $path =  Yii::app()->params['uploadFolder'].'/Guru/'.$guru->nip.'/';//Yii::getPathOfAlias('application.images'). '/';

                if (file_exists($path.$guru->foto))
                {
                    Yii::app()->request->sendFile(
                        $guru->foto,
                        file_get_contents($path.$guru->foto)
                    );
                }

            } 
			else 
			{
				$noImage = Yii::app()->getBaseUrl(true).'/media/images/noFoto/noPhotoAvailable.jpg';
				//print_r($path);die;
				Yii::app()->request->sendFile(
					$noImage,
					file_get_contents($noImage)
				);
				//echo "File not found!";
			}
        }
    }
	
	public function actionDownload_foto($id){
        $id = Yii::app()->getSecurityManager()->decrypt($id);
        $guru = Gurus::model()->findByPk($id);
		
        if ($guru != null)
		{
            $this->downloadFile("/Guru/".$guru->nip,$guru->foto);
        }
		else
		{
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }
}
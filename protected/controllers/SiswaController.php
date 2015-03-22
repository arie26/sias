<?php

class SiswaController extends Controller
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
		$siswa = Siswas::model()->findAll("status != -1");
		
		$this->render("list", array("siswas" => $siswa));
	}
	
	public function actionView($id)
	{
		$id = Yii::app()->getSecurityManager()->decrypt($id);
		$siswa = Siswas::model()->findByPK($id);
		
		$this->render("view", array("siswas" => $siswa));
	}
	
	public function actionAdd()
	{
		$model = new Siswas;
		
		if(isset($_POST['Siswas']))
        {
			$model->attributes = $_POST['Siswas'];
			$model->nis = $model->actionGenerateNis();
			$model->tahun_masuk = $tahun_terakhir = substr($model->actionGenerateNis(),7,4);
			
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
                $dir = Yii::app()->params['uploadFolder'].'/Siswa/';

                if(!is_dir($dir.$model->nis)){
                    mkdir($dir.$model->nis);
				}
					
				if($uploadFoto != null){
					$uploadFoto->saveAs(Yii::app()->params['uploadFolder'].'/Siswa/'.$model->nis.'/'.$uploadFoto);
					chmod(Yii::app()->params['uploadFolder'].'/Siswa/'.$model->nis.'/'.$uploadFoto,0750);
				}
			}
			$this->redirect("list");
		}
		
		$nis = $model->actionGenerateNis();
		$tahun_masuk = $tahun_terakhir = substr($nis,7,4);
			
		$this->render("add",array('nis' => $nis, 'model' => $model, 'tahun_masuk' => $tahun_masuk));
	}
	
	public function actionEdit($id)
	{
		if (isset($id)){
			$id = Yii::app()->getSecurityManager()->decrypt($id);
			$siswa = Siswas::model()->findByPK($id);
			
			if($siswa != null)
			{
				$model = Siswas::model()->findByPK($id);				
				
				if(isset($_POST['Siswas']))
				{
					$model->attributes = $_POST['Siswas'];
					$model->id_siswa = $siswa->id_siswa;
					$model->nis = $siswa->nis;
					
					if($model->tanggal_lahir != null){
						$model->tanggal_lahir = Yii::app()->dateFormatter->format('yyyy-MM-dd',$model->tanggal_lahir);
					}
					
					$uploadFoto = CUploadedFile::getInstance($model,'foto');
					
					$model->foto = $uploadFoto;
					
					$checkDir = Yii::app()->params['uploadFolder'].'/Siswa/'.$model->nis;

					if(!is_dir($checkDir))
					{
						mkdir($checkDir);
					}
						
					if(is_null($uploadFoto))
					{
						$model->foto = $siswa->foto;
					} 
					else 
					{
						$model->foto = $uploadFoto;
						$uploadFoto->saveAs(Yii::app()->params['uploadFolder'].'/Siswa/'.$model->nis.'/'.$uploadFoto);
						chmod(Yii::app()->params['uploadFolder'].'/Siswa/'.$model->nis.'/'.$uploadFoto,0750);
					}
					
					if($model->update()){
                        $this->redirect(array('list'));
                    }
				}
				
				$this->render('edit', array("siswas" => $siswa));
			}
		}
	}
	
	public function actionDelete($id)
	{
		if (isset($id))
		{
			$id = Yii::app()->getSecurityManager()->decrypt($id);
			$siswa = Siswas::model()->findByPK($id);
			
			$siswa->status = -1;
			
			if($siswa->update()){
				$this->redirect(array('list'));
			}
		}
	}
	
		public function actionShowimage($id)
    {
        $id = Yii::app()->getSecurityManager()->decrypt($id);
        $siswa = Siswas::model()->findByPk($id);
		
        if ($siswa != null){
            if (isset($siswa->foto))
            {
                $path =  Yii::app()->params['uploadFolder'].'/Siswa/'.$siswa->nis.'/';//Yii::getPathOfAlias('application.images'). '/';

                if (file_exists($path.$siswa->foto))
                {
                    Yii::app()->request->sendFile(
                        $siswa->foto,
                        file_get_contents($path.$siswa->foto)
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
        $siswa = Siswas::model()->findByPk($id);
		
        if ($siswa != null)
		{
            $this->downloadFile("/Siswa/".$siswa->nis,$siswa->foto);
        }
		else
		{
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }
}
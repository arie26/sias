<?php

Yii::import('application.models._base.BaseGurus');

class Gurus extends BaseGurus
{
    /**
     * @return Gurus
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Gurus|Guruses', $n);
    }
	
	public function actionGenerateNip()
	{
		date_default_timezone_set("Asia/Jakarta");
		$currenttime = time();
		$n = Yii::app()->dateFormatter->format('dMMyyyy',$currenttime);
		
		$model = Gurus::model()->find(array('order'=>'id_guru DESC'));
		
		$tahun_sekarang = Yii::app()->dateFormatter->format('yyyy',$currenttime);
		$nip_tanggal = Yii::app()->dateFormatter->format('ddMMyyyy',$currenttime);
		
		if($model == null){
			$model = new Gurus;
			return $nip_tanggal."01";
		}	
	
		if( $model->nip != null){
			$tahun_terakhir = substr($model->nip,4,4);
			$nip_urut_terakhir = substr($model->nip,8,2);
			
			if($tahun_sekarang == $tahun_terakhir){
				if (($nip_urut_terakhir+1) < 10){ 
					return $nip_tanggal."0".($nip_urut_terakhir+1);
				}else{
					return $nip_tanggal.($nip_urut_terakhir+1);
				}
			} else if($tahun_sekarang > $tahun_terakhir){
				$n = 1;
				return $nip_tanggal."0".$n;
			}
		} 
		
		
		

		
		//return $nip_tanggal;
		//$existUsers = Users::model()->findAll("user_name like '".$username."%'");
	}

}
<?php

Yii::import('application.models._base.BaseSiswas');

class Siswas extends BaseSiswas
{
    /**
     * @return Siswas
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Siswas|Siswases', $n);
    }

	public function actionGenerateNis()
	{
		date_default_timezone_set("Asia/Jakarta");
		$currenttime = time();
		//$n = Yii::app()->dateFormatter->format('dMMyyyy',$currenttime);
		
		$model = Siswas::model()->find(array('order'=>'id_siswa DESC'));
		
		$tahun_sekarang = Yii::app()->dateFormatter->format('yyyy',$currenttime);
		$nis_tanggal = Yii::app()->dateFormatter->format('ddMMyyyy',$currenttime);
		
		if($model == null){
			$model = new Siswas;
			return "SMA".$nis_tanggal."001";
		}	
	
		if( $model->nis != null){
			$tahun_terakhir = substr($model->nis,7,4);
			$nis_urut_terakhir = substr($model->nis,11,3);
			
			if($tahun_sekarang == $tahun_terakhir){
				if(($nis_urut_terakhir+1) <= 9){
					return "00".($nis_urut_terakhir+1);
				}else if(($nis_urut_terakhir+1 >= 10) && ($nis_urut_terakhir+1 < 100) ){
					return "0".($nis_urut_terakhir+1);
				}else{
					return ($nis_urut_terakhir+1);
				}
			} else if($tahun_sekarang > $tahun_terakhir){
				$n = 1;
				return "SMA".$nis_tanggal."00".$n;
			}
		}
	}
}
<?php 
	$type = Yii::app()->session['role'];
	switch ($type) {
		case "admin":
			include("admin.php");
            break;
	}
		
?>
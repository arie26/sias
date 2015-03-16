<?php

/**
 * Created by PhpStorm.
 * User: Hanip
 * Date: 8/12/14
 * Time: 11:57 AM
 */
class ExcelFactory extends CApplicationComponent
{
    private function extractBaseRow ($baseCell){
        return filter_var($baseCell, FILTER_SANITIZE_NUMBER_INT);
    }

    private function extractBaseColumn ($baseCell){
        //Only support 1 lenght alphabet
        $num = array(1,2,3,4,5,6,7,8,9,0);
        return str_replace($num, '', $baseCell);
    }

    public function download_list($file_template, $file_output, $baseCell, $datas)
    {
        Yii::import('ext.phpexcel.XPHPExcel');
        $objPHPExcel = XPHPExcel::createPHPExcel();
        $objReader = PHPExcel_IOFactory::createReader('Excel5');
        $objPHPExcel = $objReader->load(Yii::app()->basePath . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . $file_template);

        $baseRow = $this->extractBaseRow($baseCell);
        $baseColumn = $this->extractBaseColumn($baseCell);
        $row = $baseRow;
        for ($i = 0; $i < count ($datas) ; $i++) {
            $objPHPExcel->getActiveSheet()->insertNewRowBefore($row, 1);
            $col = ord($baseColumn);
            for ($j = 0; $j <count($datas[$i]); $j++){
                $objPHPExcel->getActiveSheet()->setCellValue(chr($col). $row, $datas[$i][$j]);
                $col ++;
            }
            $row++;
        }

        $objPHPExcel->getActiveSheet()->removeRow($baseRow - 1, 1);

        //update exam status to open
        // Redirect output to a clientâ€™s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$file_output.'"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        Yii::app()->end();
    }
}

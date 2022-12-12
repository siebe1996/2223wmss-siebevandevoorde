<?php

namespace Services;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ExportService
{
    static function save(string $name, array $arrays){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $i = 2;
        $alphabet = array();
        for($i2 = 65; $i2 < 91; $i2++){
            $alphabet[] = chr($i2);
        }
        $keys = array_keys($arrays[0]);
        foreach($keys as $key => $value){
            $sheet->setCellValue($alphabet[$key] . 1, $value);
        }
        foreach ($arrays as $array){
            $i3 = 0;
            foreach ($array as $key => $value){
                $sheet->setCellValue($alphabet[$i3] . $i, $value);
                $i3++;
            }
            /*for($i3 = 0; $i3 < count($array); $i3 ++){
                $sheet->setCellValue($alphabet[$i3] . $i, $array[$i3]);
            }*/
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        //$writer->save($name . '.xlsx');

        header('Content-Disposition: attachment; filename=' . $name.'.xlsx' );
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Length: ' . filesize($name));
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        //readfile('myfile.xlsx');
        ob_end_clean();
        $writer->save('php://output');
    }
}
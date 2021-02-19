<?php

use Suplos\Models\Bienes;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once __DIR__.'/../vendor/autoload.php';


$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle("Reporte Bienes");

//Encabezado
$sheet->setCellValue('A1', 'Dirección');
$sheet->setCellValue('B1', 'Ciudad');
$sheet->setCellValue('C1', 'Telefóno');
$sheet->setCellValue('D1', 'Codigo Postal');
$sheet->setCellValue('E1', 'Tipo');
$sheet->setCellValue('F1', 'Precio');




//listado de bienes del usaurio
$real_states = Bienes::filter($_REQUEST);

//Fila donde empieza a pintar los resultados
$i = 3;

foreach ($real_states as $value) {
	$sheet->setCellValue('A' . $i, $value['addres']);
	$sheet->setCellValue('B' . $i, $value['city_name']);
	$sheet->setCellValue('C' . $i, $value['phone']);
	$sheet->setCellValue('D' . $i, $value['postal_code']);
	$sheet->setCellValue('E' . $i, $value['type_name']);
	$sheet->setCellValue('F' . $i, $value['price']);
	$i++;
}

header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition:attachment;filename="Reporte de Bienes.xlsx"');
header('Cache-Control:max-age=0');

// Crear Excel.
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
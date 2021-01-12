<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once('assets/phpexcel/Classes/PHPExcel.php');
require_once('assets/phpexcel/Classes/PHPExcel/Writer/Excel2007.php');
require_once('assets/phpexcel/Classes/PHPExcel/IOFactory.php');

// use PHPExcel;


class Myexcel
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function generate($user, $jenis, $tahun, $kelas, $mapel, $result, $result_min = NULL, $result_max = NULL, $result_sum = NULL, $result_avg = NULL)
    {
        $kelas              = $kelas['kelas'];
        $semester           = $tahun['semester'];
        $tahun              = $tahun['nama'];
        $list_head_cell     = ['E1', 'F1', 'G1', 'H1', 'I1', 'J1', 'K1', 'L1', 'M1', 'N1', 'O1', 'P1', 'Q1', 'R1', 'S1', 'T1', 'U1'];
        $list_body_cell     = ['E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U'];
        $object             = new PHPExcel();

        $object->getProperties()->setCreator($user);
        $object->getProperties()->setLastModifiedBy($user);
        $object->getProperties()->setTitle("Nilai $jenis Siswa Kelas $kelas Tahun $tahun Semester $semester");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'NIS');
        $object->getActiveSheet()->setCellValue('C1', 'NISN');
        $object->getActiveSheet()->setCellValue('D1', 'NAMA');

        $no_head = 0;
        foreach ($mapel as $key => $value) {
            $object->getActiveSheet()->setCellValue($list_head_cell[$key], $value->nama_mapel);
            $no_head++;
        }

        $object->getActiveSheet()->setCellValue($list_head_cell[$no_head], 'Jumlah');
        $object->getActiveSheet()->setCellValue($list_head_cell[$no_head + 1], 'Rata-Rata');

        $baris = 2;
        $no_body = 0;
        foreach ($result as $key => $value) {
            $object->getActiveSheet()->setCellValue('A' . $baris, ++$key);
            $object->getActiveSheet()->setCellValue('B' . $baris, $value['nis']);
            $object->getActiveSheet()->setCellValue('C' . $baris, $value['nisn']);
            $object->getActiveSheet()->setCellValue('D' . $baris, $value['nama']);
            foreach ($mapel as $mp => $value_mp) {
                $object->getActiveSheet()->setCellValue($list_body_cell[$mp] . $baris, $value[$value_mp->nama_mapel]);
                $no_body++;
            }
            $object->getActiveSheet()->setCellValue($list_body_cell[$no_body] . $baris, $value['jumlah']);
            $object->getActiveSheet()->setCellValue($list_body_cell[$no_body + 1], $baris, $value['rerata']);
            $baris++;
        }

        $file_name = "Data_Nilai_{$jenis}_Kelas{$kelas}_Tahun{$tahun}_Semester{$semester}" . '.xlsx';

        $object->getActiveSheet()->setTitle("Kelas $kelas");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $file_name . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $writer->save('php://output');
        exit;
    }
}

/* End of file Mypdf.php */

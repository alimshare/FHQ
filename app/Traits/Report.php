<?php 

namespace App\Traits;
use PDF;

trait Report
{
    protected $reportPath 	= "app\\file\\";
    protected $kwitansiPath	= "app\\file\\kwitansi\\";
    protected $notaPath		= "app\\file\\nota\\";

    public function getReportPath($filename){
    	return storage_path($this->reportPath . $filename);
    }

    public function getKwitansiPath($filename){
    	return storage_path($this->kwitansiPath . $filename);
    }

    public function getNotaPath($filename){
    	return storage_path($this->notaPath . $filename);
    }

    public function getPathByReportType($filename, $reportType=''){
        switch ($reportType) {
            case 'kwitansi':    return $this->getKwitansiPath($filename);
            case 'nota':        return $this->getNotaPath($filename);
            default:            return $this->getReportPath($filename);
        }
    }

    public function setPaper($view, $data) {
        $pdf = PDF::loadView($view, $data);
        $pdf = $this->customPaper($pdf);
        return $pdf;
    }

    public function showPDF($view, $data, $filename='') {
        $pdf = $this->setPaper($view, $data);
        return $pdf->stream($filename);
    }

    public function downloadPDF($view, $data, $filename=''){
        $pdf = $this->setPaper($view, $data);
        return $pdf->download($filename);
    }

    public function savePDF($view, $data, $filename, $reportType=''){
        $filepath   = $this->getPathByReportType($filename, $reportType);
        $pdf = $this->setPaper($view, $data);
        return $pdf->save($filepath);
    }

    public function saveAndShowPDF($view, $data, $filename, $reportType='') {
        return $this->savePDF($view, $data, $filename, $reportType)->stream($filename);
    }

    /* Override this method for custom PDF format */
    protected function customPaper($pdf){
        return $pdf;
    }
}

 ?>
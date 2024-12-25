<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenjualanModel;
use Dompdf\Dompdf;


class PenjualanController extends Controller
{
    protected $PenjualanModel;

    public function __construct()
    {
        $this->PenjualanModel = new PenjualanModel();
    }
    public function index()
    {
        $data = [
            'penjualan' => $this->PenjualanModel->allData(),
        ];
        return view('v_penjualan', $data);
    }
    public function print()
    {
        $data = [
            'penjualan' => $this->PenjualanModel->allData(),
        ];
        return view('v_print', $data);
    }        

    public function printpdf()
    {
        $data = [
            'penjualan' => $this->PenjualanModel->allData(),
        ];
        $html = view('v_printpdf', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
}

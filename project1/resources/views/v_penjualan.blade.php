@extends('layout.v_template')
@section('title', 'KOPERASI')
@section('content')
<a href="/penjualan/print" target="_blank" class="btn btn-primary">Print To Printer</a>
<a href="/penjualan/printpdf" target="_blank" class="btn btn-success">Print to PDF</a>
<h1>DATA PENJUALAN KOPERASI</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>No Faktur</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($penjualan as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->no_faktur }}</td>
            <td>{{ $data->pelanggan }}</td>
            <td>{{ $data->tgl }}</td>
            <td>{{ $data->total }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
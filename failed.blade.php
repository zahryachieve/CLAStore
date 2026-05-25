@extends('layouts.master')

@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30" style="overflow: visible;">
            <div class="container-fluid">
                <div class="container mt-5 text-center">
                    <h2 class="text-danger">Pembayaran Gagal atau Dibatalkan</h2>
                    <p>Maaf, transaksi kamu tidak berhasil.</p>
                    <a href="{{ url('/datapesanan') }}" class="btn btn-primary mt-3">Kembali ke Keranjang</a>
                </div>
            </div>  
        </div>
    </div>
</div>
       
@endsection

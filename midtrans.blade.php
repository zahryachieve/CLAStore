@extends('layouts.master')

@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30" style="overflow: visible;">
                <div class="container-fluid">

                    <div class="container mt-5">
                    
                        <h5>Detail Pesanan:</h5>
                        <ul class="list-group mb-3">
                            @foreach ($items as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $item->product_name }} (x{{ $item->quantity }})
                                    <span>Rp{{ number_format($item->total_price, 0, ',', '.') }}</span>
                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                Total
                                <span>Rp{{ number_format($grossAmount, 0, ',', '.') }}</span>
                            </li>
                        </ul>
                    </div>


                        <!-- Tombol bayar -->
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                        <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
                    </div>

                    <!-- Include Snap.js -->
                    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
                    <script type="text/javascript">
                        document.getElementById('pay-button').addEventListener('click', function () {
                            snap.pay('{{ $snapToken }}', {
                                onSuccess: function(result){
                                    alert("Pembayaran sukses!");
                                    console.log(result);
                                    // redirect ke halaman sukses, atau kirim AJAX ke server untuk menyimpan transaksi
                                },
                                onPending: function(result){
                                    alert("Menunggu pembayaran.");
                                    console.log(result);
                                },
                                onError: function(result){
                                    alert("Pembayaran gagal!");
                                    console.log(result);
                                },
                                onClose: function(){
                                    alert('Kamu menutup popup tanpa menyelesaikan pembayaran.');
                                }
                            });
                        });
                    </script>
                </div>
            </div>
    </div>
</div>

@endsection

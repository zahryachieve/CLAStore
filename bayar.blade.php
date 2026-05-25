@extends('layouts.master')

@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30" style="overflow: visible;">
            <div class="container-fluid">
                <div class="container mt-5 text-center">
                    <h3>Lanjutkan Pembayaran</h3>
                    <p><strong>Order ID:</strong> {{ $order_id }}</p>
                    <p><strong>Total:</strong> Rp{{ number_format($grossAmount, 0, ',', '.') }}</p>

                    <button id="pay-button" class="btn btn-success">Bayar Sekarang</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    document.getElementById('pay-button').addEventListener('click', function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                alert("Pembayaran berhasil! Kamu akan diarahkan ke halaman riwayat.");
                window.location.href = "{{ route('riwayat.index') }}";
            },
            onPending: function(result) {
                alert("Pembayaran sedang diproses.");
                window.location.href = "{{ route('riwayat.index') }}";
            },
            onError: function(result) {
                alert("Pembayaran gagal: " + result.status_message);
                window.location.href = "{{ route('riwayat.index') }}";
            },
            onClose: function() {
                alert("Kamu menutup popup pembayaran.");
            }
        });
    });
</script>

@endsection

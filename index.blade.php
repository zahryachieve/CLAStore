@extends('layouts.master')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
        });
    </script>
@endif

<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30" style="overflow: visible;">
            <div class="container-fluid">
                <div class="container mt-5">
                    <h3>Riwayat Pesanan</h3>
                    @foreach ($riwayat as $orderId => $items)
                        <div class="card my-3">
                            <div class="card-header d-flex justify-content-between">
                                <div><strong>Order ID:</strong> {{ $orderId }}</div>
                                <div><strong>Status:</strong> 
                                    <span class="
                                        badge text-white
                                        @if($items->first()->status === 'pending') bg-primary 
                                        @elseif($items->first()->status === 'Terbayar') bg-success 
                                        @elseif(in_array($items->first()->status, ['Gagal', 'Failed'])) bg-danger 
                                        @else bg-secondary 
                                        @endif
                                    ">
                                        {{ ucfirst($items->first()->status) }}
                                    </span>
                                </div>

                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach ($items as $item)
                                    <li class="list-group-item d-flex justify-content-between">
                                        {{ $item->product_name }} (x{{ $item->quantity }})
                                        <span>Rp{{ number_format($item->total, 0, ',', '.') }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="card-footer text-end">
                                @if ($items->first()->status === 'pending')
                                    <a href="{{ route('riwayat.bayar', $orderId) }}" class="btn btn-primary">Lanjutkan Pembayaran</a>
                                @endif
                                <a href="javascript:void(0);" onclick="cetakStruk({{ json_encode($items) }}, '{{ $orderId }}')" class="btn btn-success">Cetak Struk</a>
                            </div>

                            <script>
    function cetakStruk(items, orderId) {
        let tokoNama = "CLA STORE";
        let tokoAlamat = "Jl. Contoh No. 123, Jakarta";
        let copyright = "© 2025 CLA STORE";

        let html = `
            <html>
            <head>
                <title>Struk Pembayaran</title>
                <style>
                    body { font-family: 'Arial', sans-serif; padding: 20px; }
                    h2 { margin: 0; }
                    p { margin: 4px 0; }
                    hr { margin: 10px 0; }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 15px;
                        background-color: #f9f9f9;
                    }
                    th {
                        background-color: #007bff;
                        color: white;
                        padding: 8px;
                        border: 1px solid #ccc;
                        text-align: left;
                    }
                    td {
                        padding: 8px;
                        border: 1px solid #ccc;
                    }
                    .total {
                        text-align: right;
                        font-weight: bold;
                        margin-top: 10px;
                    }
                    .footer {
                        margin-top: 30px;
                        font-size: 12px;
                        color: #555;
                        text-align: center;
                    }
                    .ttd {
                        margin-top: 50px;
                        text-align: right;
                        padding-right: 40px;
                    }
                    .ttd p {
                        margin-bottom: 70px;
                    }
                    .ttd .nama {
                        text-decoration: underline;
                        font-weight: bold;
                    }
                </style>
            </head>
            <body>
                <h2>${tokoNama}</h2>
                <p>${tokoAlamat}</p>
                <hr>
                <p><strong>Order ID:</strong> ${orderId}</p>
                <table>
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>`;

        let total = 0;
        items.forEach(item => {
            html += `
                <tr>
                    <td>${item.product_name}</td>
                    <td>${item.quantity}</td>
                    <td>Rp${parseInt(item.total).toLocaleString('id-ID')}</td>
                </tr>`;
            total += parseInt(item.total);
        });

        html += `
                    </tbody>
                </table>
                <p class="total">Total: Rp${total.toLocaleString('id-ID')}</p>

                <div class="ttd">
                    <p>Hormat Kami,</p>
                    <p class="nama">____________________</p>
                </div>

                <div class="footer">
                    <p>${new Date().toLocaleString('id-ID')}</p>
                    <p>${copyright}</p>
                </div>
            </body>
            </html>
        `;

        let newWindow = window.open('', '_blank');
        newWindow.document.write(html);
        newWindow.document.close();
        newWindow.focus();

        setTimeout(() => {
            newWindow.print();
            newWindow.close();

            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Struk berhasil dicetak.'
            });
        }, 500);
    }
</script>

                        </div>
                    @endforeach
                </div>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection

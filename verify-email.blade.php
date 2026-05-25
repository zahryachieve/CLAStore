<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <!-- Bootstrap 4 CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 100%; max-width: 500px;">
        <div class="card-body text-center">
            <h3 class="card-title mb-4">Verifikasi Email</h3>

            <p class="mb-3">
                Terima kasih telah mendaftar! Silakan verifikasi alamat email Anda dengan mengklik link yang telah kami kirim.
                Jika Anda belum menerima email tersebut, klik tombol di bawah ini untuk mengirim ulang.
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success" role="alert">
                    Link verifikasi baru telah dikirim ke alamat email Anda.
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}" class="mb-2">
                @csrf
                <button type="submit" class="btn btn-primary btn-block">Kirim Ulang Link Verifikasi</button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-secondary btn-block">Keluar</button>
            </form>
        </div>
    </div>
</div>

<!-- Optional Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

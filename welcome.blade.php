

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Toko Aksesoris</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.min.css') }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @if(session('success'))
    <script>
        Swal.fire({
            title: 'Login Berhasil Sebagai {{ Auth::user()->name }}!',
            text: '{{ session('
            success ') }}', 
            icon: 'success',
            confirmButtonText: 'OK'
        });

    </script>
    @endif
      <!-- loader  -->
      <!-- <div class="loader_bg">
         <div class="loader"><img src="{{ asset('assets/images/loading.gif') }}" alt="#" /></div>
      </div> -->
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="{{ asset('assets/images/logo.png') }}" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="index.html">Dashboard</a>
                              </li>
                              <!-- <li class="nav-item">
                                 <a class="nav-link" href="about.html">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="computer.html">Computer</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="laptop.html">Laptop</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="product.html">Products</a>
                              </li> -->
                              <!-- Tambahkan di tempat menu navigasi -->
                              <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="cartDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-shopping-cart"></i> 
                                    <span class="badge badge-pill badge-danger" id="cart-count">0</span>
                                 </a>

                                 <div class="dropdown-menu dropdown-menu-right p-3" aria-labelledby="cartDropdown" style="min-width: 300px;">
                                    <h6 class="dropdown-header">Pesanan Anda</h6>
                                    <div id="cart-items"></div>
                                    <div class="dropdown-divider"></div>
                                    <a href="/datapesanan/index" class="btn btn-primary btn-block">Lihat Dikeranjang</a>
                                 </div>
                              </li>

                              <script>
document.addEventListener('DOMContentLoaded', function () {
   fetch('/get-cart')
      .then(res => res.json())
      .then(data => {
         console.log("Cart dari server:", data);
         cart = data.map(item => ({
            name: item.product_name,
            qty: item.quantity,
            total: item.total_price
         }));
         updateCartDropdown();
      })
      .catch(error => console.error('Error mengambil keranjang:', error));
});

function updateCartDropdown() {
   const container = document.getElementById('cart-items');
   const countBadge = document.getElementById('cart-count');
   container.innerHTML = '';
   countBadge.innerText = cart.length;

   cart.forEach(item => {
      container.innerHTML += `
         <div class="dropdown-item">
            <strong>${item.name}</strong><br>
            Qty: ${item.qty}<br>
            Total: Rp ${item.total.toLocaleString('id-ID')}
         </div>
      `;
   });

   if (cart.length === 0) {
      container.innerHTML = '<div class="dropdown-item text-muted">Keranjang kosong</div>';
   }
}
</script>




                              <!-- <li class="nav-item d_none">
                                 <a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                              </li> -->
                              {{-- Jika belum login --}}
                           @guest
                              <li class="nav-item d_none">
                                 <a class="nav-link" href="/login">Login</a>
                              </li>
                              <li class="nav-item d_none">
                                 <a class="nav-link" href="/register">Daftar</a>
                              </li>
                           @endguest

                           {{-- Jika sudah login --}}
                           @auth
                              <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-circle"></i> {{ Auth::user()->name }}
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                       @csrf
                                       <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                 </div>
                              </li>
                           @endauth


                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main">
         <div id="banner1" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#banner1" data-slide-to="0" class="active"></li>
               <!-- <li data-target="#banner1" data-slide-to="1"></li>
               <li data-target="#banner1" data-slide-to="2"></li>
               <li data-target="#banner1" data-slide-to="3"></li>
               <li data-target="#banner1" data-slide-to="4"></li> -->
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="carousel-caption">
                        <div class="row">
                           <div class="col-md-6">
                           <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                           <head>
                              <!-- Tambahkan ini di head layout utama -->
                              <meta name="csrf-token" content="{{ csrf_token() }}">
                           </head>

                           <div class="text-bg">
                              <span>Computer And Laptop</span>
                              <h1>Accessories</h1>
                              <p>Selamat Datang di CLA, toko aksesoris komputer online terpercaya! Kami menyediakan berbagai macam aksesoris komputer berkualitas tinggi untuk memenuhi kebutuhan anda </p>
                              
                              @if(Auth::check())
                                 <a href="#" onclick="showBuyNow()">Beli Sekarang</a>
                              @else
                                 <a href="#" onclick="showLoginAlert()">Beli Sekarang</a>
                              @endif
                              <script>function showLoginAlert() {
                                 Swal.fire({
                                    title: 'Silakan Login',
                                    text: 'Anda harus login terlebih dahulu untuk melanjutkan pembelian.',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Login',
                                    cancelButtonText: 'Batal',
                                    showDenyButton: true,
                                    denyButtonText: 'Daftar'
                                 }).then((result) => {
                                    if (result.isConfirmed) {
                                          // Arahkan ke halaman login jika tombol "Login" diklik
                                          window.location.href = '/login';
                                    } else if (result.isDenied) {
                                          // Arahkan ke halaman daftar jika tombol "Daftar" diklik
                                          window.location.href = '/register';
                                    }
                                 });
                              }

                              </script>          

                              <a href="https://wa.me/6281234567890?text=Halo%2C%20saya%20tertarik%20dengan%20produk%20aksesoris%20hotel%20Anda.%20Boleh%20minta%20info%20lebih%20lanjut%3F" target="_blank">
                                 Hubungi via WhatsApp
                              </a>


                              <script>
      const products = @json($products->pluck('price', 'product_name'));
const stocks = @json($products->pluck('stock', 'product_name'));

   </script>

   <!-- Script asli kamu tetap, HAPUS bagian "const products = {...}" -->
   <script>
     let cart = [];

function showBuyNow() {
   const options = Object.keys(products).map(name => {
      const isOutOfStock = stocks[name] === 0;
      return `<option value="${name}" ${isOutOfStock ? 'disabled' : ''}>${name} - Rp ${products[name].toLocaleString('id-ID')} (${stocks[name]} stok)</option>`;
   }).join('');

   Swal.fire({
      title: 'Pilih Produk',
      html: `
         <select id="product-select" class="swal2-input" onchange="updatePrice()">
            ${options}
         </select>
         <input type="number" id="quantity" class="swal2-input" value="1" min="1" oninput="updatePrice()">
         <p>Total: <strong id="total-price">Rp 0</strong></p>
      `,
      showCancelButton: true,
      confirmButtonText: 'Tambah ke Keranjang',
      didOpen: () => updatePrice(),
      preConfirm: () => {
         const name = document.getElementById('product-select').value;
         const qty = parseInt(document.getElementById('quantity').value);

         if (stocks[name] < qty) {
            Swal.fire({
               icon: 'error',
               title: 'Stok Tidak Cukup',
               text: `Hanya tersedia ${stocks[name]} ${name}.`
            });
            return false;
         }

         const price = products[name];
         const total = qty * price;

         // Kurangi stok produk
         stocks[name] -= qty;

         return fetch('/add-to-cart', {
            method: 'POST',
            headers: {
               'Content-Type': 'application/json',
               'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
               product_name: name,
               quantity: qty,
               total_price: total
            })
         }).then(res => res.json());
      }
   }).then(result => {
      if (result.isConfirmed && result.value && result.value.success) {
         Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: result.value.message
         });
      } else if (result.value && !result.value.success) {
         Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: result.value.message
         });
      }
   });
}

function updatePrice() {
   const name = document.getElementById('product-select').value;
   const qty = parseInt(document.getElementById('quantity').value);
   const price = products[name];
   const total = qty * price;
   document.getElementById('total-price').innerText = `Rp ${total.toLocaleString('id-ID')}`;
}

   </script>
                           </div>
                           </div>
                           <div class="col-md-6">
                              <div class="text_img">
                                 <figure><img src="{{ asset('assets/images/pct.png') }}" alt="#"/></figure>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="carousel-caption">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="text-bg">
                                 <span>Computer And Laptop</span>
                                 <h1>Accessories</h1>
                                 <p>Selamat Datang di CLA, toko aksesoris komputer online terpecaya! Kami menyediakan berbagai macam aksesoris komputer berkualitas tinggi untuk memenuhi kebutuhan anda </p>
                                 @if(Auth::check())
                                 <a href="#" onclick="showBuyNow()">Beli Sekarang</a>
                              @else
                                 <a href="#" onclick="showLoginAlert()">Beli Sekarang</a>
                              @endif<a href="https://wa.me/6281234567890?text=Halo%2C%20saya%20tertarik%20dengan%20produk%20aksesoris%Komputer%20Anda.%20Boleh%20minta%20info%20lebih%20lanjut%3F" target="_blank">
                                    Hubungi via WhatsApp
                                 </a>

                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="text_img">
                                 <figure><img src="{{ asset('assets/images/pct.png') }}" alt="#"/></figure>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               
            </div>
            <a class="carousel-control-prev" href="#banner1" role="button" data-slide="prev">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </a>
            <a class="carousel-control-next" href="#banner1" role="button" data-slide="next">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
         </div>
      </section>
      <!-- end banner -->
      <!-- three_box -->
      <div class="three_box">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="box_text">
                     <i><img src="{{ asset('assets/images/thr.png') }}"alt="#"/></i>
                     <h3>Computer</h3>
                     <p>Komputer merupakan perangkat elektronik yang dapat melakukan berbagai tugas dengan menggunakan program dan intruksi yang di berikan.Dengan menggunakan komputer , kita dapat meningkatkan produktivitas,kreativitas, dan efisiensi dalam berbagai aspek kehidupan </p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="box_text">
                     <i><img src="{{ asset('assets/images/thr1.png') }}" alt="#"/></i>
                     <h3>Laptop</h3>
                     <p>Laptop merupakan perangkat komputer portable yang dapat digunakan untuk berbagai keperluan.Dengan menggunakan laptop, kita dapat meningkatkan produktivitas,kreativitas, dan efisiensi dalam berbagai aspek kehidupan </p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="box_text">
                     <i><img src="{{ asset('assets/images/thr2.png') }}" alt="#"/></i>
                     <h3>Tablet</h3>
                     <p>Tablet merupakan perangkat komputer portable yang memiliki layar sentuh dan dapat di gunakan untuk berbagai keperluan.Dengan menggunakan tablet,kita dapat menikmati berbagai konten digital dengan mudah dan nyaman </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- three_box -->
      <!-- products -->
      <div  class="products">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Produk Kami</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="our_products">
                     <div class="row">
                        <div class="col-md-4 margin_bottom1">
                           <div class="product_box">
                              <figure><img src="{{ asset('assets/images/product1.png') }}" alt="#"/></figure>
                              <h3>Keyboard</h3>
                           </div>
                        </div>
                        <div class="col-md-4 margin_bottom1">
                           <div class="product_box">
                              <figure><img src="{{ asset('assets/images/product2.png') }}" alt="#"/></figure>
                              <h3>Mouse</h3>
                           </div>
                        </div>
                        <div class="col-md-4 margin_bottom1">
                           <div class="product_box">
                              <figure><img src="{{ asset('assets/images/product3.png') }}" alt="#"/></figure>
                              <h3>Web cam</h3>
                           </div>
                        </div>
                        <div class="col-md-4 margin_bottom1">
                           <div class="product_box">
                              <figure><img src="{{ asset('assets/images/product4.png') }}" alt="#"/></figure>
                              <h3>Speakers</h3>
                           </div>
                        </div>
                        <div class="col-md-4 margin_bottom1">
                           <div class="product_box">
                              <figure><img src="{{ asset('assets/images/product5.png') }}" alt="#"/></figure>
                              <h3>internet</h3>
                           </div>
                        </div>
                        <div class="col-md-4 margin_bottom1">
                           <div class="product_box">
                              <figure><img src="{{ asset('assets/images/product6.png') }}" alt="#"/></figure>
                              <h3>Hardisk</h3>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="product_box">
                              <figure><img src="{{ asset('assets/images/product7.png') }}" alt="#"/></figure>
                              <h3>Rams</h3>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="product_box">
                              <figure><img src="{{ asset('assets/images/product8.png') }}" alt="#"/></figure>
                              <h3>Bettery</h3>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="product_box">
                              <figure><img src="{{ asset('assets/images/product9.png') }}" alt="#"/></figure>
                              <h3>Drive</h3>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <a class="read_more" href="#">See More</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end products -->
      <!-- laptop  section -->
      <div class="laptop">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="titlepage">
                     <p>Every Computer and laptop</p>
                     <h2>Up to 40% off !</h2>
                     <a class="read_more" href="#">Belanja sekarang!</a>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="laptop_box">
                     <figure><img src="{{ asset('assets/images/pc.png') }}" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <!-- end laptop  section -->
      <!-- customer -->
      <div class="customer">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Ulasan Pelanggan</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div id="myCarousel" class="carousel slide customer_Carousel " data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container">
                              <div class="carousel-caption ">
                                 <div class="row">
                                    <div class="col-md-9 offset-md-3">
                                       <div class="test_box">
                                          <i><img src="{{ asset('assets/images/cos.png') }}" alt="#"/></i>
                                          <h4>Siti Jahriatussania</h4>
                                          <p> pengalaman belanja saya sangat memuaskan. Saya pasti akan belanja lagi di sini jika butuh perlengkapan komputer lainnya. Sangat direkomendasikan!</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption">
                                 <div class="row">
                                    <div class="col-md-9 offset-md-3">
                                       <div class="test_box">
                                          <i><img src="{{ asset('assets/images/cos.png') }}" alt="#"/></i>
                                          <h4>Aden Rifai</h4>
                                          <p>Saya sangat puas berbelanja di website ini! Tampilan websitenya rapi dan mudah dinavigasi, jadi saya bisa dengan cepat menemukan aksesoris komputer yang saya butuhkan. Proses pemesanannya juga simpel dan cepat, serta tersedia banyak pilihan produk mulai dari mouse, keyboard, hingga cooling pad dengan harga yang bersaing.</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption">
                                 <div class="row">
                                    <div class="col-md-9 offset-md-3">
                                       <div class="test_box">
                                          <i><img src="{{ asset('assets/images/cos.png') }}" alt="#"/></i>
                                          <h4>Zahriatussania</h4>
                                          <p>Saya memesan headset gaming dan kabel HDMI, dan keduanya sampai dalam kondisi sangat baik. Pengiriman cepat, hanya butuh dua hari sampai ke rumah saya di Bandung. Layanan pelanggan juga sangat responsif dan membantu saat saya ingin mengganti alamat pengiriman.</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end customer -->

      <!--  contact -->
      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Hubungi Sekarang</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <form id="request" class="main_form">
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Nama" type="type" name="Nama"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Email" type="type" name="Email"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="No Telepon" type="type" name="No Telepon">                          
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="Message" type="type" Message="Name">Pesan </textarea>
                        </div>
                        <div class="col-md-12">
                           <button class="send_btn">Kirim</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- end contact -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                     <img class="logo1" src="{{ asset('assets/images/logo1.png') }}" alt="#"/>
                     <ul class="social_icon">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                     <h3>About Us</h3>
                     <ul class="about_us">
                        <li>CLA adalah toko online yang menyediakan berbagai aksesoris komputer berkualitas seperti mouse, keyboard, headset, dan lainnya. <br>  Sejak 2020, kami berkomitmen memberikan produk terbaik dengan harga terjangkau dan layanan cepat untuk memenuhi kebutuhan teknologi Anda.</li>
                     </ul>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                     <h3>Contact Us</h3>
                     <ul class="conta">
                        <li>📞 WhatsApp / Telepon: 0812-3456-7890<br> 📧 Email: support@clastore.com <br>📍 Alamat Toko: Jl. Teknologi No. 88, Jakarta Selatan, DKI Jakarta<br> 🕒 Jam Operasional: Senin – Sabtu, 09.00 – 18.00 WIB</li>
                     </ul>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                     <form class="bottom_form">
                        <h3>Newsletter</h3>
                        <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                        <button class="sub_btn">subscribe</button>
                     </form>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>copyright © 2025 reserverd </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/js/popper.min.js') }}"></script>
      <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('assets/js/jquery-3.0.0.min.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('assets/js/custom.js') }}"></script>
   </body>
</html>


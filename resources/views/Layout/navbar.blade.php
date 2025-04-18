<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fitri Store</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('kupu-kupu.png') }}" />
    <link rel="stylesheet" href="{{ url('style.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Toastify JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</head>

<body>
    <div class="col-nav">
        <nav>
            <img src="{{ asset('logo-red.png') }}" width="50" alt="">
            <div class="link-nav">
                <a href="/">Beranda</a>
                <a href="/#content4">Produk</a>
                <a href="/keranjang">Keranjang</a>
                <a href="/riwayat-pembelian">Riwayat Pembelian</a>
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button
                        style="background-color: transparent;border: none;cursor: pointer;display: flex;justify-content: start
                ;align-items: center;gap: 10px"
                        href="/logout"><i class='bx bx-log-out' style="font-size: 1.2rem"></i>
                        <span>{{ Auth::user()->username }}</span>
                    </button>
                </form>

            </div>
            <i class='bx bx-menu-alt-right icon-menu'></i>

            <div class="link-nav-hp">
                <img src="assets/white.png" width="150" style="margin-left: -5px;" alt="" loading="lazy">
                <a style="margin-top: 0px" href="/">Beranda</a>
                <a href="/#content4" style="margin-top: 30px">Produk</a>
                <a href="/keranjang" style="margin-top: 30px">Keranjang</a>
                <a href="/riwayat-pembelian" style="margin-top: 30px">Riwayat Pembelian</a>
                <form action="{{ url('/logout') }}" style="margin-top: 30px" method="POST">
                    @csrf
                    <button style="background-color: transparent;border: none;cursor: pointer;display: flex;justify-content: start
                ;align-items: center;gap: 10px;margin-top: 0px"
                        href="/logout"><i class='bx bx-log-out' style="font-size: 1.2rem"></i>
                        <span>{{ Auth::user()->username }}</span>
                </button>
                </form>
            </div>
        </nav>
    </div>

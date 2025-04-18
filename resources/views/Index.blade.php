@extends('Layout.master')
@section('content')  
<div class="popup">
    <img src="{{asset('loading.gif')}}" width="50" alt=""></div>  
<div class="section">
    <div class="content">
        <div class="content1">
            <div class="left1">
                <div class="col-title">
                    <div class="text-ajakan1">AYO PILIH </div>
                    <ul class="text-ajakan2">
                        <li><span>OUTFIT KAOS KEREN MU</span></li>
                        <li><span>OUTFIT KAOS KEKINIAN</span></li>
                    </ul>
                    <div class="text-ajakan3">
                        Temukan kaos berkualitas dengan desain menarik hanya di sini! Waktunya upgrade gaya Anda
                        dengan pilihan terbaik. </div>
                </div>

                <div class="col-informasi">
                    <div class="informasi">
                        <div> <span class="angka1">12 </span> <span class="plus">+</span></div>
                        <div>Model Hits</div>
                    </div>
                    <div class="informasi">
                        <div> <span class="angka2">6 </span> <span class="plus">+</span></div>

                        <div>Metode Pembayaran</div>
                    </div>
                    <div class="informasi">
                        <div> <span class="angka3">839 </span> <span class="plus">+</span></div>

                        <div>Produk terjual perbulan</div>
                    </div>
                </div>
                <div class="col-btn-page1">
                    <a href="#content4"> <button class="btn-cari-kelas">Kunjungi Sekarang</button></a>
                    <a href="#content4">
                        <div class="icon-arrow-down">
                            <i class='bx bx-up-arrow-alt' style='color:#ffffff'></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="right1">
                <div class="box-right1">
                    <div class="kategori-text">MOTIF</div>
                    <div class="judul-text">KAOS COSTUM</div>
                   <a href="#content4"> <div class="btn-kunjungi-right">Kunjungi</div></a>
                    <img src="{{ asset('baju4-remove.png') }}" width="190" alt="">
                </div>
                <div class="col-box-right">
                    <div class="box-right2">
                        <div class="kategori-text2">MOTIF</div>
                        <div class="judul-text2">KAOS BONDOWOSO</div>
                      <a href="#content4"> <div class="btn-kunjungi-right2">Kunjungi</div></a> 
                        <img src="{{ asset('baju10-remove.png') }}" width="170" alt="">

                    </div>
                    <div class="box-right3">
                        <div class="kategori-text2">MOTIF</div>
                        <div class="judul-text2">QUOTE MADURA</div>
                       <a href="#content4"> <div class="btn-kunjungi-right3">Kunjungi</div></a>
                        <img src="{{ asset('baju7-remove.png') }}" width="170" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="content2">
            <div class="box-content2">
                <div class="left-bc2"><img src="{{ asset('truck.png') }}" width="70" alt=""></div>
                <div class="right-bc2">
                    <div>Gratis pengiriman</div>
                    <div>setelah 3 kali pemesanan</div>
                </div>
            </div>
            <div class="box-content2">
                <div class="left-bc2"><img src="{{ asset('time.png') }}" width="70" style="margin-top: -10px"
                        alt=""></div>
                <div class="right-bc2">
                    <div>Kilat drop</div>
                    <div>Pengiriman cepat</div>
                </div>
            </div>
            <div class="box-content2">
                <div class="left-bc2"><img src="{{ asset('cs.png') }}" width="50" alt=""></div>
                <div class="right-bc2">
                    <div>Response cepat</div>
                    <div>Response cepat 24/7</div>
                </div>
            </div>
            <div class="box-content2">
                <div class="left-bc2"><img src="{{ asset('payment.png') }}" width="50" alt=""></div>
                <div class="right-bc2">
                    <div>Pembayaran aman</div>
                    <div>Semua kartu di terima</div>
                </div>
            </div>
        </div>
        <div class="content3"  id="content4">
            <img src="{{ asset('kaos-gabungan.png') }}" width="470" class="kaos-gab" alt="">
            <img src="{{ asset('logo-white.png') }}" width="270" class="logo-white" alt="">
            <div class="col-btn-page2">
                <a href="#content4"> <button class="btn-cari-kelas2">Lihat Produk Sekarang</button></a>
                <a href="#content4">
                    <div class="icon-arrow-down">
                        <i class='bx bx-up-arrow-alt' style='color: #FF3131'></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="content4">
            <div class="title4">Produk kami</div>
            <div class="sub-title4">Produk terlaris kaos kami</div>
            <div class="col-card">
                @foreach ($data as $item)      
                <div class="card" style="border: none">
                    <div class="card-thumb">
                        <img src="{{ asset($item->foto_produk) }}" width="120" alt="">
                    </div>
                    <div class="judul-card">{{$item->motif}}</div>
                    <div class="desc-card">{{$item->title}}</div>
                    <div class="col-btn-card">
                       <a href="{{url('detail-produk/'.$item->id)}}" class="btn-cari-kelas3">Lihat Detail</a>
                       <div class="harga">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>

                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>

</div>
@endsection

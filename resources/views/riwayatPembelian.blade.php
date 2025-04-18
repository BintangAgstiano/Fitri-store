@extends('Layout.master')
   @php
    use Carbon\Carbon;
@endphp
@section('content')
    <div class="section">
        <div class="content-cart">
            <a href="/" class="col-kembali">
                <i class='bx bx-left-arrow-alt'></i> <span>Riwayat pembelian</span>
            </a>
            @if (count($data) > 0)
                @foreach ($data as $item)
                    <div class="col-cart">
                        <div class="left-cart">
                            <img src="{{ asset($item->foto_produk) }}" width="50" alt="">
                        </div>
                        <div class="mid-cart">
                            <div class="title-keranjang">{{$item->title}}</div>
                            <div class="sub-title-keranjang">Tampil beda dengan sentuhan lokal yang penuh makna!</div>
                            <div class="harga-keranjang">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                            <div class="col-uk-keranjang" style="display: flex;flex-wrap: wrap">
                                <div class="uk">UK : {{$item->uk}}</div>
                                <div class="col-jumlah" style="font-size: .9rem;font-weight: 300">
                                    Jumlah : {{$item->jumlah_pesanan}}
                                </div>
                                <div class="col-jumlah" style="font-size: .9rem;font-weight: 300">
                                    Estimasi diterima : @if ($item->estimasi && $item->estimasi !== '-')
                                    {{ \Carbon\Carbon::parse($item->estimasi)->translatedFormat('d F Y') }}
                                @else
                                    -
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="right-cart" id="right-cart">
                            <div class="top-cart">
                            <div class="harga" 
     style="color: {{ 
        $item->status == 'Pesanan diterima' ? 'green' : 
        ($item->status == 'Pesanan ditolak' ? 'red' : 
        ($item->status == 'Menunggu' ? '#945f04' : 'black')) }}">
    {{ $item->status }}
</div>
                            </div>
                         
                           <div class="bottom-cart" id="tanggal">
    {{ Carbon::parse($item->tanggal_pesan)->translatedFormat('d F Y') }}
</div>

                        </div>
                    </div>
                @endforeach
            @else
                <div style="width: 100%;height: 400px;display: flex;justify-content: center;align-items: center">
                    <p style="color: gray">Tidak ada produk</p>
                </div>
            @endif


        </div>
    </div>
@endsection

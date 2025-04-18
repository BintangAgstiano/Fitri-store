@extends('Layout.master')
@section('content')
    <div class="section">
        <div class="content-detail" action="{{ url('add-cart') }}" method="post">
            @csrf
            @if (session('success'))
                <script>
                    Toastify({
                        text: "{{ session('success') }}",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#006b0c",
                        stopOnFocus: true, 
                    }).showToast();
                </script>
            @endif
            <a href="/" class="col-kembali">
                <i class='bx bx-left-arrow-alt'></i> <span>Kembali</span>
            </a>
            <div class="isi-content">
                <div class="left-detail">

                    <div class="thumb-detail">
                        <img src="{{ asset($item->foto_produk) }}" width="200" alt="">
                    </div>
                    <div class="right-detail">
                        <div class="title-detail">{{ $item->title }}</div>
                        <div class="sub-title-detail">Tampil beda dengan sentuhan lokal yang penuh makna!</div>
                        <div class="col-size">
                            <div class="box-size active" onclick="pilihSize(this)" data-size="S">S</div>
                            <div class="box-size" onclick="pilihSize(this)" data-size="M">M</div>
                            <div class="box-size" onclick="pilihSize(this)" data-size="L">L</div>
                            <div class="box-size" onclick="pilihSize(this)" data-size="XL">XL</div>
                            <div class="box-size" onclick="pilihSize(this)" data-size="XXL">XXL</div>
                            <div class="box-size" onclick="pilihSize(this)" data-size="XXXL">XXXL</div>
                        </div>
                        <input type="hidden" id="hargaBase" value="{{ $item->harga }}">
                        <input type="hidden" id="hargaSatuan" value="{{ $item->harga }}">


                        <div class="text-detail">Detail</div>
                        <div class="text-paraf">Bahan Cotton Combet 30 s</div>
                        <div class="text-paraf">Sablon DTF</div>
                        <div class="text-paraf">Motif gambar atau tulisan bisa costum melalui DM</div>
                        <div class="col-harga">
                            <div class="col-jumlah" id="col-jumlah">
                                <button style="background-color: white" class="box-jumlah" onclick="kurangi()">-</button>
                                <input name="jumlah_pesanan" readonly
                                    style="background-color: white; text-align: center; line-height: 40px;  width: 40px;"
                                    class="box-jumlah-mid" id="jumlah" value="1">

                                <button style="background-color: white" class="box-jumlah" onclick="tambah()">+</button>

                            </div>

                            <input type="hidden" id="hargaSatuan" value="{{ $item->harga }}">

                            <div class="harga" id="hargaTampil">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>

                           





                        </div>
                        <div class="col-btn-detail">
                            <button style="cursor: pointer" class="btn-co" data-bs-toggle="modal"
                                data-bs-target="#pesan">Pesan Sekarang</button>

                            <div class="modal fade" id="pesan" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{ url('pesanan-add') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">Nama Lengkap</label>
                                                    <input type="text" name="nama_lengkap" class="form-control"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp">

                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">ALamat</label>
                                                    <input type="text" name="alamat" class="form-control"
                                                        id="exampleInputPassword1">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Nomer
                                                        Handphone</label>
                                                    <input type="text" name="no_hp" id="exampleInputPassword1"
                                                        class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Bukti
                                                        Pembayaran</label>
                                                    <input type="file" name="bukti_pembayaran" class="form-control"
                                                        id="inputGroupFile01">
                                                </div>
                                                <ul>
                                                            <li style="font-weight: 200;font-size: .9rem">BANK BPD JATIM : 0313168140 (BC Alfamart CQ Nurul Furqonia)</li>
                                                    <li style="font-weight: 200;font-size: .9rem">DANA : 082334140326 (Nurul Furqonia)</li>
                                                </ul>
                                                <input type="hidden" name="title" value="{{ $item->title }}">
                                                <input type="hidden" name="foto_produk"
                                                    value="{{ $item->foto_produk }}">
                                                <input name="jumlah_pesanan" type="hidden"
                                                    style="background-color: white; text-align: center; line-height: 40px;  width: 40px;"
                                                    class="box-jumlah-mid" id="jumlah-p" value="1">



                                                <input type="hidden" name="harga" id="totalHarga"
                                                    value="{{ $item->harga }}">
                                                <input type="hidden" id="selectedSize" name="uk" value="S">

                                                <button type="submit" class="btn btn-danger mb-2">Pesan Sekarang</button>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <form action="{{ url('add-cart') }}" method="post">
                                @csrf
                                <input type="hidden" name="title" value="{{ $item->title }}">
                                <input type="hidden" name="foto_produk" value="{{ $item->foto_produk }}">
                                <input type="hidden" name="harga" id="totalHargaCart" value="{{ $item->harga }}">
                                <input type="hidden" id="selectedSizeCart" name="uk" value="S">
                                <input name="jumlah_pesanan" type="hidden"
                                    style="background-color: white; text-align: center; line-height: 40px;  width: 40px;"
                                    class="box-jumlah-mid" id="jumlah-cart" value="1">

                                <button style="cursor: pointer" class="btn-cart"><i class='bx bx-cart'
                                        style='color:#ffffff'></i></button>
                            </form>
                        </div>
                    </div>
                     <script>
                                let jumlah = 1;

                                function formatRupiah(angka) {
                                    return "Rp " + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                }

                                function tampilkanJumlah() {
                                    const hargaSatuan = parseInt(document.getElementById('hargaSatuan').value);
                                    let totalHarga = hargaSatuan * jumlah;

                                    document.getElementById('totalHarga').value = totalHarga;
                                    document.getElementById('totalHargaCart').value = totalHarga;
                                    document.getElementById('jumlah').value = jumlah;
                                    document.getElementById('jumlah-p').value = jumlah;
                                    document.getElementById('jumlah-cart').value = jumlah;
                                    document.getElementById('hargaTampil').innerText = formatRupiah(totalHarga);
                                }

                                function tambah() {
                                    jumlah++;
                                    tampilkanJumlah();
                                }

                                function kurangi() {
                                    if (jumlah > 1) {
                                        jumlah--;
                                        tampilkanJumlah();
                                    }
                                }

                                function pilihSize(el) {
                                    document.querySelectorAll('.box-size').forEach(size => size.classList.remove('active'));

                                    el.classList.add('active');

                                    const size = el.dataset.size;
                                    const hargaBase = parseInt(document.getElementById('hargaBase').value);

                                    let hargaBaru = (size === 'XXL' || size === 'XXXL') ? 60000 : hargaBase;

                                    document.getElementById('selectedSize').value = size;
                                    document.getElementById('selectedSizeCart').value = size;
                                    document.getElementById('hargaSatuan').value = hargaBaru;

                                    console.log("Ukuran terpilih:", size);
                                    console.log("Harga baru:", hargaBaru);

                                    tampilkanJumlah();
                                }
                            </script>
                </div>
                <div class="right-detail-parent">
                    <div class="title-right-detail">3 Rekomendasi Lainnya</div>
                    <div class="col-right-detail-lainnya">
                        @foreach ($data as $dt)
                            <a style="color: inherit" href="{{ url('detail-produk/' . $dt->id) }}" class="box-detail">
                                <div class="thumb-box-detail">
                                    <img src="{{ asset($dt->foto_produk) }}" width="50px" alt="">
                                </div>
                                <div class="right-mini">
                                    <div class="title-mini">{{ $dt->motif }}</div>
                                    <div class="sub-title-mini">{{ $dt->title }}</div>
                                    <div class="harga-mini">Rp {{ number_format($dt->harga, 0, ',', '.') }}</div>
                                </div>
                            </a>
                        @endforeach

                    </div>

                </div>
            </div>

        </div>
        </section>
    @endsection

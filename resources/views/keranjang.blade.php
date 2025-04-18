@extends('Layout.master')

@section('content')
    <div class="section">
        <div class="content-cart">
            <a href="/" class="col-kembali">
                <i class='bx bx-left-arrow-alt'></i> <span>Keranjang saya</span>
            </a>
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
            @if (count($data) > 0)
                @foreach ($data as $item)
                    <div class="col-cart">
                        <div class="left-cart">
                            <img src="{{ asset($item->foto_produk) }}" width="50" alt="">
                        </div>
                        <div class="mid-cart">
                            <div class="title-keranjang">{{ $item->title }}</div>
                            <div class="sub-title-keranjang">Tampil beda dengan sentuhan lokal yang penuh makna!</div>
                            <div class="harga-keranjang">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                            <div class="col-uk-keranjang">
                                <div class="uk">UK : {{ $item->uk }}</div>
                                <div class="col-jumlah">
                                    <button style="background-color: white" class="box-jumlah" id="minus-{{ $item->id }}">-</button>
                                    <div class="box-jumlah-mid" id="jumlahPesanan-{{ $item->id }}">
                                        {{ $item->jumlah_pesanan }}</div>
                                    <button style="background-color: white" class="box-jumlah" id="plus-{{ $item->id }}">+</button>
                                </div>

                            </div>
                        </div>
                        <div class="right-cart" id="right-cart">
                            <div class="top-cart">
                                <div class="harga" id="harga-{{ $item->id }}"
                                    data-harga="{{ $item->harga / $item->jumlah_pesanan }}">Rp
                                    {{ number_format(($item->harga / $item->jumlah_pesanan) * $item->jumlah_pesanan, 0, ',', '.') }}
                                </div>
                            </div>
                            <div class="bottom-cart" id="tanggal2">
                                <a href="" style="text-decoration: none;color: red !important" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal-{{ $item->id }}">Hapus</a> <a href=""
                                    style="text-decoration: none;color: green !important" data-bs-toggle="modal"
                                    data-bs-target="#pesan-{{ $item->id }}">Pesan</a>
                            </div>
                            <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin menghapusnya?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ url('keranjang-delete/' . $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="pesan-{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <input type="text" name="no_hp" id="exampleInputPassword1" class="form-control">
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
                                                <input type="hidden" name="uk" value="{{ $item->uk }}">
                                                <input type="hidden" name="title" value="{{ $item->title }}">
                                                <input type="hidden" name="foto_produk"
                                                    value="{{ $item->foto_produk }}">
                                                <input type="hidden" name="jumlah_pesanan"
                                                    id="jumlahPesananInput-{{ $item->id }}"
                                                    value="{{ $item->jumlah_pesanan }}">

                                                <input type="hidden" name="harga" id="hargaInput-{{ $item->id }}"
                                                    value="{{ ($item->harga / $item->jumlah_pesanan) * $item->jumlah_pesanan }}">

                                                <button type="submit" class="btn btn-danger mb-2">Pesan Sekarang</button>

                                            </form>
                                        </div>

                                    </div>
                                </div>
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

    <script>
        const minusButtons = document.querySelectorAll('.box-jumlah[id^="minus-"]');
        const plusButtons = document.querySelectorAll('.box-jumlah[id^="plus-"]');

        minusButtons.forEach(minusButton => {
            minusButton.addEventListener('click', () => {
                const itemId = minusButton.id.split('-')[1];
                const jumlahPesanan = document.getElementById('jumlahPesanan-' + itemId);
                const jumlahPesanaInput = document.getElementById('jumlahPesananInput-' + itemId);
                const hargaInput = document.getElementById('hargaInput-' + itemId);
                const hargaElement = document.getElementById('harga-' + itemId);

                const hargaSatuan = parseInt(hargaElement.getAttribute('data-harga'));

                let currentJumlah = parseInt(jumlahPesanan.textContent);
                if (currentJumlah > 1) {
                    jumlahPesanan.textContent = currentJumlah - 1;
                    jumlahPesanaInput.value = currentJumlah - 1;
                    hargaInput.value = hargaSatuan * (currentJumlah - 1);
                    hargaElement.textContent = 'Rp ' + number_format(hargaSatuan * (currentJumlah - 1), 0,
                        ',', '.');
                }
            });
        });

        plusButtons.forEach(plusButton => {
            plusButton.addEventListener('click', () => {
                const itemId = plusButton.id.split('-')[1];
                const jumlahPesanan = document.getElementById('jumlahPesanan-' + itemId);
                const jumlahPesanaInput = document.getElementById('jumlahPesananInput-' + itemId);
                const hargaInput = document.getElementById('hargaInput-' + itemId);

                const hargaElement = document.getElementById('harga-' + itemId);

                const hargaSatuan = parseInt(hargaElement.getAttribute('data-harga'));

                let currentJumlah = parseInt(jumlahPesanan.textContent);
                jumlahPesanan.textContent = currentJumlah + 1;
                jumlahPesanaInput.value = (currentJumlah + 1) * 1;
                hargaInput.value = hargaSatuan * (currentJumlah + 1);
                hargaElement.textContent = 'Rp ' + number_format(hargaSatuan * (currentJumlah + 1), 0, ',',
                    '.');
            });
        });

        function number_format(number, decimals, dec_point, thousands_sep) {
            number = number.toString().replace('.', dec_point);
            let parts = number.split(dec_point);
            let integer = parts[0];
            let fraction = parts.length > 1 ? dec_point + parts[1] : '';
            integer = integer.replace(/\B(?=(\d{3})+(?!\d))/g, thousands_sep);
            return integer + fraction;
        }
document.querySelectorAll('[id^="jumlahPesanan-"]').forEach(jumlahElem => {
    const itemId = jumlahElem.id.split('-')[1];
    const hiddenInput = document.getElementById('jumlahPesananInput-' + itemId);
    if (hiddenInput) {
        hiddenInput.value = jumlahElem.innerText;
    }
});
    </script>
@endsection

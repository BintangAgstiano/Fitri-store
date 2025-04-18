@extends('web-admin.layout-admin.master')

@section('content-admin')
    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                    <div style="margin-top: 1px">Pesanan</div>
                </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->


                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <i class='bx bxs-user-circle'
                                style='color:#ff3131;scale: 2;margin-top: 10px;margin-left: 10px'></i>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex">

                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block">{{ Auth::user()->username }}</span>
                                        <small class="text-muted">Admin</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/profile">
                                <i class="bx bx-user me-2"></i>
                                <span class="align-middle">Profile Saya</span>
                            </a>
                        </li>

                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <form action="{{ url('/logout') }}" method="POST">
                                @csrf
                                <button
                                    style="background-color: transparent;margin-left: 0rem;border: none;cursor: pointer;display: flex;justify-content: start
                ;align-items: center"
                                    class="dropdown-item" href="auth-login-basic.html">
                                    <i class="bx bx-power-off me-2"></i>
                                    <span class="align-middle">Keluar</span>
                                    </a>
                            </form>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>
    </nav>
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
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Tabel pesanan</h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">Tabel pesanan</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Pemesan</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if (count($data) > 0)
                                @foreach ($data as $item)
                                    <tr>
                                        <td><img src="{{ asset($item->foto_produk) }}" width="30" alt="">
                                            <strong style="margin-left: 10px">{{ $item->title }}</strong>
                                        </td>
                                        <td>{{ $item->nama_lengkap }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($item->alamat, 50) }}</td>


                                        <td>
                                            @if ($item->status == 'Pesanan diterima')
                                                <span class="badge text-success me-1"
                                                    style="background-color: rgba(25, 135, 84, 0.2)">Diterima</span>
                                            @elseif($item->status == 'Pesanan ditolak')
                                                <span class="badge text-danger me-1"
                                                    style="background-color: rgba(220, 53, 69, 0.2)">Ditolak</span>
                                            @elseif($item->status == 'menunggu')
                                                <span class="badge me-1"
                                                    style="background-color: rgba(255, 193, 7, 0.2); color: rgb(129, 98, 19) !important;">Menunggu</span>
                                            @else
                                                <span class="badge  me-1"
                                                    style="background-color: rgba(129, 97, 19, 0.2);color: rgb(129, 98, 19) !important;">{{ $item->status }}</span>
                                            @endif
                                        </td>



                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <div class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal-{{ $item->id }}"><i
                                                            class="bx bx-show me-1"></i> Detail</div>
                                                    <form action="{{ url('/diterima/' . $item->id) }}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <button style="border: none;background: transparent"
                                                            class="dropdown-item"><i class="bx bx-check me-1"></i>
                                                            Terima</button>
                                                    </form>
                                                    <form action="{{ url('/ditolak/' . $item->id) }}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <button style="border: none;background: transparent"
                                                            class="dropdown-item"><i class="bx bx-x me-1"></i>
                                                            Tolak</button>
                                                    </form>
                                                </div>
                                                <div class="modal fade" id="exampleModal-{{ $item->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body"
                                                                style="word-wrap: break-word; word-break: break-word; max-height: 70vh; overflow-y: auto;">
                                                                <div>Nama Pemesan : {{ $item->nama_lengkap }}</div>
                                                                <div>Alamat : {{ $item->alamat }}</div>
                                                                <div>Nomer Handphone : {{ $item->no_hp }}</div>
                                                                <div>Foto Produk : </div>
                                                                <img src="{{ asset($item->foto_produk) }}" width="200"
                                                                    alt="">
                                                                <div>Nama Produk : {{ $item->title }}</div>
                                                                <div>Ukuran : {{ $item->uk }}</div>
                                                                <div>Total Pesanan : {{ $item->jumlah_pesanan }}</div>
                                                                <div>Harga :
                                                                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                                                                </div>
                                                                <div>Bukti Pembayaran :</div>
                                                                <img src="{{ asset('bukti_pembayaran/' . $item->bukti_pembayaran) }}"
                                                                    width="200" alt="">
                                                                <div>Tanggal Pesan : {{ $item->tanggal_pesan }}</div>
                                                                <div>Estimasi Tiba : {{ $item->estimasi }}</div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <div
                                    style="width: 100%;height: 400px;display: flex;justify-content: center;align-items: center">
                                    <p style="color: gray">Tidak ada produk</p>
                                </div>
                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->


            <div class="content-backdrop fade"></div>
        </div>
    @endsection

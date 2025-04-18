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
                    <div style="margin-top: 1px">Dashboard</div>
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
                                        <span class="fw-semibold d-block">{{ Auth::user()->username}}</span>
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
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Selamat {{Auth::user()->username}}! 🎉</h5>
                                    <p class="mb-4">
                                        Kamu berhasil meningkatkan penjualan hingga <span class="fw-bold">72%</span> lebih
                                        banyak dari biasanya.
                                        Kerja kerasmu membuahkan hasil —

                                    </p>

                                    <a href="/pesanan-admin" class="btn btn-sm btn-outline-primary">Cek pesanan</a>
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                    <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                        alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                        data-app-light-img="illustrations/man-with-laptop-light.png" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 mb-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card"
                                                class="rounded" />
                                        </div>

                                    </div>
                                    <span class="d-block mb-1">Total Pesanan</span>
                                    <h3 class="card-title text-danger text-nowrap mt-3">{{$total}} Pesanan</h3>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        @endsection

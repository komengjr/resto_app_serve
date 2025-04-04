@extends('layouts.base')

@section('content')
    <div class="card">
        <div class="card-header bg-light">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0" id="followers">Rekap Report <span class="d-none d-sm-inline-block"></span></h5>
                </div>
                <div class="col">
                    <form>
                        <div class="row g-0">
                            <div class="col">
                                <input class="form-control form-control-sm" type="text" placeholder="Search..." />
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body bg-light px-1 py-0">
            <div class="row g-0 text-center fs--1">
                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                    <div class="bg-white dark__bg-1100 p-3 h-100"><a href="#"><img
                                class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm"
                                src="{{ asset('img/icon/FInance.png') }}" alt="" width="100" /></a>
                        <h6 class="mb-1"><a href="#">Rekap Total</a>
                        </h6>
                        <p class="fs--2 mb-1"><a class="text-700" href="#!">Management</a></p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                    <div class="bg-white dark__bg-1100 p-3 h-100"><a href="#"><img
                                class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm"
                                src="{{ asset('img/icon/pemasukan.png') }}" alt="" width="100" /></a>
                        <h6 class="mb-1"><a href="#">Pemasukan</a>
                        </h6>
                        <p class="fs--2 mb-1"><a class="text-700" href="#!">Management</a></p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                    <div class="bg-white dark__bg-1100 p-3 h-100"><a href="#"><img
                                class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm"
                                src="{{ asset('img/icon/pengeluaran.png') }}" alt="" width="100" /></a>
                        <h6 class="mb-1"><a href="#">Pengeluaran</a>
                        </h6>
                        <p class="fs--2 mb-1"><a class="text-700" href="#!">Graduate Student Council</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

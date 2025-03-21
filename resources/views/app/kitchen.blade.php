@extends('layouts.base')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row justify-content-center">
                @for ($i = 0; $i < 10; $i++)
                    <div class="col-md-3 mb-3">
                        <div class="border rounded-3 overflow-hidden">
                            <div class="d-flex flex-between-center p-4">
                                <div>
                                    <h3 class="fw-light text-primary fs-5 mb-0">Order 1</h3>
                                    <h2 class="fw-light text-primary mt-0"><sup class="fs-1">1029310231293</h2>
                                </div>
                                <div class="pe-3"><img src="{{ asset('resto.png') }}" width="70" alt=""></div>
                            </div>
                            <div class="p-4 bg-light">
                                <ul class="list-unstyled">
                                    <li class="border-bottom py-2"> <!-- <span class="fas fa-check text-primary" data-fa-transform="shrink-2"> </span> Font Awesome fontawesome.com -->
                                        makanan 1</li>
                                    <li class="border-bottom py-2"> <svg
                                            class="svg-inline--fa fa-check fa-w-16 text-primary"
                                            data-fa-transform="shrink-2" aria-hidden="true" focusable="false"
                                            data-prefix="fas" data-icon="check" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""
                                            style="transform-origin: 0.5em 0.5em;">
                                            <g transform="translate(256 256)">
                                                <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                    <path fill="currentColor"
                                                        d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"
                                                        transform="translate(-256 -256)"></path>
                                                </g>
                                            </g>
                                        </svg><!-- <span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                        makanan 2</li>
                                    <li class="py-2 border-bottom"><svg class="svg-inline--fa fa-check fa-w-16 text-primary"
                                            data-fa-transform="shrink-2" aria-hidden="true" focusable="false"
                                            data-prefix="fas" data-icon="check" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""
                                            style="transform-origin: 0.5em 0.5em;">
                                            <g transform="translate(256 256)">
                                                <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                    <path fill="currentColor"
                                                        d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"
                                                        transform="translate(-256 -256)"></path>
                                                </g>
                                            </g>
                                        </svg><!-- <span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                        makanan 3 </li>

                                </ul>
                                <button class="btn btn-primary d-block w-100" type="button">Plan Now</button>
                            </div>
                        </div>
                    </div>
                @endfor
                <div class="col-12 text-center">
                    <h5 class="mt-5">Looking for personal or small team task management?</h5>
                    <p class="fs-1">Try the <a href="#">basic version</a> of Falcon</p>
                </div>
            </div>
        </div>
    </div>
@endsection

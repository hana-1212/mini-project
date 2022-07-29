@extends('Frontend.layout.template')
@section('content')
    <div class="header-box bg-contact">
        <div class="container">
            <h1 class="header-title">
                Kontak
            </h1>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-md-8" id="massage">
                <h6 class="fs-3 mt-4 mb-4 fw-bold">Tinggalkan pesan Anda.</h6>
                <p class="Recently mb-4">Jika ada pesan atau saran dapat disampaikan disini</p>
                <form action="{{route('simpanContact')}}" method="post">
                    @csrf
                    <div class="input d-flex">
                        <div class="input-nama w-50">
                            <label for="nama">Nama</label><br>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="input-email w-50">
                            <label for="email" class="ms-2">Email</label><br>
                            <input type="email" name="email" id="email" class="form-control ms-1">
                        </div>
                    </div>
                    <label for="pesan" class="mt-3">Pesan</label><br>
                    <textarea name="pesan" class="form-control" id="pesan" cols="30" rows="10"></textarea>
                    <button
                        class="btn btn-primary btn-sm btn-primary-custom text-white text-decoration-none px-4 py-3
mt-4">Kirim
                        Pesan</a>
                </form>
            </div>
            <div class="offset-md-1 col-md-3">
                <h6 class="fs-4 mt-4 mb-3 fw-bold">Alamat</h6>
                <p class="Recently mb-4 fs-6">Jl. Pawiyatan Luhur 1/IV <br> Telepon : +923039898987</p>
                <h6 class="fs-4 mt-4 mb-3 fw-bold">Email</h6>
                <p class="Recently mb-4">Anda dapat juga menghubungi kami di alamat email
                    <br><br>Email : bmsi@unika.ac.id
                </p>
            </div>
        </div>
    </div>
@endsection

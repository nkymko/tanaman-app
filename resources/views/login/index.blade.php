@extends('layout.main')

@section('container')

<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row">
                        <img src="https://timur.jakarta.go.id/frontend/assets/img/logo/opsi2.jpg" class="logo">
                    </div>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                        <img src="https://i.imgur.com/uNGdWHi.png" class="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form method="post" action="{{ route('auth.verif') }}" class="card2 card border-0 px-4 py-5">
                    @csrf
                    <div class="row px-3 mb-3">
                        <h2 class="text-success">Log In</h2>
                        <small>Auth to Admin System tanaman-app</small>
                    </div>
                    <div class="row px-3 mt-5">
                        <input class="mb-4" type="text" name="email" placeholder="email">
                    </div>
                    <div class="row px-3 mb-3">
                        <input type="password" name="password" placeholder="password">
                    </div>
                    <div class="row px-3">
                        @if (session()->has('loginError'))
                            <small class="text-danger text-bold">*
                            {{ session('loginError') }}
                            </small>
                        @endif
                    </div>
                    <div class="row mb-3 mt-3 px-3" style="max-width: 10rem">
                        <button type="submit" class="btn btn-success text-center">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
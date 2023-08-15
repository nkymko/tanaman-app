@extends('layout.main')

@section('container')

        <div class="row" >
            <div class="col-md-2">
                {{-- nav-aside --}}
                @include('partials.sidebar')
            </div>
            <div class="col-md-10 p-3">
                <div class="container">
                    <h1 class="mt-4">{{ $title }}</h1>

                    <div class="sub mt-5 d-flex justify-content-between">
                        <div class="text">
                            <p>Index Data</p>
                        </div>
                        <div class="button">
                            <a href="{{ route('plants.index') }}" class="btn btn-primary">Data Tanaman</a>
                        </div>
                    </div>

                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    <div class="mt-5">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="{{ route('plants.index') }}">
                                <div class="card text-bg-primary mb-3">
                                    <div class="card-body">
                                      <h5 class="card-title">TANAMAN</h5>
                                      <h3 class="sum">{{ $plant }}</h3>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('categories.index') }}">
                                <div class="card text-bg-success mb-3">
                                    <div class="card-body">
                                      <h5 class="card-title">KATEGORI TANAMAN</h5>
                                      <h3 class="sum">{{ $category }}</h3>
                                    </div>
                                  </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('locations.index') }}">
                                <div class="card text-bg-secondary mb-3">
                                    <div class="card-body">
                                      <h5 class="card-title">LOKASI TANAMAN</h5>
                                      <h3 class="sum">{{ $location }}</h3>
                                    </div>
                                  </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-bg-danger mb-3">
                                    <div class="card-body">
                                      <h5 class="card-title">USER</h5>
                                      <h3 class="sum">{{ $user }}</h3>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

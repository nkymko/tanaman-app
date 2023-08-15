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
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-lg-8">
                            <form method="post" action="{{ route('categories.update', $data->id) }}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                                  <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" required autocomplete="off" value="{{ old('nama', $data->nama) }}">
                                  @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
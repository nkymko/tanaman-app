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
                            <form method="post" action="{{ route('plants.update', $data->uniqid) }}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Nama Tanaman</label>
                                  <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" required autocomplete="off" value="{{ old('nama', $data->nama) }}">
                                  @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputKhasiat1" class="form-label">Khasiat Tanaman</label>
                                  <input type="text" class="form-control @error('khasiat') is-invalid @enderror" name="khasiat" id="exampleInputKhasiat1" required autocomplete="off" value="{{ old('khasiat', $data->khasiat) }}">
                                  @error('khasiat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label for="exampleInputLatin1" class="form-label">Nama Latin Tanaman</label>
                                    <input type="text" class="form-control @error('latin') is-invalid @enderror" name="latin" id="exampleInputLatin1" required autocomplete="off" value="{{ old('latin', $data->latin) }}">
                                    @error('latin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                                <div class="mb-4">
                                    @if ($data->thumbnail)
                                        <img src="{{ asset('storage/'. $data->thumbnail) }}" alt="pict" class="mb-2 img-preview img-fluid col-sm-5 d-block">
                                    @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                    @endif
                                    <label for="formFile" class="form-label">Foto Tanaman</label>
                                    <input class="form-control  @error('thumbnail') is-invalid @enderror" name="thumbnail" type="file" id="thumbnail" autocomplete="off" onchange="previewImage()">
                                    <input type="hidden" name="oldImage" value="{{ $data->thumbnail }}">
                                  </div>
                                  @error('thumbnail')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                  @enderror
                                <button type="submit" class="btn btn-primary">Update</button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function previewImage() {
                const image = document.querySelector('#thumbnail');
                const imgPreview = document.querySelector('.img-preview');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function (oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }
        </script>
@endsection
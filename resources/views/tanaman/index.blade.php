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
                            <a href="{{ route('plants.create') }}" class="btn btn-success">Tambah data tanaman</a>
                        </div>
                    </div>

                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    @endif

                    <div class="table-wrapper mt-5">
                        <table id="myTable" class="table cell-border">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Khasiat</th>
                                    <th>Latin</th>
                                    <th>Thumbnail</th>
                                    <th>QRCode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($plants as $plant)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $plant->nama }}</td>
                                    <td>{{ $plant->khasiat }}</td>
                                    <td>{{ $plant->latin }}</td>
                                    <td><img src="{{ asset('storage/'. $plant->thumbnail) }}" alt="pict" width="100px"></td>
                                    <td><img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->generate(url('/plants/' . $plant->uniqid))) }}" alt="plantqr"></td>
                                    <td>
                                        <div class="group" style="display: flex; gap:3px;">
                                            <a href="{{ route('plants.show', $plant->uniqid) }}" class="btn btn-info text-light"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('plants.edit', $plant->uniqid) }}" class="btn btn-warning text-light"><i class="fas fa-pencil"></i></a> 
                                            <form action="{{ route('plants.destroy', $plant->uniqid) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger text-light" onclick="return confirm('Hapus data?')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection
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
                            <a href="{{ route('categories.create') }}" class="btn btn-success">Tambah kategori</a>
                        </div>
                    </div>

                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    <div class="table-wrapper mt-5">
                        <table id="myTable" class="table cell-border">
                            <thead>
                                <tr>
                                    <th width="5%">No.</th>
                                    <th>Nama</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $category->nama }}</td>
                                    <td>
                                        <div class="group" style="display: flex; gap:3px;">
                                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info text-light"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning text-light"><i class="fas fa-pencil"></i></a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
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

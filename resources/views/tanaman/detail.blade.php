@extends('layout.main')

@section('container')

    <div class="wrapper-main" style="overflow: hidden">
        <div class="card">
          <div class="row g-5">
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="img">
                    <img src="{{ asset('storage/'. $data->thumbnail) }}" alt="profpic">
                  </div>
             </div>
            <div class="col-lg-8 col-md-8 col-xs-12">
                <div class="text">
                    <div class="top">
                      <h1 class="nama" style="font-weight: bold">{{ $data->nama }}</h1>
                      <h5>{{ $data->latin }}</h5>
                    
                    </div>
            
                    <div class="bottom">
                      <p class="kelas"><span>Khasiat:</span> {{ $data->khasiat }}</p>
                      <p class="agama"><span>Deskripsi:</span> Lorem Ipsum dolor sit amet</p>
                      <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->generate(url('/plants/' . $data->uniqid))) }}" alt="plantqr">
                    </div>
                  </div>
            </div>
          </div>
    
          <!-- bg -->
          <div class="bg-img">
            <img src="https://timur.jakarta.go.id/frontend/assets/img/logo/opsi2.jpg">
          </div>
        </div>
    </div>
    
@endsection
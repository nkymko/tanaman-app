<!DOCTYPE html>
<html lang="en">
<head>
    {{-- metadata --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Microsite untuk data tanaman Jakarta Timur">
    <meta name="author" content="Kominfotik">

    {{-- google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- material cdn icon --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    {{-- title for page --}}
    <title>{{ $title }}</title>

    {{-- vendor --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />

    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/'. $style .'.css') }}">

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/28a1cad8ba.js" crossorigin="anonymous"></script>
</head>
<body>

    <section class="container-fluid">
        @yield('container')
    </section>
    
    {{-- script --}}
    
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>

    <!-- datatables -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <script>
      let table = new DataTable("#myTable");

      $(document).ready(function () {
        $("#myTable").DataTable();
      });
    </script>

    {{-- vendor --}}
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>
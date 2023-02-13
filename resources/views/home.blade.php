<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>BISTRO OF MOROCCO</title>
<!-- ================== BEGIN core-css ================== -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/doc/assets/docs.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/src/parsley.css" />
    {{-- for header --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


<!-- ================== END core-css ================== -->
</head>
<body>
    {{-- <div class="mt-4 d-flex align-items-center justify-content-between">
        <div>
            <h2>logo</h2>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn me-3">
                {{ __('Log Out') }}
            </button>
        </form>
    </div> --}}
    @include('layouts.navigation')

    <div class="container-fluid">
        <div class="d-flex justify-content-evenly flex-wrap my-5">
                @foreach ($data as $item)
                    <div class="card mt-4" style="width: 18rem;">
                        <div class="d-flex justify-content-center">
                            <img src="{{URL::asset('/img/'.$item->image)}}" class="card-img-top" alt="not found" style="height:200px;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$item->name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$item->price}}</h6>
                            <p class="card-text">{{$item->description}}</p>
                            <a href="#" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                @endforeach
        </div>
        {{$data->links()}}
    </div>





    <!--==================================== scripts ======================================-->
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
 <script src="../js/parsley.js"></script>
 <script src="../js/scripts.js"></script>
 <script>
    $(document).ready( function () {
    $('#tableId').DataTable();
} );
 </script>
</body>
</html>
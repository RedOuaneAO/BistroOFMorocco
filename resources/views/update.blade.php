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
    <link rel="stylesheet" href="../css/dashStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/doc/assets/docs.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/src/parsley.css" />
<!-- ================== END core-css ================== -->
</head>
<body>


    <div class="mt-2 d-flex align-items-center justify-content-between">
        <div>
            <h2>logo</h2>
        </div>
            @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn text-darck">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn text-darck">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn text-darck">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    <div class="container-fluid d-flex justify-content-center  mt-3">
       <div class="bg-dark rounded" style="width:500px;">
           <form action="/{{$data->id}}" method="POST" class="p-5" enctype="multipart/form-data">
               @csrf
               @method('put')            
               <div class="mb-3 d-flex justify-content-center">
                   <img src="{{URL::asset('/img/'.$data->image)}}" style="width: 200px">
               </div>
               <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label text-white">Plate Name</label>
                 <input type="text" name="name" class="form-control" value="{{$data['name']}}">
               </div>
               <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label text-white">Price</label>
                 <input type="number" name="price" class="form-control" value="{{$data['price']}}">
               </div>
               <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label text-white">Description</label>
                 <textarea class="form-control" name="description">{{$data['description']}}</textarea>
               </div>
               <div class="mb-3">
                <label class="form-label text-white">Image</label>
                <input type="file" name="image" class="form-control">
              </div>
               <button type="submit" class="btn btn-primary">Submit</button>
             </form>
       </div>
           
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
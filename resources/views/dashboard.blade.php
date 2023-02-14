<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 d-flex justify-content-evenly">
                    <div class="bg-white p-4 rounded-4">CUSTOMERS <i class="bi bi-people-fill"></i></div>
                    <div class="bg-white p-4 rounded-4">PLATE <i class="bi bi-egg-fried"></i><span class="ms-3">{{$plateCounter}}</span></div>
                </div>
            </div>
        </div>
        <a href="{{route('add')}}" class="btn bg-info ms-4 mt-3" >ADD</a>
        <div class="container-fluid row">
            <div class="table-responsive mt-3 tb rounded col-9">
            @if ($message = Session::get('success')) 
                <div class="alert alert-success">
                    <p class="m-0">{{ $message }}</p>
                </div>
                @endif
                @if ($message = Session::get('delete'))
                    <div class="alert alert-danger">
                        <p class="m-0">{{ $message }}</p>
                    </div>
                 @endif
            <table class="table table-dark table-striped table-bordered"  id="tableId" >
                <thead class="">
                    <tr>
                        <th scope="col">NAME</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">DESCRIPTION</th>
                        <th scope="col">IMAGE</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td scope="col">{{$item['name']}}</td>
                        <td scope="col">{{$item['price']}}</td>
                        <td scope="col">{{$item['description']}}</td>
                        <td scope="col"><img src="img/{{$item['image']}}" style="width: 30px"></td>
                        <td scope="col">
                            <a href={{"edit/".$item['id']}} class="btn bg-success"><i class="bi bi-pencil-square text-white"></i></a>
                            <a href={{"delete/".$item['id']}} class="btn bg-danger"><i class="bi bi-trash-fill text-white"></i></a>
                        </td>
                    </tr>
                        @endforeach
                </tbody>
            </table>
        </div> 
        <div class="card mt-3" style="width: 18rem;">
            <img src="img/{{$item['image']}}" class="card-img-top mt-1" alt="...">
            <div class="card-body">
              <h5 class="card-title fw-bold text-center">{{$item['name']}}</h5>
              <h5 class="card-title text-secondary">{{$item['price']}} DH</h5>
              <p class="card-text">{{$item['description']}}</p>
            </div>
        </div>
    </div>   
    </div>
</x-app-layout>

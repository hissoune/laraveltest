@extends('layout.base')

@section('title')
    ecomerce
@endsection

@section('products')
    active
@endsection

@section('main')
       <h1 class="text-center my-3">welcome to <span class=" text-warning text-capitalize "><strong>ecomerce</strong> </span> </h1>
       <h3>last products</h3>
    <div class="row container-fluid ">
        @foreach ($products as $product)
            <div class="col-3 my-4 h-100">
                <div class="card shadow ">
                    <img src="storage/{{ $product->image }}" class="card-img-top" alt="Product Image" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Quantity: {{ $product->quantity }}</li>
                            <li class="list-group-item">Price: {{ $product->price }}</li>
                        </ul>
                    </div>
                    <div class="card-footer d-flex  ">
                        <span class="text-muted">Created at: {{ $product->created_at }}</span>
                        <div class="">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-info p-0 text-light shadow ">Show more</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div><a href="{{route('home.all')}}">see all products</a></div>

   {{-- <div class="d-flex  justify-content-center w-100">{{ $products->links() }}</div>  --}}
@endsection

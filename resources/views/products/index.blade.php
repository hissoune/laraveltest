
@extends('layout.base')
@section('title')
    products
@endsection
@section('products')
    active
@endsection
@section('main')

<form action="{{ route('products.search') }}" method="get">
  
    <select name="product" class="form-select my-5" onchange="this.form.submit()">
        <option value="" selected >all</option>
        @foreach ($products as $product)
            <option value="{{ $product->id }}" {{ request('product') == $product->id ? 'selected' : '' }}>
                {{ $product->name }}
            </option>
        @endforeach
    </select> 
   
</form>
 {{-- <button type="submit">Submit</button> --}}


<a href="{{ route('products.create') }}" class="btn btn-info ">add</a>
<table class="table table-responsive bg-light my-2 shadow">
    <thead><tr>
        <td>id</td>
        <td>name</td>
        <td>description</td>
        <td>quantity</td>
        <td>price</td>
        <td>image</td>
        <td>created_at</td>
        <td>action</td>
    </tr></thead>
    <tbody>
        @if (isset($productsItems) && $productsItems !== null   )
        <tr>
            <td>{{$productsItems->id}}</td>
            <td>{{$productsItems->name}}</td>
            <td>{{$productsItems->description}}</td>
            <td>{{$productsItems->quantity}}</td>
            <td>{{$productsItems->price}}</td>
            <td><img width="100px" src="storage/{{$product->image}}" alt=""> </td>
            <td>{{$product->created_at}}</td>
            <td class="d-flex gap-2 "><a href="{{ route('products.show',$product) }}" class="btn btn-info ">show</a>
            <a href="{{ route('products.edit',$product) }}" class="btn btn-primary ">edit</a>
           <form action="{{ route('products.destroy',$product) }}" method="post">
            @csrf
            @method('delete')
             <button type="submit" class="btn btn-danger ">delet</button>
        </form>
        </td>
        </tr>
    </tbody>
    
</table>
            
        @else
        {{-- @livewire('counter') --}}

          
        @foreach ($products as $product )
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->price}}</td>
            <td><img width="100px" src="storage/{{$product->image}}" alt="imgf"> </td>
            <td>{{$product->created_at}}</td>
            <td class="d-flex gap-2 "><a href="{{ route('products.show',$product) }}" class="btn btn-info ">show</a>
            <a href="{{ route('products.edit',$product) }}" class="btn btn-primary ">edit</a>
           <form action="{{ route('products.destroy',$product) }}" method="post">
            @csrf
            @method('delete')
             <button type="submit" class="btn btn-danger ">delet</button>
        </form>
        </td>
        </tr>
        @endforeach

       
        
       
        
    </tbody>
    
</table>
{{$products->links()}}    

@endif
{{-- <x-categories :categories='$categories' /> --}}

@endsection

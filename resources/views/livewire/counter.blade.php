<div>
    {{-- Be like water. --}}
    <input wire:model="search" type="text" placeholder="Search users..."/>
 
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
</div>

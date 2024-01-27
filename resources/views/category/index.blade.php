
@extends('layout.base')
@section('title')
    categorie
@endsection
@section('category')
    active
@endsection
@section('main')
<form action="{{ route('category.search') }}" method="get">
    @csrf
    <select name="category" class="form-select my-5" onchange="this.form.submit()">
        <option value="" selected >all</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select> 
   
</form>
 {{-- <button type="submit">Submit</button> --}}


<a href="{{ route('category.create') }}" class="btn btn-info ">add</a>
<table class="table table-responsive bg-light my-2 shadow">
    <thead><tr>
        <td>id</td>
        <td>name</td>
        <td>created at</td>
        <td>action</td>
    </tr></thead>
    <tbody>
        @if (isset($categoryItems) && $categoryItems !== null   )
        <tr>
            <td>{{$categoryItems->id}}</td>
            <td>{{$categoryItems->name}}</td>
            <td>{{$categoryItems->created_at}}</td>
            <td class="d-flex gap-2 "><a href="{{ route('category.show',$categoryItems) }}" class="btn btn-info ">show</a>
            <a href="{{ route('category.edit',$categoryItems) }}" class="btn btn-primary ">edit</a>
           <form action="{{ route('category.destroy',$categoryItems) }}" method="post">
            @csrf
            @method('delete')
             <button type="submit" class="btn btn-danger ">delet</button>
        </form>
        </td>
        </tr>
       
            
        @else
        @foreach ($categories as $category )
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->created_at}}</td>
            <td class="d-flex gap-2 "><a href="{{ route('category.show',$category) }}" class="btn btn-info ">show</a>
            <a href="{{ route('category.edit',$category) }}" class="btn btn-primary ">edit</a>
           <form action="{{ route('category.destroy',$category) }}" method="post">
            @csrf
            @method('delete')
             <button type="submit" class="btn btn-danger ">delet</button>
        </form>
        </td>
        </tr>
        @endforeach
            
        @endif
        
       
        
    </tbody>
    
</table>
{{-- <x-categories :categories='$categories' /> --}}

@endsection

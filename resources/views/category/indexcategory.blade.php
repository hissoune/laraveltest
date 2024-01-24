
@extends('layout.base')
@section('title')
    categorie
@endsection
@section('main')
<table class="table table-responsive bg-light my-2 shadow">
    <thead><tr>
        <td>id</td>
        <td>name</td>
        <td>created at</td>
        <td>action</td>
    </tr></thead>
    <tbody>
        @foreach ($categories as $category )
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->created_at}}</td>
            <td>action</td>
        </tr>
        @endforeach
        
    </tbody>
    
</table>
{{$categories->links()}}
@endsection

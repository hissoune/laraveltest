@extends('layout.base')
@section('main')
<div class="container">
<div class="card mx-xl-5 ">

  <!-- Card body -->
  <div class="card-body">

    <form action="{{ route('category.update',$category)}}" method="post">
      @csrf
      @method('PATCH')
      <p class="h4 text-center py-4">update category </p>

      <label for="defaultFormCardNameEx"  class="grey-text font-weight-light">category name</label>
      <input type="text" name="catname" id="defaultFormCardNameEx" class="form-control" value="{{$category->name}}">

     

      <div class="text-center py-4 mt-3">
        <button class="btn btn-info" type="submit">update<i
            class="fa fa-paper-plane-o ml-2"></i></button>
      </div>
    </form>

  </div>

</div>
<!-- Card -->
</div>
@endsection

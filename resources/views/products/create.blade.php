@extends('layout.base')

@section('main')
<div class="container">
    <div class="card mx-xl-5">

        <!-- Card body -->
        <div class="card-body">

            <form action="{{ route('products.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <p class="h4 text-center py-4">Add Product</p>

                <div class="form-group">
                    <label for="productName" class="grey-text font-weight-light">Product Name</label>
                    <input type="text" name="product_name" id="productName" class="form-control"
                        value="{{ old('product_name') }}">
                </div>

                <div class="form-group">
                    <label for="description" class="grey-text font-weight-light">Description</label>
                    <textarea name="description" id="description" class="form-control"
                        rows="4">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="quantity" class="grey-text font-weight-light">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control"
                        value="{{ old('quantity') }}">
                </div>

                <div class="form-group">
                    <label for="price" class="grey-text font-weight-light">Price</label>
                    <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
                </div>

                <div class="form-group">
                    <label for="image" class="grey-text font-weight-light">Image URL</label>
                    <input type="file" name="image" id="image" class="form-control" >
                </div>
                <div class="form-group">
                    <select name="category_id" class="form-select my-5">
                        <option value="" selected disabled>Select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                

                <div class="text-center py-4 mt-3">
                    <button class="btn btn-info" type="submit">Add <i class="fa fa-paper-plane-o ml-2"></i></button>
                </div>
            </form>

        </div>

    </div>
    <!-- Card -->
</div>
@endsection

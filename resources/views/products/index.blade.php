@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card card-block">
        <h2 class="card-title">Laravel AJAX Examples
            
        </h2>
        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Product</button>
    </div>

    <div>
        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Product Category</th>
                    <th>Product Price</th>
                    <th>Product Image</th>
                    <th>Edit or Delete</th>
                </tr>
            </thead>
            <tbody id="products-list" name="products-list">
                @forelse ($products as $product)
                <tr id="product{{$product->id}}">
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->price}}</td>
                    <td><img src="{{$product->image}}" alt="{{$product->title}}" width="120px" height="120px"></td>
                    <td>
                        <button class="btn btn-info open-modal" value="{{$product->id}}">Edit
                        </button>
                        <button class="btn btn-danger delete-product" value="{{$product->id}}">Delete
                        </button>
                    </td>
                </tr>
                @empty
                <h1 class="text-center">No Product Listings. Soon Coming!</h1>
                @endforelse
            </tbody>
        </table>

        <div class="modal fade" id="productEditorModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="productEditorModalLabel">product Editor</h4>
                    </div>
                    <div class="modal-body">
                        <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                            <div class="form-group">
                                <label for="inputproduct" class="col-sm-2 control-label capitalize">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="product" name="producttitle"
                                        placeholder="product title" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Category</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="description" name="category"
                                        placeholder="Enter product category" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="price" name="price" placeholder="Enter product price"
                                        value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Product Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="image" name="productimage" placeholder="Enter product category"
                                        value="">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                        </button>
                        <input type="hidden" id="product_id" name="product_id" value="0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
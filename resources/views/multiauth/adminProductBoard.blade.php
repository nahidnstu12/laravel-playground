@extends('layouts.app')

@section('section')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        {{-- header --}}
        @include('usersignup.header',['pageName'=> 'Admin Product Dashboard'])
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users view start -->
            <section class="users-view">
                <!-- users view media object start -->
                <div class="row">

                    <div class="col-xl-8 col-lg-12 m-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="list-editable">ALL Products </h4>
                            </div>
                            <div class="card-body">
                                <div class="card-body">

                                    <div id="editable-list" >
                                   

                                        <input type="text" class="search form-control round border-primary mb-1"
                                            placeholder="Search" />
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <button class="sort btn btn-block btn-outline-warning btn-round mb-2"
                                                    data-sort="name">Sort by name
                                                </button>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <button class="sort btn btn-block btn-outline-success btn-round mb-2"
                                                    data-sort="age">Sort by price
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                        {{-- add/edit form dress--}}
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-lg mt-2 mb-2">
                                                <tr>
                                                    <td class="name">
                                                        <input type="hidden" id="id-field" />
                                                        <input type="text" id="name-field" placeholder="Name"
                                                            class="form-control" name="dress_name"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="age">
                                                        <input type="text" id="age-field" placeholder="Brand Name"
                                                            class="form-control" name="brand_id"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="city">
                                                        <input type="text" id="city-field" placeholder="Quantity"
                                                            class="form-control" name="quantity"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="city">
                                                        <input type="text" id="city-field" placeholder="Price"
                                                            class="form-control" name="price"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="add">
                                                        <button id="add-btn" class="btn btn-success">Add</button>
                                                        <button id="edit-btn" class="btn btn-primary">Edit</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        {{-- data table --}}
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-lg text-center">
                                                <thead>
                                                    <tr>
                                                        <th class="sort text-center" data-sort="name">Name</th>
                                                        <th class="sort text-center" data-sort="age">Brand</th>
                                                        <th class="sort text-center" data-sort="age">Quantity</th>
                                                        <th class="sort text-center" data-sort="city">Price</th>
                                                        <th>Edit</th>
                                                        <th>Remove</th>
                                                    </tr>
                                                </thead>
                                                <!-- IMPORTANT, class="list" have to be at tbody -->
                                                <tbody class="list">
                                                  
                                                   @forelse ($products as $dress)
                                                   <tr>
                                                    <td class="name">{{ $dress->dress_name}}</td>
                                                    <td class="age">{{ $dress->brand->brand_name}}</td>
                                                    <td class="age">{{ $dress->quantity}}</td>
                                                    <td class="city">{{ $dress->prices}}</td>
                                                    <td class="edit"><button
                                                            class="btn btn-outline-primary edit-item-btn">Edit</button>
                                                    </td>
                                                    <td class="remove"><button
                                                            class="btn btn-outline-danger remove-item-btn">Remove</button>
                                                    </td>
                                                </tr>
                                                   @empty
                                                       <p>Sorry, No Product Available</p>
                                                   @endforelse
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                                    <!-- users view card details ends -->
            </section>
            <!-- users view ends -->
        </div>
    </div>
</div>
<!-- END: Content-->
<script>
    @if(session('status'))
            // toastr.success("{!! session('status') !!}")
            // alert("{!! session('status') !!}");
            @endif
            
</script>
@endsection
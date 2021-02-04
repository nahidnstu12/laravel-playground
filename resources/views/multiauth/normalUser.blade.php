@extends('layouts.app')

@section('section')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        {{-- header --}}
        @include('usersignup.header')
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users view start -->
            <section class="users-view">
                <!-- users view media object start -->

                    <div class="col-xl-6 col-lg-12 m-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="list-editable">You Are Regular User</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-body">

                                    <div id="editable-list">
                                       
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-lg text-center">
                                                <thead>
                                                    <tr>
                                                        <th class="sort text-center" data-sort="name">Name</th>
                                                        <th class="sort text-center" data-sort="age">Age</th>
                                                        <th class="sort text-center" data-sort="city">City</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <!-- IMPORTANT, class="list" have to be at tbody -->
                                                <tbody class="list">
                                                    <tr>
                                                        <td class="name">Jonny</td>
                                                        <td class="age">27</td>
                                                        <td class="city">Stockholm</td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td class="name">Jonny</td>
                                                        <td class="age">27</td>
                                                        <td class="city">Stockholm</td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td class="name">Jonny</td>
                                                        <td class="age">27</td>
                                                        <td class="city">Stockholm</td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td class="name">Jonny</td>
                                                        <td class="age">27</td>
                                                        <td class="city">Stockholm</td>
                                                        
                                                    </tr>
                                                   
                                                    
                                                </tbody>
                                            </table>
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
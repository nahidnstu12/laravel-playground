<div class="content-header row">
         
    <div class="content-header-left col-md-6 col-12 mb-2">
        @auth 
        <h3 class="content-header-title">Account setting</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb" style="background: #E0E0E0;padding:10px">
                    <li class="breadcrumb-item"><a href="/">Home</a>
                    </li>
                    {{-- <li class="breadcrumb-item"><a href="#">Pages</a>
                    </li> --}}
                    @isset($pageName)
                    <li class="breadcrumb-item active">{{ $pageName }}
                    </li>
                    @endisset
                </ol>
            </div>
        </div>
        @endauth
    </div>
    
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2 mb-1"
                id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="ft-settings icon-left"></i> 
                @guest Settings @endguest
                @auth {{auth()->user()->name}} @endauth
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                @auth
                <a class="dropdown-item" href="{{ url('/')}}">View User</a>
                <a class="dropdown-item" href="{{ url('/edit-user')}}">Edit User</a>
                <a class="dropdown-item" href="{{ url('/account-settings')}}">Account Settings</a>
                @if( auth()->user()->role_type == 3)
                    <a class="dropdown-item" href="{{ url('/admin/board')}}">Admin Board</a>
                    <a class="dropdown-item" href="{{ url('/admin/userlist')}}">Admin Userlist</a>
                @endif
                @if( auth()->user()->role_type == 0)
                <a class="dropdown-item" href="{{ url('/user/board')}}">Normal User Board</a>
                @endif
                @if( auth()->user()->role_type == 1)
                <a class="dropdown-item" href="{{ url('/dress/board')}}">Dress Board</a>
                @endif
                @if( auth()->user()->role_type == 2)
                <a class="dropdown-item" href="{{ url('/product/board')}}">Product Board</a>
                @endif
                <form method="post" action="{{ route('logout.me')}}">
                    @csrf
                    {{-- @method('post') --}}
                    <button class="dropdown-item" >LogOut</button>
                </form>
                @endauth
                @guest
                <a class="dropdown-item" href="{{ url('/login')}}">Login</a>
                <a class="dropdown-item" href="{{ url('/register')}}">Register</a>
                <a class="dropdown-item" href="{{ url('/login/mauth')}}">Login-MAuth</a>
                <a class="dropdown-item" href="{{ url('/register/mauth')}}">Register-MAuth</a>
                @endguest
            </div>
        </div>
    </div>
</div>
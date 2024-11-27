<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{asset('/admincss/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
        </div>
    </div>
    <span class="heading">Menu</span>
    <ul class="list-unstyled">
        <li class="active"><a href="{{route('admin.index')}}"> <i class="icon-home"></i>Home </a></li>
        <li>
            <a href="{{url('view_category')}}">
                <i class="icon-pencil-case"></i>
                Category
            </a>
        </li>

        <li>
            <a href="{{ route('admin.product') }}">
                <i class="icon-grid"></i>
                Products
            </a>
        </li>
        <li>
            <a href="{{ route('admin.create') }}">
                <i class="icon-padnote"></i>
                Create Products
            </a>
        </li>
        <li>
            <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Branches </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
            </ul>
        </li>
    </ul>
</nav>

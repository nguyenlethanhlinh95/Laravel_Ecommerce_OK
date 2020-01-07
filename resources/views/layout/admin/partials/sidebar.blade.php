<ul class="nav" id="side-menu">
    <li class="sidebar-search">
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
        <!-- /input-group -->
    </li>
    <li>
        <a href="{{ route('admin.index') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
    </li>
    <li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Category Product<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('category-product.index') }}">List</a>
            </li>
            <li>
                <a href="{{ route('category-product.create') }}">Create</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>

    <li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Page<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('page.index') }}">All pages</a>
            </li>
            <li>
                <a href="{{ route('page.create') }}">Add new</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>



    <li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Products<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('product.index') }}">All product</a>
            </li>
            <li>
                <a href="{{ route('product.create') }}">Add New</a>
            </li>
            <li>
                <a href="{{ route('category-product.index') }}">Categories</a>
            </li>
            <li>
                <a href="{{ route('attribute.index') }}">Attributes</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category posts<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('category.index') }}">List</a>
            </li>
            <li>
                <a href="{{ route('category.create') }}">Create</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Posts<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('post.index') }}">List</a>
            </li>
            <li>
                <a href="{{ route('post.create') }}">Create</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>

    <li>
        <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
    </li>
    <li>
        <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="panels-wells.html">Panels and Wells</a>
            </li>
            <li>
                <a href="buttons.html">Buttons</a>
            </li>
            <li>
                <a href="notifications.html">Notifications</a>
            </li>
            <li>
                <a href="typography.html">Typography</a>
            </li>
            <li>
                <a href="grid.html">Grid</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>

</ul>
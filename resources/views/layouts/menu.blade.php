<ul class="main-menu">
    <li class="">
        <a href="{{ route('user.dashboard') }}">
            <div class="icon-w">
                <div class="os-icon os-icon-layout"></div>
            </div>
            <span>Dashboard</span></a>
    </li>
    <li class="sub-header">
        <span>Stock Management</span>
    </li>
    <li class="">
        <a href="{{ route('user.products.index') }}">
            <div class="icon-w">
                <div class="os-icon os-icon-layers"></div>
            </div>
            <span>Stock In</span>
        </a>
    </li>
    <li class="">
        <a href="{{ route('user.products.createOut') }}">
            <div class="icon-w">
                <div class="os-icon os-icon-layers"></div>
            </div>
            <span>Stock Out</span>
        </a>
    </li>
    <li class="">
        <a href="{{ route('user.products.createReturn') }}">
            <div class="icon-w">
                <div class="os-icon os-icon-layers"></div>
            </div>
            <span>Return</span>
        </a>
    </li>
    <li class="sub-header">
        <span>User Management</span>
    </li>
    <li class="">
        <a href="{{ route('user.staffs.index') }}">
            <div class="icon-w">
                <div class="os-icon os-icon-users"></div>
            </div>
            <span>Staffs</span>
        </a>
    </li>
    <li class="">
        <a href="{{ route('user.users.index') }}">
            <div class="icon-w">
                <div class="os-icon os-icon-users"></div>
            </div>
            <span>Users</span>
        </a>
    </li>
    <li class="sub-header">
        <span>Product Details</span>
    </li>
    <li class=" has-sub-menu">
        <a href="layouts_menu_top_image.html">
            <div class="icon-w">
                <div class="os-icon os-icon-layers"></div>
            </div>
            <span>Product Details</span>
        </a>
        <div class="sub-menu-w">

            <div class="sub-menu-icon">
                <i class="os-icon os-icon-layers"></i>
            </div>
            <div class="sub-menu-i">
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('user.types.index') }}">Product Type</a>
                    </li>
                    <li>
                        <a href="{{ route('user.makes.index') }}">Make</a>
                    </li>
                    <li>
                        <a href="{{ route('user.models.index') }}">Model</a>
                    </li>
                    <li>
                        <a href="{{ route('user.colours.index') }}">Colour</a>
                    </li>
                    <li>
                        <a href="{{ route('user.storages.index') }}">Storage</a>
                    </li>
                    <li>
                        <a href="{{ route('user.conditions.index') }}">Condition</a>
                    </li>
                    <li>
                        <a href="{{ route('user.locations.index') }}">Location</a>
                    </li>
                </ul>
            </div>
        </div>
    </li>
    <li class="sub-header">
        <span>Cell Exchange</span>
    </li>
    <li class="">
        <a href="{{ route('user.cx.members') }}">
            <div class="icon-w">
                <div class="os-icon os-icon-layers"></div>
            </div>
            <span>Members</span>
        </a>
    </li>
    <li class="">
        <a href="{{ route('user.cx.posts') }}">
            <div class="icon-w">
                <div class="os-icon os-icon-layers"></div>
            </div>
            <span>Posts</span>
        </a>
    </li>
    <li class="">
        <a href="{{ route('user.cx.makes') }}">
            <div class="icon-w">
                <div class="os-icon os-icon-layers"></div>
            </div>
            <span>Make</span>
        </a>
    </li>
    <li class="">
        <a href="{{ route('user.cx.models') }}">
            <div class="icon-w">
                <div class="os-icon os-icon-layers"></div>
            </div>
            <span>Model</span>
        </a>
    </li>
</ul>

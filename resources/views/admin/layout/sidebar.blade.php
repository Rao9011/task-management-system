
<nav class="sidebar dark_sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="index.html"><img src="img/logo_white.png" alt></a>
        <a class="small_logo" href="index.html"><img src="img/mini_logo.png" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/1.svg" alt>
                </div>
                <div class="nav_title">
                    <span>Dashboard </span>
                </div>
            </a>
            <ul>
                <li><a href="index_2.html">Default</a></li>
                <li><a href="index_3.html">Light Sidebar</a></li>
                <li><a href="index.html">Dark Sidebar</a></li>
            </ul>
        </li>
        <li>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div>
                    <span class="ms-4">Logout</span>
                </div>
            </a>
        
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        
       

    </ul>
</nav>
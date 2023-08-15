<aside>
    <div class="top">
        <div class="logo">
            <img src="https://timur.jakarta.go.id/frontend/assets/img/logo/opsi2.jpg" width="70%">
        </div>
        <div class="close" id="close-btn">
            <span class="material-icons-sharp">close</span>
        </div>
    </div>

    <div class="sidebar">
        <a href="{{ route('dashboard') }}" class="{{ ( Request::is('dashboard*') ? 'active' : '') }}">
            <span class="material-icons-sharp">grid_view</span>
            <h3>Dashboard</h3>
        </a>
        {{-- <a href="#">
            <span class="material-icons-sharp">person_outline</span>
            <h3>Customers</h3>
        </a> --}}
        <a href="{{ route('categories.index') }}" class="{{ ( Request::is('categories*') ? 'active' : '' ) }}">
            <span class="material-icons-sharp">list_alt</span>
            <h3>Kategori Tanaman</h3>
        </a>
        <a href="{{ route('locations.index') }}" class="{{ ( Request::is('locations*') ? 'active' : '' ) }}">
            <span class="material-icons-sharp">pin_drop</span>
            <h3>Lokasi Tanaman</h3>
        </a>
        <a href="{{ route('logout') }}">
            <span class="material-icons-sharp">logout</span>
            <h3>Logout</h3>
        </a>
    </div>
</aside>

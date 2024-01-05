<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">S-Data HealthCare</a>
        </div>


        <div class="p-2">
            <div class="hide-sidebar-mini  mb-2">
                <a href="{{ route('pasien.index') }}"
                    class=" {{ request()->routeIs('pasien.index') ? 'active btn-active' : 'btn' }}  btn-primary btn-lg btn-block btn-icon-split text-center">
                    <i class="fa-solid fa-house"></i> Home
                </a>
            </div>
            <div class="hide-sidebar-mini mb-2">
                <a
                    href="{{ route('pasien.create') }}"class="{{ request()->routeIs('pasien.create') ? 'active btn-active' : 'btn' }}  btn-primary btn-lg btn-block btn-icon-split text-center">
                    <i class="fa-solid fa-pen-to-square"></i> Input Pasien
                </a>
            </div>
            <div class="hide-sidebar-mini  mb-2">
                <a href="{{ route('request_expired') }}"
                    class="{{ request()->routeIs('request_expired') ? 'active btn-active' : 'btn' }}  btn-primary btn-lg btn-block btn-icon-split text-center">
                    <i class="fa-solid fa-list"></i> List Data Request
                </a>
            </div>
            <div class="hide-sidebar-mini  mb-2">
                <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split text-center">
                    <i class="fa-solid fa-envelope"></i> Info Request
                </a>
            </div>
            <div class="hide-sidebar-mini mb-2">
                <a href="{{ route('request-pasien.index') }}"
                    class="{{ request()->routeIs('request-pasien.index') ? 'active btn-active' : 'btn' }} btn-primary btn-lg btn-block btn-icon-split text-center">
                    <i class="fa-solid fa-magnifying-glass"></i> Cari Data Pasien
                </a>
            </div>

        </div>
    </aside>
</div>

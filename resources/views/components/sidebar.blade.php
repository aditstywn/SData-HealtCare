<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">S-Data HealthCare</a>
        </div>


        <div class="p-2">
            <div class="hide-sidebar-mini  mb-2">
                <a href="{{ route('pasien.index') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i>Home
                </a>
            </div>
            <div class="hide-sidebar-mini mb-2">
                <a href="{{ route('pasien.create') }}"class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i>Input Pasien
                </a>
            </div>
            <div class="hide-sidebar-mini  mb-2">
                <a href="{{ route('request_expired') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i>Request Data Expired
                </a>
            </div>
            <div class="hide-sidebar-mini mb-2">
                <a href="{{ route('request') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i> Request Data Pasien
                </a>
            </div>
        </div>
    </aside>
</div>

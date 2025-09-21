{{-- <!-- Sidebar -->
<div class="sidebar">
    <ul class="nav-links">
        <li><a href="#" class="active"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
        <li><a href="#"><i class="fas fa-building"></i> <span>Properties</span></a></li>
        <li><a href="#"><i class="fas fa-users"></i> <span>Tenants</span></a></li>
        <li><a href="#"><i class="fas fa-file-invoice-dollar"></i> <span>Payments</span></a></li>
        <li><a href="#"><i class="fas fa-tools"></i> <span>Maintenance</span></a></li>
        <li><a href="#"><i class="fas fa-chart-bar"></i> <span>Reports</span></a></li>
        <li><a href="#"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
        <li><a href="#"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
    </ul>
</div> --}}


<!-- Sidebar -->
<div class="sidebar">
    <ul class="nav-links">
        <li>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i> <span>Dashboard</span>
            </a>
        </li>

        {{-- Admin Dashboard --}}
        @if(auth()->user()->role === 'admin')
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-user-shield"></i> <span>Admin Dashboard</span>
                </a>
            </li>
        @endif

        {{-- Landlord Dashboard --}}
        {{-- @if(auth()->user()->role === 'landlord' || auth()->user()->role === 'admin')
            <li>
                <a href="{{ route('landlord.dashboard') }}" class="{{ request()->routeIs('landlord.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-user-tie"></i> <span>Landlord Dashboard</span>
                </a>
            </li>
        @endif --}}

        {{-- Tenant Dashboard --}}
        @if(auth()->user()->role === 'tenant' || auth()->user()->role === 'admin')
            <li>
                <a href="{{ route('tenant.dashboard') }}" class="{{ request()->routeIs('tenant.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-user"></i> <span>Tenant Dashboard</span>
                </a>
            </li>
        @endif

        {{-- <li><a href="landlord/properties"><i class="fas fa-building"></i> <span>Properties</span></a></li> --}}
        
        <li>
           <a href="{{ route('landlord.properties.index') }}">
             <i class="fas fa-building"></i> <span>Properties</span>
              </a>
           </li>

    

        {{-- <li><a href="#"><i class="fas fa-users"></i> <span>Tenants</span></a></li> --}}
        <li><a href="#"><i class="fas fa-file-invoice-dollar"></i> <span>Payments</span></a></li>
        <li><a href="#"><i class="fas fa-tools"></i> <span>Maintenance</span></a></li>
        <li><a href="#"><i class="fas fa-chart-bar"></i> <span>Reports</span></a></li>
        <li><a href="#"><i class="fas fa-cog"></i> <span>Settings</span></a></li>

        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="background:none;border:none;color:inherit;cursor:pointer;">
                    <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                </button>
            </form>
        </li>
    </ul>
</div>

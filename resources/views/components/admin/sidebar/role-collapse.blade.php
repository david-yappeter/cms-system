<li class="nav-item">
    <a
    class="nav-link collapsed"
    href="#"
    data-toggle="collapse"
    data-target="#roles-collapse"
    aria-expanded="true"
    aria-controls="collapsePages"
    >
        <i class="fas fa-key"></i>
        <span>Roles</span>
    </a>
    <div
    id="roles-collapse"
    class="collapse"
    aria-labelledby="headingPages"
    data-parent="#accordionSidebar"
    >
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Roles:</h6>
            <a class="collapse-item" href="{{ route('admin.roles.create') }}">
                <i class="fa fa-plus"></i>
                Add New
            </a>
            <a class="collapse-item" href="{{ route('admin.roles.index') }}">
                <i class="fas fa-dolly"></i>
                List
            </a>
            {{-- <div class="collapse-divider"></div> --}}
        </div>
    </div>
</li>
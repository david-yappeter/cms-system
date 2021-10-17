<li class="nav-item">
    <a
    class="nav-link collapsed"
    href="#"
    data-toggle="collapse"
    data-target="#pages-collapse"
    aria-expanded="true"
    aria-controls="collapsePages"
    >
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div
    id="pages-collapse"
    class="collapse"
    aria-labelledby="headingPages"
    data-parent="#accordionSidebar"
    >
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Posts:</h6>
            <a class="collapse-item" href="{{ route('admin.post.create') }}">
                <i class="fa fa-plus"></i>
                Add New
            </a>
            <a class="collapse-item" href="{{ route('admin.post.list') }}">
                <i class="fas fa-dolly"></i>
                List
            </a>
            {{-- <div class="collapse-divider"></div> --}}
        </div>
    </div>
</li>
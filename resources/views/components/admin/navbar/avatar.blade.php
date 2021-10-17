<li class="nav-item dropdown no-arrow">
    <a
        class="nav-link dropdown-toggle"
        href="#"
        id="userDropdown"
        role="button"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
    >
        <span class="mr-2 d-none d-lg-inline text-gray-600 small"
        >{{ ucfirst(trans(Auth::user()->name)) }}</span
        >
        @if (Auth::user()->profile_image)
        <img
        class="img-profile rounded-circle"
        src="{{ Auth::user()->profile_image }}"
        />
    @else
        <img
        class="img-profile rounded-circle"
        src="{{ asset('img/mr-anonymous.png') }}"
        />
        @endif
    </a>
    <!-- Dropdown - User Information -->
    <div
        class="
        dropdown-menu dropdown-menu-right
        shadow
        animated--grow-in
        "
        aria-labelledby="userDropdown"
    >
        <a class="dropdown-item" href="{{ route('admin.user.profile', auth()->user()) }}">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Profile
        </a>
        <div class="dropdown-divider"></div>
        <a
        class="dropdown-item"
        href="{{ route('logout') }}"
        data-toggle="modal"
        data-target="#logoutModal"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
        >
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <i
            class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
        ></i>
        Logout
        </a>
    </div>
    </li>
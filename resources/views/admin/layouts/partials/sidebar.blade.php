<aside
    class="bg-gray-700 text-gray-100 w-64 space-y-2 px-3 py-4 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 ease-in-out z-50"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

    <!-- Logo -->
    <div class="text-2xl font-bold text-white mb-6 px-3"><span class="text-blue-500">AR </span>Engireearing</div>

    @php
        $openMenu = '';
        if (request()->routeIs('admin.projects.*')) $openMenu = 'projects';
        elseif (request()->routeIs('admin.services.*')) $openMenu = 'services';
        elseif (request()->routeIs('admin.clients.*')) $openMenu = 'clients';
        elseif (request()->routeIs('admin.partners.*')) $openMenu = 'partners';
        elseif (request()->routeIs('admin.team_members.*') || request()->routeIs('admin.advisors.*')) $openMenu = 'team';
        elseif (request()->routeIs('admin.users.*')) $openMenu = 'users';
    @endphp
    @php $user = auth()->user(); @endphp
    <nav x-data="{ openMenu: '{{ $openMenu }}' }" class="space-y-1">

        @if($user->role_id === null || $user->role_id === 0)

            <!-- Profile -->
            <a href="{{ route('admin.profile') }}"
            class="flex items-center gap-2 py-2 px-3 rounded-lg hover:bg-indigo-600 transition">
                <i class="fas fa-user"></i> Profile
            </a>

            <!-- Logout -->
            <a href="{{ route('logout') }}"
            class="flex items-center gap-2 py-2 px-3 rounded-lg hover:bg-red-600 transition">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>

        @else
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-2 py-2 px-3 rounded-lg hover:bg-indigo-600 transition
            {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600' : '' }}">
                <i class="fas fa-home w-4"></i> Dashboard
            </a>

            <!-- Projects -->
            <div>
                <button @click="openMenu = (openMenu === 'projects' ? '' : 'projects')"
                        class="w-full flex justify-between items-center py-2 px-3 rounded-lg transition
                        hover:bg-indigo-600 {{ $openMenu === 'projects' ? 'bg-indigo-600' : '' }}">
                    <span class="flex items-center gap-2"><i class="fas fa-project-diagram"></i> Projects</span>
                    <svg :class="openMenu === 'projects' ? 'rotate-90' : ''"
                        class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <div x-show="openMenu === 'projects'" x-transition class="ml-6 mt-1 space-y-1">
                    <a href="{{ route('admin.projects.index') }}"
                    class="block px-3 py-1 rounded hover:bg-indigo-500 {{ request()->routeIs('admin.projects.index') ? 'bg-indigo-500' : '' }}">All Projects</a>
                    <a href="{{ route('admin.projects.create') }}"
                    class="block px-3 py-1 rounded hover:bg-indigo-500 {{ request()->routeIs('admin.projects.create') ? 'bg-indigo-500' : '' }}">Add Project</a>
                </div>
            </div>

            <!-- Services -->
            <div>
                <button @click="openMenu = (openMenu === 'services' ? '' : 'services')"
                        class="w-full flex justify-between items-center py-2 px-3 rounded-lg transition
                        hover:bg-indigo-600 {{ $openMenu === 'services' ? 'bg-indigo-600' : '' }}">
                    <span class="flex items-center gap-2"><i class="fas fa-cogs"></i> Services</span>
                    <svg :class="openMenu === 'services' ? 'rotate-90' : ''"
                        class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <div x-show="openMenu === 'services'" x-transition class="ml-6 mt-1 space-y-1">
                    <a href="{{ route('admin.services.index') }}"
                    class="block px-3 py-1 rounded hover:bg-indigo-500 {{ request()->routeIs('admin.services.index') ? 'bg-indigo-500' : '' }}">All Services</a>
                    <a href="{{ route('admin.services.create') }}"
                    class="block px-3 py-1 rounded hover:bg-indigo-500 {{ request()->routeIs('admin.services.create') ? 'bg-indigo-500' : '' }}">Add Service</a>
                </div>
            </div>

            <!-- Clients -->
            <div>
                <button @click="openMenu = (openMenu === 'clients' ? '' : 'clients')"
                        class="w-full flex justify-between items-center py-2 px-3 rounded-lg transition
                        hover:bg-indigo-600 {{ $openMenu === 'clients' ? 'bg-indigo-600' : '' }}">
                    <span class="flex items-center gap-2"><i class="fas fa-users"></i> Clients</span>
                    <svg :class="openMenu === 'clients' ? 'rotate-90' : ''"
                        class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <div x-show="openMenu === 'clients'" x-transition class="ml-6 mt-1 space-y-1">
                    <a href="{{ route('admin.clients.index') }}"
                    class="block px-3 py-1 rounded hover:bg-indigo-500 {{ request()->routeIs('admin.clients.index') ? 'bg-indigo-500' : '' }}">All Clients</a>
                    <a href="{{ route('admin.clients.create') }}"
                    class="block px-3 py-1 rounded hover:bg-indigo-500 {{ request()->routeIs('admin.clients.create') ? 'bg-indigo-500' : '' }}">Add Client</a>
                </div>
            </div>

            <!-- Partners -->
            <div>
                <button @click="openMenu = (openMenu === 'partners' ? '' : 'partners')"
                        class="w-full flex justify-between items-center py-2 px-3 rounded-lg transition
                        hover:bg-indigo-600 {{ $openMenu === 'partners' ? 'bg-indigo-600' : '' }}">
                    <span class="flex items-center gap-2"><i class="fas fa-handshake"></i> Partners</span>
                    <svg :class="openMenu === 'partners' ? 'rotate-90' : ''"
                        class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <div x-show="openMenu === 'partners'" x-transition class="ml-6 mt-1 space-y-1">
                    <a href="{{ route('admin.partners.index') }}"
                    class="block px-3 py-1 rounded hover:bg-indigo-500 {{ request()->routeIs('admin.partners.index') ? 'bg-indigo-500' : '' }}">All Partners</a>
                    <a href="{{ route('admin.partners.create') }}"
                    class="block px-3 py-1 rounded hover:bg-indigo-500 {{ request()->routeIs('admin.partners.create') ? 'bg-indigo-500' : '' }}">Add Partner</a>
                </div>
            </div>

            <!-- Team Members -->
            <div>
                <button @click="openMenu = (openMenu === 'team' ? '' : 'team')"
                        class="w-full flex justify-between items-center py-2 px-3 rounded-lg transition
                        hover:bg-indigo-600 {{ $openMenu === 'team' ? 'bg-indigo-600' : '' }}">
                    <span class="flex items-center gap-2"><i class="fas fa-user-friends"></i> Advisor & Teams</span>
                    <svg :class="openMenu === 'team' ? 'rotate-90' : ''"
                        class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <div x-show="openMenu === 'team'" x-transition class="ml-6 mt-1 space-y-1">
                    <a href="{{ route('admin.team_members.index') }}"
                    class="block px-3 py-1 rounded hover:bg-indigo-500 {{ request()->routeIs('admin.team_members.index') ? 'bg-indigo-500' : '' }}">All Team Members</a>
                {{-- Advisor --}}
                    <a href="{{ route('admin.advisors.index') }}"
                    class="block px-3 py-1 rounded hover:bg-indigo-500 {{ request()->routeIs('admin.advisors.index') ? 'bg-indigo-500' : '' }}">All Advisor</a>

                    <a href="{{ route('admin.team_members.create') }}"
                    class="block px-3 py-1 rounded hover:bg-indigo-500 {{ request()->routeIs('admin.team_members.create') ? 'bg-indigo-500' : '' }}">Add Team Member</a>
                {{-- Advisor --}}
                    
                    <a href="{{ route('admin.advisors.create') }}"
                    class="block px-3 py-1 rounded hover:bg-indigo-500 {{ request()->routeIs('admin.advisors.create') ? 'bg-indigo-500' : '' }}">Add Advisors</a>
                </div>
            </div>

            <!-- Users -->
            <div>
                <button @click="openMenu = (openMenu === 'users' ? '' : 'users')"
                        class="w-full flex justify-between items-center py-2 px-3 rounded-lg transition
                        hover:bg-indigo-600 {{ $openMenu === 'users' ? 'bg-indigo-600' : '' }}">
                    <span class="flex items-center gap-2"><i class="fas fa-users-cog"></i> Users</span>
                    <svg :class="openMenu === 'users' ? 'rotate-90' : ''"
                        class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <div x-show="openMenu === 'users'" x-transition class="ml-6 mt-1 space-y-1">
                    <a href="{{ route('admin.users.index') }}"
                    class="block px-3 py-1 rounded hover:bg-indigo-500 {{ request()->routeIs('admin.users.index') ? 'bg-indigo-500' : '' }}">All Users</a>
                    <a href="{{ route('admin.users.create') }}"
                    class="block px-3 py-1 rounded hover:bg-indigo-500 {{ request()->routeIs('admin.users.create') ? 'bg-indigo-500' : '' }}">Add User</a>
                </div>
            </div>

<!-- Career Section -->
<div>
    <button @click="openMenu = (openMenu === 'career' ? '' : 'career')"
            class="w-full flex justify-between items-center py-2 px-3 rounded-lg transition
            hover:bg-indigo-600 {{ $openMenu === 'career' ? 'bg-indigo-600' : '' }}">
        <span class="flex items-center gap-2"><i class="fas fa-briefcase"></i> Career</span>
        <svg :class="openMenu === 'career' ? 'rotate-90' : ''"
            class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5l7 7-7 7" />
        </svg>
    </button>

    <div x-show="openMenu === 'career'" x-transition class="ml-6 mt-1 space-y-1">
        <a href="{{ route('admin.career.edit', ['type'=>'page', 'id'=>1]) }}"
            class="block px-3 py-1 rounded hover:bg-indigo-500 {{ request()->routeIs('admin.career.edit') ? 'bg-indigo-500' : '' }}">
            Why Join Us
        </a>
        <a href="{{ route('admin.career.index') }}#jobs"
            class="block px-3 py-1 rounded hover:bg-indigo-500 {{ request()->is('admin/career') ? 'bg-indigo-500' : '' }}">
            Job Vacancies
        </a>
        <a href="{{ route('admin.career.index') }}#internships"
            class="block px-3 py-1 rounded hover:bg-indigo-500 {{ request()->is('admin/career') ? 'bg-indigo-500' : '' }}">
            Internships
        </a>
    </div>
</div>


            <!-- Messages -->
            <a href="{{ route('admin.messages.index') }}"
            class="flex items-center gap-2 py-2 px-3 rounded-lg hover:bg-indigo-600 transition
            {{ request()->routeIs('admin.messages.*') ? 'bg-indigo-600' : '' }}">
                <i class="fas fa-envelope"></i> Messages
            </a>

            <!-- Roles & Permissions -->
            <a href="{{ route('admin.roles.index') }}"
            class="flex items-center gap-2 py-2 px-3 rounded-lg hover:bg-indigo-600 transition
            {{ request()->routeIs('admin.roles.*') ? 'bg-indigo-600' : '' }}">
                <i class="fas fa-lock"></i> Roles & Permissions
            </a>

            <!-- Roles & Permissions -->
            <a href="{{ route('admin.settings.index') }}"
            class="flex items-center gap-2 py-2 px-3 rounded-lg hover:bg-indigo-600 transition
            {{ request()->routeIs('admin.settings.*') ? 'bg-indigo-600' : '' }}">
                <i class="fas fa-lock"></i> Site Settings
            </a>

            <!-- Profile -->
            <a href="{{ route('admin.profile') }}"
            class="flex items-center gap-2 py-2 px-3 rounded-lg hover:bg-indigo-600 transition">
                <i class="fas fa-user"></i> Profile
            </a>

            <!-- Logout -->
            <a href="{{ route('logout') }}"
            class="flex items-center gap-2 py-2 px-3 rounded-lg hover:bg-red-600 transition">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        @endif
    </nav>
</aside>

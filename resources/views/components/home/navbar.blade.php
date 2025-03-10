<nav class="bg-[#FCE38A] shadow-xl antialiased">
    <div class="max-w-screen-2xl px-4 mx-auto py-4">
        <div class="flex items-center justify-between gap-6">
            <!-- Logo Section -->
            <div class="flex items-center gap-8 rounded-md bg-[#71C9CE] p-2">
                <a href="/" class="flex items-center gap-2 group">
                    <span
                        class="text-xl font-bold tracking-tight text-white group-hover:text-[#eeeeee] transition-colors">
                        JULIANA SHOP
                    </span>
                </a>
            </div>

            <!-- Search Form -->
            <form action="{{ route('filter.products') }}" method="POST" class="hidden lg:flex flex-1 max-w-2xl mx-8">
                @csrf
                <div class="relative w-full">
                    <input type="text" name="search" id="simple-search"
                        class="w-full pl-12 pr-4 py-3 bg-white border border-gray-700 rounded-lg 
                               text-white placeholder-gray-400 hover:placeholder-white
                               hover:bg-[#5f9e9d] focus:ring-2 focus:ring-[#5f9e9d] focus:outline-none focus:border-transparent transition-all"
                        placeholder="Search products..." />
                    <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
                <button type="submit"
                    class="ml-2 px-6 py-3 bg-[#71C9CE] hover:bg-[#61dfe6] text-white font-medium 
                               rounded-lg transition-colors duration-200 shadow-sm hover:bg-[#5f9e9d] focus:ring-2 focus:ring-[#5f9e9d] focus:outline-none">
                    Search
                </button>
            </form>

            <!-- Action Icons -->
            <div class="flex items-center gap-4">
                <livewire:cart>

                    <a href="{{ route('wishlist.index') }}"
                        class="p-2.5 bg-[#71C9CE] rounded-full transition-colors duration-200 hover:bg-[#5f9e9d] focus:ring-2 focus:ring-[#5f9e9d] focus:outline-none">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </a>

                    <!-- User Dropdown Container -->
                    <div class="relative">
                        <button id="userDropdownButton" data-dropdown-toggle="userDropdown"
                            class="flex items-center gap-2 px-4 py-2 bg-[#71C9CE] rounded-full 
                   transition-colors duration-200 group hover:bg-[#5f9e9d] focus:ring-2 focus:ring-[#5f9e9d] focus:outline-none">
                            <svg class="w-5 h-5 text-white" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="text-sm font-medium text-white">
                                @auth{{ Auth::user()->name }}
                            @else
                            Account @endauth
                        </span>
                        <svg class="w-4 h-4 text-gray-400 group-hover:text-white transition-colors" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="userDropdown"
                        class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl 
                border border-gray-200 divide-y divide-gray-100 z-50 origin-top-right
                transition-opacity duration-200">
                        @guest
                            <div class="py-1">
                                <a href="{{ route('login') }}"
                                    class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 
                          transition-colors">
                                    <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                                </a>
                                <a href="{{ route('register') }}"
                                    class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 
                          transition-colors">
                                    <i class="fas fa-user-plus mr-2"></i>Create Account
                                </a>
                            </div>
                        @endguest

                        @auth
                            <div class="py-1">
                                @if (Auth::user()->role_id == 1)
                                    <a href="{{ route('dashboard.index') }}"
                                        class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 
                          transition-colors">
                                        <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                                    </a>
                                @endif
                                <a href="#"
                                    class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 
                          transition-colors">
                                    <i class="fas fa-user-circle mr-2"></i>Profile
                                </a>
                            </div>
                            <div class="py-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 
                                   hover:text-blue-600 transition-colors">
                                        <i class="fas fa-sign-out-alt mr-2"></i>Sign Out
                                    </button>
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
        </div>
    </div>
    <!-- Mobile Menu Button -->
    <div class="w-full mx-auto text-center mt-4">
        <button data-collapse-toggle="mobile-menu"
            class="lg:hidden p-2.5  border-2  border-white rounded-lg w-full transition-colors">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden mt-4 hidden">
        <div class="pt-4 border-t border-gray-800">
            <form class="mb-6">
                <div class="relative">
                    <input type="text"
                        class="w-full pl-10 pr-4 py-3 bg-gray-800 border border-gray-700 rounded-lg 
                                      text-white placeholder-gray-400 focus:outline-none focus:ring-2 
                                      focus:ring-blue-500 focus:border-transparent"
                        placeholder="Search products...">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </form>

            <nav class="grid gap-2">
                @foreach ($categories as $item)
                    <form action="{{ route('filter.products') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="categories[]">
                        <button type="submit"
                            class="w-full px-6 py-3 text-left text-white hover:bg-gray-800 rounded-lg 
                                       transition-colors duration-200 flex items-center gap-3">
                            <span class="flex-1">
                                @if (session('lang') == 'en')
                                    {!! $item->name_en !!}
                                @else
                                    {!! $item->name_ar !!}
                                @endif
                            </span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </form>
                @endforeach
            </nav>
        </div>
    </div>
</div>
</nav>

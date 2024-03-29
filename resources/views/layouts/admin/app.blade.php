<!doctype html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href={{ url('assets/images/icon/favicon.ico') }} type="image/x-icon">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ url('assets/css/all.min.css') }}">
    <script src="https://unpkg.com/alpinejs@3.10.4/dist/cdn.min.js" defer></script>
    @yield('css')
</head>

<body class="h-full">
    <div class="relative">
        <div>
            <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
            <div class="relative z-40 md:hidden" role="dialog" aria-modal="true">
                <!--
                    Off-canvas menu backdrop, show/hide based on off-canvas menu state.
            
                    Entering: "transition-opacity ease-linear duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                    Leaving: "transition-opacity ease-linear duration-300"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>

                <div class="fixed inset-0 z-40 flex">
                    <!--
                        Off-canvas menu, show/hide based on off-canvas menu state.
                
                        Entering: "transition ease-in-out duration-300 transform"
                            From: "-translate-x-full"
                            To: "translate-x-0"
                        Leaving: "transition ease-in-out duration-300 transform"
                            From: "translate-x-0"
                            To: "-translate-x-full"
                    -->
                    <div class="relative flex w-full max-w-xs flex-1 flex-col bg-indigo-700 pt-5 pb-4">
                        <!--
                            Close button, show/hide based on off-canvas menu state.
                
                            Entering: "ease-in-out duration-300"
                            From: "opacity-0"
                            To: "opacity-100"
                            Leaving: "ease-in-out duration-300"
                            From: "opacity-100"
                            To: "opacity-0"
                        -->
                        <div class="absolute top-0 right-0 -mr-12 pt-2">
                            <button type="button"
                                class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                                <span class="sr-only">Close sidebar</span>
                                <!-- Heroicon name: outline/x-mark -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <div class="flex flex-shrink-0 items-center px-4">
                            <img class="h-8 w-auto"
                                src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=300"
                                alt="Your Company">
                        </div>
                        <div class="mt-5 h-0 flex-1 overflow-y-auto">
                            <nav class="space-y-1 px-2">
                                <!-- Current: "bg-indigo-800 text-white", Default: "text-indigo-100 hover:bg-primary-900" -->
                                <a href="#"
                                    class="bg-indigo-800 text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                    <!-- Heroicon name: outline/home -->
                                    <svg class="mr-4 h-6 w-6 flex-shrink-0 text-indigo-300"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                    Dashboard
                                </a>

                                <a href="#"
                                    class="text-indigo-100 hover:bg-primary-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                    <!-- Heroicon name: outline/users -->
                                    <svg class="mr-4 h-6 w-6 flex-shrink-0 text-indigo-300"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                    </svg>
                                    Team
                                </a>

                                <a href="#"
                                    class="text-indigo-100 hover:bg-primary-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                    <!-- Heroicon name: outline/folder -->
                                    <svg class="mr-4 h-6 w-6 flex-shrink-0 text-indigo-300"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                    Projects
                                </a>

                                <a href="#"
                                    class="text-indigo-100 hover:bg-primary-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                    <!-- Heroicon name: outline/calendar -->
                                    <svg class="mr-4 h-6 w-6 flex-shrink-0 text-indigo-300"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    </svg>
                                    Calendar
                                </a>

                                <a href="#"
                                    class="text-indigo-100 hover:bg-primary-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                    <!-- Heroicon name: outline/inbox -->
                                    <svg class="mr-4 h-6 w-6 flex-shrink-0 text-indigo-300"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                                    </svg>
                                    Documents
                                </a>

                                <a href="#"
                                    class="text-indigo-100 hover:bg-primary-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                    <!-- Heroicon name: outline/chart-bar -->
                                    <svg class="mr-4 h-6 w-6 flex-shrink-0 text-indigo-300"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                                    </svg>
                                    Reports
                                </a>
                            </nav>
                        </div>
                    </div>

                    <div class="w-14 flex-shrink-0" aria-hidden="true">
                        <!-- Dummy element to force sidebar to shrink to fit close icon -->
                    </div>
                </div>
            </div>

            <!-- Static sidebar for desktop -->
            <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="flex flex-grow flex-col overflow-y-auto bg-primary-700 pt-5">
                    <div class="mt-5 flex flex-1 flex-col">
                        <nav class="flex-1 space-y-1 px-2 pb-4">
                            <!-- Current: "bg-indigo-800 text-white", Default: "text-indigo-100 hover:bg-primary-900" -->
                            <a href={{ route('admin.dashboard') }}
                                class="{{ request()->segment(2) == '' ? 'bg-primary-900 text-white' : 'text-indigo-100' }} hover:bg-primary-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                <!-- Heroicon name: outline/home -->
                                <svg class="mr-3 h-6 w-6 flex-shrink-0 text-indigo-300"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                Dashboard
                            </a>

                            <a href={{ route('admin.products') }}
                                class="{{ request()->segment(2) == 'produk' ? 'bg-primary-900 text-white' : 'text-indigo-100' }}  hover:bg-primary-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="mr-3 h-6 w-6 flex-shrink-0 text-indigo-300">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                                Produk
                            </a>

                            <a href={{ route('admin.orders') }}
                                class="{{ request()->segment(2) == 'pesanan' ? 'bg-primary-900 text-white' : 'text-indigo-100' }}  hover:bg-primary-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="mr-3 h-6 w-6 flex-shrink-0 text-indigo-300">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 3.75H6.912a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859M12 3v8.25m0 0l-3-3m3 3l3-3" />
                                </svg>
                                Pesanan
                            </a>

                            <a href="{{ route('admin.customers') }}"
                                class="{{ request()->segment(2) == 'pelanggan' ? 'bg-primary-900 text-white' : 'text-indigo-100' }}  hover:bg-primary-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                <svg class="mr-3 h-6 w-6 flex-shrink-0 text-indigo-300"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>
                                Customer
                            </a>

                            <a href={{ route('admin.report') }}
                                class="{{ request()->segment(2) == 'laporan' ? 'bg-primary-900 text-white' : 'text-indigo-100' }}  hover:bg-primary-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="mr-3 h-6 w-6 flex-shrink-0 text-indigo-300">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                </svg>
                                Laporan Pembelian
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="flex flex-1 flex-col md:pl-64">
                <div class="sticky top-0 z-10 flex h-16 flex-shrink-0 bg-white shadow">
                    <button type="button"
                        class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
                        <span class="sr-only">Open sidebar</span>
                        <!-- Heroicon name: outline/bars-3-bottom-left -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                        </svg>
                    </button>
                    <div class="flex flex-1 justify-between px-4">
                        <div class="flex flex-1 self-center">
                            <h3 class="font-medium text-xl">{{
                                \Carbon\Carbon::now('Asia/Jakarta')->toFormattedDateString(); }}</h3>
                        </div>
                        <div class="ml-4 flex items-center md:ml-6">
                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                                <div>
                                    <button id="user_menu" type="button"
                                        class="flex max-w-xs items-center bg-white text-sm" id="user-menu-button"
                                        aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                        <h4 class="font-medium text-primary-700">{{ ucwords(auth()->user()->nama) }}
                                        </h4>
                                    </button>
                                </div>

                                <!--
                                    Dropdown menu, show/hide based on menu state.
                            
                                    Entering: "transition ease-out duration-100"
                                    From: "transform opacity-0 scale-95"
                                    To: "transform opacity-100 scale-100"
                                    Leaving: "transition ease-in duration-75"
                                    From: "transform opacity-100 scale-100"
                                    To: "transform opacity-0 scale-95"
                                -->
                                <div id="user_menu_dropdown"
                                    class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem" tabindex="-1" id="user-menu-item-0">Profil Anda</a>

                                    <a href={{ route('admin.logout') }}
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                                        tabindex="-1" id="user-menu-item-2">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')
            </div>
        </div>
    </div>

    @yield('js')
    @if(Auth::user())
    <script src={{ url('assets/js/admin/index.js') }}></script>
    @endif
</body>

</html>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href={{ url('assets/images/icon/favicon.ico') }} type="image/x-icon">
    <script src="https://unpkg.com/alpinejs@3.10.4/dist/cdn.min.js" defer></script>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ url('assets/css/all.min.css') }}">
    @yield('css')
</head>

<body>
    <div class="relative bg-gray-50">
        <div class="relative bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 sm:px-6">
                <div class="flex items-center justify-between py-6 md:justify-start md:space-x-10">
                    <div class="flex justify-start lg:w-0 lg:flex-1">
                        <a href="#">
                            <span class="sr-only">ASG Print</span>
                            <img class="h-8 w-auto sm:h-10" src={{ url('assets/images/logo.png') }} alt="">
                        </a>
                    </div>
                    <div class="-my-2 -mr-2 md:hidden">
                        <button type="button"
                            class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                            aria-expanded="false">
                            <span class="sr-only">Open menu</span>
                            <!-- Heroicon name: outline/bars-3 -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>
                    <nav class="hidden space-x-10 md:flex">
                        <a href="/"
                            class="text-base font-medium {{ request()->segment(1) == '' ? 'text-secondary' : 'text-gray-500' }}">Home</a>
                        <a href={{ route('products') }}
                            class="text-base font-medium {{ request()->segment(1) == 'produk' ? 'text-secondary' : 'text-gray-500' }}">Produk</a>
                        <a href={{ route('customer.cart') }}
                            class="text-base font-medium {{ request()->segment(1) == 'keranjang' ? 'text-secondary' : 'text-gray-500' }}">Keranjang</a>
                        <a href={{ route('customer.design') }}
                            class="text-base font-medium {{ request()->segment(1) == 'desain' ? 'text-secondary' : 'text-gray-500' }}">Custom
                            Sablon</a>
                    </nav>
                    <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
                        @if (Auth::user())
                        <div class="relative">
                            <a id="user_menu" href="#"
                                class="flex items-center p-2 rounded-md text-sm font-medium text-secondary hover:bg-gray-100">
                                <h3>{{ ucwords(Auth::user()->nama) }}</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                    stroke="currentColor" class="ml-2 w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </a>
                            <div id="user_menu_dropdown"
                                class="hidden absolute z-10 mt-3 max-w-xs -translate-x-1/2 transform">
                                <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                                    <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8 w-40">
                                        <a href={{ route('customer.orders') }}
                                            class="-m-3 block rounded-md p-2 transition duration-150 ease-in-out hover:bg-gray-100">
                                            <p class="text-base font-medium text-gray-900">Pesanan</p>
                                        </a>

                                        <a href={{ route('customer.profile') }}
                                            class="-m-3 block rounded-md p-2 transition duration-150 ease-in-out hover:bg-gray-100">
                                            <p class="text-base font-medium text-gray-900">Profil</p>
                                        </a>

                                        <a href="{{ route('customer.logout') }}"
                                            class="-m-3 block rounded-md p-2 transition duration-150 ease-in-out hover:bg-gray-100">
                                            <p class="text-base font-medium text-primary-700">Keluar</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <a href={{ route('customer.login') }}
                            class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">Masuk</a>
                        <a href={{ route('customer.register') }}
                            class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-primary-700 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-primary-900">Daftar</a>
                        @endif

                    </div>
                </div>
            </div>

        </div>

        @yield('content')
    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <footer class="bg-white" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="mx-auto max-w-7xl py-8 px-4 sm:px-6 lg:py-12 lg:px-8">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="space-y-8 xl:col-span-1">
                    <img class="h-10" src={{ url('assets/images/logo.png') }} alt="Company name">
                    <p class="text-base text-gray-500">Cetak Kaos Satuan dan Lusinan. Kaos, Hoodie, Totebag, Bordir,
                        Jersey dll.</p>
                    <a href="https://instagram.com/asg_print?igshid=YmMyMTA2M2Y=" target="_blank"
                        class="flex space-x-4">
                        <div class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h5 class="text-gray-400 font-medium">ASG Print</h5>
                    </a>
                </div>
                <div class="mt-12 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
                    <div class="flex flex-col gap-y-2">
                        <h4 class="font-bold text-base">Informasi</h4>
                        <div class="flex flex-col items-start gap-2 text-md font-medium text-primary-700">
                            <a href="/" class="hover:text-primary-900">Landing Page</a>
                            <a href="/produk" class="hover:text-primary-900">Produk Kami</a>
                            <a href="/keranjang" class="hover:text-primary-900">Keranjang</a>
                            <a href="/desain" class="hover:text-primary-900">Custom Desain</a>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex">
                            <div class="flex-1">
                                <h4 class="font-bold text-base">Alamat</h4>
                                <span class="text-sm">Jalan Raya Kincan Blok B No. 28, RT.001/RW.002, Jatibening Baru,
                                    Kec. Pd. Gede, Kota Bekasi, Jawa Barat 17412</p>
                            </div>
                            <div class="w-24 h-24">
                                <a href="https://maps.app.goo.gl/ZmVqPU1gu5AozN9t6" target="_blank" class="block">
                                    <img class="w-full h-full aspect-square" src={{ url('assets/images/map.png')}}
                                        alt="Cetak Sablon ASG Print">
                                </a>
                            </div>
                        </div>
                        <a class="block mt-8" target="_blank" aria-label="Chat on WhatsApp"
                            href="https://wa.me/6282116214746"> <img alt="Chat on WhatsApp" src={{
                                url('assets/images/WhatsAppButton.svg') }} />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @yield('js')
    @if(Auth::user())
    <script src={{ url('assets/js/customer/index.js') }}></script>
    @endif
</body>

</html>
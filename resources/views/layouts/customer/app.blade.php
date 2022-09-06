<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href={{ asset('images/icon/favicon.ico') }} type="image/x-icon">
    @vite('resources/css/app.css')
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
                            <img class="h-8 w-auto sm:h-10" src={{ asset('images/logo.png') }} alt="">
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
                        <a href="/" class="text-base font-medium text-secondary hover:text-gray-900">Home</a>
                        <a href={{ route('products') }} class="text-base font-medium text-gray-500  hover:text-gray-900">Produk</a>
                        <a href={{ route('customer.cart') }} class="text-base font-medium text-gray-500 hover:text-gray-900">Keranjang</a>
                        <a href={{ route('customer.design') }} class="text-base font-medium text-gray-500 hover:text-gray-900">Custom
                            Sablon</a>
                    </nav>
                    <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
                        <a href={{ route('customer.login') }}
                            class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">Masuk</a>
                        <a href={{ route('customer.register') }}
                            class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-primary-700 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-primary-900">Daftar</a>
                    </div>
                </div>
            </div>

        </div>

        @yield('content')
    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <footer class="bg-white" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="mx-auto max-w-7xl py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="space-y-8 xl:col-span-1">
                    <img class="h-10" src={{ asset('images/logo.png') }} alt="Company name">
                    <p class="text-base text-gray-500">Making the world a better place through constructing elegant
                        hierarchies.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <h5 class="text-gray-400 font-medium">ASG Print</h5>
                    </div>
                </div>
                <div class="mt-12 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-base font-medium text-gray-900">Solutions</h3>
                            <ul role="list" class="mt-4 space-y-4">
                                <li>
                                    <a href="#"
                                        class="text-base text-gray-500 hover:text-gray-900">Marketing</a>
                                </li>

                                <li>
                                    <a href="#"
                                        class="text-base text-gray-500 hover:text-gray-900">Analytics</a>
                                </li>

                                <li>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">Commerce</a>
                                </li>

                                <li>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">Insights</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h3 class="text-base font-medium text-gray-900">Support</h3>
                            <ul role="list" class="mt-4 space-y-4">
                                <li>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">Pricing</a>
                                </li>

                                <li>
                                    <a href="#"
                                        class="text-base text-gray-500 hover:text-gray-900">Documentation</a>
                                </li>

                                <li>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">Guides</a>
                                </li>

                                <li>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">API
                                        Status</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-base font-medium text-gray-900">Company</h3>
                            <ul role="list" class="mt-4 space-y-4">
                                <li>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">About</a>
                                </li>

                                <li>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">Blog</a>
                                </li>

                                <li>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">Jobs</a>
                                </li>

                                <li>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">Press</a>
                                </li>

                                <li>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">Partners</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h3 class="text-base font-medium text-gray-900">Legal</h3>
                            <ul role="list" class="mt-4 space-y-4">
                                <li>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">Claim</a>
                                </li>

                                <li>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">Privacy</a>
                                </li>

                                <li>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @yield('js')
</body>

</html>

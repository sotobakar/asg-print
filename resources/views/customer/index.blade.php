@extends('layouts.customer.app')

@section('title', 'Landing Page')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
@endsection

@section('content')
<main class="lg:relative">
  <div class="mx-auto w-full max-w-7xl pt-16 pb-20 text-center lg:py-48 lg:text-left">
      <div class="px-4 sm:px-8 lg:w-1/2 xl:pr-16">
          <h1
              class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl md:text-6xl lg:text-5xl xl:text-6xl">
              <span class="block xl:inline">Kami adalah penjual</span>
              <span class="block text-primary-700 xl:inline">apparel sablon</span>
          </h1>
          <p class="mx-auto mt-3 max-w-md text-lg text-gray-500 sm:text-xl md:mt-5 md:max-w-3xl">Kami menjual berbagai apparel dengan kualitas sablon tinggi, harga kompetitif dan desain sablon yang menarik.</p>
          <div class="mt-10 sm:flex sm:justify-center lg:justify-start">
              <div class="rounded-md shadow">
                  <a href="#"
                      class="flex w-full items-center justify-center rounded-md border border-transparent bg-primary-700 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 md:py-4 md:px-10 md:text-lg">Produk Kami</a>
              </div>
              <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                  <a href="#"
                      class="flex w-full items-center justify-center rounded-md border border-transparent bg-white px-8 py-3 text-base font-medium text-secondary hover:bg-gray-50 md:py-4 md:px-10 md:text-lg">Desain Sendiri</a>
              </div>
          </div>
      </div>
  </div>
  <div class="relative h-64 w-full sm:h-72 md:h-96 lg:absolute lg:inset-y-0 lg:right-0 lg:h-full lg:w-1/2">
      <!-- Slider main container -->
      <div class="swiper h-full">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
              <!-- Slides -->
              @for ($i = 1; $i < 9; $i++)
                  <img class="swiper-slide absolute inset-0 h-full w-full object-fit"
                      src={{ asset("images/slider/$i.jpeg") }} alt="Foto {{ $i }}">
              @endfor
          </div>
      </div>
  </div>
</main>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper', {
        autoplay: {
            delay: 4000,
        },
    });
</script>
@endsection

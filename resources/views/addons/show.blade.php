<x-base-layout>
<div class="bg-white">
  <!--
    Mobile menu

    Off-canvas menu for mobile, show/hide based on off-canvas menu state.
  -->
  <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
    <!--
      Off-canvas menu backdrop, show/hide based on off-canvas menu state.

      Entering: "transition-opacity ease-linear duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "transition-opacity ease-linear duration-300"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-black bg-opacity-25"></div>

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
      <div class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
        <div class="flex px-4 pt-5 pb-2">
          <button type="button" class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-slate-400">
            <span class="sr-only">Close menu</span>
            <!-- Heroicon name: outline/x-mark -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Links -->
        <div class="mt-2">
          <div class="border-b border-slate-200">
            <div class="-mb-px flex space-x-8 px-4" aria-orientation="horizontal" role="tablist">
              <!-- Selected: "text-purple-600 border-purple-600", Not Selected: "text-slate-900 border-transparent" -->
              <button id="tabs-1-tab-1" class="text-slate-900 border-transparent flex-1 whitespace-nowrap border-b-2 py-4 px-1 text-base font-medium" aria-controls="tabs-1-panel-1" role="tab" type="button">Wireframe Kits</button>

              <!-- Selected: "text-purple-600 border-purple-600", Not Selected: "text-slate-900 border-transparent" -->
              <button id="tabs-1-tab-2" class="text-slate-900 border-transparent flex-1 whitespace-nowrap border-b-2 py-4 px-1 text-base font-medium" aria-controls="tabs-1-panel-2" role="tab" type="button">Icons</button>
            </div>
          </div>

          <!-- 'Wireframe Kits' tab panel, show/hide based on tab state. -->
          <div id="tabs-1-panel-1" class="space-y-10 px-4 pt-10 pb-8" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
            <div class="grid grid-cols-2 gap-x-4">
              <div class="group relative text-sm">
                <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-slate-100 group-hover:opacity-75">
                  <img src="https://tailwindui.com/img/ecommerce-images/product-page-05-menu-03.jpg" alt="Pricing page screenshot with tiered plan options and comparison table on colorful blue and green background." class="object-cover object-center">
                </div>
                <a href="#" class="mt-6 block font-medium text-slate-900">
                  <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                  Scaffold
                </a>
                <p aria-hidden="true" class="mt-1">Shop now</p>
              </div>

              <div class="group relative text-sm">
                <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-slate-100 group-hover:opacity-75">
                  <img src="https://tailwindui.com/img/ecommerce-images/product-page-05-menu-04.jpg" alt="Application screenshot with tiered navigation and account settings form on color red and purple background." class="object-cover object-center">
                </div>
                <a href="#" class="mt-6 block font-medium text-slate-900">
                  <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                  Bones
                </a>
                <p aria-hidden="true" class="mt-1">Shop now</p>
              </div>
            </div>

            <div>
              <p id="wireframe-application-heading-mobile" class="font-medium text-slate-900">Application UI</p>
              <ul role="list" aria-labelledby="wireframe-application-heading-mobile" class="mt-6 flex flex-col space-y-6">
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Home Screens</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Detail Screens</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Settings Screens</a>
                </li>
              </ul>
            </div>

            <div>
              <p id="wireframe-marketing-heading-mobile" class="font-medium text-slate-900">Marketing</p>
              <ul role="list" aria-labelledby="wireframe-marketing-heading-mobile" class="mt-6 flex flex-col space-y-6">
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Landing Pages</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Pricing Pages</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Contact Pages</a>
                </li>
              </ul>
            </div>

            <div>
              <p id="wireframe-ecommerce-heading-mobile" class="font-medium text-slate-900">Ecommerce</p>
              <ul role="list" aria-labelledby="wireframe-ecommerce-heading-mobile" class="mt-6 flex flex-col space-y-6">
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Storefront Pages</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Product Pages</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Category Pages</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Shopping Cart Pages</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Checkout Pages</a>
                </li>
              </ul>
            </div>
          </div>

          <!-- 'Icons' tab panel, show/hide based on tab state. -->
          <div id="tabs-1-panel-2" class="space-y-10 px-4 pt-10 pb-8" aria-labelledby="tabs-1-tab-2" role="tabpanel" tabindex="0">
            <div class="grid grid-cols-2 gap-x-4">
              <div class="group relative text-sm">
                <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-slate-100 group-hover:opacity-75">
                  <img src="https://tailwindui.com/img/ecommerce-images/product-page-05-menu-01.jpg" alt="Payment application dashboard screenshot with transaction table, financial highlights, and main clients on colorful purple background." class="object-cover object-center">
                </div>
                <a href="#" class="mt-6 block font-medium text-slate-900">
                  <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                  Application UI Pack
                </a>
                <p aria-hidden="true" class="mt-1">Shop now</p>
              </div>

              <div class="group relative text-sm">
                <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-slate-100 group-hover:opacity-75">
                  <img src="https://tailwindui.com/img/ecommerce-images/product-page-05-menu-02.jpg" alt="Calendar user interface screenshot with icon buttons and orange-yellow theme." class="object-cover object-center">
                </div>
                <a href="#" class="mt-6 block font-medium text-slate-900">
                  <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                  Marketing Icon Pack
                </a>
                <p aria-hidden="true" class="mt-1">Shop now</p>
              </div>
            </div>

            <div>
              <p id="icons-general-heading-mobile" class="font-medium text-slate-900">General Use</p>
              <ul role="list" aria-labelledby="icons-general-heading-mobile" class="mt-6 flex flex-col space-y-6">
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Heroicons Solid</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Heroicons Outline</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Line Illustrations</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Hero Illustrations</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Branded Illustrations</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Skeuomorphic Illustrations</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Hand Drawn Illustrations</a>
                </li>
              </ul>
            </div>

            <div>
              <p id="icons-application-heading-mobile" class="font-medium text-slate-900">Application UI</p>
              <ul role="list" aria-labelledby="icons-application-heading-mobile" class="mt-6 flex flex-col space-y-6">
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Outlined</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Solid</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Branded</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Small</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Illustrations</a>
                </li>
              </ul>
            </div>

            <div>
              <p id="icons-marketing-heading-mobile" class="font-medium text-slate-900">Marketing</p>
              <ul role="list" aria-labelledby="icons-marketing-heading-mobile" class="mt-6 flex flex-col space-y-6">
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Outlined</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Solid</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Branded</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Small</a>
                </li>

                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-slate-500">Illustrations</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="space-y-6 border-t border-slate-200 py-6 px-4">
          <div class="flow-root">
            <a href="#" class="-m-2 block p-2 font-medium text-slate-900">UI Kits</a>
          </div>

          <div class="flow-root">
            <a href="#" class="-m-2 block p-2 font-medium text-slate-900">Themes</a>
          </div>
        </div>

        <div class="space-y-6 border-t border-slate-200 py-6 px-4">
          <div class="flow-root">
            <a href="#" class="-m-2 block p-2 font-medium text-slate-900">Sign in</a>
          </div>
          <div class="flow-root">
            <a href="#" class="-m-2 block p-2 font-medium text-slate-900">Create account</a>
          </div>
        </div>

        <div class="border-t border-slate-200 py-6 px-4">
          <a href="#" class="-m-2 flex items-center p-2">
            <img src="https://tailwindui.com/img/flags/flag-canada.svg" alt="" class="block h-auto w-5 flex-shrink-0">
            <span class="ml-3 block text-base font-medium text-slate-900">CAD</span>
            <span class="sr-only">, change currency</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <header class="relative bg-white">
    <p class="flex h-10 items-center justify-center bg-purple-600 px-4 text-sm font-medium text-white sm:px-6 lg:px-8">Save 20% when you buy two or more kits</p>

    <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="border-b border-slate-200">
        <div class="flex h-16 items-center">
          <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
          <button type="button" class="rounded-md bg-white p-2 text-slate-400 lg:hidden">
            <span class="sr-only">Open menu</span>
            <!-- Heroicon name: outline/bars-3 -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </button>

          <!-- Logo -->
          <div class="ml-4 flex lg:ml-0">
            <a href="#">
              <span class="sr-only">Your Company</span>
              <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=purple&shade=600" alt="">
            </a>
          </div>

          <!-- Flyout menus -->
          {{-- <div class="hidden lg:ml-8 lg:block lg:self-stretch">
            <div class="flex h-full space-x-8">
              <div class="flex">
                <div class="relative flex">
                  <!-- Item active: "border-purple-600 text-purple-600", Item inactive: "border-transparent text-slate-700 hover:text-slate-800" -->
                  <button type="button" class="border-transparent text-slate-700 hover:text-slate-800 relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out" aria-expanded="false">Wireframe Kits</button>
                </div>

                <!--
                  'Wireframe Kits' flyout menu, show/hide based on flyout menu state.

                  Entering: "transition ease-out duration-200"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "transition ease-in duration-150"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="absolute inset-x-0 top-full z-10 text-sm text-slate-500">
                  <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                  <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>

                  <div class="relative bg-white">
                    <div class="mx-auto max-w-7xl px-8">
                      <div class="grid grid-cols-2 gap-y-10 gap-x-8 py-16">
                        <div class="col-start-2 grid grid-cols-2 gap-x-8">
                          <div class="group relative text-base sm:text-sm">
                            <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-slate-100 group-hover:opacity-75">
                              <img src="https://tailwindui.com/img/ecommerce-images/product-page-05-menu-03.jpg" alt="Pricing page screenshot with tiered plan options and comparison table on colorful blue and green background." class="object-cover object-center">
                            </div>
                            <a href="#" class="mt-6 block font-medium text-slate-900">
                              <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                              Scaffold
                            </a>
                            <p aria-hidden="true" class="mt-1">Shop now</p>
                          </div>

                          <div class="group relative text-base sm:text-sm">
                            <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-slate-100 group-hover:opacity-75">
                              <img src="https://tailwindui.com/img/ecommerce-images/product-page-05-menu-04.jpg" alt="Application screenshot with tiered navigation and account settings form on color red and purple background." class="object-cover object-center">
                            </div>
                            <a href="#" class="mt-6 block font-medium text-slate-900">
                              <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                              Bones
                            </a>
                            <p aria-hidden="true" class="mt-1">Shop now</p>
                          </div>
                        </div>
                        <div class="row-start-1 grid grid-cols-3 gap-y-10 gap-x-8 text-sm">
                          <div>
                            <p id="application-heading" class="font-medium text-slate-900">Application UI</p>
                            <ul role="list" aria-labelledby="application-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Home Screens</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Detail Screens</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Settings Screens</a>
                              </li>
                            </ul>
                          </div>

                          <div>
                            <p id="marketing-heading" class="font-medium text-slate-900">Marketing</p>
                            <ul role="list" aria-labelledby="marketing-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Landing Pages</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Pricing Pages</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Contact Pages</a>
                              </li>
                            </ul>
                          </div>

                          <div>
                            <p id="ecommerce-heading" class="font-medium text-slate-900">Ecommerce</p>
                            <ul role="list" aria-labelledby="ecommerce-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Storefront Pages</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Product Pages</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Category Pages</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Shopping Cart Pages</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Checkout Pages</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="flex">
                <div class="relative flex">
                  <!-- Item active: "border-purple-600 text-purple-600", Item inactive: "border-transparent text-slate-700 hover:text-slate-800" -->
                  <button type="button" class="border-transparent text-slate-700 hover:text-slate-800 relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out" aria-expanded="false">Icons</button>
                </div>

                <!--
                  'Icons' flyout menu, show/hide based on flyout menu state.

                  Entering: "transition ease-out duration-200"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "transition ease-in duration-150"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="absolute inset-x-0 top-full z-10 text-sm text-slate-500">
                  <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                  <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>

                  <div class="relative bg-white">
                    <div class="mx-auto max-w-7xl px-8">
                      <div class="grid grid-cols-2 gap-y-10 gap-x-8 py-16">
                        <div class="col-start-2 grid grid-cols-2 gap-x-8">
                          <div class="group relative text-base sm:text-sm">
                            <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-slate-100 group-hover:opacity-75">
                              <img src="https://tailwindui.com/img/ecommerce-images/product-page-05-menu-01.jpg" alt="Payment application dashboard screenshot with transaction table, financial highlights, and main clients on colorful purple background." class="object-cover object-center">
                            </div>
                            <a href="#" class="mt-6 block font-medium text-slate-900">
                              <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                              Application UI Pack
                            </a>
                            <p aria-hidden="true" class="mt-1">Shop now</p>
                          </div>

                          <div class="group relative text-base sm:text-sm">
                            <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-slate-100 group-hover:opacity-75">
                              <img src="https://tailwindui.com/img/ecommerce-images/product-page-05-menu-02.jpg" alt="Calendar user interface screenshot with icon buttons and orange-yellow theme." class="object-cover object-center">
                            </div>
                            <a href="#" class="mt-6 block font-medium text-slate-900">
                              <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                              Marketing Icon Pack
                            </a>
                            <p aria-hidden="true" class="mt-1">Shop now</p>
                          </div>
                        </div>
                        <div class="row-start-1 grid grid-cols-3 gap-y-10 gap-x-8 text-sm">
                          <div>
                            <p id="general-heading" class="font-medium text-slate-900">General Use</p>
                            <ul role="list" aria-labelledby="general-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Heroicons Solid</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Heroicons Outline</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Line Illustrations</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Hero Illustrations</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Branded Illustrations</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Skeuomorphic Illustrations</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Hand Drawn Illustrations</a>
                              </li>
                            </ul>
                          </div>

                          <div>
                            <p id="application-heading" class="font-medium text-slate-900">Application UI</p>
                            <ul role="list" aria-labelledby="application-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Outlined</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Solid</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Branded</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Small</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Illustrations</a>
                              </li>
                            </ul>
                          </div>

                          <div>
                            <p id="marketing-heading" class="font-medium text-slate-900">Marketing</p>
                            <ul role="list" aria-labelledby="marketing-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Outlined</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Solid</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Branded</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Small</a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-slate-800">Illustrations</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <a href="#" class="flex items-center text-sm font-medium text-slate-700 hover:text-slate-800">UI Kits</a>

              <a href="#" class="flex items-center text-sm font-medium text-slate-700 hover:text-slate-800">Themes</a>
            </div>
          </div> --}}

          <div class="ml-auto flex items-center">
            <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
              <a href="#" class="text-sm font-medium text-slate-700 hover:text-slate-800">Sign in</a>
              <span class="h-6 w-px bg-slate-200" aria-hidden="true"></span>
              <a href="#" class="text-sm font-medium text-slate-700 hover:text-slate-800">Create account</a>
            </div>

            <div class="hidden lg:ml-8 lg:flex">
              <a href="#" class="flex items-center text-slate-700 hover:text-slate-800">
                <img src="https://tailwindui.com/img/flags/flag-canada.svg" alt="" class="block h-auto w-5 flex-shrink-0">
                <span class="ml-3 block text-sm font-medium">CAD</span>
                <span class="sr-only">, change currency</span>
              </a>
            </div>

            <!-- Search -->
            <div class="flex lg:ml-6">
              <a href="#" class="p-2 text-slate-400 hover:text-slate-500">
                <span class="sr-only">Search</span>
                <!-- Heroicon name: outline/magnifying-glass -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
              </a>
            </div>

            <!-- Cart -->
            <div class="ml-4 flow-root lg:ml-6">
              <a href="#" class="group -m-2 flex items-center p-2">
                <!-- Heroicon name: outline/shopping-bag -->
                <svg class="h-6 w-6 flex-shrink-0 text-slate-400 group-hover:text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                <span class="ml-2 text-sm font-medium text-slate-700 group-hover:text-slate-800">0</span>
                <span class="sr-only">items in cart, view bag</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main class="mx-auto px-4 pt-14 pb-24 sm:px-6 sm:pt-16 sm:pb-32 lg:max-w-7xl lg:px-8">
    <!-- Product -->
    <div class="lg:grid lg:grid-cols-7 lg:grid-rows-1 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">
      <!-- Product image -->
      <div class="lg:col-span-4 lg:row-end-1">
        <div class="aspect-w-4 aspect-h-3 overflow-hidden rounded-lg bg-slate-100">
          <img src="https://tailwindui.com/img/ecommerce-images/product-page-05-product-01.jpg" alt="Sample of 30 icons with friendly and fun details in outline, filled, and brand color styles." class="object-cover object-center">
        </div>
      </div>

      <!-- Product details -->
      <div class="mx-auto mt-14 max-w-2xl sm:mt-16 lg:col-span-3 lg:row-span-2 lg:row-end-2 lg:mt-0 lg:max-w-none">
        <div class="flex flex-col-reverse">
          <div class="mt-4">
            <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Application UI Icon Pack</h1>

            <h2 id="information-heading" class="sr-only">Product information</h2>
            <p class="mt-2 text-sm text-slate-500">Version 1.0 (Updated <time datetime="2021-06-05">June 5, 2021</time>)</p>
          </div>

          <div>
            <h3 class="sr-only">Reviews</h3>
            <div class="flex items-center">
              <!--
                Heroicon name: mini/star

                Active: "text-yellow-400", Default: "text-slate-300"
              -->
              <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>

              <!-- Heroicon name: mini/star -->
              <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>

              <!-- Heroicon name: mini/star -->
              <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>

              <!-- Heroicon name: mini/star -->
              <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>

              <!-- Heroicon name: mini/star -->
              <svg class="text-slate-300 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>
            </div>
            <p class="sr-only">4 out of 5 stars</p>
          </div>
        </div>

        <p class="mt-6 text-slate-500">The Application UI Icon Pack comes with over 200 icons in 3 styles: outline, filled, and branded. This playful icon pack is tailored for complex application user interfaces with a friendly and legible look.</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">
          <x-button type="button" variant="light" color="primary">Pay $220</x-button>
          <x-button type="button" variant="light" color="secondary">Preview</x-button>
        </div>

        <div class="mt-10 border-t border-slate-200 pt-10">
          <h3 class="text-sm font-medium text-slate-900">Compatibility</h3>
          <div class="prose prose-sm mt-4 text-slate-500">
            <dl class="space-y-6" role="list">
                <div>
                    <dt class="flex items-center space-x-2 font-bold tracking-tight">
                        @svg('flex-question-square', 'h-5 w-5 shrink-0 text-warning-400')
                        <span class="text-warning-500">Nova 2.7</span>
                    </dt>
                    <dd class="text-sm pl-8">This add-on may work on this version of Nova, but members of the community haven't confirmed</dd>
                    <dd class="text-sm pl-8 underline text-purple-500">Using this add-on in this version of Nova? Let us know!</dd>
                </div>

                <div>
                    <dt class="flex items-center space-x-2 font-bold tracking-tight">
                        @svg('flex-check-square', 'h-5 w-5 shrink-0 text-success-400')
                        <span class="text-success-500">Nova 2.6</span>
                    </dt>
                    <dd class="text-sm pl-8">Members of the community have confirmed this add-on works on this version of Nova</dd>
                </div>

                <div>
                    <dt class="flex items-center space-x-2 font-bold tracking-tight">
                        @svg('flex-delete-square', 'h-5 w-5 shrink-0 text-danger-400')
                        <span class="text-danger-500">Nova 2.5</span>
                    </dt>
                    <dd class="text-sm pl-8">Members of the community have confirmed this add-on does not work on this version of Nova</dd>
                </div>
            </dl>
          </div>
        </div>

        {{-- <div class="mt-10 border-t border-slate-200 pt-10">
          <h3 class="text-sm font-medium text-slate-900">License</h3>
          <p class="mt-4 text-sm text-slate-500">For personal and professional use. You cannot resell or redistribute these icons in their original or modified state. <a href="#" class="font-medium text-purple-600 hover:text-purple-500">Read full license</a></p>
        </div> --}}

        <div class="mt-10 border-t border-slate-200 pt-10">
          <h3 class="text-sm font-medium text-slate-900">Share</h3>
          <ul role="list" class="mt-4 flex items-center space-x-6">
            <li>
              <a href="#" class="flex h-6 w-6 items-center justify-center text-slate-400 hover:text-slate-500">
                <span class="sr-only">Share on Facebook</span>
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                  <path fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd" />
                </svg>
              </a>
            </li>
            <li>
              <a href="#" class="flex h-6 w-6 items-center justify-center text-slate-400 hover:text-slate-500">
                <span class="sr-only">Share on Instagram</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                </svg>
              </a>
            </li>
            <li>
              <a href="#" class="flex h-6 w-6 items-center justify-center text-slate-400 hover:text-slate-500">
                <span class="sr-only">Share on Twitter</span>
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                  <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                </svg>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="mx-auto mt-16 w-full max-w-2xl lg:col-span-4 lg:mt-0 lg:max-w-none">
        <div>
          <div class="border-b border-slate-200">
            <div class="-mb-px flex space-x-8" aria-orientation="horizontal" role="tablist">
              <!-- Selected: "border-purple-600 text-purple-600", Not Selected: "border-transparent text-slate-700 hover:text-slate-800 hover:border-slate-300" -->
              <button id="tab-reviews" class="border-transparent text-slate-700 hover:text-slate-800 hover:border-slate-300 whitespace-nowrap border-b-2 py-6 text-sm font-medium" aria-controls="tab-panel-reviews" role="tab" type="button">Customer Reviews</button>
              <button id="tab-faq" class="border-transparent text-slate-700 hover:text-slate-800 hover:border-slate-300 whitespace-nowrap border-b-2 py-6 text-sm font-medium" aria-controls="tab-panel-faq" role="tab" type="button">FAQ</button>
              <button id="tab-license" class="border-transparent text-slate-700 hover:text-slate-800 hover:border-slate-300 whitespace-nowrap border-b-2 py-6 text-sm font-medium" aria-controls="tab-panel-license" role="tab" type="button">License</button>
            </div>
          </div>

          <!-- 'Customer Reviews' panel, show/hide based on tab state -->
          <div id="tab-panel-reviews" class="-mb-10" aria-labelledby="tab-reviews" role="tabpanel" tabindex="0">
            <h3 class="sr-only">Customer Reviews</h3>

            <div class="flex space-x-4 text-sm text-slate-500">
              <div class="flex-none py-10">
                <img src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-slate-100">
              </div>
              <div class="flex-1 py-10">
                <h3 class="font-medium text-slate-900">Emily Selman</h3>
                <p><time datetime="2021-07-16">July 16, 2021</time></p>

                <div class="mt-4 flex items-center">
                  <!--
                    Heroicon name: mini/star

                    Active: "text-yellow-400", Default: "text-slate-300"
                  -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>
                </div>
                <p class="sr-only">5 out of 5 stars</p>

                <div class="prose prose-sm mt-4 max-w-none text-slate-500">
                  <p>This icon pack is just what I need for my latest project. There's an icon for just about anything I could ever need. Love the playful look!</p>
                </div>
              </div>
            </div>

            <div class="flex space-x-4 text-sm text-slate-500">
              <div class="flex-none py-10">
                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-slate-100">
              </div>
              <div class="flex-1 py-10 border-t border-slate-200">
                <h3 class="font-medium text-slate-900">Hector Gibbons</h3>
                <p><time datetime="2021-07-12">July 12, 2021</time></p>

                <div class="mt-4 flex items-center">
                  <!--
                    Heroicon name: mini/star

                    Active: "text-yellow-400", Default: "text-slate-300"
                  -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>
                </div>
                <p class="sr-only">5 out of 5 stars</p>

                <div class="prose prose-sm mt-4 max-w-none text-slate-500">
                  <p>Blown away by how polished this icon pack is. Everything looks so consistent and each SVG is optimized out of the box so I can use it directly with confidence. It would take me several hours to create a single icon this good, so it's a steal at this price.</p>
                </div>
              </div>
            </div>

            <!-- More reviews... -->
          </div>

          <!-- 'FAQ' panel, show/hide based on tab state -->
          <div id="tab-panel-faq" class="text-sm text-slate-500" aria-labelledby="tab-faq" role="tabpanel" tabindex="0">
            <h3 class="sr-only">Frequently Asked Questions</h3>

            <dl>
              <dt class="mt-10 font-medium text-slate-900">What format are these icons?</dt>
              <dd class="prose prose-sm mt-2 max-w-none text-slate-500">
                <p>The icons are in SVG (Scalable Vector Graphic) format. They can be imported into your design tool of choice and used directly in code.</p>
              </dd>

              <dt class="mt-10 font-medium text-slate-900">Can I use the icons at different sizes?</dt>
              <dd class="prose prose-sm mt-2 max-w-none text-slate-500">
                <p>Yes. The icons are drawn on a 24 x 24 pixel grid, but the icons can be scaled to different sizes as needed. We don&#039;t recommend going smaller than 20 x 20 or larger than 64 x 64 to retain legibility and visual balance.</p>
              </dd>

              <!-- More FAQs... -->
            </dl>
          </div>

          <!-- 'License' panel, show/hide based on tab state -->
          <div id="tab-panel-license" class="pt-10" aria-labelledby="tab-license" role="tabpanel" tabindex="0">
            <h3 class="sr-only">License</h3>

            <div class="prose prose-sm max-w-none text-slate-500">
              <h4>Overview</h4>

              <p>For personal and professional use. You cannot resell or redistribute these icons in their original or modified state.</p>

              <ul role="list">
                <li>You're allowed to use the icons in unlimited projects.</li>
                <li>Attribution is not required to use the icons.</li>
              </ul>

              <h4>What you can do with it</h4>

              <ul role="list">
                <li>Use them freely in your personal and professional work.</li>
                <li>Make them your own. Change the colors to suit your project or brand.</li>
              </ul>

              <h4>What you can't do with it</h4>

              <ul role="list">
                <li>Don't be greedy. Selling or distributing these icons in their original or modified state is prohibited.</li>
                <li>Don't be evil. These icons cannot be used on websites or applications that promote illegal or immoral beliefs or activities.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Related products -->
    <div class="mx-auto mt-24 max-w-2xl sm:mt-32 lg:max-w-none">
      <div class="flex items-center justify-between space-x-4">
        <h2 class="text-lg font-medium text-slate-900">Customers also viewed</h2>
        <a href="#" class="whitespace-nowrap text-sm font-medium text-purple-600 hover:text-purple-500">
          View all
          <span aria-hidden="true"> &rarr;</span>
        </a>
      </div>
      <div class="mt-6 grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
        <div class="group relative">
          <div class="aspect-w-4 aspect-h-3 overflow-hidden rounded-lg bg-slate-100">
            <img src="https://tailwindui.com/img/ecommerce-images/product-page-05-related-product-01.jpg" alt="Payment application dashboard screenshot with transaction table, financial highlights, and main clients on colorful purple background." class="object-cover object-center">
            <div class="flex items-end p-4 opacity-0 group-hover:opacity-100" aria-hidden="true">
              <div class="w-full rounded-md bg-white bg-opacity-75 py-2 px-4 text-center text-sm font-medium text-slate-900 backdrop-blur backdrop-filter">View Product</div>
            </div>
          </div>
          <div class="mt-4 flex items-center justify-between space-x-8 text-base font-medium text-slate-900">
            <h3>
              <a href="#">
                <span aria-hidden="true" class="absolute inset-0"></span>
                Fusion
              </a>
            </h3>
            <p>$49</p>
          </div>
          <p class="mt-1 text-sm text-slate-500">UI Kit</p>
        </div>

        <!-- More products... -->
      </div>
    </div>
  </main>

  <footer aria-labelledby="footer-heading" class="bg-slate-50">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 py-20 md:grid-flow-col md:auto-rows-min md:grid-cols-12 md:gap-x-8 md:gap-y-16">
        <!-- Image section -->
        <div class="col-span-1 md:col-span-2 lg:col-start-1 lg:row-start-1">
          <img src="https://tailwindui.com/img/logos/mark.svg?color=purple&shade=600" alt="" class="h-8 w-auto">
        </div>

        <!-- Sitemap sections -->
        <div class="col-span-6 mt-10 grid grid-cols-2 gap-8 sm:grid-cols-3 md:col-span-8 md:col-start-3 md:row-start-1 md:mt-0 lg:col-span-6 lg:col-start-2">
          <div class="grid grid-cols-1 gap-y-12 sm:col-span-2 sm:grid-cols-2 sm:gap-x-8">
            <div>
              <h3 class="text-sm font-medium text-slate-900">Products</h3>
              <ul role="list" class="mt-6 space-y-6">
                <li class="text-sm">
                  <a href="#" class="text-slate-500 hover:text-slate-600">Wireframe Kits</a>
                </li>

                <li class="text-sm">
                  <a href="#" class="text-slate-500 hover:text-slate-600">Icons</a>
                </li>

                <li class="text-sm">
                  <a href="#" class="text-slate-500 hover:text-slate-600">UI Kits</a>
                </li>

                <li class="text-sm">
                  <a href="#" class="text-slate-500 hover:text-slate-600">Themes</a>
                </li>
              </ul>
            </div>
            <div>
              <h3 class="text-sm font-medium text-slate-900">Company</h3>
              <ul role="list" class="mt-6 space-y-6">
                <li class="text-sm">
                  <a href="#" class="text-slate-500 hover:text-slate-600">Who we are</a>
                </li>

                <li class="text-sm">
                  <a href="#" class="text-slate-500 hover:text-slate-600">Open Source</a>
                </li>

                <li class="text-sm">
                  <a href="#" class="text-slate-500 hover:text-slate-600">Press</a>
                </li>

                <li class="text-sm">
                  <a href="#" class="text-slate-500 hover:text-slate-600">Careers</a>
                </li>

                <li class="text-sm">
                  <a href="#" class="text-slate-500 hover:text-slate-600">License</a>
                </li>

                <li class="text-sm">
                  <a href="#" class="text-slate-500 hover:text-slate-600">Privacy</a>
                </li>
              </ul>
            </div>
          </div>
          <div>
            <h3 class="text-sm font-medium text-slate-900">Customer Service</h3>
            <ul role="list" class="mt-6 space-y-6">
              <li class="text-sm">
                <a href="#" class="text-slate-500 hover:text-slate-600">Chat</a>
              </li>

              <li class="text-sm">
                <a href="#" class="text-slate-500 hover:text-slate-600">Contact</a>
              </li>

              <li class="text-sm">
                <a href="#" class="text-slate-500 hover:text-slate-600">Secure Payments</a>
              </li>

              <li class="text-sm">
                <a href="#" class="text-slate-500 hover:text-slate-600">FAQ</a>
              </li>
            </ul>
          </div>
        </div>

        <!-- Newsletter section -->
        <div class="mt-12 md:col-span-8 md:col-start-3 md:row-start-2 md:mt-0 lg:col-span-4 lg:col-start-9 lg:row-start-1">
          <h3 class="text-sm font-medium text-slate-900">Sign up for our newsletter</h3>
          <p class="mt-1 text-sm text-slate-500">Be the first to know when we release new products.</p>
          <form class="mt-3 sm:flex lg:block xl:flex">
            <label for="email-address" class="sr-only">Email address</label>
            <input id="email-address" type="text" autocomplete="email" required class="block w-full rounded-md border border-slate-300 bg-white py-2 px-4 text-base text-slate-900 placeholder-slate-500 shadow-sm focus:border-purple-500 focus:outline-none focus:ring-1 focus:ring-purple-500 sm:min-w-0 sm:max-w-xs sm:flex-1 lg:max-w-none">
            <div class="mt-4 sm:mt-0 sm:ml-4 sm:flex-shrink-0 lg:mt-4 lg:ml-0 xl:mt-0 xl:ml-4">
              <button type="submit" class="flex w-full items-center justify-center rounded-md border border-transparent bg-purple-600 py-2 px-4 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">Sign up</button>
            </div>
          </form>
        </div>
      </div>

      <div class="border-t border-slate-200 py-10 text-center">
        <p class="text-sm text-slate-500">&copy; 2021 Your Company, Inc.</p>
      </div>
    </div>
  </footer>
</div>
</x-base-layout>
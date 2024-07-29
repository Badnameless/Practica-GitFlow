<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="https://cdn.tiny.cloud/1/lv1xej0xayoeabv81l1ofade49wd43svgdac5lvmzzw2zzvy/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                        bodyBG: '#f4f8fb',
                        borderPrimary: '#6375ff',
                        cardIconBG: '#fbfbfb',
                        searchBG: '#f5f5f7',
                        greenPrimary: '#43c68e',
                        yellowPrimary: '#e7993a',
                        skyBlue: '#7ac4e8',
                        darkGreen: '#1f9764',
                        mundoVerdeGreen: '#3b3a48',
                        mundoVerdeDarkGreen: '#2c6e4c',
                        grayTopBar: '#a7b1b3',
                        bodyTableBG: '#f7f7f7',
                        labelFilterBorder: '#ebedf2',
                        labelFilterBG: '#f4f5f8',
                        reloadButtonBG: '#9d9dbd',
                        reloadButtonHoverBG: '#70709e',
                        stockBGTransparent: '#3d92662a',
                        stockBorderGreen: '#3d926652',
                        redPriceColor: '#d64b4b',
                        agotadoBG: '#ec9f9a',
                        agotadoColor: '#df3131',
                        agotadoBorderColor: '#ce736d',
                    },
                    spacing: {
                        '10px': '10px',
                        '14px': '14px',
                        '15px': '15px',
                        '16px': '16px',
                        '20px': '20px',
                        '23px': '23px',
                        '24px': '24px',
                        '25px': '25px',
                        '30px': '30px',
                        '32px': '32px',
                        '35px': '35px',
                        '42px': '42px',
                        '50px': '50px',
                        '60px': '60px',
                        '70px': '70px',
                        '80px': '80px',
                        '100px': '100px',
                        '120px': '120px',
                        '130px': '130px',
                        '140px': '140px',
                        '150px': '150px',
                        '170px': '170px',
                        '206px': '206px',
                        '220px': '220px',
                        '500px': '500px'
                    },
                    fontSize: {
                        '11px': '11px',
                    },
                }
            }
        }
    </script>
    <link rel="stylesheet" href="{{ config('app.url') }}/css/styles.css">
    <script src="https://kit.fontawesome.com/2b35d95dde.js" crossorigin="anonymous"></script>
    {{-- @notifyCss --}}
</head>

<body class="bg-bodyBG">

    <!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  const colors = require('tailwindcss/colors')

  module.exports = {
    // ...
    theme: {
      extend: {
        colors: {
          cyan: colors.cyan,
        },
      },
    },
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
    <div class="min-h-full">
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
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
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>

            <div class="fixed inset-0 flex z-40">
                <!--
          Off-canvas menu, show/hide based on off-canvas menu state.

          Entering: "transition ease-in-out duration-300 transform"
            From: "-translate-x-full"
            To: "translate-x-0"
          Leaving: "transition ease-in-out duration-300 transform"
            From: "translate-x-0"
            To: "-translate-x-full"
        -->
                <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-cyan-700">
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
                            class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            <span class="sr-only">Close sidebar</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex-shrink-0 flex items-center px-4">
                        <img class="h-8 w-auto"
                            src="https://tailwindui.com/img/logos/easywire-logo-cyan-300-mark-white-text.svg"
                            alt="Easywire logo">
                    </div>
                    <nav class="mt-5 flex-shrink-0 h-full divide-y divide-cyan-800 overflow-y-auto"
                        aria-label="Sidebar">
                        <div class="px-2 space-y-1">
                            <!-- Current: "bg-cyan-800 text-white", Default: "text-cyan-100 hover:text-white hover:bg-cyan-600" -->
                            <a href="#"
                                class="bg-cyan-800 text-white group flex items-center px-2 py-2 text-base font-medium rounded-md"
                                aria-current="page">
                                <!-- Heroicon name: outline/home -->
                                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-greenPrimary"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Home
                            </a>

                            <a href="#"
                                class="text-cyan-100 hover:text-white hover:bg-cyan-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                <!-- Heroicon name: outline/clock -->
                                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                History
                            </a>

                            <a href="#"
                                class="text-cyan-100 hover:text-white hover:bg-cyan-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                <!-- Heroicon name: outline/scale -->
                                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                </svg>
                                Balances
                            </a>

                            <a href="#"
                                class="text-cyan-100 hover:text-white hover:bg-cyan-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                <!-- Heroicon name: outline/credit-card -->
                                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                                Cards
                            </a>

                            <a href="#"
                                class="text-cyan-100 hover:text-white hover:bg-cyan-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                <!-- Heroicon name: outline/user-group -->
                                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Recipients
                            </a>

                            <a href="#"
                                class="text-cyan-100 hover:text-white hover:bg-cyan-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                <!-- Heroicon name: outline/document-report -->
                                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Reports
                            </a>
                        </div>
                        <div class="mt-6 pt-6">
                            <div class="px-2 space-y-1">
                                <a href="#"
                                    class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600">
                                    <!-- Heroicon name: outline/cog -->
                                    <svg class="mr-4 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Settings
                                </a>

                                <a href="#"
                                    class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600">
                                    <!-- Heroicon name: outline/question-mark-circle -->
                                    <svg class="mr-4 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Help
                                </a>

                                <a href="#"
                                    class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600">
                                    <!-- Heroicon name: outline/shield-check -->
                                    <svg class="mr-4 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    Privacy
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="flex-shrink-0 w-14" aria-hidden="true">
                    <!-- Dummy element to force sidebar to shrink to fit close icon -->
                </div>
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex flex-col flex-grow bg-mundoVerdeGreen pt-5 pb-4 overflow-y-auto">
                <div class="flex items-center flex-shrink-0 px-4 mb-6">
                    <img class="w-32" src="{{ url('/images/pageLogo.png') }}" alt="Easywire logo">
                </div>
                <nav class="mt-5 flex-1 flex flex-col overflow-hidden" aria-label="Sidebar">
                    <div class="space-y-1 grid grid-rows-3 items-between h-full">

                        <div class="row-span-2 linksCatContainer">

                            {{-- <a href="" class="catalogue navLink -mr-2 rounded-r-none hover:bg-gradient-to-r from-gray-600 text-white group flex items-center justify-between px-6 py-2 text-lg !mb-2 box-border w-full leading-6 font-normal" aria-current="page">
                <!-- Heroicon name: outline/home -->
                <div class="flex items-center">
                    <img class="h-23px mr-4" src="{{url('/images/white-new-product.png')}}" alt="">
                    Catalogo
                </div>
                <i class="fa-solid fa-chevron-down"></i>
                </a>

                <ul class="flex flex-col submenu">
                <li class="products pl-10 hover:bg-gradient-to-r from-gray-600 navLink mb-2">
                    <a href="" class="-mr-2 rounded-r-none text-white group flex items-center pl-6 py-2 text-lg !mb-2 box-border w-full leading-6 font-normal" aria-current="page">
                    <!-- Heroicon name: outline/home -->
                    Productos
                    </a>
                </li>
                </ul> --}}

                            <a href="{{ route('usuarios') }}"
                                class="orders navLink -mr-2 rounded-r-none hover:bg-gradient-to-r from-gray-600 text-white group flex items-center pl-6 py-2 text-lg !mb-2 box-border w-full leading-6 font-normal"
                                aria-current="page">
                                <!-- Heroicon name: outline/home -->
                                <img class="h-23px mr-4" src="{{ url('/images/white-online-order.png') }}"
                                    alt="">
                                Usuarios
                            </a>
                            <a href="{{ route('adm_blog') }}"
                                class="orders navLink -mr-2 rounded-r-none hover:bg-gradient-to-r from-gray-600 text-white group flex items-center pl-6 py-2 text-lg !mb-2 box-border w-full leading-6 font-normal"
                                aria-current="page">
                                <!-- Heroicon name: outline/home -->
                                <img class="h-23px mr-4" src="{{ url('/images/white-settings.png') }}"
                                    alt="">
                                Blogs
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="lg:pl-64 flex flex-col flex-1">
            <div
                class="ml-auto w-full relative z-10 flex-shrink-0 flex h-16 border-b border-gray-200 lg:border-none h-100px flex justify-end">
                <button type="button"
                    class="px-4 border-r border-gray-200 text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-500 lg:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <!-- Heroicon name: outline/menu-alt-1 -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </button>
                <!-- Search bar -->
                <div class="max-w-screen-2xl w-full mx-auto px-4 sm:px-6 lg:px-8 px-4 sm:px-6 lg:px-8">

                    <div class="flex-1 items-center flex justify-between my-6 rounded-2xl">

                        <div class="h-60px bg-white flex-1 items-center flex justify-between p-4 py-3 rounded-2xl invisible">

                    
                            <div class="ml-3 relative">
                                <div>
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
                                <div class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-1">Settings</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-2">Logout</a>
                                </div>
                            </div>
                        </div>
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    <div
                                        class="w-80px flex items-center justify-center h-60px p-4 bg-white ml-4 rounded-2xl">
                                        <img class="h-6 w-6" src="{{ url('/images/power-off.png') }}" alt="">
                                    </div>
                                </a>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
            <main class="flex-1 pb-8">
                <!-- Page header -->
                <div class="hidden bg-white shadow">
                    <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                        <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                            <div class="flex-1 min-w-0">
                                <!-- Profile -->
                                <div class="flex items-center">
                                    <img class="hidden h-16 w-16 rounded-full sm:block"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.6&w=256&h=256&q=80"
                                        alt="">
                                    <div>
                                        <div class="flex items-center">
                                            <img class="h-16 w-16 rounded-full sm:hidden"
                                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.6&w=256&h=256&q=80"
                                                alt="">
                                            <h1
                                                class="ml-3 text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">
                                                Good morning, Emilia Birch</h1>
                                        </div>
                                        <dl class="mt-6 flex flex-col sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap">
                                            <dt class="sr-only">Company</dt>
                                            <dd
                                                class="flex items-center text-sm text-gray-500 font-medium capitalize sm:mr-6">
                                                <!-- Heroicon name: solid/office-building -->
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Duke street studio
                                            </dd>
                                            <dt class="sr-only">Account status</dt>
                                            <dd
                                                class="mt-3 flex items-center text-sm text-gray-500 font-medium sm:mr-6 sm:mt-0 capitalize">
                                                <!-- Heroicon name: solid/check-circle -->
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Verified account
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 flex space-x-3 md:mt-0 md:ml-4">
                                <button type="button"
                                    class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">Add
                                    money</button>
                                <button type="button"
                                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">Send
                                    money</button>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')

        </div>
        </main>
    </div>

    </div>
    <style>
        .linksCatContainer {
            overflow-y: auto;
            padding-right: 10px;
            box-sizing: border-box;
        }

        .linksCatContainer::-webkit-scrollbar {
            width: 6px;
            border-radius: 10px;
        }

        .linksCatContainer::-webkit-scrollbar-thumb {
            background-color: #0e4126;
            border-radius: 10px;
        }

        .linksCatContainer::-webkit-scrollbar-track {
            background-color: #85c5a3;
            border-radius: 10px;
        }

        .attributesModal {
            opacity: 0;
            visibility: hidden;
            transition: .3s ease-in-out;
        }

        .attributesModalActive {
            opacity: 1 !important;
            visibility: initial !important;
            transition: .3s ease-in-out;
        }

        #tableBody tr:nth-of-type(1) {
            border-top: 1px solid #d1d1d1;
        }

        #tableBody tr {
            border-bottom: 1px solid #d1d1d1;
        }

        #tableBody tr:nth-child(2n) {
            background-color: #ebedf2;
        }

        .submenu,
        .subMenuImports,
        .subMenuTranslates,
        .subMenuWebSync,
        .subMenuExports,
        .subMenuBlogs,
        .subMenuShippingPromotions {
            visibility: hidden;
            max-height: 0;
            opacity: 0;
            transition: .3s ease-in-out;
        }

        .submenuProductsActive {
            visibility: initial !important;
            max-height: 600px !important;
            opacity: 1 !important;
            transition: .3s ease-in-out;
        }

        .catalogue i,
        .imports i,
        .translates i,
        .webSync i,
        .exports i,
        .blogs i,
        .marketing i {
            transition: .3s ease-in-out;
        }

        .iconRotate {
            transform: rotate(180deg) !important;
            transition: .3s ease-in-out;
        }

        .importationTable tbody tr:nth-of-type(2n) {
            background: #eeeeee;
        }

        .bodyContainer__productData--table-inputs {
            display: none;
            opacity: 0;
            visibility: hidden;
            transition: .3s ease-in-out;
        }

        .bodyDisplay {
            display: grid;
            opacity: 1 !important;
            visibility: initial !important;
            transition: .3s ease-in-out !important;
        }

        .editOrderContainer {
            min-height: calc(100vh - 132px);
        }

        .importsContainer {
            min-height: calc(100vh - 132px);
        }

        .stockDate::-webkit-calendar-picker-indicator {
            appearance: none !important;
            opacity: 0 !important;
        }

        .ml-auto.w-full.relative.z-10.flex-shrink-0.flex.h-16.border-b.border-gray-200.lg\:border-none.h-100px.flex.justify-end {
            z-index: 0;
        }

        .relative.rounded-lg.shadow-xs.overflow-hidden {
            z-index: 2;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .lg\:w-64 {
            width: 18rem !important;
        }

        .lg\:pl-64 {
            padding-left: 17rem;
        }

        .grid-rows-3 {
            grid-template-rows: 1fr;
        }

        .linksCatContainer {
            overflow-y: hidden;
        }
    </style>
    {{-- @include('notify::messages') --}}
    {{-- <x:notify-messages /> --}}
    {{-- @notifyJs --}}
    <script src="https://kit.fontawesome.com/8f6afb7cb3.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <script src="{{ config('app.url') }}/js/graphics.js"></script>
    <script src="{{ config('app.url') }}/js/analytics.js"></script>
    <script>
        var menuItems = document.querySelectorAll('.submenu a');

        // Recorrer los elementos de enlace del menú
        menuItems.forEach(function(item) {
            // Verificar si el enlace corresponde a la página actual
            if (item.href === window.location.href) {
                // Agregar la clase "active" al elemento padre del enlace
                item.parentNode.parentNode.classList.add('submenuProductsActive');
                //   item.parentNode.classList.add("bg-gradient-to-r");
                item.parentElement.parentElement.previousElementSibling.children[1].classList.add("iconRotate")
            }
        });
    </script>
</body>

</html>

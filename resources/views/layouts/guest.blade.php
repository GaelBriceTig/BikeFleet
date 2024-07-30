<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>



<body class="font-sans antialiased">
    @include('partials.navigation')
    <!-- Page Content -->
    <main class="pt-20 justify-center">

                @yield('content')
                @yield('content3')
                @yield('content5')
                @yield('content1')
            <div class="w-full lg:w-3/3 pt-16">
               @yield('content2')
            </div>

        <footer id="dark-theme" class='bottom-0 h-44 fixed left-0 flex flex-col border-collapse w-full bg-white gap-8 px-8 py-2 md:gap-12'>
            <div class='w-full h-px m-auto fixed bg-gradient-to-r from-transparent via-gray-400 to-transparent'></div>
            <div class='grid grid-cols-2 h-14 fixed gap-8 2xsm:grid-cols-2 md:grid-cols-4 '>
                <div class='flex flex-col mx-12 gap-4'>
                    <label class='text-gray-400  h-3'>CONTACTS</label>
                    <div class="grid grid-flow-col gap-3 text-sm">
                        <div class="col-span-1">
                            <ul class='flex flex-col gap-6 '>
                                <li class="h-1"><i class="fa-solid fa-location-dot"></i></li>
                                <li class="h-1"><i class="fa-solid fa-phone"></i></li>
                                <li class="h-1"><i class="fa-solid fa-envelope"></i></li>
                                <li class="h-1"><i class="fa-solid fa-calculator"></i></li>
                            </ul>
                        </div>
                        <div class="col-span-4">
                            <ul class='flex flex-col gap-6 '>
                                <li class="h-1">Chaussée de wavre 4 5030 Gembloux</li>
                                <li class="h-1">+32 498 62 57</li>
                                <li class="h-1">trucmuch@bidule.truc</li>
                                <li class="h-1">TVA BE 0890 568 541</li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class='flex flex-col gap-4'>
                    <label class='text-gray-400 h-3'>HORAIRES</label>
                    <div class="grid grid-flow-col gap-3 text-sm">
                            <div class="col-span-1">
                                <ul class='flex flex-col gap-6 '>
                                    <li class="h-1">Lundi</li>
                                    <li class="h-1">Mardi</li>
                                    <li class="h-1">Mercredi</li>
                                    <li class="h-1">Jeudi</li>
                                    <li class="h-1">Vendredi</li>
                                </ul>
                            </div>
                            <div class="col-span-13">
                                <ul class='flex flex-col gap-6 '>
                                    <li class="h-1">10h-18h</li>
                                    <li class="h-1">Fermé</li>
                                    <li class="h-1">9h-18h</li>
                                    <li class="h-1">9h-18h</li>
                                    <li class="h-1">9h-20h</li>
                                </ul>
                            </div>
                    </div>
                </div>
                <div class='flex flex-col gap-4'>
                    <label class='text-gray-400 h-3'>QUI SOMMES-NOUS?</label>
                    <ul class='flex flex-col gap-6 py-3 text-sm'>
                        <p>Société est spécialisé dans la location de vélo.<br>
                            Nous offrons de magnifiques avantages à prix compétitif pour un monde meilleur.</p>

                    </ul>
                </div>
                <div class='flex flex-col gap-6 py-8'>
                    <x-application-logo class="block h-28 w-auto fill-current text-gray-600" />
                </div>

            </div>
        </footer>

    </main>
@livewireScripts
</body>
</html>

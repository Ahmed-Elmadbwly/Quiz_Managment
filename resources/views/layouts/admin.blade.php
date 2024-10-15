<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Quiz Management System
    </title>
    <link rel="icon" href="{{url("favicon.ico")}}">
    <link href="{{url("style.css")}}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}">

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
        <!-- ===== Sidebar Start ===== -->
        @if(auth()->user()->role == 'admin')
            @include('layouts.sidebar')
        @else
            @include('layouts.student')
        @endif
        <!-- ===== Sidebar End ===== -->
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            @include('layouts.navigation')

            <!-- ===== Content Area Start ===== -->

            <!-- ===== Content Area End ===== -->
            
            <!-- ===== Main Content Start ===== -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <!-- ===== Main Content End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
    <script defer src="{{url('bundle.js')}}"></script>
</body>

</html>

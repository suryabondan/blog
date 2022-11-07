<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-cloak x-data="{ darkMode: localStorage.getItem('dark') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
</head>

<body class="font-sans antialiased h-full">
    <div class="relative min-h-screen lg:flex bg-gray-100 dark:bg-gray-900" x-data="{ open: true }">

        <!-- Page Content -->
        @include('layouts.sidebar-navigation')
        @include('layouts.header-navigation')
        <main class="lg:flex-1 h-full pt-8 lg:pl-[16rem]">
            {{ $slot }}
        </main>
    </div>
</body>
<script>
    function deleteData(link, id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: link + id,
                    success: function(response) {
                        if (response.success) {
                            SwalSuccess(response.message, 1)
                        } else {
                            SwalError(response.message)
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        swal.fire({
                            icon: 'error',
                            title: 'Error System!',
                            text: JSON.stringify(XMLHttpRequest, null, 2)
                        })
                    }
                });
            }
        })
    }

    function SwalSuccess(message, reload = 0) {

        if (reload) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: message
            }).then(function() {
                location.reload();
            });
        } else {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: message
            })
        }

    }

    function SwalError(message) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: message
        })
    }

    function SwalWarning(message) {
        Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: message
        })
    }
</script>

</html>

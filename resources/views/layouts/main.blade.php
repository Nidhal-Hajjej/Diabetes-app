<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://www.svgrepo.com/show/55261/doctor.svg">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" />
    @yield('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../scripts/preventScroll.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <title>Diabetes@Home</title>

</head>

<body>
    <header id="header">
        <nav class="navbar">
            <a href="/" class="logo"><span style="color:black">D</span>@H</a>
            <ul class="nav-menu">
                {{-- {{#if loggedIn}}
                <li class="nav-item">
                    <a href="/patient/dashboard" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="/patient/data" class="nav-link">Your Data</a>
                </li>
                {{else}} --}}

                <li class="nav-item">
                    @if (!session('loggedIn'))
                        <a href="/" class="nav-link">Home</a>
                    @else
                        @if (!request()->is('doc', 'patientDashboard'))
                
                    <a href="{{ session('userType') == 'doctor' ? '/doc' : '/patientDashboard' }}" class="nav-link">Dashboard</a>
                
                @endif
                @endif
                </li>

                <li class="nav-item">
                    <a href="/diabetes" class="nav-link">Diabetes</a>
                </li>

                <li class="nav-item">
                    <a href="/aboutWebsite" class="nav-link">This Website</a>
                </li>

                <li class="nav-item">
                    {{-- <a href="/login" class="nav-link"> Login </a> --}}
                    @if (session('loggedIn'))
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                        {{-- <a href="/logout" class="nav-link">Logout</a> --}}
                    @else
                        <a href="/login" class="nav-link">Login</a>
                    @endif
                    {{-- @if ($loggedIn)
                        <form action="{{ route('logout') }}" method="post">
                            @csrf

                            <button type="submit"> Logout </button>
                        </form>
                    @else
                        <a href="/login" class="nav-link"> Login </a>
                    @endif --}}
                </li>
            </ul>
        </nav>
    </header>
    <main>

        @yield('content')

    </main>
    <footer id="footer">
        {{-- <a href="#" class="logo"><span style="color:black">D</span>@H</a> --}}
        <a href="#" class="logo">D@H</a>
        <p>Powered by Gwabsiya</p>
    </footer>
</body>

</html>

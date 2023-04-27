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
<a href="/" class="homebutton"><i class='fa fa-home' style='color: rgba(5, 85, 142, 1); font-size: 50px; min-width:50px; '></i></a>
<body>
    <header id="header">
        
        {{-- <nav class="navbar"> --}}
            {{-- <a href="/" class="logo">D@H</a> --}}

            
            {{-- <ul class="nav-menu"> --}}
                {{-- {{#if loggedIn}}
                <li class="nav-item">
                    <a href="/patient/dashboard" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="/patient/data" class="nav-link">Your Data</a>
                </li>
                {{else}} --}}

                {{-- <li class="nav-item"> --}}
                    


                    {{-- {{#if loggedIn}}
                    <form action="/logout" method="post">
                        <button type="submit"> Logout </button>
                    </form>
                    {{else}} --}}
                    {{-- <form action="/login">
                        <button type="submit" class="nav-link"> Login </button>
                    </form> --}}
                    {{-- {{/if}}  --}}
                {{-- </li>
            </ul>
        </nav> --}}
    </header>
    <main>

        @yield('content')

    </main>
    
</body>
<footer id="footer">
    {{-- <a href="#" class="logo"><span style="color:black">D</span>@H</a> --}}
    <a href="#" class="logo"style="font-size:20px; margin:5px 0;">D@H</a>
    <p style="font-weight: bold;">Powered by Gwabsiya</p>
    

</footer>
</html>

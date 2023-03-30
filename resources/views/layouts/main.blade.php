<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://www.svgrepo.com/show/55261/doctor.svg">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
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
                    <a href="/" class="nav-link">Home</a>
                </li>
                
                <li class="nav-item">
                    <a href="/diabetes" class="nav-link">Diabetes</a>
                </li>

                <li class="nav-item">
                    <a href="/aboutWebsite" class="nav-link">This Website</a>
                </li>
               
                <li class="nav-item">
                    <a href="/login" class="nav-link"> Login </a>

                    {{-- {{#if loggedIn}}
                    <form action="/logout" method="post">
                        <button type="submit"> Logout </button>
                    </form>
                    {{else}} --}}
                    {{-- <form action="/login">
                        <button type="submit" class="nav-link"> Login </button>
                    </form> --}}
                    {{-- {{/if}}  --}}
                </li>
            </ul>
        </nav>
    </header>
    <main>

        @yield('content')
    
    </main> 
    <footer id="footer"> 
        <a href="#" class="logo"><span style="color:black">D</span>@H</a>
        <p>Powered by Gwabsiya</p>
    </footer>
</body>
</html>
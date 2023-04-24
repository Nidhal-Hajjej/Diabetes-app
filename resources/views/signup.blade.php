@extends('layouts.second')
<div></div>
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/styles2.css') }}">
@endsection

@section('content')

{{-- 
    <div class="page-heading" style="background-image: url('../images/header-img-2.jpg');">
        <h1>Log In</h1>          
    </div>

    <div class="log-in-section">
    <form action="/login" class="log-in-form" method="post">
    <div class="input-box">
        <span class="label">E-mail</span>
        <div class="input">
            <input type="email" placeholder="name@example.com" id="username" name="username" required>
        </div>
    </div>

    <div class="input-box">
        <span class="label">Password</span>
        <div class="input">
        <input type="password" placeholder="Enter Password" id="pw" name="password" required>
        </div>
    </div>

    <button type="submit">Log In</button>

    </form> --}}
    {{-- {{> flashWarning}} --}}
    {{-- </div>

    <div class="contact-section">
    <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_iivslabn.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    <h1>Sign in now to start your journey in defeating diabetes</h1>
    <h3>Interested in registering?</h3>
    <h3>Contact us at 04 123 456</h3>
    </div>

    <div class="filler-image" style="background-image: url('/images/dah-mockup.png'); background-position: 25% 45%;">
    <h2>

    </h2>
    </div> --}}



    <body>
    
        <h2>Create a new account</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{ route('signup.processForm') }}" method="POST">
                @csrf
                <h1>SignUp as a Patient</h1>
                <div><br></div>
                
                <input type="text" placeholder="Name" name="name"/>
                <input type="email" placeholder="Email" name="email"/>
                <input type="password" placeholder="Password" name="password"/>
                <button type="submit">SignUp</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="{{ route('signup.processForm') }}" method="POST">
                @csrf
                <h1>SignUp as a Doctor</h1>
                <div>
                    <br>
                </div>
                <input type="text" placeholder="Name" name="name"/>
                <input type="email" placeholder="Email" name="email"/>
                <input type="password" placeholder="Password" name="password"/>
                
                <button type="submit">SignUp</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h3>You are a Doctor ?</h3>
                    <button class="ghost" id="signIn">I'm a Doctor</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h3>You are a Patient ?</h3>
                    
                    <button class="ghost" id="signUp">I'm a patient</button>
                </div>
            </div>
        </div>
    </div>
    <h4>You have already an account ?</h4>
    <h4><a href="/login">Go to Login page</a></h4>



        
            
    
        
        <script src="{{ asset('js/login.js') }}"></script>
    </body>

@endsection
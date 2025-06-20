@extends('layouts.main')

@section('content')
    <div class="first-sect-header" style="background-image: url('../images/check.jpg');">
        <h1>Would you like to verify <br> whether you have diabetes?</h1>
        <button onclick="window.location.href='/prediction'">Check Here</button>
    </div>

    <div class="hero-section">
        <div class="hero-text">
            {{-- {{! <h1>Managing</h1> }} --}}
            <h1>Managing Diabetes is difficult.</h1>
            <h2>Our app makes it easy.</h2>
            {{-- {{#if loggedIn}}
            <form action="/logout" method="post">
            <button type="submit" id="login-hero">
                Logout
            </button>
            </form>
        {{else}} --}}
            <form action="/login">
                <button type="submit" id="login-hero">
                    Login
                </button>
            </form>
            {{-- {{/if}} --}}
        </div>

        <div class="hero-image">
            <lottie-player id="hero-lottie" src="https://assets5.lottiefiles.com/packages/lf20_tutvdkg0.json"
                background="transparent" speed="1" loop autoplay></lottie-player>
        </div>
    </div>

    <div class="sect-header" style="background-image: url('../images/doctor-phone.jpg');">
        <h1>Features</h1>
    </div>

    <div class="feature-section">
        <div class="feature-list-item">
            <div class="icon">
                <img src="../images/icons/medical-app.svg" alt="mobile-app" />
            </div>
            <div class="caption">
                Record your blood glucose levels, weight, insulin doses and exercise
            </div>
        </div>
        <div class="feature-list-item">
            <div class="icon">
                <img src="../images/icons/search.svg" alt="maginfying-glass" />
            </div>
            <div class="caption">
                Easily view and track your health data with a click of a button
            </div>
        </div>
        <div class="feature-list-item">
            <div class="icon">
                <img src="../images/icons/letter.svg" alt="letter" />
            </div>
            <div class="caption">
                Receive personalised messages directly from your clinician
            </div>
        </div>
        {{-- <div class="feature-list-item">
            <div class="icon">
                <img src="../images/icons/trophy-2.svg" alt="trophy" />
            </div>
            <div class="caption">
                Participate in a leaderboard that challenges & motivates you to improve
            </div>
        </div> --}}
    </div>

    <div class="contact-section">
        <h1>Sign in now to start your journey in defeating diabetes</h1>
        <h3>Interested in registering?</h3>
        {{-- <a href="/signup">Go to signup page</a> --}}
        <form action="/signup">
            <button type="submit" id="login-hero">
                Signup
            </button>
        </form>
    </div>
    </div>
@endsection

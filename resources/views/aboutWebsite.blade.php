@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <div class="page-heading" style="background-image: url('../images/header-img-3.jpg');">
        <h1>About This Website</h1>
    </div>

    <section class="about-website">

        <p>Diabetes@Home is a web application where we plan to provide digital health solutions to targeted health
            requirements. Our
            project helps people manage their diabetes in the convenience of their own home, by
            recording data that can be monitored remotely by their clinician.</p>
        <br>
        <br>
        <div class="about-lottie">
            <script src="https://unpkg.com/@lottiefiles/lottie-interactivity@latest/dist/lottie-interactivity.min.js"></script>
            {{-- {{!-- <lottie-player id="screenLottie" src="../images/lottie/mobile-app.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;" autoplay loop></lottie-player> --}}
            <lottie-player id="screenLottie" src="../images/lottie/mobile-app.json" style="width: 300px; height: 300px;" loop>
            </lottie-player>
            <script>
                LottieInteractivity.create({
                    player: "#screenLottie",
                    mode: "cursor",
                    actions: [{
                        position: {
                            x: [0, 1],
                            y: [0, 1]
                        },
                        type: "seek",
                        frames: [1, 180]
                    }]
                });
            </script>
        </div>
        <br>
        <br>
        <p>To continue using the features of our app, users will need to be logged in. Please create an account and contact
            your clinician for further information.</p>
        <br>
    </section>

    <div class="filler-image" style="background-image: url('/images/laptop-mockup.png'); background-position: 25% 45%;">
        <h2>
            Never lose track of data with our app.
        </h2>
    </div>

    <section class="team-section">
        <h2>Meet the team</h2>
        <p>
            We are a team of web developers aiming to provide users with the best experience.
        </p>
        <div class="team-container">
            <div class="card">
                <img src="/images/louay.jpg">
                <div class="card-text">
                    <h3>Chaabane Louay</h3>
                    <p>Graphic Designer & Developer</p>
                    <p>louaychaabane00@gmail.com</p>
                    <br>
                    <!-- Facebook icon -->
                    <a href="https://www.facebook.com/yourpage" target="_blank"><i class="fab fa-facebook"
                            style="font-size: 2em; color:white;"></i></a>
                    <!-- Instagram icon -->
                    <a href="https://www.instagram.com/yourpage" target="_blank"><i class="fab fa-instagram"
                            style="font-size: 2em; color:white;"></i></a>
                    <a href="https://www.instagram.com/yourpage" target="_blank"><i class="fab fa-linkedin fa-2x"
                            style="font-size: 2em; color:white;"></i></a>
                    {{-- <p>I am Kian, a marketing technology enthusiast and I love walking my imaginary dog.</p> --}}
                </div>
            </div>

            <div class="card">
                <img src="/images/ahmed.jpg">
                <div class="card-text">
                    <h3>Ghliss Ahmed</h3>
                    <p>Developer</p>
                    <p>ahmedghliss25@gmail.com </p>
                    <br>
                    <!-- Facebook icon -->
                    <a href="https://www.facebook.com/yourpage" target="_blank"><i class="fab fa-facebook"
                            style="font-size: 2em; color:white;"></i></a>
                    <!-- Instagram icon -->
                    <a href="https://www.instagram.com/yourpage" target="_blank"><i class="fab fa-instagram"
                            style="font-size: 2em; color:white;"></i></a>
                    <a href="https://www.instagram.com/yourpage" target="_blank"><i class="fab fa-linkedin fa-2x"
                            style="font-size: 2em; color:white;"></i></a>
                    {{-- <p>My name is Sanskar and I am interested in software development, watching soccer (Manchester United)
                        and listening to music</p> --}}
                </div>
            </div>

            <div class="card">
                <img src="/images/nidhal.jpg">
                <div class="card-text">
                    <h3>Hajjej Nidhal</h3>
                    <p>Developer</p>
                    <p>nidhalhj16@gmail.com </p>
                    <br>
                    <!-- Facebook icon -->
                    <a href="https://www.facebook.com/yourpage" target="_blank"><i class="fab fa-facebook"
                            style="font-size: 2em; color:white;"></i></a>
                    <!-- Instagram icon -->
                    <a href="https://www.instagram.com/yourpage" target="_blank"><i class="fab fa-instagram"
                            style="font-size: 2em; color:white;"></i></a>
                    <a href="https://www.instagram.com/yourpage" target="_blank"><i class="fab fa-linkedin fa-2x"
                            style="font-size: 2em; color:white;"></i></a>
                    {{-- <p>I am Yi Sheon, but you can call me Sean. My interests include software development and playing the
                        guitar.</p> --}}
                </div>
            </div>

            <div class="card">
                <img src="/images/ghassen.jpg">
                <div class="card-text">
                    <h3>Fouda Ghassen</h3>
                    <p>Developer</p>
                    <p>ghassenfouda@yahoo.com </p>
                    <br>
                    <!-- Facebook icon -->
                    <a href="https://www.facebook.com/yourpage" target="_blank"><i class="fab fa-facebook"
                            style="font-size: 2em; color:white;"></i></a>
                    <!-- Instagram icon -->
                    <a href="https://www.instagram.com/yourpage" target="_blank"><i class="fab fa-instagram"
                            style="font-size: 2em; color:white;"></i></a>
                    <a href="https://www.instagram.com/yourpage" target="_blank"><i class="fab fa-linkedin fa-2x"
                            style="font-size: 2em; color:white;"></i></a>
                    {{-- <p>I am Anh. Grab me when you want to try out a new foodie place or kdrama!</p> --}}
                </div>
            </div>

        </div>

    </section>
@endsection

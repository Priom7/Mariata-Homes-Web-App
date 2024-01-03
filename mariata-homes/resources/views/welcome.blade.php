<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mariata Homes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .jumbotron {
            background-image: url('https://images.pexels.com/photos/164338/pexels-photo-164338.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');
            /* Replace with the actual path to your image */
            background-size: cover;
            color: white;
            text-align: center;
        }

        .mission-section {
            padding: 50px 0;
        }

        .clients-section {
            background-color: #e9ecef;
            padding: 50px 0;
        }
    </style>
</head>

<body class="antialiased">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand" href="#">Mariata Homes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if (Route::has('login'))


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @auth
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/profile') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </li>

                @else
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('login') }}"> <i class="bi bi-box-arrow-in-right"></i> Login </a>
                </li>


                @if (Route::has('register'))
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @endif
                @endauth
            </ul>
        </div>
        @endif
    </nav>

    <!-- Jumbotron/ Hero Section -->
    <div class="jumbotron">
        <div style="background-color: rgba(255,255,255,0.7) ; color:black">
            <h1 class="display-4">Discover a Haven of Compassion</h1>
            <p class="lead">At Mariata Homes, we extend a helping hand to those seeking refuge, irrespective of their background.</p>
            <hr class="my-4">
            <p>Our mission is to provide subsidized accommodation to individuals from various walks of life.</p>
            <!-- You can add a call-to-action button here -->
            <button class="btn btn-primary"><a href="/register" style="text-decoration: none; color:white;">Apply Now</a></button>
        </div>
    </div>

    <!-- Mission Section -->
    <div class="container mission-section">
        <h2 class="text-center mb-4">Our Mission</h2>
        <p class="text-center">
            At Mariata Homes, our mission is clear: to provide subsidized accommodation to individuals from various walks
            of life.
            From those experiencing homelessness to those facing challenging situations, we stand as a beacon of hope,
            offering a temporary sanctuary during times of need.
        </p>
    </div>

    <!-- Clients Section -->
    <div class="container clients-section">
        <h2 class="text-center mb-4">Our Clients</h2>
        <p class="text-center">
            Our clients come from diverse backgrounds, including:
        </p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Homeless and on the street</li>
            <li class="list-group-item">Individuals facing domestic or other issues reported by police stations</li>
            <li class="list-group-item">Immigrants released from detentions</li>
            <li class="list-group-item">Individuals released from prison</li>
            <li class="list-group-item">Others in unexpected situations</li>
        </ul>
    </div>

    <div class="container">
        <h2 class="text-center mb-4">How It Works</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="text-center">
                    <i class="bi bi-person-plus-fill fs-1 text-primary mb-3"></i>
                    <h4>Register</h4>
                    <p>Users can create accounts with Mariata Homes by providing essential details.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <i class="bi bi-door-open-fill fs-1 text-primary mb-3"></i>
                    <h4>Log In</h4>
                    <p>Access your account securely with a unique username and password.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <i class="bi bi-card-text-fill fs-1 text-primary mb-3"></i>
                    <h4>Fill in Details</h4>
                    <p>Share your information to facilitate accommodation assistance.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <i class="bi bi-people-fill fs-1 text-primary mb-3"></i>
                    <h4>Admin Support</h4>
                    <p>Our dedicated admin team can manage and review all registered users, ensuring a personalized and efficient approach.</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        &copy; 2023 Mariata Homes
    </footer>




    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
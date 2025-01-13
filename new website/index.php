<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypt password

    // Database connection (update with your credentials)
    $conn = new mysqli('localhost', 'root', '', 'your_database');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Email is already registered.";
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            echo "Registration successful.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    $stmt->close();
    $conn->close();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Planner</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .hero {
            background: url('https://via.placeholder.com/1920x600') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 100px 20px;
        }
        .category-card:hover {
            transform: scale(1.05);
            transition: transform 0.3s;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }
    </style>
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Planfinity</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active  btn btn-primary" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link  btn btn-primary" href="#">FAQ</a></li>
                <li class="nav-item "><a class="nav-link  btn btn-primary" href="contact.php">Contact</a></li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary " href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero position-relative">
    <!-- Video Background -->
    <div class="video-wrapper position-absolute top-0 start-0 w-100 h-100">
        <video autoplay loop muted playsinline class="w-100 h-100 object-fit-cover">
            <source src="vid/youtube_XZ1NcwErw2s_1920x1080_h264%20(1).mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Content -->
    <div class="container position-relative text-white text-center py-5" style="z-index: 1;">
        <h1 class="display-4 fw-bold">Planfinity</h1>
        <p class="lead">Where Every Detail Meets Perfection</p>
        <form class="d-flex justify-content-center">
            <input type="text" class="form-control w-50" placeholder="What are you looking for?">
            <button class="btn btn-primary ms-2">Search</button>
        </form>
    </div>

    <!-- Overlay (optional) -->
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
</section>


<!-- Categories Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Browse Categories</h2>
        <div class="row g-4">
            <!-- First Row -->
            <div class="col-md-4">
                <div class="card category-card border-0 shadow" id="weddingCard">
                    <img src="fotos/bruiloft.png" class="card-img-top" alt="Weddings">
                    <div class="card-body text-center">
                        <h5 class="card-title">Trouwerij</h5>
                        <p class="card-text">Plan your dream wedding with ease.</p>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    document.getElementById('weddingCard').addEventListener('click', function () {
                        // Redirect to another page
                        window.location.href = 'trouwerij.php';
                    });
                });
            </script>

            <div class="col-md-4">
                <div class="card category-card border-0 shadow">
                    <img src="fotos/verjaardag.jpg" class="card-img-top" alt="Birthdays">
                    <div class="card-body text-center">
                        <h5 class="card-title">Verjaardagen</h5>
                        <p class="card-text">Make your birthdays unforgettable.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card category-card border-0 shadow">
                    <img src="fotos/babay%20shower.jpg" class="card-img-top" alt="Baby Showers">
                    <div class="card-body text-center">
                        <h5 class="card-title">Baby Showers</h5>
                        <p class="card-text">Celebrate new life with style.</p>
                    </div>
                </div>
            </div>

            <!-- Second Row -->
            <div class="col-md-4">
                <div class="card category-card border-0 shadow">
                    <img src="fotos/begrafenis.png" class="card-img-top" alt="Funerals">
                    <div class="card-body text-center">
                        <h5 class="card-title">Begrafenis</h5>
                        <p class="card-text">Honor a life well-lived.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card category-card border-0 shadow">
                    <img src="fotos/Why-ITSM-is-integral-in-enterprise-wide-digitisation.jpg" class="card-img-top" alt="Services">
                    <div class="card-body text-center">
                        <h5 class="card-title">Services</h5>
                        <p class="card-text">Professional and tailored services.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card category-card border-0 shadow">
                    <img src="fotos/26diyextra-slide-EVOY-articleLarge.webp" class="card-img-top" alt="Decor">
                    <div class="card-body text-center">
                        <h5 class="card-title">Decor</h5>
                        <p class="card-text">Bring elegance to every event.</p>
                    </div>
                </div>
            </div>

            <!-- Third Row -->
            <div class="col-md-4">
                <div class="card category-card border-0 shadow">
                    <img src="fotos/marokkaanse-bruiloft-locatie.jpg.webp" class="card-img-top" alt="Venues">
                    <div class="card-body text-center">
                        <h5 class="card-title">Zalen</h5>
                        <p class="card-text">Find the perfect venue for your event.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card category-card border-0 shadow">
                    <img src="fotos/indian-catering-den-haag.jpg" class="card-img-top" alt="Catering">
                    <div class="card-body text-center">
                        <h5 class="card-title">Catering</h5>
                        <p class="card-text">Delicious food tailored for your event.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card category-card border-0 shadow">
                    <img src="fotos/Buiten_Spelen.jpg" class="card-img-top" alt="Activities">
                    <div class="card-body text-center">
                        <h5 class="card-title">Activiteiten</h5>
                        <p class="card-text">Plan fun and memorable activities.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="loginEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Social Login Buttons -->
                <div class="d-grid gap-2 mb-3">
                    <button type="button" class="btn btn-danger" onclick="window.location.href='google-login.php'">
                        <i class="bi bi-google"></i> Register with Google
                    </button>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='facebook-login.php'">
                        <i class="bi bi-facebook"></i> Register with Facebook
                    </button>
                </div>
                <hr class="my-3">
                <!-- Standard Registration Form -->
                <form method="POST" action="register.php">
                    <div class="mb-3">
                        <label for="registerName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="registerName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="registerEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="registerPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="registerPassword" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<footer class="text-center">
    <div class="container">
        <div class="col-md-6">
            <ul class="list-unstyled">
                <p>&copy; 2024 EventPlanner. All Rights Reserved.</p>
                <p>
                    <a href="#" class="text-white me-3">Privacy Policy</a>
                    <a href="#" class="text-white">Terms & Conditions</a>
                </p>
            </ul>
            <div>
                <h5>Follow Us</h5>
                <a href="#" class="btn btn-primary btn-sm me-2">Facebook</a>
                <a href="#" class="btn btn-primary btn-sm me-2">Twitter</a>
                <a href="#" class="btn btn-primary btn-sm">LinkedIn</a>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
</body>
</html>

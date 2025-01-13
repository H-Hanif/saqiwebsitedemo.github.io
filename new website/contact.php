
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Planner</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <li class="nav-item"><a class="nav-link  btn btn-primary" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link  btn btn-primary" href="#">FAQ</a></li>
                <li class="nav-item "><a class="nav-link active btn btn-primary" href="#">Contact</a></li>
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

    <!-- Overlay (optional) -->
</section>


<!-- Categories Section --><section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-md-6">
                <h2>Contact ons</h2>
                <p>Full dit formulier in en krijg zo snel mogelijk antwoord</p>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Naam</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter uw naam" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter uw email" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Categorie</label>
                        <select class="form-select" id="category" required>
                            <option value="" disabled selected>Selecteer een categorie</option>
                            <option value="booking">Booking Problemen</option>
                            <option value="technical">Aanmelding voor werk</option>
                            <option value="general">een van de categorieen</option>
                            <option value="feedback">Feedback</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Bericht</label>
                        <textarea class="form-control" id="message" rows="5" placeholder="Uw bericht" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Stuur bericht</button>
                </form>
            </div>

            <!-- Contact Info -->
        </div>
    </div>
</section>



<!-- Login Modal -->


<!-- Register Modal -->



<!-- Footer -->
<footer class="text-center">
    <div class="container">
        <div class="col-md-6">
            <ul class="list-unstyled">
                <p>&copy; 2024 planfinity. All Rights Reserved.</p>
                <p>
                    <a href="#" class="text-white me-3">Privacy Policy</a>
                    <a href="#" class="text-white">Terms & Conditions</a>
                </p>
            </ul>
            <div>
                <h5>Volg ons</h5>
                <a href="#" class="btn btn-primary btn-sm me-2">Facebook</a>
                <a href="#" class="btn btn-primary btn-sm me-2">Twitter</a>
                <a href="#" class="btn btn-primary btn-sm">LinkedIn</a>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

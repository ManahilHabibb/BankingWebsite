
 <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session only if none exists
}
include 'login.php';
include 'signup.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKKA Bank</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Home Section-->
    <!-- Navbar -->
<section class="home-section">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">SIKKA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#resources">Resources</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#company">Company</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#reviews">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#aboutus">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contactus">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#policies">Policies</a>
                </li>
            </ul>
            <div class="auth-buttons ml-4">
                <a href="#" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signUpModal">Sign Up</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row align-items-center">
            <!-- Text Section (Left) -->
            <div class="col-md-6 text-left">
                <div class="review-badge">
                    <span>★★★★★</span>
                </div>
            <div>
                <p class="ml-0">Trusted by 1,000+ companies around the world</p> <br>
            </div>    
                <h1 class="main-heading">Modern <br><span>Banking</span>Experience</h1>
                <p class="subheading">Welcome to FinBank - Where Tradition Meets Innovation for a Modern Banking Experience. Manage your finances with cutting-edge technology.</p>

                <button class="cta-button">Get Start Now</button>
            </div>

            <!-- Image Section (Right) -->
            <div class="col-md-6 text-center">
                <div class="circle-effect"> 
                    <img src="./home-money-png.webp" alt="Money Bag" class="money-bag">
                    <div class="floating-elements">
                        <img src="./coin.png" alt="Element 1" class="element-1">
                        <img src="./money.webp" alt="Element 2" class="element-2">
                        <img src="./safe-box.png.png" alt="Element 3" class="element-3">
                        <img src="./wallet.png" alt="Element 4" class="element-4">
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
                <h5 class="modal-title" id="loginModalLabel">Enter your Login Details</h5>
            </div>
            <div class="modal-body">
              <?php if (isset($message)) echo "<div class='alert alert-warning'>$message</div>"; ?>
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-login w-100">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Sign Up Modal -->
<div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signUpModalLabel">Create Your Account</h5>
            </div>
            <div class="modal-body">
                <form action="signup.php" method="post">
                  <?php if (isset($message)) echo "<div class='alert alert-warning'>$message</div>"; ?>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="name" placeholder="Enter your full name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Choose a username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Re-enter your password" required>
                    </div>
                    <button type="submit" name="signup" class="btn btn-signup w-100">SIGN UP</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    document.querySelector('.auth-buttons a.btn-link').addEventListener('click', function(event) {
        event.preventDefault(); 
        var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show(); 
    });

    document.querySelector('.auth-buttons a.btn-primary').addEventListener('click', function(event) {
        event.preventDefault(); 
        var signUpModal = new bootstrap.Modal(document.getElementById('signUpModal'));
        signUpModal.show(); 
    });
</script>

    <!-- Partner Logos Section -->
    <div id="services" class="container-fluid bg-white py-4">
        <div class="partner-logos">
            <div class="partner-logo">
                <i class="bi bi-circle-fill"></i>
                Logoipsum
            </div>
            <div class="partner-logo">
                <i class="bi bi-circle-fill"></i>
                Logoipsum
            </div>
            <div class="partner-logo">
                <i class="bi bi-circle-fill"></i>
                Logoipsum
            </div>
            <div class="partner-logo">
                <i class="bi bi-circle-fill"></i>
                Logoipsum
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="row g-4">
                <!-- Send Money Feature -->
                <div class="col-lg-4">
                    <div class="feature-card pink">
                        <div class="feature-window">
                            <img src="moeny.png" alt="Send money illustration" class="img-fluid rounded-3">
                        </div>
                        <h3 class="feature-title">Send money</h3>
                        <p class="feature-description">Seamlessly transfer funds to friends and family across the globe</p>
                    </div>
                </div>

                <!-- Track Expenses Feature -->
                <div class="col-lg-4">
                    <div class="feature-card mint">
                        <div class="feature-window">
                            <img src="expense.png" alt="Track expenses illustration" class="img-fluid rounded-3">
                        </div>
                        <h3 class="feature-title">Track expenses</h3>
                        <p class="feature-description">Gain complete control over your finances by effortlessly monitoring</p>
                    </div>
                </div>

                <!-- Payment Options Feature -->
                <div class="col-lg-4">
                    <div class="feature-card lavender">
                        <div class="feature-window">
                            <img src="card.png" alt="Payment options illustration" class="img-fluid rounded-3">
                        </div>
                        <h3 class="feature-title">Payment options</h3>
                        <p class="feature-description">Enjoy a plethora of convenient payment methods</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Benefits Section -->
    <section id="resources" class="core-benefits">
        <div class="container">
            <div class="benefits-header">
                <p class="subtitle">OUR CORE BENEFITS</p>
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="benefits-title">Empowering Financial Control</h2>
                    </div>
                    <div class="col-lg-6">
                        <p class="benefits-description">Discover a suite of powerful and user-centric features designed to elevate your financial experience. From seamless money transfers to insightful expense tracking, our platform empowers you to take charge of your finances like never before</p>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Instant Transfers -->
                <div class="col-lg-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-lock"></i>
                        </div>
                        <h3>Instant Transfers</h3>
                        <p>Swiftly send and receive funds across borders, ensuring your money reaches its destination without delay.</p>
                    </div>
                </div>

                <!-- Diverse Payment Options -->
                <div class="col-lg-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-pencil"></i>
                        </div>
                        <h3>Diverse Payment Options</h3>
                        <p>Choose from a range of secure payment methods tailored to your convenience and preferences.</p>
                    </div>
                </div>

                <!-- Expense Insights -->
                <div class="col-lg-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-bar-chart"></i>
                        </div>
                        <h3>Expense Insights</h3>
                        <p>Gain valuable insights into your spending patterns, making it easier to manage your budget effectively.</p>
                    </div>
                </div>

                <!-- Personalized Alerts -->
                <div class="col-lg-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <h3>Personalized Alerts</h3>
                        <p>Stay informed about account activities and important financial updates through customizable alerts.</p>
                    </div>
                </div>

                <!-- 24/7 Support -->
                <div class="col-lg-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-camera-video"></i>
                        </div>
                        <h3>24/7 Support</h3>
                        <p>Access responsive customer support anytime, ensuring you receive assistance whenever you need it.</p>
                    </div>
                </div>

                <!-- Savings Goals -->
                <div class="col-lg-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-bell"></i>
                        </div>
                        <h3>Savings Goals</h3>
                        <p>Set and track financial milestones, helping you achieve your dreams with disciplined saving.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Data Driven Section -->
    <section id="company" class="data-section">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6">
                    <img src="dashboard.png" alt="Dashboard preview" class="img-fluid rounded-3">
                </div>
                <div class="col-lg-6">
                    <div class="data-content pe-lg-3">
                        <h1 class="data-title">Data-driven insights to effortlessly monitor your financial progress</h1>
                        <p class="data-description">Unlock the ability to effortlessly analyze your financial journey with detailed charts and reports, allowing you to identify trends, set informed goals, and optimize your wealth-building strategies.</p>
                        <a href="#" class="get-started-btn">Get Start Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Earnings Section -->
    <section class="earnings-section">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6">
                    <div class="earnings-content pe-lg-5">
                        <h1 class="data-title">Seamlessly log your earnings and expenditures</h1>
                        <p class="data-description">Keep a meticulous record of your earnings and spending, enabling you to maintain a clear and accurate snapshot of your financial inflows and outflows for smarter budgeting and financial planning.</p>
                        <a href="#" class="get-started-btn">Get Start Now</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative">
                        <div class="stats-floating-card stats-card-top">
                            <div class="stats-icon">
                                <i class="bi bi-download"></i>
                            </div>
                            <p class="stats-label mb-1">Items Downloaded</p>
                            <h3 class="stats-value">289</h3>
                        </div>
                        
                        <div class="stats-floating-card" style="top: 40%; right: 70%;">
                            <div class="stats-icon">
                                <i class="bi bi-hand-thumbs-up"></i>
                            </div>
                            <p class="stats-label mb-1">Deals this month</p>
                            <h3 class="stats-value">687</h3>
                        </div>

                        <div class="stats-floating-card stats-card-bottom">
                            <p class="stats-label mb-1">Earnings</p>
                            <h3 class="stats-value">
                                $32,019
                                <span class="percentage-up">↑ 378%</span>
                            </h3>
                            <p class="last-year">Last year earning ($21,045)</p>
                        </div>

                        <div class="img-container">
                            <img src="laptop.png" alt="Person using laptop" class="person-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Reviews Section -->
    <section id="reviews" class="reviews-section">
        <div class="container">
            <h2 class="reviews-title">Hear What Our Clients Say</h2>
            
            <!-- Top Row Reviews -->
            <div class="reviews-row scroll-right">
                <div class="review-card">
                    <div class="reviewer-info">
                        <img src="avatar1.png" alt="Savannah Nguyen" class="reviewer-avatar">
                        <div>
                            <h4>Savannah Nguyen</h4>
                            <p>CEO Sans Brothers</p>
                        </div>
                    </div>
                    <p class="review-text">SIKKA's seamless digital services have transformed the way I manage my money, making banking a breeze and saving me valuable time.</p>
                    <div class="rating">★★★★★</div>
                </div>

                <div class="review-card">
                    <div class="reviewer-info">
                        <img src="avatar1.png" alt="Eleanor Pena" class="reviewer-avatar">
                        <div>
                            <h4>Eleanor Pena</h4>
                            <p>CEO Sans Brothers</p>
                        </div>
                    </div>
                    <p class="review-text">I've never felt more in control of my finances since joining SIKKA - their user-friendly platform and attentive support have exceeded my expectations.</p>
                    <div class="rating">★★★★★</div>
                </div>

                <div class="review-card">
                    <div class="reviewer-info">
                        <img src="avatar1.png" alt="Zhafir" class="reviewer-avatar">
                        <div>
                            <h4>Zhafir</h4>
                            <p>CEO Sans Brothers</p>
                        </div>
                    </div>
                    <p class="review-text">With SIKKA, sending money internationally has never been easier; it's fast, secure, and reliable.</p>
                    <div class="rating">★★★★★</div>
                </div>

                <div class="review-card">
                    <div class="reviewer-info">
                        <img src="avatar1.png" alt="Zhafir" class="reviewer-avatar">
                        <div>
                            <h4>Zhafir</h4>
                            <p>CEO Sans Brothers</p>
                        </div>
                    </div>
                    <p class="review-text">With SIKKA, sending money internationally has never been easier; it's fast, secure, and reliable.</p>
                    <div class="rating">★★★★★</div>
                </div>
            </div>

            <!-- Bottom Row Reviews -->
            <div class="reviews-row scroll-left">
                <div class="review-card">
                    <div class="reviewer-info">
                        <img src="avatar1.png" alt="Ronald Richards" class="reviewer-avatar">
                        <div>
                            <h4>Ronald Richards</h4>
                            <p>CEO Sans Brothers</p>
                        </div>
                    </div>
                    <p class="review-text">SIKKA's innovative features, like instant transfers and personalized alerts, have given me the confidence to handle my finances on my terms.</p>
                    <div class="rating">★★★★★</div>
                </div>

                <div class="review-card">
                    <div class="reviewer-info">
                        <img src="avatar1.png" alt="Rakaburning Suhu" class="reviewer-avatar">
                        <div>
                            <h4>Rakaburning Suhu</h4>
                            <p>CEO Sans Brothers</p>
                        </div>
                    </div>
                    <p class="review-text">Managing expenses is a joy with SIKKA; their insightful analytics have empowered me to make well-informed financial decisions.</p>
                    <div class="rating">★★★★★</div>
                </div>

                <div class="review-card">
                    <div class="reviewer-info">
                        <img src="avatar1.png" alt="Jerome Bell" class="reviewer-avatar">
                        <div>
                            <h4>Jerome Bell</h4>
                            <p>CEO Sans Brothers</p>
                        </div>
                    </div>
                    <p class="review-text">With SIKKA, I've achieved my savings goals faster than I thought possible. Their platform has truly revolutionized the way I save and invest.</p>
                    <div class="rating">★★★★★</div>
                </div>
            </div>
        </div>
    </section>

<!-- About Us Section -->
<section id="aboutus" class="aboutus-section">
    <div class="container-fluid bg-purple text-white py-5">
            <div class="container text-center">
                <h1 class="mb-4">Committed beyond banking</h1>
                <p class="lead">Spark positive change.</p>
                <p class="description">
                    We firmly believe it’s our responsibility as corporate citizens to make a positive social impact 
                    on the world around us. This belief is embedded in the very fabric of our business and culture. 
                    We’re focused on environmental, social, and governance (ESG) issues that differentiate us from 
                    our peers, provide a positive social impact and help our stakeholders understand what’s 
                    important to us.
                </p>
                <a href="#" class="btn btn-link text-white">Learn more about social impact</a>
            </div>
        </div>

        <div class="container my-5">
            <div class="row g-4">
                <!-- Economic Mobility Card -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="ab1.png.jpg" class="card-img-top" alt="Economic Mobility">
                        <div class="card-body">
                            <h5 class="card-title">Economic Mobility</h5>
                            <p class="card-text">
                                We support economic mobility for all. It’s about connecting, collaborating, and working within the community. 
                                Providing greater access to financial education and resources not only enriches people’s lives, it helps 
                                empower them to improve their economic circumstances  that help us build better 
                                relationships and experiences for our customers, employees.
                            </p>
                            <a href="#" class="text-purple">Find out more about our unique approach</a>
                        </div>
                    </div>
                </div>

                <!-- Employee Giving Card -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="ab2.png.jpg" class="card-img-top" alt="Employee Giving">
                        <div class="card-body">
                            <h5 class="card-title">Employee Giving</h5>
                            <p class="card-text">
                                Our employees believe in the power of connecting with the communities they live and work in. They roll up their 
                                sleeves and dedicate their time and energy to making a difference. We share our employees’ passion for giving 
                                back by matching their contributions and encouraging them to volunteer.
                            </p>
                            <a href="#" class="text-purple">See what we’re doing in the community</a>
                        </div>
                    </div>
                </div>

                <!-- Diversity and Inclusion Card -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="ab3.png.jpg" class="card-img-top" alt="Diversity and Inclusion">
                        <div class="card-body">
                            <h5 class="card-title">Diversity and Inclusion</h5>
                            <p class="card-text">
                                We are united by our differences. The best ideas come from a collective mixture of different perspectives 
                                and voices. When we welcome and support one another, we open the door to new ideas that help us build better 
                                relationships and experiences for our customers, employees and the communities we serve.
                            </p>
                            <a href="#" class="text-purple">Learn more about our inclusive culture</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Contact Us Section -->
<section id="contactus" class="contactus-section">
    <div class="container-con my-5 mt-0">
        <h1 class="h1-con mb-4">Contact</h1>

        <!-- Hard of Hearing Section -->
        <div class="mb-4">
            <h5>Hard of hearing</h5>
            <p class="text-muted">For all account types</p>
            <p>
                <strong>Call</strong> <br>
                General: <a href="tel:711">711</a> <br>
                <small class="text-muted">Have the phone number you’re trying to reach ready</small>
            </p>
        </div>

        <!-- Auto Section -->
        <div class="mb-4">
            <h5>Auto</h5>
            <div class="row">
                <!-- Chat Section -->
                <div class="col-md-4">
                    <p>
                        <strong>Chat</strong> <br>
                        <a href="#">Log In to chat</a>
                    </p>
                </div>

                <!-- Call Section -->
                <div class="col-md-4">
                    <p>
                        <strong>Call</strong> <br>
                        <a href="tel:1-888-925-2559">1-888-925-2559</a> <br>
                        <small>Mon – Fri, 8 am – 11 pm ET<br>Sat, 9 am – 7 pm ET</small><br>
                        Chat: <a href="#">Log in to chat</a>
                    </p>
                    <p>
                        Outside the U.S.: <a href="tel:+1-316-652-6430">+1-316-652-6430</a> <br>
                        Chat: <a href="#">Log in to chat</a>
                    </p>
                    <p>
                        American Suzuki Financial Services: <br>
                        <a href="tel:1-888-895-7578">1-888-895-7578</a> <br>
                        Chat: <a href="#">Log in to chat</a>
                    </p>
                    <p>
                        American Suzuki Financial Services: <br>
                        <a href="tel:1-888-895-7578">1-888-895-7578</a> <br>
                        Chat: <a href="#">Log in to chat</a>
                    </p>
                </div>

                <!-- Mail Section -->
                <div class="col-md-4">
                    <p>
                        <strong>Mail</strong> <br>
                        <strong>Payments</strong> <br>
                        Payment Processing Center<br>
                        P.O. Box 71119<br>
                        Charlotte, NC 28272-1119
                    </p>
                    <p>
                        <strong>Payment disputes, payments with restrictions or endorsements, or customer service correspondence</strong><br>
                        Ally Financial<br>
                        P.O. Box 380901<br>
                        Bloomington, MN 55438
                    </p>
                    <p>
                        <strong>Mail</strong> <br>
                        <strong>Payments</strong> <br>
                        Payment Processing Center<br>
                        P.O. Box 71119<br>
                        Charlotte, NC 28272-1119
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Footer Section -->
    <footer id="policies" class="footer-section">
        <div class="container">
            <!-- Hero Content -->
            <div class="footer-hero text-center mt-0 mb-0">
                <h1 class="hero-title">Join million people<br>who trust us</h1>
                <p class="hero-subtitle">Simplifies the process of curating, and providing<br>Great benefits to your people.</p>
                <button class="get-started-btn">Get Start Now</button>
            </div>

            <!-- Footer Content -->
            <div class="footer-content">
                <div class="row gy-4">
                    <!-- Brand Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-brand">
                            <h3>SIKKA</h3>
                            <p>Get started and try our product</p>
                            <div class="email-signup">
                                <input type="email" placeholder="Enter your email here.." class="footer-input">
                                <button class="submit-btn">
                                    <i class="bi bi-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-lg-3 col-md-6">
                        <h4>Quick Links</h4>
                        <ul class="footer-links">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>

                    <!-- Support -->
                    <div class="col-lg-3 col-md-6">
                        <h4>Support</h4>
                        <ul class="footer-links">
                            <li><a href="#">Help center</a></li>
                            <li><a href="#">Account information</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>

                    <!-- Product -->
                    <div class="col-lg-3 col-md-6">
                        <h4>Product</h4>
                        <ul class="footer-links">
                            <li><a href="#">Updates</a></li>
                            <li><a href="#">Security</a></li>
                            <li><a href="#">Beta test</a></li>
                            <li><a href="#">Pricing product</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p>©2000-2001 All rights Reserved</p>
                <div class="footer-legal">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms and conditions</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

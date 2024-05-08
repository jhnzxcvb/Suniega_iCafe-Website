<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suniega iCafe</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="memstyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>
    
<div id="home">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <h3>Suniega <span>iCafe</span></h3>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#service">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact Us</a>
                </li>
                <li class="nav-item">
                    <?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) : ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION["fname"]; ?>
                            </button>
                            <div class="dropdown-menu">
                                <button class="dropdown-item" onclick="openDeleteAccountModal()">Delete Account</button>
                                <form action="logout.php" method="post">
                                    <button type="submit" class="dropdown-item" name="logout">Logout</button>
                                </form>
                            </div>
                        </div>
                   <?php endif; ?>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- Delete Account Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAccountModalLabel">Delete Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete your account?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-1">
                <h1>Welcome to our Internet Cafe!</h1>
                <p class = "ser">We offer <span id="services" class="typewriter"></span></p>
            </div>
        </div>
    </div>

    <footer class="home-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="contact-info">
                        <div>
                            <i class="fas fa-mobile-alt"></i>
                            <p>Mobile: 0936-572-3293</p>
                        </div>
                        <div>
                            <i class="fas fa-phone-alt"></i>
                            <p>Telephone: (049) 523-7189</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<div class="container mt-5" id="about">
    <div class="row">
        <div class="col-md-12">
            <div class="about-container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="images/about.jpg" alt="About Image" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h2>ABOUT US</h2>
                        <p> <span class="indent">Indent </span>Suniega iCafe/Suniega Comshop is a family-owned internet cafe that has been proudly serving our 
                            community since 2016. Our journey began with a simple mission: to provide accessible 
                            internet services to our customers. Suniega iCafe offers a comfortable and conducive space 
                            for individuals and families to connect, work, and play. We are dedicated to maintaining our commitment to 
                            quality service, reliability, and customer satisfaction as we embark on this new chapter. 
                            Thank you for your continued support, and we look forward to welcoming you to Suniega iCafe.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5" id="service">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>SERVICES</h2>
        </div>
            <div class="col-md-4">
                <div class="service-container">
                    <button class="btn btn-primary open-button" data-toggle="modal" data-target="#modal" data-title="Computer Rentals" data-description="We provide top-notch academic support alongside an enjoyable gaming experience. To secure a slot, please reach out to us via Facebook Messenger.">COMPUTER RENTALS</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-container">
                    <button class="btn btn-primary open-button" data-toggle="modal" data-target="#modal" data-title="Printing Services" data-description="Easily print your documents hassle-free with us. From reports to presentations, we ensure crisp, professional prints every time. Fast, reliable, and affordable—let us handle your printing needs today! Upload your file now!">PRINTING SERVICES</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-container">
                    <button class="btn btn-primary open-button" data-toggle="modal" data-target="#modal" data-title="Computer Repair" data-description="We specialize in efficient computer repair services. Whether it's troubleshooting hardware issues, resolving software glitches, or optimizing system performance, we've got you covered. Reach out to us for reliable solutions tailored to your needs.">COMPUTER REPAIR</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-container">
                    <button class="btn btn-primary open-button" data-toggle="modal" data-target="#modal" data-title="Mobile Wallet Load" data-description="We specialize in mobile wallet loading services, supporting platforms like GCASH, Smart Padala, Maya, and CoinsPH. For seamless and secure transactions, simply message us via our Facebook Messenger account.">MOBILE WALLET LOAD</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-container">
                    <button class="btn btn-primary open-button" data-toggle="modal" data-target="#modal" data-title="Online Assistance" data-description="Need assistance with online services? We've got you covered! Fill out our convenient form below with your details. Alternatively, message our Facebook Messenger for swift and personalized assistance. We're here to make your online experience smooth and hassle-free!">ONLINE ASSISTANCE</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-container">
                    <button class="btn btn-primary open-button" data-toggle="modal" data-target="#modal" data-title="Graphics Layout" data-description="We provide comprehensive graphics layout services, encompassing invitation, tarpaulin, souvenir, and jersey layouts. Additionally, we offer custom vector art commissions tailored to your unique needs. Upload your files and send us your desired design via Facebook Messenger Account">GRAPHICS LAYOUT</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-container">
                    <button class="btn btn-primary open-button" data-toggle="modal" data-target="#modal" data-title="Photo Printing" data-description="We specialize in photo printing services, offering a variety of sizes including ID, wallet size, 3R, 4R, 5R, and 8R prints. Whatever your printing needs, we've got you covered.">PHOTO PRINTING</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-container">
                    <button class="btn btn-primary open-button" data-toggle="modal" data-target="#modal" data-title="Software Installation" data-description="Get hassle-free software installation services for all your devices. From essential productivity tools to specialized software, we'll handle everything, ensuring your systems are up and running smoothly.">SOFTWARE INSTALLATION</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-container">
                    <button class="btn btn-primary open-button" data-toggle="modal" data-target="#modal" data-title="Game Credits" data-description="Top up your game credits hassle-free with us! Whether you need credits for popular platforms like Steam, Riot, Garena, or games like Mobile Legends: Bang Bang and many more, we've got you covered. Enjoy uninterrupted gaming with swift and secure credit top-ups.">GAME CREDITS</button>
                </div>
            </div>
    </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class = "modal-header">
                <h5 class="modal-title" id="modalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <p id="modal-description"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5" id="contact">
    <h2 class="text-center mb-4">CONTACT US</h2>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center">
                <a href="https://www.facebook.com/Nhoorshie"><i class="fab fa-facebook"></i></a>
                <h5 class="mt-3"> Facebook </h5>
                <p class="mt-2">Suniega Comshop</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <a href="mailto:suniega.comshop@gmail.com"><i class="far fa-envelope"></i></a>
                <h5 class="mt-3"> Email </h5>
                <p class="mt-2">suniega.comshop@gmail.com</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <a href="https://www.linkedin.com/in/michael-john-suniega-665b70158/"><i class="fab fa-linkedin"></i></a>
                <h5 class="mt-3"> LinkedIn </h5>
                <p class="mt-2">Suniega Comshop</p>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h2 class="cont">Location</h2>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3869.5239021962816!2d121.43757527567739!3d14.105259089010922!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd5b8e4454060f%3A0xafc6b180c8ebdf99!2sSuniega&#39;s%20Computer%20Shop!5e0!3m2!1sen!2sph!4v1711947871559!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="memscript.js"></script>

</body>
</html>
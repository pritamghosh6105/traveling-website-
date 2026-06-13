<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel World</title>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css?v=1.0.8">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..700;1,400..700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>

    <!--  NAVBAR  -->

    <header>

        <nav class="navbar">

            <div class="logo">
                <i class="fa-solid fa-earth-asia"></i>
                Travel World
            </div>

            <ul class="nav-links" id="navLinks">

                <li><a href="#home">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#destinations">Destinations</a></li>
                <li><a href="#packages">Packages</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#contact">Contact Us </a></li>
                <li class="mobile-nav-btn" style="width: 100%;">
                    <?php if(isset($_SESSION['user'])): ?>
                        <a href="dashboard.php" class="btn" style="margin-top: 10px; width: 100%; text-align: center; display: block;">Dashboard</a>
                    <?php else: ?>
                        <a href="auth.php" class="btn" style="margin-top: 10px; width: 100%; text-align: center; display: block;">Login / Register</a>
                    <?php endif; ?>
                </li>

            </ul>

            <div class="menu-btn" id="menuBtn">
                <i class="fa-solid fa-bars"></i>
            </div>

            <?php
if(isset($_SESSION['user'])){
?>

<a href="dashboard.php" class="btn">
    Dashboard
</a>

<?php
}else{
?>

<a href="auth.php" class="btn">
    Login / Register
</a>

<?php
}
?>

        </nav>

    </header>

    <!--  HERO  SECTION-->

    <section class="hero" id="home">

        <div class="overlay"></div>

        <div class="hero-content">

            <h1>Explore The Beautiful World</h1>

            <p>Adventure starts here. Travel with comfort.</p>

            <?php
            if(isset($_SESSION['user'])){
                echo "<h3>Welcome " . $_SESSION['user'] . "</h3>";
                echo "<a href='logout.php' class='btn'>Logout</a>";
            }
            ?>

           <?php
              if(isset($_SESSION['user'])){
            ?>

            <a href="dashboard.php" class="btn">
                Book Now
           </a>

          <?php
             }else{
            ?>

        <a href="auth.php"
          class="btn"
          onclick="alert('Please Login First');">

         Book Now

        </a>

        <?php
           }
        ?>

        </div>

    </section>

    <!--  ABOUT US  -->
    <section id="about">
        <!-- Banner Header -->
        <div class="about-banner">
            <div class="about-banner-overlay"></div>
            <div class="about-banner-content">
                <h1 class="about-banner-title">About Us</h1>
                <p class="about-banner-quote">"The world is a book, and those who do not travel read only one page."</p>
            </div>
        </div>
        
        <!-- Content Area -->
        <div class="about-content-container">
            <h2 class="about-content-title">Know Who We Are</h2>
            <div class="about-flex-layout">
                <div class="about-content-text">
                    <p>Welcome to our Travelling Website, your trusted partner for discovering amazing destinations and planning unforgettable journeys. We are dedicated to making travel simple, enjoyable, and accessible for everyone.</p>
                    <p>Our platform allows users to explore popular tourist destinations, register easily, and book trips online with convenience and confidence. Whether you are looking for a relaxing vacation, an adventurous getaway, or a family holiday, we provide the information and services needed to make your travel experience memorable.</p>
                    <p>We believe that travelling is more than just visiting new places—it is about creating lifelong memories, experiencing different cultures, and exploring the beauty of the world. Our mission is to connect travelers with their dream destinations through a user-friendly and reliable online booking system.</p>
                    <p>Join us and start your journey today. Let us help you turn your travel dreams into reality, one destination at a time.</p>
                
            </div>
        </div>
    </section>

    <!--  DESTINATIONS -->

    <section class="section" id="destinations">

        <h2 class="title">Popular Destinations</h2>

        <div class="card-container">

            <div class="card">
                <img src="https://images.unsplash.com/photo-1622308644420-b20142dc993c?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8ZGFyamVlbGluZ3xlbnwwfHwwfHx8MA%3D%3D"
                    alt="">
                <div class="card-content">
                    <h3>Darjeeling</h3>
                    <p>Beautiful Hills destination.</p>
                    <h4>Min ₹15,000</h4>
                    <br>
                    <p>Darjeeling is a dream wrapped in mist, where emerald tea gardens meet the sky and the sun kisses the mighty Kanchenjunga to awaken the soul.</p>
                </div>
            </div>

            <div class="card">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/036/580/216/small_2x/landscape-in-the-mountains-panoramic-view-from-the-top-of-sonmarg-kashmir-valley-in-the-himalayan-region-meadows-alpine-trees-wildflowers-and-snow-on-mountain-in-india-concept-travel-nature-photo.jpg"
                    alt="">
                <div class="card-content">
                    <h3>Kashmir</h3>
                    <p>Paradise on earth with mountains.</p>
                    <h4>Min ₹25,000</h4>
                    <br>
                    <p>"If there is heaven on earth, it is here, it is here, it is here!" — an iconic line that perfectly captures the breathtaking, timeless beauty of Kashmir’s snow-capped mountains, serene lakes, and valleys.</p>
                </div>
            </div>

            <div class="card">
                <img src="https://s7ap1.scene7.com/is/image/incredibleindia/lake-pichola-udaipur-rajasthan-2-attr-hero?qlt=82&ts=1742161994371AHyZrx4IwZuhHKYJ/Vly2FxdKlY1ml0RBDqDgf52tsDwsFs4HFndiZ6FpD2ibQIIPRTKI4yNCownQMPi3h6pi2DOQTpprx4j9XQxrRbK/TiyIE6CB+tbKokOByCCIkSC4H3nipsVcJFUayeWnHjdWPqQB2gOpPsNEG1sBshx1Il59bwU28beXt/mmB1k/mUWC4ZTfaS/pFgPHn7qxlSTAiBrzB63sgc9Qd1rSOEO1n/InqVHZhLDIHAgjqBZFguaQfa4Gul/pKVMwZiL8Lj6LPo1rWBB8GX62ufJXsM8HSOpi/GJPyUtDTC6mIIiZEjQBxM+IJE+Sg6pYXd4ePjohXPIH8SOuUmfAggf2Gii+sTlIh4mQQSR5dkwfNFh3CC4AyD2tBJN/C9vJM7FGLHS1wQOt7qAq2MSOhB1UhyMnnzvfQ3SsBc3tEB4HQ3y36SjqbzFoMdb/W3VZdgJg3/ld7xcnyVjA37uUQb2yxysW6+aTRSZourkCYHuflqlmdwcP9BPyehxUAsM3SdD5t+qgKjToPcz5ypsO55Jv6jrEuvdskOtxgOeQPRTFOsR2XgaTZmeOkNOb1SSXonGH4fC1WiS8nNyAvHAy5s+6JZQAIOQcTIFMXP4oLj/dJJRcotfXJ7rmgn+et4XDWAe6cVngDNUYz/EK7x61HRHUJkk7c2Ffi44xhMzWa4Ce7maRx+6ZKVEFwkOLv/X8RJdUA/WoSSSkrBF3L8rouCMt+9rOsg1HGEqeIAPZysA4yI9W0iT6pJJJXQN2ZNtZ5BP2rKBoWg2PmACrA9xBDg+pbvZac/wCLRwnxhJJKXA1yVmkdXYaJ4vGF9WiDf0HIKTbO7bXCNHENbbo4UB7G6SSSdxtWJCrTc4Q/EscLiKTyD5tp3+qfeMu2mMpOrKlOKZP+EN1NrQkkgTFSxxkU6e7YdMu7qGlfjMAT4XRmGY5uok8Y3gB6Q85Y/UJ0lMnZ2LirxuDfbKbSWilUYTxNB7mi0SC0ZfNZmPpsqOlmFw1ZwsX06gbUmLHuyD5Qkkqi/uuRMlaSiNhMTurOr1qTgLU8Q1tVpH8r+8WzPqjMHjGPhzzTLjNxUqU2yNCWOsNePqkktFFOORm5Wdg/cZruY46wA2kWnhc3VlM02sgNptItlAZI8Msj5JkljHm6NmrWLMuaweQNYaGesFnEzwUa7mMcC6rpoH5cs9IZr4EJJISuxN8XBa32d8NduLEmC2kYjSATIHHRGNaBEMERc5WdrgLg/RMkqnGyFGVyqnVEO/c1CJiN2Z8gW/NX0Gs1FF4cLguptEcxLWk+SSSwzNsS5hdxDhxsJHXu6qoOpvBBYNb56b/cPA9Ukk1yJ8DHC02nMGsbH4GjNp90t7Q08VfTbTFgH3uYaQW9dP6pJJyEhOphphpgniWOJPUkIyiypxe0+TmO9zf0SSUNl2LN6RZxbPAFwJ8pKQI+850/4X+19EkkWA//2Q=="
                    alt="">
                <div class="card-content">
                    <h3>Udaipur</h3>
                    <p>Romantic and beautiful city.</p>
                    <h4>Min ₹50,000</h4>
                    <br>
                    <p>Udaipur, the City of Lakes, is a romantic oasis where majestic palaces, serene lakes, and vibrant culture create an unforgettable tapestry of beauty and charm.</p>
                     
                </div>
            </div>

        </div>

    </section>

    <!--  PACKAGES  -->

    <section class="section packages" id="packages">

        <h2 class="title">Tour Packages</h2>

        <div class="package-container">

            <div class="package-card">
                <i class="fa-solid fa-plane"></i>
                <h3>Silver Package</h3>
                <p>3 Days Tour</p>
                <h4> 5% Extra Charge</h4>
            </div>

            <div class="package-card">
                <i class="fa-solid fa-hotel"></i>
                <h3>Gold Package</h3>
                <p>5 Days + Hotel</p>
                <h4> 10% Extra Charge</h4>
            </div>

            <div class="package-card">
                <i class="fa-solid fa-crown"></i>
                <h3>Premium Package</h3>
                <p>Luxury 7 Days Tour</p>
                <h4> 15% Extra Charge</h4>
            </div>

        </div>

    </section>

    <!--  GALLERY  -->

    <section class="section" id="gallery">

        <h2 class="title">Travel Gallery</h2>

        <div class="gallery">

            <img src="https://www.shutterstock.com/image-photo/place-called-tiger-hill-darjeeling-600nw-2559908207.jpg">
            <img src="https://t4.ftcdn.net/jpg/02/28/38/77/360_F_228387723_3btKMsZhcpzYXjFBI56zC1LpwLNaQQ1K.jpg">
            <img src="https://images.unsplash.com/photo-1564507592333-c60657eea523?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dGFqJTIwbWFoYWx8ZW58MHx8MHx8fDA%3D">
            <img src="https://image.slidesdocs.com/responsive-images/background/landscape-mountain-tourism-fall-morning-family-early-peak-houses-powerpoint-background_cb44188c61__960_540.jpg">
            <img src="https://images.pexels.com/photos/37121962/pexels-photo-37121962.jpeg?cs=srgb&dl=pexels-onezero-studio-716701909-37121962.jpg&fm=jpg">
            <img src="https://plus.unsplash.com/premium_photo-1697730324062-c012bc98eb13?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Z29sZGVuJTIwdGVtcGxlJTIwYW1yaXRzYXJ8ZW58MHx8MHx8fDA%3D">
            <img src="https://t4.ftcdn.net/jpg/04/08/25/05/360_F_408250543_MVaEVGeWxb4FiFy7mEGKj8nfYkwoAZON.jpg">
            <img src="https://t3.ftcdn.net/jpg/06/67/05/60/360_F_667056062_7resdoEYKJ2JkQ0dA0v3tdIMXj5XExEt.jpg">
            <img src="https://t3.ftcdn.net/jpg/01/40/51/56/360_F_140515612_0MMpqpsIvs6xno5YXmPVy9FUmZ4uLnFB.jpg">
            <img src="https://t3.ftcdn.net/jpg/01/37/42/76/360_F_137427608_f7FUGdVoFpsKVlIMPZsY4PnSSsoujOlE.jpg"> 




        </div>

    </section>

    
    <!--  CONTACT -->

    <section class="section" id="contact">

        <h2 class="title">Contact Us</h2>

        <form action="contact.php" method="POST" class="form">

            <input type="text" name="name"
                placeholder="Your Name" required>

            <input type="email" name="email"
                placeholder="Your Email" required>

            <textarea name="message"
                rows="5"
                placeholder="Your Message"></textarea>

            <button type="submit"
                name="send"
                class="btn">
                Send Message
            </button>

        </form>

    </section>

    <!--  FOOTER  -->

    <footer>

        <h3>Travel World</h3>

        <p>Explore the world with comfort.</p>

        <div class="social-icons">

            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>

        </div>

        <p>© 2026 Travel World</p>

    </footer>

    <script src="script.js"></script>

</body>
</html>
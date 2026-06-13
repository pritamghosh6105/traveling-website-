<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: ../auth.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Jaipur Tour & Hotel Booking</title>

<link rel="preconnect"
href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#fff7ed;
    color:#111827;
}

/* HEADER */

header{
    width:100%;
    position:absolute;
    top:0;
    left:0;
    padding:20px 8%;
    display:flex;
    justify-content:space-between;
    align-items:center;
    z-index:100;
}

.logo{
    font-size:32px;
    color:white;
    font-weight:700;
}

nav a{
    text-decoration:none;
    color:white;
    margin-left:25px;
    font-weight:500;
    transition:0.3s;
}

nav a:hover{
    color:#facc15;
}

/* HERO */

.hero{
    height:100vh;

    background:
    linear-gradient(rgba(0,0,0,0.55),
    rgba(0,0,0,0.55)),

    url('https://images.unsplash.com/photo-1477587458883-47145ed94245?q=80&w=1600')
    no-repeat center center/cover;

    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
    color:white;
    padding:20px;
}

.hero-content h1{
    font-size:70px;
    margin-bottom:20px;
}

.hero-content p{
    font-size:20px;
    line-height:1.8;
    max-width:750px;
    margin:auto;
}

.hero-btn{
    display:inline-block;
    margin-top:35px;
    text-decoration:none;
    background:#ec4899;
    color:white;
    padding:15px 35px;
    border-radius:50px;
    font-weight:600;
    transition:0.3s;
}

.hero-btn:hover{
    background:#db2777;
    transform:translateY(-4px);
}

/* CONTAINER */

.container{
    width:90%;
    max-width:1350px;
    margin:auto;
    padding:90px 0;
}

/* TITLE */

.section-title{
    text-align:center;
    margin-bottom:70px;
}

.section-title h2{
    font-size:50px;
    color:#0f172a;
    margin-bottom:15px;
}

.section-title p{
    color:#64748b;
    font-size:18px;
}

/* CATEGORY */

.category{
    margin-bottom:80px;
}

.category-title{
    font-size:34px;
    margin-bottom:35px;
    color:#0f172a;
    padding-left:15px;
    border-left:8px solid #ec4899;
}

/* GRID */

.hotel-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
    gap:35px;
}

/* CARD */

.hotel-card{
    background:white;
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,0.12);
    transition:0.4s;
}

.hotel-card:hover{
    transform:translateY(-10px);
}

.hotel-image{
    height:240px;
    overflow:hidden;
}

.hotel-image img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:0.5s;
}

.hotel-card:hover img{
    transform:scale(1.1);
}

.hotel-content{
    padding:25px;
}

.hotel-content h3{
    font-size:26px;
    margin-bottom:12px;
    color:#0f172a;
}

.hotel-content p{
    color:#64748b;
    line-height:1.8;
    margin-bottom:20px;
}

/* BUTTONS */

.btn-group{
    display:flex;
    gap:15px;
    flex-wrap:wrap;
}

.website-btn{
    text-decoration:none;
    background:#ec4899;
    color:white;
    padding:12px 22px;
    border-radius:50px;
    font-weight:600;
    transition:0.3s;
}

.website-btn:hover{
    background:#db2777;
}

.book-btn{
    background:#0f172a;
    color:white;
    border:none;
    padding:12px 22px;
    border-radius:50px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

.book-btn:hover{
    background:#1e293b;
}

/* FOOTER */

footer{
    background:#0f172a;
    color:white;
    text-align:center;
    padding:30px;
}

/* RESPONSIVE */

@media(max-width:768px){

    .hero-content h1{
        font-size:42px;
    }

    .hero-content p{
        font-size:16px;
    }

    header{
        flex-direction:column;
    }

    nav{
        margin-top:15px;
    }

    nav a{
        margin:0 10px;
    }

}

</style>

</head>

<body>

<header>

    <div class="logo">
        TravelWorld
    </div>

    <nav>
        <a href="#hotels">Hotels</a>
    </nav>

</header>

<!-- HERO -->

<section class="hero">

    <div class="hero-content">

        <h1>Explore Royal Jaipur</h1>

        <p>
            Book luxury palace hotels,
            premium stays, and affordable hostels
            in the beautiful Pink City of Jaipur.
        </p>

        <a href="#hotels"
        class="hero-btn">
            Explore Hotels
        </a>

    </div>

</section>

<!-- HOTEL SECTION -->

<div class="container"
id="hotels">

    <div class="section-title">

        <h2>Best Hotels & Resorts in Jaipur</h2>

        <p>
            Choose hotels according to your budget and comfort.
        </p>

    </div>

    <!-- LUXURY -->

    <div class="category">

        <h2 class="category-title">
            Luxury Hotels
        </h2>

        <div class="hotel-grid">

            <!-- HOTEL 1 -->

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Rambagh_Palace_hotel_Jaipur_lobby_courtyard.jpg/1280px-Rambagh_Palace_hotel_Jaipur_lobby_courtyard.jpg">
                </div>

                <div class="hotel-content">

                    <h3>Rambagh Palace</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹15,000 / Night</p>

                    <p>
                        Iconic royal palace hotel with luxurious suites,
                        heritage interiors, and premium hospitality.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.tajhotels.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Rambagh Palace">
                            <input type="hidden" name="place" value="Jaipur">
                            <input type="hidden" name="price" value="15000">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <!-- HOTEL 2 -->

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://etimg.etb2bimg.com/photo/102669659.cms">
                </div>

                <div class="hotel-content">

                    <h3>Fairmont Jaipur</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹18,000 / Night</p>

                    <p>
                        Elegant luxury resort inspired by Mughal palaces
                        with premium dining and spa facilities.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.fairmont.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Fairmont Jaipur">
                            <input type="hidden" name="place" value="Jaipur">
                            <input type="hidden" name="price" value="18000">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <!-- HOTEL 3 -->

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://www.fivestaralliance.com/files/fivestaralliance.com/field/image/nodes/2012/21404/21404_0_itcrajputana_fsa-g.jpg">
                </div>

                <div class="hotel-content">

                    <h3>ITC Rajputana Jaipur</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹16,000 / Night</p>

                    <p>
                        Premium luxury hotel with royal architecture,
                        modern rooms, and excellent hospitality.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.itchotels.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="ITC Rajputana Jaipur">
                            <input type="hidden" name="place" value="Jaipur">
                            <input type="hidden" name="price" value="16000">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- MID RANGE -->

    <div class="category">

        <h2 class="category-title">
            Premium Mid-Range Hotels
        </h2>

        <div class="hotel-grid">

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://cache.marriott.com/content/dam/marriott-digital/mc/apec/hws/j/jaimc/en_us/photo/unlimited/assets/jaimc-pool-0030.jpg">
                </div>

                <div class="hotel-content">

                    <h3>Jaipur Marriott Hotel</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹6,500 / Night</p>

                    <p>
                        Modern premium hotel with rooftop dining,
                        swimming pool, and stylish interiors.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.marriott.com/en-us/hotels/jaimc-jaipur-marriott-hotel/overview/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Jaipur Marriott Hotel">
                            <input type="hidden" name="place" value="Jaipur">
                            <input type="hidden" name="price" value="6500">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://gos3.ibcdn.com/k09fvn83al2cheeh2hcvvfhr005t.jpg">
                </div>

                <div class="hotel-content">

                    <h3>The Lalit Jaipur</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹7,500 / Night</p>

                    <p>
                        Stylish hotel near airport with spacious rooms,
                        modern facilities, and relaxing atmosphere.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.thelalit.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="The Lalit Jaipur">
                            <input type="hidden" name="place" value="Jaipur">
                            <input type="hidden" name="price" value="7500">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/555956192.jpg?k=65ecf47d082bc19afb2284b776d882b5b6a12158dbbfbf10eb47206a099613bd&o=">
                </div>

                <div class="hotel-content">

                    <h3>Ramada by Wyndham Jaipur</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹5,500 / Night</p>

                    <p>
                        Comfortable premium hotel with modern rooms,
                        rooftop pool, and excellent services.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.wyndhamhotels.com/ramada"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Ramada by Wyndham Jaipur">
                            <input type="hidden" name="place" value="Jaipur">
                            <input type="hidden" name="price" value="5500">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- BUDGET -->

    <div class="category">

        <h2 class="category-title">
            Budget Friendly Hotels
        </h2>

        <div class="hotel-grid">

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://images.unsplash.com/photo-1555854877-bab0e564b8d5?q=80&w=1200">
                </div>

                <div class="hotel-content">

                    <h3>Zostel Jaipur</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹1,200 / Night</p>

                    <p>
                        Popular backpacker hostel with affordable rooms,
                        rooftop cafe, and social atmosphere.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.zostel.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Zostel Jaipur">
                            <input type="hidden" name="place" value="Jaipur">
                            <input type="hidden" name="price" value="1200">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://images.unsplash.com/photo-1522798514-97ceb8c4f1c8?q=80&w=1200">
                </div>

                <div class="hotel-content">

                    <h3>The Hosteller Jaipur</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹1,000 / Night</p>

                    <p>
                        Budget-friendly hostel for solo travelers
                        with clean rooms and modern facilities.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.thehosteller.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="The Hosteller Jaipur">
                            <input type="hidden" name="place" value="Jaipur">
                            <input type="hidden" name="price" value="1000">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=1200">
                </div>

                <div class="hotel-content">

                    <h3>Madpackers Jaipur</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹1,500 / Night</p>

                    <p>
                        Affordable hostel for students and backpackers
                        with cozy rooms and rooftop views.
                    </p>

                    <div class="btn-group">

                        <a href="https://madpackers.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Madpackers Jaipur">
                            <input type="hidden" name="place" value="Jaipur">
                            <input type="hidden" name="price" value="1500">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<footer>

    <p>
        © 2026 TravelWorld | Jaipur Tour & Hotel Booking
    </p>

</footer>

</body>
</html>
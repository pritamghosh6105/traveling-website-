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

<title>Coorg Tour & Hotel Booking</title>

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
    background:#f0fdf4;
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
    color:#86efac;
}

/* HERO */

.hero{
    height:100vh;

    background:
    linear-gradient(rgba(0,0,0,0.55),
    rgba(0,0,0,0.55)),

    url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1600')
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
    background:#16a34a;
    color:white;
    padding:15px 35px;
    border-radius:50px;
    font-weight:600;
    transition:0.3s;
}

.hero-btn:hover{
    background:#15803d;
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
    border-left:8px solid #16a34a;
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
    background:#16a34a;
    color:white;
    padding:12px 22px;
    border-radius:50px;
    font-weight:600;
    transition:0.3s;
}

.website-btn:hover{
    background:#15803d;
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

        <h1>Explore Beautiful Coorg</h1>

        <p>
            Book luxury nature resorts,
            premium stays, and affordable cottages
            in the Scotland of India.
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

        <h2>Best Hotels & Resorts in Coorg</h2>

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

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWqR7Et3LTSsSDdYQuE-LToopNHeJUOpWSq2McHp_g1RH5Ss0XRcBJpxI&s=10">
                </div>

                <div class="hotel-content">

                    <h3>Taj Madikeri Resort & Spa</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹15,000 / Night</p>

                    <p>
                        Ultra-luxury forest resort with private villas,
                        spa facilities, and breathtaking valley views.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.tajhotels.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Taj Madikeri Resort & Spa">
                            <input type="hidden" name="place" value="Coorg">
                            <input type="hidden" name="price" value="15000">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0e/a9/d6/bc/lily-pool-villa.jpg?w=900&h=-1&s=1">
                </div>

                <div class="hotel-content">

                    <h3>Evolve Back Coorg</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹18,000 / Night</p>

                    <p>
                        Premium luxury resort inspired by Kodava heritage
                        with infinity pools and luxury cottages.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.evolveback.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Evolve Back Coorg">
                            <input type="hidden" name="place" value="Coorg">
                            <input type="hidden" name="price" value="18000">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6J-EZaLXFsa1Y0Ujz32m0PWDisXADZMvKKHggL-wFcKQlr_9xiF4kSUs&s=10">
                </div>

                <div class="hotel-content">

                    <h3>The Tamara Coorg</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹16,000 / Night</p>

                    <p>
                        Elegant hilltop luxury resort surrounded by forests
                        with scenic views and premium hospitality.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.thetamara.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="The Tamara Coorg">
                            <input type="hidden" name="place" value="Coorg">
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
                    <img src="https://images.trvl-media.com/lodging/3000000/2440000/2431400/2431340/06a81ba4.jpg?impolicy=resizecrop&rw=575&rh=575&ra=fill">
                </div>

                <div class="hotel-content">

                    <h3>Club Mahindra Madikeri</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹6,500 / Night</p>

                    <p>
                        Stylish family-friendly resort with nature views,
                        modern facilities, and relaxing atmosphere.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.clubmahindra.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Club Mahindra Madikeri">
                            <input type="hidden" name="place" value="Coorg">
                            <input type="hidden" name="price" value="6500">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQ4Aq_wP4jNDHkXJ8sdwwX3JaSesorMaI5ixwhKHoyIw&s=10">
                </div>

                <div class="hotel-content">

                    <h3>Coorg Wilderness Resort</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹7,500 / Night</p>

                    <p>
                        Comfortable premium resort with luxury rooms,
                        scenic surroundings, and modern facilities.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.coorgwildernessresort.in/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Coorg Wilderness Resort">
                            <input type="hidden" name="place" value="Coorg">
                            <input type="hidden" name="price" value="7500">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDJ17G_XRTdedJWD5OoLAVYumx05Pm0l7oZrHw8om1og&s=10">
                </div>

                <div class="hotel-content">

                    <h3>Heritage Resort Coorg</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹5,500 / Night</p>

                    <p>
                        Premium hill resort with cozy cottages,
                        coffee plantation views, and peaceful ambiance.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.heritageresorts.co.in/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Heritage Resort Coorg">
                            <input type="hidden" name="place" value="Coorg">
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

                    <h3>Zostel Coorg</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹1,200 / Night</p>

                    <p>
                        Popular backpacker hostel with affordable rooms,
                        nature vibes, and social atmosphere.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.zostel.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Zostel Coorg">
                            <input type="hidden" name="place" value="Coorg">
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

                    <h3>The Hosteller Coorg</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹1,000 / Night</p>

                    <p>
                        Budget-friendly hostel for solo travelers
                        with clean rooms and peaceful environment.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.thehosteller.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="The Hosteller Coorg">
                            <input type="hidden" name="place" value="Coorg">
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

                    <h3>Coorg Jungle Camp</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹1,500 / Night</p>

                    <p>
                        Affordable nature stay for backpackers and tourists
                        with cozy cottages and forest surroundings.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.booking.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Coorg Jungle Camp">
                            <input type="hidden" name="place" value="Coorg">
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
        © 2026 TravelWorld | Coorg Tour & Hotel Booking
    </p>

</footer>

</body>
</html>
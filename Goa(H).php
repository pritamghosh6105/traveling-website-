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

<title>Goa Tour & Hotel Booking</title>

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
    background:#f0f9ff;
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
    color:#38bdf8;
}

/* HERO */

.hero{
    height:100vh;

    background:
    linear-gradient(rgba(0,0,0,0.55),
    rgba(0,0,0,0.55)),

    url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1600')
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
    background:#0ea5e9;
    color:white;
    padding:15px 35px;
    border-radius:50px;
    font-weight:600;
    transition:0.3s;
}

.hero-btn:hover{
    background:#0284c7;
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
    border-left:8px solid #0ea5e9;
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
    background:#0ea5e9;
    color:white;
    padding:12px 22px;
    border-radius:50px;
    font-weight:600;
    transition:0.3s;
}

.website-btn:hover{
    background:#0284c7;
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

<!-- HEADER -->

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

        <h1>Explore Beautiful Goa</h1>

        <p>
            Book luxury beach resorts,
            premium hotels, and affordable stays
            in the heart of Goa.
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

        <h2>Best Hotels & Resorts in Goa</h2>

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
                    <img src="https://media-cdn.tripadvisor.com/media/photo-s/2c/20/5d/3f/exterior.jpg">
                </div>

                <div class="hotel-content">

                    <h3>Taj Exotica Resort & Spa</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹15,000 / Night</p>

                    <p>
                        Premium luxury beach resort with world-class spa,
                        sea-view rooms, and luxury hospitality.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.tajhotels.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Taj Exotica Resort & Spa">
                            <input type="hidden" name="place" value="Goa">
                            <input type="hidden" name="price" value="15000">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <!-- HOTEL 2 -->

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://www.fivestaralliance.com/files/fivestaralliance.com/field/image/nodes/2009/11416/11416_0_theleelahotelgoa_fsa-g.jpg">
                </div>

                <div class="hotel-content">

                    <h3>The Leela Goa</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹18,000 / Night</p>

                    <p>
                        Elegant luxury beach resort with golf course,
                        private beach, and premium dining experience.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.theleela.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="The Leela Goa">
                            <input type="hidden" name="place" value="Goa">
                            <input type="hidden" name="price" value="18000">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <!-- HOTEL 3 -->

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0f/2c/d3/ce/porte-cochere.jpg?w=900&h=500&s=1">
                </div>

                <div class="hotel-content">

                    <h3>W Goa</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹16,000 / Night</p>

                    <p>
                        Stylish luxury hotel near Vagator Beach
                        with sea-view suites and modern nightlife.
                    </p>

                    <div class="btn-group">

                        <a href="https://w-hotels.marriott.com/destinations/goa/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="W Goa">
                            <input type="hidden" name="place" value="Goa">
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

            <!-- HOTEL 1 -->

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwP2_X6VvE7Jfl-q-gvZoupbdKPpdLIzfT4LjDWfUX57EdZSXk3eB2nf8&s=10">
                </div>

                <div class="hotel-content">

                    <h3>Fairfield by Marriott Goa</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹6,500 / Night</p>

                    <p>
                        Modern hotel with comfortable rooms,
                        swimming pool, and excellent services.
                    </p>

                    <div class="btn-group">

                        <a href="https://res.itchotels.com/?adult=1&arrive=2026-06-06&chain=26676&child=0&config=Business&currency=INR&depart=2026-06-07&gad_campaignid=23811558682&gad_source=1&gbraid=0AAAAAqzrfAUmsYdVZbVSqdtaRnO4Nokuf&gclid=Cj0KCQjwio_RBhDMARIsAJPveNNkIlYLi7dtAwCsGTPlk6AJLOPaanLyCl6KAIZaHcEcUnM3xkMJ-3EaApNHEALw_wcB&hotel=30168&hotelID=30168&journey=undefined&level=hotel&locale=en-US&productcurrency=INR&rate=PGGEDI&rooms=1&specialCode=NA&theme=Umbrella_chain&utm_campaign=PFX_Google-Unit-HTL-LC-QO-Search-Generic-GOILC-AO-Rooms-ITC_GrandGoa-Goa-Feeder-C2-Getaway&utm_content=generic&utm_medium=search&utm_source=google"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Fairfield by Marriott Goa">
                            <input type="hidden" name="place" value="Goa">
                            <input type="hidden" name="price" value="6500">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <!-- HOTEL 2 -->

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://media.iceportal.com/114456/photos/63668230_XXL.jpg">
                </div>

                <div class="hotel-content">

                    <h3>Country Inn & Suites Goa</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹7,500 / Night</p>

                    <p>
                        Stylish 4-star hotel near Candolim Beach
                        with spacious rooms and modern facilities.
                    </p>

                    <div class="btn-group">

                        <a href="https://countryinn.in/country-inn-goa/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Country Inn & Suites Goa">
                            <input type="hidden" name="place" value="Goa">
                            <input type="hidden" name="price" value="7500">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <!-- HOTEL 3 -->

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://images.trvl-media.com/lodging/2000000/1550000/1541300/1541247/a4dfea51.jpg?impolicy=resizecrop&rw=575&rh=575&ra=fill">
                </div>

                <div class="hotel-content">

                    <h3>Lemon Tree Amarante Beach Resort</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹5,500 / Night</p>

                    <p>
                        Premium resort with modern interiors,
                        beach access, and relaxing atmosphere.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.lemontreehotels.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Lemon Tree Amarante Beach Resort">
                            <input type="hidden" name="place" value="Goa">
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

            <!-- HOTEL 1 -->

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://images.unsplash.com/photo-1555854877-bab0e564b8d5?q=80&w=1200">
                </div>

                <div class="hotel-content">

                    <h3>Zostel Goa</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹1,200 / Night</p>

                    <p>
                        Popular backpacker hostel with affordable rooms,
                        cafe area, and beach atmosphere.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.zostel.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Zostel Goa">
                            <input type="hidden" name="place" value="Goa">
                            <input type="hidden" name="price" value="1200">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <!-- HOTEL 2 -->

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://images.unsplash.com/photo-1522798514-97ceb8c4f1c8?q=80&w=1200">
                </div>

                <div class="hotel-content">

                    <h3>Pappi Chulo Hostel</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹1,000 / Night</p>

                    <p>
                        Budget-friendly stay with cozy rooms,
                        party vibes, and clean environment.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.hostelworld.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Pappi Chulo Hostel">
                            <input type="hidden" name="place" value="Goa">
                            <input type="hidden" name="price" value="1000">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <!-- HOTEL 3 -->

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=1200">
                </div>

                <div class="hotel-content">

                    <h3>The Hosteller Goa</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹1,500 / Night</p>

                    <p>
                        Affordable hostel for solo travelers,
                        students, and low-budget tourists.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.thehosteller.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="The Hosteller Goa">
                            <input type="hidden" name="place" value="Goa">
                            <input type="hidden" name="price" value="1500">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- FOOTER -->

<footer>

    <p>
        © 2026 TravelWorld | Goa Tour & Hotel Booking
    </p>

</footer>

</body>
</html>
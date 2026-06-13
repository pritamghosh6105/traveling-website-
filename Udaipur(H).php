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

<title>Udaipur Tour & Hotel Booking</title>

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
    background:#f8fafc;
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

    url('https://www.tourism.rajasthan.gov.in/content/dam/rajasthan-tourism/english/city/explore/221.jpg')
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
    background:#f59e0b;
    color:white;
    padding:15px 35px;
    border-radius:50px;
    font-weight:600;
    transition:0.3s;
}

.hero-btn:hover{
    background:#d97706;
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
    border-left:8px solid #f59e0b;
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
    background:#f59e0b;
    color:white;
    padding:12px 22px;
    border-radius:50px;
    font-weight:600;
    transition:0.3s;
}

.website-btn:hover{
    background:#d97706;
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

        <h1>Explore Royal Udaipur</h1>

        <p>
            Book luxury palace hotels,
            premium resorts, and affordable stays
            in the beautiful city of lakes.
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

        <h2>Best Hotels & Resorts in Udaipur</h2>

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
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWe-G8Ts7n4qBoH5DilRKQlmDMv2ukGcOXna52RW6Byw&s=10">
                </div>

                <div class="hotel-content">

                    <h3>The Oberoi Udaivilas</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹15,000 / Night</p>

                    <p>
                        World-famous luxury palace hotel with lake views,
                        royal interiors, and premium hospitality.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.oberoihotels.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="The Oberoi Udaivilas">
                            <input type="hidden" name="place" value="Udaipur">
                            <input type="hidden" name="price" value="15000">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <!-- HOTEL 2 -->

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://www.hotelmanagement-network.com/wp-content/uploads/sites/25/2017/12/1-taj-lake-palace.jpg">
                </div>

                <div class="hotel-content">

                    <h3>Taj Lake Palace</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹18,000 / Night</p>

                    <p>
                        Iconic floating palace hotel on Lake Pichola
                        with royal suites and luxury dining.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.tajhotels.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Taj Lake Palace">
                            <input type="hidden" name="place" value="Udaipur">
                            <input type="hidden" name="price" value="18000">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <!-- HOTEL 3 -->

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://imgcdn.flamingotravels.co.in/Images/City/The-Leela-Palace-Udaipur-Exterior-View.jpg">
                </div>

                <div class="hotel-content">

                    <h3>The Leela Palace Udaipur</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹16,000 / Night</p>

                    <p>
                        Premium luxury hotel with beautiful lakefront views,
                        royal architecture, and spa facilities.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.theleela.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="The Leela Palace Udaipur">
                            <input type="hidden" name="place" value="Udaipur">
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
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEMSI0KNUvqj8oNyCGf9mJqMRTOmtBD3l7NBndUqdYScOMZ1Y59raZxVg&s=10">
                </div>

                <div class="hotel-content">

                    <h3>Howard Johnson by Wyndham</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹6,500 / Night</p>

                    <p>
                        Modern premium hotel with stylish rooms,
                        rooftop restaurant, and quality services.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.wyndhamhotels.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Howard Johnson by Wyndham">
                            <input type="hidden" name="place" value="Udaipur">
                            <input type="hidden" name="price" value="6500">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://gos3.ibcdn.com/69abdfd2ef0911e388f4baaf629e9523.jpeg">
                </div>

                <div class="hotel-content">

                    <h3>Ramada Udaipur Resort</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹7,500 / Night</p>

                    <p>
                        Beautiful hilltop resort with swimming pool,
                        modern facilities, and scenic surroundings.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.wyndhamhotels.com/ramada"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Ramada Udaipur Resort">
                            <input type="hidden" name="place" value="Udaipur">
                            <input type="hidden" name="price" value="7500">
                            <button type="submit" class="book-btn">Book Now</button>
                        </form>

                    </div>

                </div>

            </div>

            <div class="hotel-card">

                <div class="hotel-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSj3pAcPugw4iT7H-u_Gv1KQZH4oaEGLYcMq-3cVaP-xS5N1cuVYdTCnUU&s=10">
                </div>

                <div class="hotel-content">

                    <h3>Hotel Lakend</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹5,500 / Night</p>

                    <p>
                        Lake-view hotel offering comfortable rooms,
                        premium hospitality, and relaxing atmosphere.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.lakend.co.in/index.html"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Hotel Lakend">
                            <input type="hidden" name="place" value="Udaipur">
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

                    <h3>Zostel Udaipur</h3>
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
                            <input type="hidden" name="hotel" value="Zostel Udaipur">
                            <input type="hidden" name="place" value="Udaipur">
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

                    <h3>Moustache Udaipur</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹1,000 / Night</p>

                    <p>
                        Budget-friendly stay for solo travelers
                        with clean rooms and peaceful environment.
                    </p>

                    <div class="btn-group">

                        <a href="https://moustachescapes.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Moustache Udaipur">
                            <input type="hidden" name="place" value="Udaipur">
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

                    <h3>Hostel Mantra</h3>
                    <p style="font-weight: 700; color: #0d6efd; margin: 10px 0; font-size: 1.15rem;">₹1,500 / Night</p>

                    <p>
                        Affordable hotel for students and backpackers
                        with rooftop views and cozy rooms.
                    </p>

                    <div class="btn-group">

                        <a href="https://www.booking.com/"
                        target="_blank"
                        class="website-btn">
                            Visit Website
                        </a>

                        <form action="../hotel_booking.php" method="get">
                            <input type="hidden" name="hotel" value="Hostel Mantra">
                            <input type="hidden" name="place" value="Udaipur">
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
        © 2026 TravelWorld | Udaipur Tour & Hotel Booking
    </p>

</footer>

</body>
</html>
<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: auth.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>User Dashboard</title>

    <link rel="stylesheet" href="style.css?v=1.0.8">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

    <!-- NAVBAR -->

    <nav class="dashboard-navbar">

    <div class="dashboard-logo">

        <i class="fa-solid fa-earth-asia"></i>

        Travel World

    </div>

    <div class="dashboard-buttons">

        <a href="index.php"
        class="dashboard-btn home-btn">

            <i class="fa-solid fa-house"></i>

            Home

        </a>

        <a href="logout.php"
        class="dashboard-btn logout-btn">

            <i class="fa-solid fa-right-from-bracket"></i>

            Logout

        </a>

    </div>

</nav>
    <!-- DASHBOARD -->

    <section class="dashboard">

        <div class="dashboard-content">

            <h1>
                Welcome
                <?php echo $_SESSION['user']; ?>
            </h1>

            <p>
                Book your dream destination now.
            </p>

        </div>

    </section>

    <!-- BOOKING FORM -->

    <!-- ================= DESTINATIONS ================= -->

<section class="section">

    <h2 class="title">
         Tour Places
    </h2>

    <div class="dashboard-cards">

        <!-- GOA -->

        <div class="dashboard-card">

            <img src="https://images.unsplash.com/photo-1512343879784-a960bf40e7f2?q=80&w=1200&auto=format&fit=crop">

            <div class="dashboard-card-content">

                <h3>Goa Beach Tour</h3>

                <p>
                    Enjoy beaches, nightlife and water sports.
                </p>

                <h4>₹20,000</h4>

                <div class="dashboard-card-buttons">
                    <button type="button" class="btn" onclick="openBooking('Goa ', '20000')">Book Now</button>
                    <a href="hotels/Goa(H).php" class="hotel-btn">Hotels</a>
                    <a href="heritage/goa.html" class="heritage-btn">Heritage</a>
                </div>

             

            </div>

        </div>



        <!-- KASHMIR -->

        <div class="dashboard-card">

            <img src="https://in.musafir.com/uploads/5_4_d115f28046.webp">

            <div class="dashboard-card-content">

                <h3>Kashmir Paradise</h3>

                <p>
                    Snow mountains and beautiful valleys.
                </p>

                <h4>₹25,000</h4>

                <div class="dashboard-card-buttons">
                    <button type="button" class="btn" onclick="openBooking('Kashmir ', '25000')">Book Now</button>
                    <a href="hotels/Kashmir(H).php" class="hotel-btn">Hotels</a>
                    <a href="heritage/kashmir.html" class="heritage-btn">Heritage</a>
                </div>

            </div>

        </div>

        <!-- UDAIPUR -->

        <div class="dashboard-card">

            <img src="https://static.toiimg.com/photo/msid-82304823,width-96,height-65.cms">

            <div class="dashboard-card-content">

                <h3>Udaipur Tour</h3>

                <p>
                     Tales of ancient royalty and  romance
                </p>

                <h4>₹50,000</h4>

                <div class="dashboard-card-buttons">
                    <button type="button" class="btn" onclick="openBooking('Udaipur ', '50000')">Book Now</button>
                    <a href="hotels/Udaipur(H).php" class="hotel-btn">Hotels</a>
                    <a href="heritage/udaipur.html" class="heritage-btn">Heritage</a>
                </div>

            </div>

        </div>

        <!-- Andaman & Nicobar -->

        <div class="dashboard-card">

            <img src="https://www.diveandaman.com/storage/blogs/110125105922-ThingstocarryforAndamanIslands.jpg">

            <div class="dashboard-card-content">

                <h3>Andaman & Nicobar Luxury</h3>

                <p>
                    Luxury resorts and crystal-clear water.
                </p>

                <h4>₹90,000</h4>

                <div class="dashboard-card-buttons">
                    <button type="button" class="btn" onclick="openBooking('Andaman & Nicobar ', '90000')">Book Now</button>
                    <a href="hotels/Andaman(H).php" class="hotel-btn">Hotels</a>
                    <a href="heritage/Andaman .html" class="heritage-btn">Heritage</a>
                </div>

            </div>

        </div>
 
        
     <!--- PURI --->
      <div class="dashboard-card">

            <img src="https://organiser.org/wp-content/uploads/2024/07/11-2-1-jpg.webp">

            <div class="dashboard-card-content">

                <h3>Puri Vacation </h3>

                <p>
                     Jai Jagannath
                </p>

                <h4>₹15,000</h4>

                <div class="dashboard-card-buttons">
                    <button type="button" class="btn" onclick="openBooking('Puri ', '15000')">Book Now</button>
                    <a href="hotels/Puri(H).php" class="hotel-btn">Hotels</a>
                    <a href="heritage/Puri.html" class="heritage-btn">Heritage</a>
                </div>

            </div>

        </div>


        <!--- VARANASI --->
      <div class="dashboard-card">

            <img src="https://www.goindigo.in/content/dam/s6web/in/en/assets/Destinations/destinations/Varanasi/Dashashwamedh%20Ghat%20Large.jpeg">

            <div class="dashboard-card-content">

                <h3>Varanasi Ghats </h3>

                <p>
                     Where ancient meets eternal
                </p>

                <h4>₹25,000</h4>

                <div class="dashboard-card-buttons">
                    <button type="button" class="btn" onclick="openBooking('Varanasi ', '25000')">Book Now</button>
                    <a href="hotels/Varanasi(H).php" class="hotel-btn">Hotels</a>
                    <a href="heritage/Varanasi.html" class="heritage-btn">Heritage</a>
                </div>

            </div>

        </div>

     <!--- SHIMLA  --->
      <div class="dashboard-card">

            <img src="https://www.indianpanorama.in/assets/images/tourpackages/banner/grand-tour-of-himachal-pradesh-ladakh-and-kashmir.webp">

            <div class="dashboard-card-content">

                <h3>Shimla Bliss </h3>

                <p>
                    Misty Mountains of Shimla 
                </p>

                <h4>₹35,000</h4>

                <div class="dashboard-card-buttons">
                    <button type="button" class="btn" onclick="openBooking('Shimla', '35000')">Book Now</button>
                    <a href="hotels/Shimla(H).php" class="hotel-btn">Hotels</a>
                    <a href="heritage/Shimla.html" class="heritage-btn">Heritage</a>
                </div>

            </div>

        </div>

        <!--- Coorg   --->
      <div class="dashboard-card">

            <img src="https://storage.googleapis.com/stateless-www-justwravel-com/2025/12/7b4e36a6-abbey-falls-coorg-karnataka.jpg">

            <div class="dashboard-card-content">

                <h3>Coorg (Karnataka) </h3>

                <p>
                    Known as the 'Scotland of India' for its coffee plantations.
                </p>

                <h4>₹30,000</h4>

                <div class="dashboard-card-buttons">
                    <button type="button" class="btn" onclick="openBooking('Coorg(Karnataka)', '30000')">Book Now</button>
                    <a href="hotels/Coorg(H).php" class="hotel-btn">Hotels</a>
                    <a href="heritage/coorg.html" class="heritage-btn">Heritage</a>
                </div>

            </div>

        </div>

    <!---Jaipur   --->
      <div class="dashboard-card">

            <img src="https://s7ap1.scene7.com/is/image/incredibleindia/hawa-mahal-jaipur-rajasthan-city-1-hero?qlt=82&ts=1742200253577">

            <div class="dashboard-card-content">

                <h3>Jaipur City </h3>

                <p>
                    Known as the 'Pink City', featuring forts and vibrant culture.
                </p>

                <h4>₹40,000</h4>

                <div class="dashboard-card-buttons">
                    <button type="button" class="btn" onclick="openBooking('Jaipur ', '40000')">Book Now</button>
                    <a href="hotels/Jaipur(H).php" class="hotel-btn">Hotels</a>
                    <a href="heritage/Jaipur.html" class="heritage-btn">Heritage</a>
                </div>

            </div>

        </div>


        <!---Sikkim   --->
      <div class="dashboard-card">

            <img src="https://ignitetravelsolution.com/wp-content/uploads/2024/06/Best-Tour-Packages-to-Sikkim.jpg">

            <div class="dashboard-card-content">

                <h3> Sikkim  </h3>

                <p>
                     Offers breathtaking views of Buddhist monasteries.
                </p>

                <h4>₹50,000</h4>

                <div class="dashboard-card-buttons">
                    <button type="button" class="btn" onclick="openBooking('Sikkim & Gangtok ', '50000')">Book Now</button>
                    <a href="hotels/Sikkim(H).php" class="hotel-btn">Hotels</a>
                    <a href="heritage/Sikkim.html" class="heritage-btn">Heritage</a>
                </div>

            </div>

        </div>



    </div>

</section>

<!-- ================= BOOKING MODAL ================= -->

<div class="booking-modal"
id="bookingModal">

    <div class="booking-box">

        <span class="close-btn"
        onclick="closeBooking()">

            &times;

        </span>

        <h2>Confirm Booking</h2>

        <!-- IMPORTANT -->
        <!-- REMOVE action and method -->

        <form class="form">

            <input type="text"
            name="username"
            value="<?php echo $_SESSION['user']; ?>"
            readonly>

            <input type="text"
            id="selectedDestination"
            name="destination"
            readonly>

            <input type="text"
            id="selectedPrice"
            name="price"
            readonly>

            <input type="number"
            id="travelers"
            name="travelers"
            placeholder="Travelers"
            required>

            <input type="date"
            id="journey_date"
            name="journey_date"
            required>

            <select
            id="package"
            name="package"
            required>

                <option value="Silver">
                    Silver Package
                </option>

                <option value="Gold">
                    Gold Package
                </option>

                <option value="Premium">
                    Premium Package
                </option>

            </select>

            <button
            type="button"
            class="btn"
            onclick="goToPayment()">

                Proceed To Payment

            </button>

        </form>

    </div>

</div>

<!-- ================= BOOKING HISTORY ================= -->
<section class="section booking-history-section" style="background: #f8fafc; border-top: 1px solid #e2e8f0; padding-top: 60px; padding-bottom: 60px;">
    <style>
        @media (max-width: 992px) {
            .booking-history-section table, 
            .booking-history-section thead, 
            .booking-history-section tbody, 
            .booking-history-section th, 
            .booking-history-section td, 
            .booking-history-section tr {
                display: block !important;
            }
            .booking-history-section thead {
                display: none !important;
            }
            .booking-history-section tr {
                margin-bottom: 25px !important;
                border: 1px solid #e2e8f0 !important;
                border-radius: 16px !important;
                padding: 15px !important;
                background: #ffffff !important;
                box-shadow: 0 4px 15px rgba(0,0,0,0.02) !important;
            }
            .booking-history-section td {
                border-bottom: 1px solid #f1f5f9 !important;
                position: relative !important;
                padding: 12px 15px 12px 50% !important;
                text-align: right !important;
                font-size: 0.95rem !important;
            }
            .booking-history-section td:last-child {
                border-bottom: none !important;
            }
            .booking-history-section td::before {
                content: attr(data-label);
                position: absolute !important;
                left: 15px !important;
                top: 50% !important;
                transform: translateY(-50%) !important;
                width: 45% !important;
                padding-right: 10px !important;
                white-space: nowrap !important;
                text-align: left !important;
                font-weight: 700 !important;
                color: #475569 !important;
            }
        }
    </style>
    <h2 class="title" style="margin-bottom: 30px;"><i class="fa-solid fa-clock-rotate-left"></i> My Booking History</h2>
    
    <div class="history-container" style="max-width: 1350px; margin: 0 auto; display: flex; flex-direction: column; gap: 40px;">
        
        <!-- Package Tour Bookings -->
        <div class="history-card-box" style="background: #ffffff; border-radius: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); padding: 30px; border: 1px solid #e2e8f0;">
            <h3 style="color: #0d6efd; font-size: 1.4rem; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                <i class="fa-solid fa-plane-departure"></i> Tour Package Bookings
            </h3>
            
            <?php
            $email = $_SESSION['email'] ?? '';
            if (empty($email)) {
                $user_esc = mysqli_real_escape_string($conn, $_SESSION['user']);
                $user_query = mysqli_query($conn, "SELECT email FROM users WHERE fullname = '$user_esc' LIMIT 1");
                if ($user_query && mysqli_num_rows($user_query) > 0) {
                    $user_row = mysqli_fetch_assoc($user_query);
                    $email = $user_row['email'];
                    $_SESSION['email'] = $email;
                }
            }
            $email_esc = mysqli_real_escape_string($conn, $email);
            
            $pkg_sql = "SELECT b.*, p.payment_method, p.payment_status, p.amount as paid_amount 
                        FROM bookings b 
                        LEFT JOIN payments p ON b.email = p.email 
                                            AND b.destination = p.destination 
                                            AND b.package_type = p.package_type 
                        WHERE b.email = '$email_esc' 
                        ORDER BY b.id DESC";
            $pkg_res = mysqli_query($conn, $pkg_sql);
            
            if(mysqli_num_rows($pkg_res) > 0) {
            ?>
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; text-align: left;">
                        <thead>
                            <tr style="border-bottom: 2px solid #cbd5e1; background: #f8fafc;">
                                <th style="padding: 15px; color: #475569; font-weight: 600;">Destination</th>
                                <th style="padding: 15px; color: #475569; font-weight: 600;">Package</th>
                                <th style="padding: 15px; color: #475569; font-weight: 600;">Travelers</th>
                                <th style="padding: 15px; color: #475569; font-weight: 600;">Journey Date</th>
                                <th style="padding: 15px; color: #475569; font-weight: 600;">Amount Paid</th>
                                <th style="padding: 15px; color: #475569; font-weight: 600;">Payment Method</th>
                                <th style="padding: 15px; color: #475569; font-weight: 600;">Status</th>
                                <th style="padding: 15px; color: #475569; font-weight: 600;">Invoice</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($row = mysqli_fetch_assoc($pkg_res)) {
                                $amt = !empty($row['paid_amount']) ? $row['paid_amount'] : $row['price'];
                            ?>
                                <tr style="border-bottom: 1px solid #f1f5f9;">
                                    <td data-label="Destination" style="padding: 15px; font-weight: 600; color: #1e293b;"><?php echo htmlspecialchars($row['destination']); ?></td>
                                    <td data-label="Package" style="padding: 15px;"><?php echo htmlspecialchars($row['package_type']); ?></td>
                                    <td data-label="Travelers" style="padding: 15px;"><?php echo htmlspecialchars($row['travelers']); ?></td>
                                    <td data-label="Journey Date" style="padding: 15px;"><?php echo date('d M Y', strtotime($row['journey_date'])); ?></td>
                                    <td data-label="Amount Paid" style="padding: 15px; font-weight: 600; color: #0d6efd;">₹<?php echo number_format(floatval($amt)); ?></td>
                                    <td data-label="Payment Method" style="padding: 15px;"><?php echo !empty($row['payment_method']) ? htmlspecialchars($row['payment_method']) : 'N/A'; ?></td>
                                    <td data-label="Status" style="padding: 15px;">
                                        <span style="padding: 5px 12px; border-radius: 50px; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0;">
                                            Confirmed
                                        </span>
                                    </td>
                                    <td data-label="Invoice" style="padding: 15px;">
                                        <a href="invoice.php?username=<?php echo urlencode($row['username']); ?>&destination=<?php echo urlencode($row['destination']); ?>&package=<?php echo urlencode($row['package_type']); ?>&travelers=<?php echo urlencode($row['travelers']); ?>&journey_date=<?php echo urlencode($row['journey_date']); ?>&payment_method=<?php echo urlencode($row['payment_method'] ?? 'UPI'); ?>&amount=<?php echo urlencode($amt); ?>" 
                                           style="color: #0d6efd; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 4px;" target="_blank">
                                            <i class="fa-solid fa-file-invoice"></i> View
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <p style="color: #64748b; text-align: center; padding: 20px 0;"><i class="fa-solid fa-folder-open"></i> No package tours booked yet.</p>
            <?php } ?>
        </div>

        <!-- Hotel Bookings -->
        <div class="history-card-box" style="background: #ffffff; border-radius: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); padding: 30px; border: 1px solid #e2e8f0;">
            <h3 style="color: #33db3c; font-size: 1.4rem; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                <i class="fa-solid fa-hotel"></i> Hotel Room Bookings
            </h3>
            
            <?php
            $hotel_sql = "SELECT b.*, p.payment_method, p.payment_status 
                          FROM hotel_bookings b 
                          LEFT JOIN hotel_payments p ON b.id = p.booking_id 
                          WHERE b.email = '$email_esc' 
                          ORDER BY b.id DESC";
            $hotel_res = mysqli_query($conn, $hotel_sql);
            
            if(mysqli_num_rows($hotel_res) > 0) {
            ?>
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; text-align: left;">
                        <thead>
                            <tr style="border-bottom: 2px solid #cbd5e1; background: #f8fafc;">
                                <th style="padding: 15px; color: #475569; font-weight: 600;">Hotel Name</th>
                                <th style="padding: 15px; color: #475569; font-weight: 600;">Destination</th>
                                <th style="padding: 15px; color: #475569; font-weight: 600;">Check-in / Check-out</th>
                                <th style="padding: 15px; color: #475569; font-weight: 600;">Rooms / Guests</th>
                                <th style="padding: 15px; color: #475569; font-weight: 600;">Total Amount</th>
                                <th style="padding: 15px; color: #475569; font-weight: 600;">Payment Method</th>
                                <th style="padding: 15px; color: #475569; font-weight: 600;">Status</th>
                                <th style="padding: 15px; color: #475569; font-weight: 600;">Invoice</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($row = mysqli_fetch_assoc($hotel_res)) {
                            ?>
                                <tr style="border-bottom: 1px solid #f1f5f9;">
                                    <td data-label="Hotel Name" style="padding: 15px; font-weight: 600; color: #1e293b;"><?php echo htmlspecialchars($row['hotel_name']); ?></td>
                                    <td data-label="Destination" style="padding: 15px;"><?php echo htmlspecialchars($row['place_name']); ?></td>
                                    <td data-label="Check-in / Check-out" style="padding: 15px;"><?php echo date('d M Y', strtotime($row['check_in'])) . ' to ' . date('d M Y', strtotime($row['check_out'])); ?></td>
                                    <td data-label="Rooms / Guests" style="padding: 15px;"><?php echo $row['rooms'] . ' Room(s) / ' . $row['guests'] . ' Guest(s)'; ?></td>
                                    <td data-label="Total Amount" style="padding: 15px; font-weight: 600; color: #33db3c;">₹<?php echo number_format(floatval($row['total_price'])); ?></td>
                                    <td data-label="Payment Method" style="padding: 15px;"><?php echo !empty($row['payment_method']) ? htmlspecialchars($row['payment_method']) : 'N/A'; ?></td>
                                    <td data-label="Status" style="padding: 15px;">
                                        <span style="padding: 5px 12px; border-radius: 50px; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0;">
                                            Confirmed
                                        </span>
                                    </td>
                                    <td data-label="Invoice" style="padding: 15px;">
                                        <a href="hotel_invoice.php?booking_id=<?php echo $row['id']; ?>" 
                                           style="color: #33db3c; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 4px;" target="_blank">
                                            <i class="fa-solid fa-file-invoice"></i> View
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <p style="color: #64748b; text-align: center; padding: 20px 0;"><i class="fa-solid fa-folder-open"></i> No hotels booked yet.</p>
            <?php } ?>
        </div>

    </div>
</section>
<script src="script.js"></script>
</body>

</html>
<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: auth.php");
    exit();
}

// Get parameters
$hotel_name = isset($_GET['hotel']) ? $_GET['hotel'] : '';
$place_name = isset($_GET['place']) ? $_GET['place'] : '';
$price_per_night = isset($_GET['price']) ? intval($_GET['price']) : 0;

if(empty($hotel_name) || empty($place_name) || $price_per_night <= 0) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Hotel - Travel World</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .booking-page-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .booking-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 24px;
            padding: 40px;
            width: 600px;
            max-width: 100%;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .booking-card h2 {
            color: #0d6efd;
            text-align: center;
            font-size: 2rem;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .booking-card .sub-title {
            text-align: center;
            color: #64748b;
            margin-bottom: 30px;
            font-size: 1rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        @media(max-width: 600px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .input-group label {
            font-weight: 600;
            color: #334155;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .input-group label i {
            color: #0d6efd;
        }

        .input-group input, .input-group select {
            padding: 14px 16px;
            border: 1.5px solid #cbd5e1;
            border-radius: 12px;
            font-size: 1rem;
            background: #fff;
            color: #1e293b;
            transition: all 0.3s ease;
            outline: none;
        }

        .input-group input[readonly] {
            background: #f1f5f9;
            color: #64748b;
            border-color: #e2e8f0;
            cursor: not-allowed;
        }

        .input-group input:focus:not([readonly]) {
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.15);
        }

        .price-summary {
            background: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 16px;
            padding: 20px;
            margin: 25px 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            color: #475569;
            font-size: 0.95rem;
        }

        .price-row.total {
            border-top: 1.5px solid #e2e8f0;
            padding-top: 12px;
            margin-top: 5px;
            font-weight: 700;
            color: #0f172a;
            font-size: 1.2rem;
        }

        .price-row.total .total-amount {
            color: #0d6efd;
        }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: #0d6efd;
            color: white;
            border: none;
            border-radius: 14px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .submit-btn:hover {
            background: #0256d6;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(13, 110, 253, 0.3);
        }

        .error-message {
            color: #dc3545;
            background: #fdf2f2;
            border: 1px solid #fde8e8;
            padding: 12px;
            border-radius: 8px;
            font-size: 0.9rem;
            display: none;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="dashboard-navbar">
        <div class="dashboard-logo">
            <i class="fa-solid fa-earth-asia"></i>
            Travel World
        </div>
        <div class="dashboard-buttons">
            <a href="dashboard.php" class="dashboard-btn home-btn">
                <i class="fa-solid fa-house"></i> Dashboard
            </a>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="booking-page-container">
        <div class="booking-card">
            <h2>Hotel Booking Details</h2>
            <p class="sub-title">Verify your selections and schedule dates</p>
            
            <div class="error-message" id="errorMsg"></div>

            <form action="hotel_payment.php" method="POST" id="bookingForm">
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($_SESSION['email'] ?? ''); ?>">
                <!-- Prefilled and readonly data -->
                <div class="form-grid">
                    <div class="input-group">
                        <label><i class="fa-solid fa-user"></i> Guest Name</label>
                        <input type="text" name="username" value="<?php echo htmlspecialchars($_SESSION['user']); ?>" readonly>
                    </div>
                    <div class="input-group">
                        <label><i class="fa-solid fa-hotel"></i> Hotel Name</label>
                        <input type="text" name="hotel_name" value="<?php echo htmlspecialchars($hotel_name); ?>" readonly>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="input-group">
                        <label><i class="fa-solid fa-location-dot"></i> Location</label>
                        <input type="text" name="place_name" value="<?php echo htmlspecialchars($place_name); ?>" readonly>
                    </div>
                    <div class="input-group">
                        <label><i class="fa-solid fa-tag"></i> Price per Night</label>
                        <input type="text" id="pricePerNight" name="price_per_night" value="<?php echo $price_per_night; ?>" readonly>
                    </div>
                </div>

                <!-- Interactive inputs -->
                <div class="form-grid">
                    <div class="input-group">
                        <label for="check_in"><i class="fa-regular fa-calendar-days"></i> Check-in Date</label>
                        <input type="date" id="check_in" name="check_in" required>
                    </div>
                    <div class="input-group">
                        <label for="check_out"><i class="fa-regular fa-calendar-days"></i> Check-out Date</label>
                        <input type="date" id="check_out" name="check_out" required>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="input-group">
                        <label for="rooms"><i class="fa-solid fa-bed"></i> Rooms</label>
                        <input type="number" id="rooms" name="rooms" min="1" max="10" value="1" required>
                    </div>
                    <div class="input-group">
                        <label for="guests"><i class="fa-solid fa-users"></i> Guests</label>
                        <input type="number" id="guests" name="guests" min="1" max="30" value="1" required>
                    </div>
                </div>

                <!-- Price Summary -->
                <div class="price-summary">
                    <div class="price-row">
                        <span>Price per Night:</span>
                        <span>₹<span id="labelPrice"><?php echo number_format($price_per_night); ?></span></span>
                    </div>
                    <div class="price-row">
                        <span>Total Nights:</span>
                        <span><span id="labelNights">0</span> nights</span>
                    </div>
                    <div class="price-row">
                        <span>Total Rooms:</span>
                        <span><span id="labelRooms">1</span> room(s)</span>
                    </div>
                    <div class="price-row total">
                        <span>Total Amount:</span>
                        <span>₹<span id="totalPrice">0</span></span>
                    </div>
                </div>

                <!-- Hidden Input to submit total price -->
                <input type="hidden" id="totalPriceInput" name="total_price" value="0">

                <button type="submit" class="submit-btn">
                    <i class="fa-solid fa-credit-card"></i> Proceed to Payment
                </button>
            </form>
        </div>
    </div>

    <!-- FOOTER -->
    <footer style="margin-top: auto;">
        <p>© 2026 Travel World | Hotel Bookings</p>
    </footer>

    <script>
        const checkInInput = document.getElementById('check_in');
        const checkOutInput = document.getElementById('check_out');
        const roomsInput = document.getElementById('rooms');
        const pricePerNight = parseInt(document.getElementById('pricePerNight').value) || 0;
        const labelNights = document.getElementById('labelNights');
        const labelRooms = document.getElementById('labelRooms');
        const totalPriceLabel = document.getElementById('totalPrice');
        const totalPriceInput = document.getElementById('totalPriceInput');
        const errorMsg = document.getElementById('errorMsg');
        const bookingForm = document.getElementById('bookingForm');

        // Set minimum check-in date to today
        const today = new Date().toISOString().split('T')[0];
        checkInInput.min = today;

        checkInInput.addEventListener('change', function() {
            // Check-out date must be after check-in date
            if (checkInInput.value) {
                const nextDay = new Date(checkInInput.value);
                nextDay.setDate(nextDay.getDate() + 1);
                checkOutInput.min = nextDay.toISOString().split('T')[0];
                if (checkOutInput.value && checkOutInput.value <= checkInInput.value) {
                    checkOutInput.value = checkOutInput.min;
                }
            }
            calculatePrice();
        });

        checkOutInput.addEventListener('change', calculatePrice);
        roomsInput.addEventListener('input', calculatePrice);

        function calculatePrice() {
            errorMsg.style.display = 'none';
            const checkIn = checkInInput.value;
            const checkOut = checkOutInput.value;
            const rooms = parseInt(roomsInput.value) || 1;

            labelRooms.innerText = rooms;

            if (!checkIn || !checkOut) {
                return;
            }

            const d1 = new Date(checkIn);
            const d2 = new Date(checkOut);

            if (d2 <= d1) {
                errorMsg.innerText = "Check-out date must be after check-in date.";
                errorMsg.style.display = 'block';
                labelNights.innerText = 0;
                totalPriceLabel.innerText = 0;
                totalPriceInput.value = 0;
                return;
            }

            const timeDiff = Math.abs(d2.getTime() - d1.getTime());
            const nights = Math.ceil(timeDiff / (1000 * 3600 * 24));

            labelNights.innerText = nights;

            const total = pricePerNight * nights * rooms;
            totalPriceLabel.innerText = total.toLocaleString('en-IN');
            totalPriceInput.value = total;
        }

        bookingForm.addEventListener('submit', function(e) {
            const d1 = new Date(checkInInput.value);
            const d2 = new Date(checkOutInput.value);
            
            if (d2 <= d1) {
                e.preventDefault();
                errorMsg.innerText = "Check-out date must be after check-in date.";
                errorMsg.style.display = 'block';
                window.scrollTo({top: 0, behavior: 'smooth'});
            }
        });
    </script>
</body>
</html>

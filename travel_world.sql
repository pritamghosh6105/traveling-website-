CREATE DATABASE travel_world;

USE travel_world;

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255),
    phone VARCHAR(20)
);

-- Package Bookings Table
CREATE TABLE bookings(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    email VARCHAR(100),
    destination VARCHAR(100),
    travelers INT,
    journey_date DATE,
    package_type VARCHAR(50)
);

CREATE TABLE contacts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    message TEXT
);

-- Package Bookings payment Table
ALTER TABLE bookings
ADD COLUMN price VARCHAR(20);

CREATE TABLE payments(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    email VARCHAR(100),
    destination VARCHAR(100),
    package_type VARCHAR(50),
    payment_method VARCHAR(50),
    upi_id VARCHAR(100),
    card_number VARCHAR(30),
    amount VARCHAR(20),
    payment_status VARCHAR(30),
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Hotel Bookings Table
CREATE TABLE hotel_bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    hotel_name VARCHAR(100) NOT NULL,
    place_name VARCHAR(100) NOT NULL,
    price_per_night DECIMAL(10, 2) NOT NULL,
    check_in DATE NOT NULL,
    check_out DATE NOT NULL,
    rooms INT NOT NULL DEFAULT 1,
    guests INT NOT NULL DEFAULT 1,
    total_price DECIMAL(10, 2) NOT NULL,
    booking_status VARCHAR(30) DEFAULT 'Confirmed',
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Hotel Payments Table
CREATE TABLE hotel_payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    upi_id VARCHAR(100) NULL,
    card_number VARCHAR(30) NULL,
    payment_status VARCHAR(30) NOT NULL DEFAULT 'Success',
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (booking_id) REFERENCES hotel_bookings(id) ON DELETE CASCADE
);
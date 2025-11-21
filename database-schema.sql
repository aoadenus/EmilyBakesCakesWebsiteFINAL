-- ============================================================================
-- EMILY BAKES CAKES - MYSQL DATABASE SCHEMA
-- Simple student project database
-- ============================================================================

-- Create database (run this in phpMyAdmin SQL tab)
CREATE DATABASE IF NOT EXISTS emily_bakes_cakes;
USE emily_bakes_cakes;

-- ============================================================================
-- CUSTOMERS TABLE
-- ============================================================================
CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255),
    phone VARCHAR(20),
    address TEXT,
    customer_type ENUM('retail', 'corporate') DEFAULT 'retail',
    is_vip BOOLEAN DEFAULT FALSE,
    special_notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ============================================================================
-- ORDERS TABLE
-- ============================================================================
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    order_number VARCHAR(50) UNIQUE,
    
    -- Pickup Information
    pickup_date DATE NOT NULL,
    pickup_time TIME NOT NULL,
    
    -- Cake Details
    cake_type VARCHAR(100) NOT NULL,
    size VARCHAR(50) NOT NULL,
    flavor VARCHAR(100) NOT NULL,
    filling VARCHAR(100),
    icing_flavor VARCHAR(100) NOT NULL,
    icing_color VARCHAR(50) NOT NULL,
    writing_text VARCHAR(255),
    decorations TEXT,
    
    -- Pricing
    total_amount DECIMAL(10,2) NOT NULL,
    deposit_amount DECIMAL(10,2) DEFAULT 0,
    balance_due DECIMAL(10,2) AS (total_amount - deposit_amount) STORED,
    
    -- Status & Management
    status ENUM('pending', 'in_progress', 'ready', 'completed', 'cancelled') DEFAULT 'pending',
    priority ENUM('standard', 'rush') DEFAULT 'standard',
    special_instructions TEXT,
    
    -- Timestamps
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (customer_id) REFERENCES customers(id)
);

-- ============================================================================
-- PRODUCTS TABLE
-- ============================================================================
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    description TEXT,
    category VARCHAR(50),
    base_price DECIMAL(10,2) NOT NULL,
    image_path VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================================================
-- STAFF USERS TABLE
-- ============================================================================
CREATE TABLE IF NOT EXISTS staff_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(150) NOT NULL,
    role ENUM('owner', 'manager', 'accountant', 'sales', 'baker', 'decorator') NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================================================
-- PAYMENTS TABLE
-- ============================================================================
CREATE TABLE IF NOT EXISTS payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    payment_method ENUM('cash', 'card', 'check') NOT NULL,
    payment_type ENUM('deposit', 'balance', 'full') NOT NULL,
    paid_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    received_by INT,
    notes TEXT,
    
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (received_by) REFERENCES staff_users(id)
);

-- ============================================================================
-- INDEXES FOR PERFORMANCE
-- ============================================================================
CREATE INDEX idx_customers_name ON customers(last_name, first_name);
CREATE INDEX idx_customers_email ON customers(email);
CREATE INDEX idx_customers_phone ON customers(phone);
CREATE INDEX idx_orders_customer ON orders(customer_id);
CREATE INDEX idx_orders_pickup_date ON orders(pickup_date);
CREATE INDEX idx_orders_status ON orders(status);
CREATE INDEX idx_payments_order ON payments(order_id);

-- ============================================================================
-- SAMPLE DATA
-- ============================================================================

-- Sample Customers
INSERT INTO customers (first_name, last_name, email, phone, customer_type, is_vip) VALUES
('Sarah', 'Johnson', 'sarah.j@email.com', '555-0101', 'retail', FALSE),
('Michael', 'Chen', 'mchen@company.com', '555-0102', 'corporate', TRUE),
('Emily', 'Davis', 'emily.davis@email.com', '555-0103', 'retail', FALSE),
('Robert', 'Williams', 'rwilliams@email.com', '555-0104', 'retail', TRUE),
('Jessica', 'Martinez', 'jmartinez@events.com', '555-0105', 'corporate', TRUE);

-- Sample Products
INSERT INTO products (name, description, category, base_price, is_active) VALUES
('Birthday Celebration Cake', 'Classic birthday cake with custom decorations', 'Standard Cakes', 45.00, TRUE),
('Black Forest Cake', 'Chocolate cake with cherry filling and whipped cream', 'Standard Cakes', 55.00, TRUE),
('Red Velvet Cake', 'Rich red velvet with cream cheese frosting', 'Standard Cakes', 50.00, TRUE),
('Lemon Doberge Cake', 'New Orleans classic with lemon custard layers', 'Standard Cakes', 60.00, TRUE),
('Chocolate Decadence', 'Rich chocolate cake with ganache', 'Standard Cakes', 55.00, TRUE),
('Strawberry Dream', 'Vanilla cake with fresh strawberry filling', 'Standard Cakes', 50.00, TRUE),
('Carrot Cake', 'Spiced carrot cake with cream cheese frosting', 'Standard Cakes', 48.00, TRUE),
('Wedding Cake Tier', 'Custom tiered wedding cake - price per tier', 'Special Occasion', 150.00, TRUE);

-- Sample Staff Users (password: "password123" - DO NOT USE IN PRODUCTION!)
INSERT INTO staff_users (username, password_hash, full_name, role) VALUES
('emily', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Emily Baker', 'owner'),
('john', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'John Smith', 'manager'),
('maria', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Maria Garcia', 'sales');

-- Sample Orders
INSERT INTO orders (customer_id, order_number, pickup_date, pickup_time, cake_type, size, flavor, 
                   filling, icing_flavor, icing_color, writing_text, decorations, 
                   total_amount, deposit_amount, status) VALUES
(1, 'ORD-2025-0001', '2025-11-25', '14:00:00', 'Birthday Celebration', '8 inch round', 
 'Vanilla', 'Raspberry', 'Vanilla Buttercream', 'Pastel Pink', 'Happy Birthday Sarah!', 
 'Fresh roses, pink and gold sprinkles', 65.00, 32.50, 'pending'),
(2, 'ORD-2025-0002', '2025-11-28', '10:00:00', 'Red Velvet', '10 inch round', 
 'Red Velvet', 'Cream Cheese', 'Cream Cheese', 'White', 'Congratulations Team!', 
 'Corporate logo (edible print)', 85.00, 42.50, 'in_progress'),
(3, 'ORD-2025-0003', '2025-12-01', '15:30:00', 'Black Forest', '6 inch round', 
 'Chocolate', 'Cherry', 'Whipped Cream', 'Chocolate', '', 
 'Fresh cherries, chocolate shavings', 55.00, 27.50, 'pending');

-- ============================================================================
-- NOTES
-- ============================================================================
-- After running this schema:
-- 1. You'll have 5 sample customers
-- 2. You'll have 8 sample products
-- 3. You'll have 3 sample staff users (all with password: "password123")
-- 4. You'll have 3 sample orders
-- 
-- To reset the database: Drop all tables and re-run this file
-- ============================================================================

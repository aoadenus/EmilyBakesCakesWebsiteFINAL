-- ============================================================================
-- CAKE ORDER SYSTEM - DATABASE SCHEMA
-- Simple standalone project
-- ============================================================================

-- Create database
CREATE DATABASE IF NOT EXISTS cake_orders;
USE cake_orders;

-- ============================================================================
-- ORDERS TABLE
-- ============================================================================
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    
    -- Customer Information
    customer_name VARCHAR(150) NOT NULL,
    customer_email VARCHAR(255),
    customer_phone VARCHAR(20) NOT NULL,
    
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
    
    -- Status
    status ENUM('pending', 'in_progress', 'ready', 'completed', 'cancelled') DEFAULT 'pending',
    special_instructions TEXT,
    
    -- Timestamps
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ============================================================================
-- SAMPLE DATA (Optional - Remove if you don't want sample orders)
-- ============================================================================

INSERT INTO orders (customer_name, customer_email, customer_phone, pickup_date, pickup_time, 
                   cake_type, size, flavor, filling, icing_flavor, icing_color, writing_text, 
                   decorations, total_amount, deposit_amount, status) VALUES

('Sarah Johnson', 'sarah@email.com', '555-0101', '2025-11-30', '14:00:00', 
 'Birthday Celebration', '8 inch round', 'Vanilla', 'Raspberry', 'Vanilla Buttercream', 
 'Pastel Pink', 'Happy Birthday Sarah!', 'Fresh roses, pink sprinkles', 65.00, 32.50, 'pending'),

('Michael Chen', 'mchen@company.com', '555-0102', '2025-12-05', '10:00:00', 
 'Red Velvet', '10 inch round', 'Red Velvet', 'Cream Cheese', 'Cream Cheese', 
 'White', 'Congratulations!', 'Edible gold leaf', 85.00, 42.50, 'pending'),

('Emily Davis', 'emily@email.com', '555-0103', '2025-12-08', '15:30:00', 
 'Black Forest', 'Quarter Sheet', 'Chocolate', 'Cherry', 'Whipped Cream', 
 'Chocolate', '', 'Fresh cherries, chocolate shavings', 95.00, 47.50, 'pending');

-- ============================================================================
-- INDEXES FOR PERFORMANCE
-- ============================================================================
CREATE INDEX idx_orders_pickup_date ON orders(pickup_date);
CREATE INDEX idx_orders_status ON orders(status);
CREATE INDEX idx_orders_customer_phone ON orders(customer_phone);

-- ============================================================================
-- SETUP COMPLETE!
-- ============================================================================

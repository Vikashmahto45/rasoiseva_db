-- RasoiSeva Database Setup Script
-- Multi-tenant Architecture

-- 1. Governance & Tenancy
CREATE TABLE IF NOT EXISTS super_admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS tenants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    business_name VARCHAR(100) NOT NULL,
    owner_email VARCHAR(100) NOT NULL UNIQUE,
    status ENUM('Active', 'Suspended', 'Expired') DEFAULT 'Active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS tenant_modules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tenant_id INT NOT NULL,
    module_name VARCHAR(50) NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE
);

-- 2. Staff & Outlets
CREATE TABLE IF NOT EXISTS outlets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tenant_id INT NOT NULL,
    outlet_name VARCHAR(100) NOT NULL,
    address TEXT,
    gst_number VARCHAR(20),
    FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tenant_id INT NOT NULL,
    outlet_id INT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('Admin', 'Manager', 'Biller', 'Captain', 'Kitchen') NOT NULL,
    status BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE,
    FOREIGN KEY (outlet_id) REFERENCES outlets(id) ON DELETE SET NULL,
    UNIQUE KEY (tenant_id, username)
);

-- 3. Menu & Pricing
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tenant_id INT NOT NULL,
    cat_name VARCHAR(50) NOT NULL,
    status BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tenant_id INT NOT NULL,
    category_id INT NOT NULL,
    item_name VARCHAR(100) NOT NULL,
    base_price DECIMAL(10,2) NOT NULL,
    item_type ENUM('Veg', 'Non-Veg', 'Egg') DEFAULT 'Veg',
    status BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS item_variants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_id INT NOT NULL,
    variant_name VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (item_id) REFERENCES items(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS modifiers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tenant_id INT NOT NULL,
    mod_name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) DEFAULT 0.00,
    FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE
);

-- 4. Inventory
CREATE TABLE IF NOT EXISTS raw_materials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tenant_id INT NOT NULL,
    material_name VARCHAR(100) NOT NULL,
    unit VARCHAR(10) NOT NULL,
    current_stock DECIMAL(10,2) DEFAULT 0.00,
    min_stock DECIMAL(10,2) DEFAULT 0.00,
    FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tenant_id INT NOT NULL,
    item_id INT NOT NULL,
    material_id INT NOT NULL,
    quantity DECIMAL(10,3) NOT NULL,
    FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE,
    FOREIGN KEY (item_id) REFERENCES items(id) ON DELETE CASCADE,
    FOREIGN KEY (material_id) REFERENCES raw_materials(id) ON DELETE CASCADE
);

-- 5. Billing & Orders
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tenant_id INT NOT NULL,
    outlet_id INT NOT NULL,
    user_id INT NOT NULL,
    table_number VARCHAR(10),
    order_type ENUM('Dine-In', 'Takeaway', 'Delivery') DEFAULT 'Dine-In',
    status ENUM('KOT', 'Billed', 'Paid', 'Cancelled') DEFAULT 'KOT',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE,
    FOREIGN KEY (outlet_id) REFERENCES outlets(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    item_id INT NOT NULL,
    variant_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (item_id) REFERENCES items(id)
);

CREATE TABLE IF NOT EXISTS bills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tenant_id INT NOT NULL,
    order_id INT NOT NULL UNIQUE,
    total_amount DECIMAL(10,2) NOT NULL,
    tax_amount DECIMAL(10,2) NOT NULL,
    discount_amount DECIMAL(10,2) DEFAULT 0.00,
    final_payable DECIMAL(10,2) NOT NULL,
    payment_mode ENUM('Cash', 'Card', 'UPI', 'Wallet', 'Credit') DEFAULT 'Cash',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS shifts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tenant_id INT NOT NULL,
    outlet_id INT NOT NULL,
    user_id INT NOT NULL,
    start_time DATETIME NOT NULL,
    end_time DATETIME,
    opening_cash DECIMAL(10,2) DEFAULT 0.00,
    closing_cash DECIMAL(10,2) DEFAULT 0.00,
    actual_cash DECIMAL(10,2) DEFAULT 0.00,
    FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- 6. CRM
CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tenant_id INT NOT NULL,
    phone VARCHAR(15) NOT NULL,
    name VARCHAR(100),
    dob DATE,
    points_balance INT DEFAULT 0,
    FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE,
    UNIQUE KEY (tenant_id, phone)
);

-- Initial Admin for testing (Password: admin123)
INSERT INTO super_admins (username, password) VALUES ('admin', '$2y$10$7vN5/f6eOey57uH6B8q9.uH5rQ1Zp7l.i1v7kY6f1.yO/l9t2u2m.');

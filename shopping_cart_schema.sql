


-- Product Table
CREATE TABLE product (
    product_id INTEGER PRIMARY KEY,
    sku VARCHAR(100),
    name VARCHAR(255),
    description TEXT,
    price DECIMAL(10, 2),
    category VARCHAR(100),
    image_url TEXT,
    brand VARCHAR(100),
    stock_quantity INTEGER
);

-- Cart Table
CREATE TABLE cart (
    cart_id INTEGER PRIMARY KEY,
    user_id INTEGER,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- CartItem Table
CREATE TABLE cartitem (
    cart_item_id INTEGER PRIMARY KEY,
    cart_id INTEGER,
    product_id INTEGER,
    quantity INTEGER,
    FOREIGN KEY (cart_id) REFERENCES cart(cart_id),
    FOREIGN KEY (product_id) REFERENCES product(product_id)
);

-- Orders Table
CREATE TABLE orders (
    order_id INTEGER PRIMARY KEY,
    user_id INTEGER,
    order_date TIMESTAMP,
    total_price DECIMAL(10, 2),
    shipping_address TEXT,
    status VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- OrderItem Table
CREATE TABLE orderitem (
    order_item_id INTEGER PRIMARY KEY,
    order_id INTEGER,
    product_id INTEGER,
    quantity INTEGER,
    price DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (product_id) REFERENCES product(product_id)
);

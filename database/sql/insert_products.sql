-- Insert sample products into the products table
-- Run this script after creating the products table

INSERT INTO products (name, price, description, image, category_id, created_at, updated_at) VALUES
('Laptop Dell XPS 13', 1299.99, 'High-performance ultrabook with 13-inch display, Intel Core i7, 16GB RAM, 512GB SSD', 'https://images.unsplash.com/photo-1593642632823-8f785ba67e45?w=500', 1, NOW(), NOW()),
('iPhone 15 Pro', 999.99, 'Latest Apple smartphone with A17 Pro chip, 256GB storage, Pro camera system', 'https://images.unsplash.com/photo-1678652197950-1caa59c9d3e5?w=500', 2, NOW(), NOW()),
('Samsung 4K Smart TV 55"', 799.99, '55-inch 4K UHD Smart TV with HDR, built-in streaming apps', 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=500', 3, NOW(), NOW()),
('Sony WH-1000XM5 Headphones', 399.99, 'Premium noise-cancelling wireless headphones with exceptional sound quality', 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500', 4, NOW(), NOW()),
('MacBook Air M2', 1199.99, 'Apple MacBook Air with M2 chip, 13.6-inch Liquid Retina display, 8GB RAM, 256GB SSD', 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=500', 1, NOW(), NOW()),
('Samsung Galaxy S24', 849.99, 'Latest Samsung flagship with Snapdragon processor, 128GB storage, triple camera', 'https://images.unsplash.com/photo-1610945415295-d9bbf067e59c?w=500', 2, NOW(), NOW()),
('iPad Pro 12.9"', 1099.99, 'Apple iPad Pro with M2 chip, 12.9-inch Liquid Retina XDR display, 128GB', 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=500', 5, NOW(), NOW()),
('Logitech MX Master 3S', 99.99, 'Advanced wireless mouse with ergonomic design and customizable buttons', 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=500', 6, NOW(), NOW()),
('Mechanical Keyboard RGB', 149.99, 'Gaming mechanical keyboard with RGB lighting and Cherry MX switches', 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=500', 6, NOW(), NOW()),
('Canon EOS R6', 2499.99, 'Professional mirrorless camera with 20MP full-frame sensor and 4K video', 'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?w=500', 7, NOW(), NOW());

-- Verify the inserted data
SELECT * FROM products ORDER BY id DESC LIMIT 10;


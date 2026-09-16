CREATE DATABASE IF NOT EXISTS plantnurseryy;

USE plant_nursery_db_java;

CREATE TABLE IF NOT EXISTS plants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    category VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL
);

INSERT INTO plants (name, category, price, quantity) VALUES
('Rose', 'Flower', 150.00, 10),
('Tulip', 'Flower', 200.00, 8),
('Aloe Vera', 'Medicinal', 120.00, 15),
('Money Plant', 'Indoor', 180.00, 12),
('Jasmine', 'Flower', 100.00, 20);
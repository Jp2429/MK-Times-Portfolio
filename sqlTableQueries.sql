CREATE TABLE IF NOT EXISTS products (
    item_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    item_name VARCHAR(150) NOT NULL,
    item_desc VARCHAR(500) NOT NULL,
    item_img VARCHAR(50) NOT NULL,
    item_price DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (item_id)
);
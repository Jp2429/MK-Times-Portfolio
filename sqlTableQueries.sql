CREATE TABLE IF NOT EXISTS users (
  user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(20) NOT NULL,
  last_name VARCHAR(40) NOT NULL,
  email VARCHAR(60) NOT NULL,
  pass VARCHAR(40) NOT NULL,
  reg_date DATETIME NOT NULL,
  PRIMARY KEY (user_id),
  UNIQUE (email)
);

CREATE TABLE IF NOT EXISTS products (
    item_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    item_name VARCHAR(150) NOT NULL,
    item_desc VARCHAR(500) NOT NULL,
    item_img VARCHAR(50) NOT NULL,
    item_price DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (item_id)
);
CREATE TABLE IF NOT EXISTS orders (
  order_id int(10) unsigned NOT NULL AUTO_INCREMENT,
  user_id int(10) unsigned NOT NULL,
  total decimal(8,2) NOT NULL,
  order_date datetime NOT NULL,
  PRIMARY KEY (order_id)
)  ;

CREATE TABLE IF NOT EXISTS order_contents (
  content_id int(10) unsigned NOT NULL AUTO_INCREMENT,
  order_id int(10) unsigned NOT NULL,
  item_id int(10) unsigned NOT NULL,
  quantity int(10) unsigned NOT NULL DEFAULT '1',
  price decimal(8,2) NOT NULL,
  PRIMARY KEY (content_id)
)  ;

SELECT p.*
FROM orders o
JOIN order_contents oc ON o.order_id = oc.order_id
JOIN products p ON oc.item_id = p.item_id
WHERE o.user_id = :user_id;

INSERT INTO products (item_name, item_desc, item_img, item_price)
VALUES
('MKTimes Ocean Sovereign','The Ocean Sovereign is a timeless tribute to maritime precision and prestige. Featuring a polished stainless steel case, black ceramic unidirectional bezel, and luminous hour markers, this luxury diver’s watch combines rugged functionality with boardroom-worthy style. Its 300m water resistance and date complication make it ideal for both adventurous pursuits and formal occasions.', 'img/watch.jpg', 143.99),

('MKTimes Chrono Eclipse','The Chrono Eclipse is the embodiment of bold sophistication, designed for the modern professional. Its sleek tachymeter bezel encircles a jet-black dial with three precision chronograph sub-dials, offering style and performance in perfect harmony. The brushed steel bracelet and subtle luminescence deliver understated luxury, whether you are timing laps or leading meetings.', 'img/watch2.jpg', 109.99),

('Astra Chrono', 'A timeless fusion of elegance and precision. The Astra Chrono features a stainless steel body with a midnight-blue dial and luminous hands — perfect for the modern professional.', 'img/watch3.jpg', 249.99),

('Regalia Phantom', 'A bold statement piece crafted for those who lead. With its black matte finish and minimalist face, the Regalia Phantom balances mystery and sophistication effortlessly.', 'img/watch4.jpg', 299.99),

('Solstice Gold', 'Shine with every second. Solstice Gold boasts a radiant gold-plated case and a white sunburst dial, ideal for evening wear or upscale events.', 'img/watch5.jpg', 349.99),

('Horizon Steel', 'Built for everyday excellence. Horizon Steel blends rugged durability with sleek design, featuring a brushed metal band and sapphire glass for ultimate wear resistance.', 'img/watch6.jpg', 199.99),

('Noir Eclipse', 'A monochrome masterpiece. The Noir Eclipse offers an all-black aesthetic with subtle silver detailing, embodying stealth and luxury in a single timepiece.', 'img/watch7.jpg', 229.99),

('Terra Classic', 'Inspired by heritage, designed for now. Terra Classic features a leather strap, roman numeral dial, and warm tones to suit those who admire vintage charm.', 'img/watch8.jpg', 189.99),

('Velox S', 'Performance meets style. Velox S is a chronograph watch with stopwatch functionality and a bold red second hand — made for adventurers and athletes alike.', 'img/watch9.jpg', 269.99),

('Luna Mariner', 'Elegant and sea-ready. Luna Mariner offers water resistance up to 100 meters with a wave-patterned blue dial, making it ideal for yachting or beachside soirées.', 'img/watch10.jpg', 319.99);

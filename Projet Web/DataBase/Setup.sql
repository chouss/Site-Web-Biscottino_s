
-- Definition de la table des compte de clients --  
CREATE TABLE clients (
  ClientID int(11) NOT NULL AUTO_INCREMENT,
  FirstName varchar(255) NOT NULL,
  LastName varchar(255) NOT NULL,
  Email varchar(255) NOT NULL,
  PasswordHash varchar(255) NOT NULL,
  Address varchar(255),
  PhoneNumber varchar(20),
  PRIMARY KEY (ClientID),
  UNIQUE KEY Email (Email)
);

-- Insertion de quelque clients comme exemple -- 
INSERT INTO clients (FirstName, LastName, Email, PasswordHash, Address, PhoneNumber) VALUES
('test', 'test', 'user@test.com', 'user', 'Avenue Habib Bourguiba', '98054873'),
('test', 'test', 'a@test.com', '0', 'Avenue Habib Bourguiba', '00000000');

-- creation de la table produits --
CREATE TABLE product (
  ProductID int(11) NOT NULL AUTO_INCREMENT,
  ProductName varchar(255) NOT NULL,
  Description text,
  Price decimal(10,2) NOT NULL,
  DateAdded date,
  LastUpdated timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  ImageURL varchar(255),
  PRIMARY KEY (ProductID)
);

-- instertion de quelque produits --

INSERT INTO product (ProductName, Description, Price, ImageURL) VALUES
('Americano', 'Espresso with added hot water', 2.75, '../assets/Coffee.jpg'),
('Flat White', 'Espresso with steamed milk', 3.25, '../assets/Coffee.jpg'),
('Iced Coffee', 'Chilled espresso with ice and optionally milk', 3.00, '../assets/Coffee.jpg'),
('Macchiato', 'Espresso with a small amount of foamed milk', 3.00, '../assets/Coffee.jpg'),
('Iced Tea', 'Cold brewed tea served with ice', 2.50, '../assets/Coffee.jpg'),
('Scone', 'Baked single-serve bread or cake', 2.50, '../assets/QuotePic.jpg'),
('Chocolate Cake', 'Rich chocolate layered cake', 4.00, '../assets/Cake.jpg'),
('Caramel Frappuccino', 'Blended coffee with caramel and whipped cream', 3.50, '../assets/Coffee.jpg'),
('Blueberry Muffin', 'Fresh muffin with blueberries', 2.75, '../assets/TopPic.jpg');

-- Definition de la table commandes --
CREATE TABLE orderdetail (
  OrderDetailID int(11) NOT NULL AUTO_INCREMENT,
  ProductID int(11),
  Quantity int(11),
  Subtotal decimal(10,2),
  PRIMARY KEY (OrderDetailID),
  KEY ProductID (ProductID),
  CONSTRAINT orderdetail_ibfk FOREIGN KEY (ProductID) REFERENCES product (ProductID)
);

--Definition de la table pour sauvagarder les message contact us --
CREATE TABLE contact_us (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    message TEXT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

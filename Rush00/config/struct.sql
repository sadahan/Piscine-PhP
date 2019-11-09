
-- Client :  localhost
-- User :    root
-- Passwd :  root
-- Database : shoosing

CREATE DATABASE IF NOT EXISTS `shoosing` DEFAULT CHARACTER SET utf8 ;

USE `shoosing` ;

CREATE TABLE IF NOT EXISTS products
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(100),
    ref VARCHAR(10),
    taille INT (2),
    couleur VARCHAR (20),
    price INT,
    descript TEXT,
    src_img VARCHAR (255),
    categorie VARCHAR (255),
    stock INT
);

CREATE TABLE IF NOT EXISTS clients
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    mail VARCHAR(100),
    nom VARCHAR(100),
    prenom VARCHAR(100),
    adresse VARCHAR(100),
    passwd VARCHAR(255),
    date_created DATETIME,
    token_connect VARCHAR(255),
    admin INT
);

CREATE TABLE IF NOT EXISTS categories
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS orders
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    ref_order VARCHAR(20),
    id_client INT,
    date_created DATETIME,
    items TEXT
);

INSERT INTO products(name, ref, taille, couleur, price, descript, src_img, categorie, stock)
VALUE('images-3.jpg', 'ertr', 39, 'blanc', 15, 'Sandales', 'public/img/download-1.jpg', 'promotions', 15),
('images-4.jpg', 'sdff', 41, 'noir', 35, 'Tennis confortables', 'public/img/download-2.jpg', 'sport', 30),
('images-5.jpg', 'gfdc', 40, 'marron', 24, 'Chaussures de marche', 'public/img/download-3.jpg', 'running', 40),
('images-6.jpg', 'iouy', 38, 'blanc', 19, 'Ballerines', 'public/img/download-4.jpg', 'plage', 22),
('images-7.jpg', 'ghcd', 40, 'noir', 20, 'Bottes hautes', 'public/img/download-6.jpg', 'ville', 5),
('images-8.jpg', 'hjcc', 38, 'marron', 45, 'Chaussures de soiree', 'public/img/download.jpg', 'luxe', 15),
('images-9.jpg', 'assx', 42, 'blanc', 37, 'Chaussures confortables', 'public/img/images-1.jpg', 'sport', 25),
('images-10.jpg', 'cynm', 37, 'noir', 50, 'Bottines', 'public/img/download-1.jpg', 'ville', 20),
('images-11.jpg', 'sgki', 38, 'noir', 26, 'Chaussures solides', 'public/img/images-2.jpg', 'luxe', 24),
('images-12.jpg', 'ellk', 40, 'noir', 10, 'Sandales en cuir', 'public/img/images.jpg', 'promotions', 20),
('images-13.jpg', 'okuh', 41, 'noir', 35, 'Tennis de running', 'public/img/images-3.jpg', 'running', 30),
('images-14.jpg', 'drgv', 40, 'marron', 24, 'Chaussures classes', 'public/img/images-4.jpg', 'luxe', 29),
('images-15.jpg', 'seee', 38, 'blanc', 19, 'Tongs', 'public/img/images-5.jpg', 'plage', 30),
('images-16.jpg', 'nbfc', 40, 'noir', 50, 'Bottes en fourrure', 'public/img/images-6.jpg', 'ville', 55),
('images-17.jpg', 'ffcc', 38, 'noir', 45, 'Chaussures de soiree chic', 'public/img/images-7.jpg', 'luxe', 15),
('images-18.jpg', 'ddvt', 42, 'blanc', 25, 'Chaussures montagne', 'public/img/images-8.jpg', 'sport', 25),
('images-19.jpg', 'cfgg', 37, 'noir', 35, 'Bottines cuir', 'public/img/images-9.jpg', 'ville', 20),
('images-20.jpg', 'ffee', 39, 'noir', 26, 'Chaussures homme daffaires', 'public/img/images-10.jpg', 'luxe', 24);

INSERT INTO clients(mail, nom, passwd, admin) VALUES ('admin@admin.fr', 'admin', '7e77279cb4b3e9ce20b50e853e466d5af7cd63faddca227c8ef7b6d5aaece35f340c1f35e9b468bebe73c29da1057bafa2790a5ec05176f3fb07cd3d9a43cb24', 1);

INSERT INTO categories(nom) VALUES('sport'), ('running'), ('ville'), ('plage'), ('luxe'), ('promotions');
CREATE USER 'site'@'localhost' IDENTIFIED BY 'root';
GRANT ALL PRIVILEGES ON * . * TO 'site'@'localhost';
FLUSH PRIVILEGES;

CREATE TABLE ft_table (
    id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
    login VARCHAR(8) NOT NULL DEFAULT 'toto',
    `group` ENUM('staff', 'student', 'other') NOT NULL,
    creation_date DATE NOT NULL);
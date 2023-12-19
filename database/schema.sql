
SET foreign_key_checks = 0;

DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(65) NOT NULL,
    avatar_name VARCHAR(65),
    is_admin BOOLEAN NOT NULL DEFAULT FALSE
);

DROP TABLE IF EXISTS trainings;

CREATE TABLE trainings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    training_category_id INT NOT NULL,

    FOREIGN KEY (training_category_id) REFERENCES trainings_category(id) ON DELETE RESTRICT
);

DROP TABLE IF EXISTS trainings_users;

CREATE TABLE trainings_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    training_id INT NOT NULL,
    status VARCHAR(255) NOT NULL,

    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE RESTRICT,
    FOREIGN KEY (training_id) REFERENCES trainings(id) ON DELETE RESTRICT
);

DROP TABLE IF EXISTS trainings_category;

CREATE TABLE trainings_category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

SET foreign_key_checks = 1;

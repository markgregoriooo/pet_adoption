-- MYSQL COMMAND IN SHELL

 mysql -u root -p
-- no password, just enter to skip

-- create USER and PASSWORD and RESTART the mysql shell and proceed the next command below
CREATE USER 'IT2A'@'localhost' IDENTIFIED BY 'petadoption';

-- use pawslife_db
mysql -u IT2A -p 

-- enter password:
petadoption

-- create database in shell
CREATE DATABASE pawslife_db;
-- use database
USE pawslife_db;

-- CREATE TABLES

-- for user accounts
CREATE TABLE user_accounts(
    user_acc_id INT UNSIGNED AUTO_INCREMENT,
    user_email VARCHAR(100) NOT NULL,
    username VARCHAR(200) NOT NULL UNIQUE,
    user_password_hash VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    is_deleted BOOLEAN DEFAULT FALSE,
    deleted_at TIMESTAMP NULL DEFAULT NULL, 
    PRIMARY KEY(user_acc_id)
);




-- for adopters
CREATE TABLE adopters(
    adopter_id INT UNSIGNED AUTO_INCREMENT,
    adopter_name VARCHAR(50),
    adopter_email VARCHAR(100) NOT NULL, 
    adopter_income DECIMAL(15, 2) NOT NULL, 
    adopter_address VARCHAR(100) NOT NULL, 
    adopter_phone_number VARCHAR(20) NOT NULL,
    date_of_birth DATE NOT NULL,
    occupation VARCHAR(100) NULL,
    gender VARCHAR(10) NOT NULL,
    adopter_status VARCHAR(50) NOT NULL,
    photo_name VARCHAR(200) NOT NULL,
    photo_data  LONGBLOB,
    photo_size INT UNSIGNED,
    photo_type VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
    is_deleted BOOLEAN DEFAULT FALSE, 
    deleted_at TIMESTAMP NULL DEFAULT NULL, 
    PRIMARY KEY(adopter_id)
);

-- for pets
CREATE TABLE pets( 
    pet_id INT UNSIGNED AUTO_INCREMENT, 
    pet_name VARCHAR(50) NOT NULL UNIQUE, 
    gender VARCHAR(10) NOT NULL, 
    age INT(3) UNSIGNED NOT NULL, 
    date_of_birth DATE NOT NULL, 
    is_adopted BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
    is_deleted BOOLEAN DEFAULT FALSE, 
    deleted_at TIMESTAMP NULL DEFAULT NULL, 
    PRIMARY KEY(pet_id)
);

-- for adopted pets
CREATE TABLE adopted_pets(
    adopted_pet_id INT UNSIGNED AUTO_INCREMENT, 
    pet_id INT UNSIGNED, 
    adopter_id INT UNSIGNED,
    adoption_date DATE DEFAULT CURRENT_DATE(), 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
    is_deleted BOOLEAN DEFAULT FALSE, 
    deleted_at TIMESTAMP NULL DEFAULT NULL, 
    PRIMARY KEY(adopted_pet_id), 
    FOREIGN KEY(pet_id) REFERENCES pets(pet_id) ON UPDATE CASCADE, 
    FOREIGN KEY(adopter_id) REFERENCES adopters(adopter_id) ON UPDATE CASCADE
);

-- for cats
CREATE TABLE cats(
    cat_id INT UNSIGNED AUTO_INCREMENT, 
    pet_id INT UNSIGNED,
    color VARCHAR(50) NOT NULL, 
    litter_trained BOOLEAN DEFAULT FALSE, 
    is_indoor BOOLEAN DEFAULT FALSE,
    photo_name VARCHAR(200) NOT NULL,
    photo_data  LONGBLOB,
    photo_size INT UNSIGNED,
    photo_type VARCHAR(50), 
    PRIMARY KEY (cat_id), 
    FOREIGN KEY (pet_id) REFERENCES pets(pet_id) ON UPDATE CASCADE
);

-- for dogs
CREATE TABLE dogs(
    dog_id INT UNSIGNED AUTO_INCREMENT, 
    pet_id INT UNSIGNED, 
    is_leash_trained BOOLEAN DEFAULT FALSE, 
    dog_size ENUM("small", "medium", "large", "extra large") NOT NULL,
    photo_name VARCHAR(200) NOT NULL,
    photo_data  LONGBLOB,
    photo_size INT UNSIGNED,
    photo_type VARCHAR(50), 
    PRIMARY KEY(dog_id), 
    FOREIGN KEY(pet_id) REFERENCES pets(pet_id) ON UPDATE CASCADE
);

-- for donators
CREATE TABLE donators(
    donator_id INT UNSIGNED AUTO_INCREMENT, 
    donator_name VARCHAR(50) NOT NULL, 
    donator_email VARCHAR(100) NOT NULL, 
    amount DECIMAL(15, 2),  
    photo_name VARCHAR(200) NOT NULL,
    photo_data  LONGBLOB,
    photo_size INT UNSIGNED,
    photo_type VARCHAR(50), 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
    is_deleted BOOLEAN DEFAULT FALSE, 
    deleted_at TIMESTAMP NULL DEFAULT NULL, 
    PRIMARY KEY(donator_id)
);

-- for donations
CREATE TABLE donations(
    donation_id INT AUTO_INCREMENT,
    donator_id INT UNSIGNED,
    total DECIMAL(65, 2),            
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
    is_deleted BOOLEAN DEFAULT FALSE, 
    deleted_at TIMESTAMP NULL DEFAULT NULL, 
    PRIMARY KEY(donation_id), 
    FOREIGN KEY(donator_id) REFERENCES donators(donator_id) ON UPDATE CASCADE
);

-- login users
CREATE TABLE user_sessions (
    session_id VARCHAR(100)     , 
    user_name VARCHAR(50) NOT NULL, -- Foreign key to the user account table
    role ENUM('admin', 'user') NOT NULL,
    last_activity_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON DELETE CURRENT_TIMESTAMP,
    PRIMARY KEY(session_id)
);
-- when user logs in
INSERT INTO user_sessions (user_id)
VALUES ((SELECT user_id FROM users WHERE username = 'user_name' LIMIT 1));

DROP DATABASE IF EXISTS foody;
CREATE DATABASE foody;
USE foody;

-- Drop All table --
drop table if exists `Admin`;
drop table if exists `Customer`;
drop table if exists `Rider`;
drop table if exists `RestaurantOwner`;
drop table if exists `Restaurant`;
drop table if exists `RiderCommission`;
drop table if exists `OrderRecord`;
drop table if exists `RestaurantMenu`;

-- Create table --

CREATE TABLE `Admin`(
    `Admin_ID` INT AUTO_INCREMENT,
    `Admin_Username` VARCHAR(10),
    `Admin_Name` VARCHAR(100),
    `Admin_Password` VARCHAR(10),
    `Admin_Email` VARCHAR(50),
    `Admin_PhoneNum` VARCHAR(12)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Customer`(
    `Cust_ID` INT AUTO_INCREMENT,
    `Cust_Name` VARCHAR(100),
    `Cust_Password` VARCHAR(10),
    `Cust_Email` VARCHAR(50),
    `Cust_PhoneNum` VARCHAR(12),
    `Cust_Address` VARCHAR(100),
    `Cust_Poscode` VARCHAR(6),
    `Cust_State` VARCHAR(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Rider`(
    `Rider_ID` INT AUTO_INCREMENT,
    `Rider_Name` VARCHAR(100),
    `Rider_Password` VARCHAR(10),
    `Rider_PhoneNum` VARCHAR(12),
    `Rider_DeliveryArea` VARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `RestaurantOwner`(
    `RO_ID` INT AUTO_INCREMENT,
    `RO_Name` VARCHAR(100),
    `RO_Password` VARCHAR(10),
    `RO_Email` VARCHAR(50),
    `RO_PhoneNum` VARCHAR(12),
    `RO_Address` VARCHAR(100),
    `RO_Poscode` VARCHAR(6),
    `RO_State` VARCHAR(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Restaurant`(
    `Rest_ID` INT AUTO_INCREMENT,
    `Rest_Name` VARCHAR(50),
    `Rest_PhoneNum` VARCHAR(12),
    `Rest_Address` VARCHAR(100),
    `Rest_Poscode` VARCHAR(6),
    `Rest_State` VARCHAR(50),
    `Rest_OpeningHour` DATETIME,
    `Rest_ClosedHour` DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `RiderCommission`(
    `C_ID` INT AUTO_INCREMENT,
    `Rider_ID` VARCHAR(10),
    `C_TotalDeliveries` INT,
    `C_TotalCommission` DECIMAL(65,2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `OrderRecord`(
    `Order_ID` INT AUTO_INCREMENT,
    `Cust_ID` VARCHAR(10),
    `Rest_ID` VARCHAR(10),
    `Rider_ID` VARCHAR(10),
    `Order_MenuName` VARCHAR(30),
    `Order_Quantity` INT,
    `Order_DeliveryFee` DECIMAL(65,2),
    `Order_DeliveryTime` DATETIME,
    `Order_Total` DECIMAL(65,2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `RestaurantMenu`(
    `RM_ID` INT AUTO_INCREMENT,
    `Rest_ID` VARCHAR(10),
    `RM_MenuName` VARCHAR(30),
    `RM_Description` VARCHAR(700),
    `RM_Price` DECIMAL(65,2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Add Primary Key --

ALTER TABLE `Admin`
    ADD PRIMARY KEY (`Admin_ID`);

ALTER TABLE `Customer`
    ADD PRIMARY KEY (`Cust_ID`);

ALTER TABLE `Rider`
    ADD PRIMARY KEY (`Rider_ID`);

ALTER TABLE `RestaurantOwner`
    ADD PRIMARY KEY (`RO_ID`);

ALTER TABLE `Restaurant`
    ADD PRIMARY KEY (`Rest_ID`);

ALTER TABLE `RestaurantMenu`
    ADD PRIMARY KEY (`RM_ID`),
    ADD KEY `Rest_ID` (`Rest_ID`);

ALTER TABLE `OrderRecord`
    ADD PRIMARY KEY (`Order_ID`),
    ADD KEY `Cust_ID` (`Cust_ID`);

ALTER TABLE `OrderRecord`   
    ADD KEY `Rider_ID` (`Rider_ID`);

ALTER TABLE `OrderRecord`
    ADD KEY `Rest_ID` (`Rest_ID`);

-- Constraint and Foreign Key --

ALTER TABLE `RestaurantMenu`
    ADD CONSTRAINT `RestaurantMenu_ibfk_1` FOREIGN KEY (`Rest_ID`) REFERENCES `Restaurant`(`Rest_ID`);

ALTER TABLE `OrderRecord`
    ADD CONSTRAINT `fk1_OrderRecord_ibfk_1` FOREIGN KEY (`Cust_ID`) REFERENCES `Customer`(`Cust_ID`);

ALTER TABLE `OrderRecord`
    ADD CONSTRAINT `fk2_OrderRecord_ibfk_1` FOREIGN KEY (`Rider_ID`) REFERENCES `Rider`(`Rider_ID`);

ALTER TABLE `OrderRecord`
    ADD CONSTRAINT `fk3_OrderRecord_ibfk_1` FOREIGN KEY (`Rest_ID`) REFERENCES `Restaurant`(`Rest_ID`);
COMMIT;
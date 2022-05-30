USE foody;

-- Admin Data --
INSERT INTO Admin (Admin_ID, Admin_Name, Admin_Password, Admin_Email, Admin_PhoneNum) 
    VALUES ('FA001', 'SHARIFAH LYDIEANNA BINTI SYED SHAMSUDDIN', '123456789' , 'FA001@foody.work.com', '0112345678');

INSERT INTO Admin (Admin_ID, Admin_Name, Admin_Password, Admin_Email, Admin_PhoneNum) 
    VALUES ('FA002', 'AHMAD HILMAN BIN AHMAD BADRUDDIN', 'Fsd456372' , 'FA002@foody.work.com', '0123245726');

-- Customer Data --
INSERT INTO Customer (Cust_ID, Cust_Name, Cust_Password, Cust_Email, Cust_PhoneNum, Cust_Address, Cust_Poscode, Cust_State) 
    VALUES ('FC001', 'Chen', 'Sf0df2g168', 'sewepo6071@gmail.com', '01158962356', 'No. 7 Lorong Utara B, Petaling Jaya', '46200', 'Selangor');

INSERT INTO Customer (Cust_ID, Cust_Name, Cust_Password, Cust_Email, Cust_PhoneNum, Cust_Address, Cust_Poscode, Cust_State) 
    VALUES ('FC002', 'Adriana Binti Addy', 'Rt2h01rt5s', 'magryz@gmail.com', '01589674856', '60 Ground Floor Plaza Damas Jalan Sri Hartamas 1,', '50480', 'Wilayah Persekutuan Kuala Lumpur');

-- Rider Data --
INSERT INTO Rider (Rider_ID, Rider_Name, Rider_Password, Rider_PhoneNum, Rider_DeliveryArea) 
    VALUES ('FRI001', 'Zarith Bin Naufal', 'Gsrhtr5h4r', '01285967489', 'Petaling Jaya');

INSERT INTO Rider (Rider_ID, Rider_Name, Rider_Password, Rider_PhoneNum, Rider_DeliveryArea) 
    VALUES ('FRI002', 'Syameen Binti Amri', 'Hgrths215g', '01354892356', 'Wilayah Persekutuan');

-- Restaurant Owner Data --
INSERT INTO RestaurantOwner (RO_ID, RO_Name, RO_Password, RO_Email, RO_PhoneNum, RO_Address, RO_Poscode, RO_State) 
    VALUES ('FRO001', 'Aisyah Binti Zamri', 'Vfsd58124f', 'r13san@gmail.com', '01485724589', 'Subang Square E 08 3 Jln Ss 15/4E Ss15 Petaling Jaya,', '47500', 'Selangor');

INSERT INTO RestaurantOwner (RO_ID, RO_Name, RO_Password, RO_Email, RO_PhoneNum, RO_Address, RO_Poscode, RO_State) 
    VALUES ('FRO002', 'Dzulkarnain Bin Dzulhisham', 'Bgdf457dfr', 'ivanovsergey77@gmail.com', '01625487423', ' Lg Plaza Phoenix Jln Cheras Km 10,', '50480', 'Wilayah Persekutuan Kuala Lumpur');

-- Restaurant Data --
INSERT INTO Restaurant (Rest_ID, Rest_Name, Rest_PhoneNum, Rest_Address, Rest_Poscode, Rest_State, Rest_OpeningHour, Rest_ClosedHour) 
    VALUES ('FF0054', 'River View Seafood Restaurant', '03-3289 2238 ', 'No 1, Jalan Besar Pasir Penambang', '45000', 'Selangor', '2007-11-30 10:30:19', '2007-11-30 10:30:19');

INSERT INTO Restaurant (Rest_ID, Rest_Name, Rest_PhoneNum, Rest_Address, Rest_Poscode, Rest_State, Rest_OpeningHour, Rest_ClosedHour) 
    VALUES ('FF0489', ' Marble 8 Steak House & Fine Dining Restaurant in KL', '03-2386 6030', ' Level 56, Menara 3 Petronas Persiaran KLCC, Kuala Lumpur City Centre,', '50088', 'Kuala Lumpur', '2007-11-30 10:30:19', '2007-11-30 10:30:19');

-- Rider Commission --
INSERT INTO RiderCommission (C_ID, Rider_ID, C_TotalDeliveries, C_TotalCommission) 
    VALUES ('FC001', 'FRI001', 15, 200);

INSERT INTO RiderCommission (C_ID, Rider_ID, C_TotalDeliveries, C_TotalCommission) 
    VALUES ('FC002', 'FRI002', 10, 150);

-- OrderRecord Data--
INSERT INTO OrderRecord (Order_ID, Cust_ID, Rest_ID, Rider_ID, Order_MenuName, Order_Quantity, Order_DeliveryFee, Order_DeliveryTime, Order_Total) 
    VALUES ('FO582', 'FC001', 'FF0054', 'FRI001', 'Shell Out', 2, 10, '2012-04-19 13:08:22',65);

INSERT INTO OrderRecord (Order_ID, Cust_ID, Rest_ID, Rider_ID, Order_MenuName, Order_Quantity, Order_DeliveryFee, Order_DeliveryTime, Order_Total) 
    VALUES ('FO485', 'FC002', 'FF0489', 'FRI002', 'Premium Beef Steak', 1, 9.50, '2012-04-19 13:08:22',85);

-- Restaurant Menu data --
INSERT INTO RestaurantMenu (RM_ID, Rest_ID, RM_MenuName, RM_Description, RM_Price) 
    VALUES ('FMA001', 'FF0054', 'Shell Out', 'Combination of corn, prawn, crab, clams, broccoli, squid and shell.', 55);

INSERT INTO RestaurantMenu (RM_ID, Rest_ID, RM_MenuName, RM_Description, RM_Price) 
    VALUES ('FMA002', 'FF0054', 'Tomyam Seafood', 'Squid, prawn, cabbage flower, carrot and tomato', 10);

INSERT INTO RestaurantMenu (RM_ID, Rest_ID, RM_MenuName, RM_Description, RM_Price) 
    VALUES ('FMB001', 'FF0489', 'Premium Beef Steak', 'Using an Australian beef with a special sauce', 75.50);

INSERT INTO RestaurantMenu (RM_ID, Rest_ID, RM_MenuName, RM_Description, RM_Price) 
    VALUES ('FMB002', 'FF0489', 'Chicken Chop Special', 'Chicken chop, broccoli, fries, mash potato, black pepper sauce and cheese sauce.', 45.50);


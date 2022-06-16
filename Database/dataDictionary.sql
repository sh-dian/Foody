--USE epiz_31973551_foody;--
USE foody

-- Admin Data --
INSERT INTO Admin (Admin_ID, Admin_Name, Admin_Password, Admin_Email, Admin_PhoneNum) 
    VALUES (1, 'SHARIFAH LYDIEANNA BINTI SYED SHAMSUDDIN', '123456789' , 'FA001@foody.work.com', '0112345678');

INSERT INTO Admin (Admin_ID, Admin_Name, Admin_Password, Admin_Email, Admin_PhoneNum) 
    VALUES (2, 'AHMAD HILMAN BIN AHMAD BADRUDDIN', 'Fsd456372' , 'FA002@foody.work.com', '0123245726');

-- Customer Data --
INSERT INTO Customer (Cust_ID, Cust_Name, Cust_Password, Cust_Email, Cust_PhoneNum, Cust_Address, Cust_Poscode, Cust_State) 
    VALUES (1, 'Chen', 'Sf0df2g168', 'sewepo6071@gmail.com', '01158962356', 'No. 7 Lorong Utara B, Petaling Jaya', '46200', 'Selangor');

INSERT INTO Customer (Cust_ID, Cust_Name, Cust_Password, Cust_Email, Cust_PhoneNum, Cust_Address, Cust_Poscode, Cust_State) 
    VALUES (2, 'Adriana Binti Addy', 'Rt2h01rt5s', 'magryz@gmail.com', '01589674856', '60 Ground Floor Plaza Damas Jalan Sri Hartamas 1,', '50480', 'Kuala Lumpur');

INSERT INTO Customer (Cust_ID, Cust_Name, Cust_Password, Cust_Email, Cust_PhoneNum, Cust_Address, Cust_Poscode, Cust_State) 
    VALUES (3, 'Zarith', 'jafjd678S', 'Zarith@gmail.com', '01987256423', 'No. 19 Lorong Utara C, Petaling Jaya', '46200', 'Selangor');

INSERT INTO Customer (Cust_ID, Cust_Name, Cust_Password, Cust_Email, Cust_PhoneNum, Cust_Address, Cust_Poscode, Cust_State)
    VALUES (4, 'Hijjaz', 'Jazz4893', 'Jazz@gmail.com', '0139063549', 'No. 5 Lorong Maarof 3, Bangsar', '59000', 'Kuala Lumpur');

INSERT INTO Customer (Cust_ID, Cust_Name, Cust_Password, Cust_Email, Cust_PhoneNum, Cust_Address, Cust_Poscode, Cust_State)
    VALUES (5, 'Fadhil', 'Dhil8594', 'Dhil19@gmail.com', '01195749307', 'No. 18 Jalan Bagan Baru Satu Off, Butterworth', '12100', 'Penang');

-- Rider Data --
INSERT INTO Rider (Rider_ID, Rider_Name, Rider_Password, Rider_PhoneNum, Rider_DeliveryArea) 
    VALUES (1, 'Zarith Bin Naufal', 'Gsrhtr5h4r', '01285967489', 'Petaling Jaya');

INSERT INTO Rider (Rider_ID, Rider_Name, Rider_Password, Rider_PhoneNum, Rider_DeliveryArea) 
    VALUES (2, 'Syameen Binti Amri', 'Hgrths215g', '01354892356', 'Wilayah Persekutuan');

INSERT INTO Rider (Rider_ID, Rider_Name, Rider_Password, Rider_PhoneNum, Rider_DeliveryArea) 
    VALUES (3, 'Thanajufri Bin Naufal', 'CSfvsfs23', '01283247489', 'Petaling Jaya');

INSERT INTO Rider (Rider_ID, Rider_Name, Rider_Password, Rider_PhoneNum, Rider_DeliveryArea) 
    VALUES (4, 'Zarul Bin Majid', 'CFWwjwbfo', '0194557390', 'Bangsar');

INSERT INTO Rider (Rider_ID, Rider_Name, Rider_Password, Rider_PhoneNum, Rider_DeliveryArea) 
    VALUES (5, 'Kamarul Bin Zakaria', 'DsgrHrgrl', '01139087166', 'Butterworth');

-- Restaurant Owner Data --
INSERT INTO RestaurantOwner (RO_ID, RO_Name, RO_Password, RO_Email, RO_PhoneNum, RO_Address, RO_Poscode, RO_State) 
    VALUES (1, 'Aisyah Binti Zamri', 'Vfsd58124f', 'r13san@gmail.com', '01485724589', 'Subang Square E 08 3 Jln Ss 15/4E Ss15 Petaling Jaya,', '47500', 'Selangor');

INSERT INTO RestaurantOwner (RO_ID, RO_Name, RO_Password, RO_Email, RO_PhoneNum, RO_Address, RO_Poscode, RO_State) 
    VALUES (2, 'Dzulkarnain Bin Dzulhisham', 'Bgdf457dfr', 'ivanovsergey77@gmail.com', '01625487423', ' Lg Plaza Phoenix Jln Cheras Km 10,', '50480', 'Kuala Lumpur');

INSERT INTO RestaurantOwner (RO_ID, RO_Name, RO_Password, RO_Email, RO_PhoneNum, RO_Address, RO_Poscode, RO_State) 
    VALUES (3, 'Wajdi Bin Daud', 'Vrcdrimgf', 'Crazy13@gmail.com', '0138554832', ' 3rd Floor Mid Valley Megamall Persiaran Mid Valley,', '58000', 'Kuala Lumpur');

INSERT INTO RestaurantOwner (RO_ID, RO_Name, RO_Password, RO_Email, RO_PhoneNum, RO_Address, RO_Poscode, RO_State) 
    VALUES (4, 'Luqman Bin Nizam', 'ZffcsVsfe', 'Luqman94@gmail.com', '0194559370', ' 3A 1St Floor Jalan Wawasan 4/1 Bandar Baru Ampang,', '68000', 'Selangor');

INSERT INTO RestaurantOwner (RO_ID, RO_Name, RO_Password, RO_Email, RO_PhoneNum, RO_Address, RO_Poscode, RO_State) 
    VALUES (5, 'Fatimah Binti Shaari', 'JHdsrbKv', 'Fatimah998@gmail.com', '0173075049', ' Lot 2.32 Wisma Central Macalister,', '10400', 'Penang');

-- Restaurant Data --
INSERT INTO Restaurant (Rest_ID, RO_ID, Rest_Name, Rest_PhoneNum, Rest_Address, Rest_Poscode, Rest_State, Rest_OpeningHour, Rest_ClosedHour) 
    VALUES (1, 1, 'River View Seafood Restaurant', '03-3289 2238 ', 'No 1, Jalan Besar Pasir Penambang', '45000', 'Selangor', ' 10:30:19', ' 10:30:19');

INSERT INTO Restaurant (Rest_ID, RO_ID, Rest_Name, Rest_PhoneNum, Rest_Address, Rest_Poscode, Rest_State, Rest_OpeningHour, Rest_ClosedHour) 
    VALUES (2, 2, ' Marble 8 Steak House & Fine Dining Restaurant in KL', '03-2386 6030', ' Level 56, Menara 3 Petronas Persiaran KLCC, Kuala Lumpur City Centre,', '50088', 'Kuala Lumpur', '10:30:19', '10:30:19');

INSERT INTO Restaurant (Rest_ID, RO_ID, Rest_Name, Rest_PhoneNum, Rest_Address, Rest_Poscode, Rest_State, Rest_OpeningHour, Rest_ClosedHour) 
    VALUES (3, 3, ' Sweety Fruty', '04-332-7888', ' No. 5053, Jalan New Ferry,', '12100', 'Penang', '10:30:19', '10:30:19');


-- Rider Commission --
INSERT INTO RiderCommission (C_ID, Rider_ID, C_TotalDeliveries, C_TotalCommission) 
    VALUES (1, 1, 15, 200);

INSERT INTO RiderCommission (C_ID, Rider_ID, C_TotalDeliveries, C_TotalCommission) 
    VALUES (2, 2, 10, 150);

INSERT INTO RiderCommission (C_ID, Rider_ID, C_TotalDeliveries, C_TotalCommission) 
    VALUES (3, 3, 100, 1050);

INSERT INTO RiderCommission (C_ID, Rider_ID, C_TotalDeliveries, C_TotalCommission) 
    VALUES (4, 4, 40, 550);

INSERT INTO RiderCommission (C_ID, Rider_ID, C_TotalDeliveries, C_TotalCommission) 
    VALUES (5, 5, 60, 850);

-- OrderRecord Data--
INSERT INTO OrderRecord (Order_ID, Cust_ID, Rest_ID, Rider_ID, Order_MenuName, Order_Quantity, Order_DeliveryFee, Order_DeliveryTime, Order_Total) 
    VALUES (1, 1, 1, 1, 'Shell Out', 2, 10, '2012-04-19 13:08:22',65);

INSERT INTO OrderRecord (Order_ID, Cust_ID, Rest_ID, Rider_ID, Order_MenuName, Order_Quantity, Order_DeliveryFee, Order_DeliveryTime, Order_Total) 
    VALUES (2, 2, 2, 2, 'Premium Beef Steak', 1, 9.50, '2012-04-19 13:08:22',85);

INSERT INTO OrderRecord (Order_ID, Cust_ID, Rest_ID, Rider_ID, Order_MenuName, Order_Quantity, Order_DeliveryFee, Order_DeliveryTime, Order_Total) 
    VALUES (3, 3, 1, 3, 'Tomyam Seafood', 1, 10, '2012-05-12 16:08:22',20);

INSERT INTO OrderRecord (Order_ID, Cust_ID, Rest_ID, Rider_ID, Order_MenuName, Order_Quantity, Order_DeliveryFee, Order_DeliveryTime, Order_Total) 
    VALUES (4, 4, 2, 4, 'Chicken Chop Special', 1, 9.50, '2012-05-12 15:08:22',55);

INSERT INTO OrderRecord (Order_ID, Cust_ID, Rest_ID, Rider_ID, Order_MenuName, Order_Quantity, Order_DeliveryFee, Order_DeliveryTime, Order_Total) 
    VALUES (5, 5, 3, 5, 'Mango Ice Blend with Honeycomb', 1, 7, '2012-06-23 14:08:22',25.50);

INSERT INTO OrderRecord (Order_ID, Cust_ID, Rest_ID, Rider_ID, Order_MenuName, Order_Quantity, Order_DeliveryFee, Order_DeliveryTime, Order_Total) 
    VALUES (6, 5, 3, 5, 'Strawberry Smoothie', 1, 7, '2012-06-23 14:08:22',22);

-- Restaurant Menu data --
INSERT INTO RestaurantMenu (RM_ID, Rest_ID, RM_MenuName, RM_Description, RM_Price) 
    VALUES (1, 1, 'Shell Out', 'Combination of corn, prawn, crab, clams, broccoli, squid and shell.', 55);

INSERT INTO RestaurantMenu (RM_ID, Rest_ID, RM_MenuName, RM_Description, RM_Price) 
    VALUES (2, 1, 'Tomyam Seafood', 'Squid, prawn, cabbage flower, carrot and tomato', 10);

INSERT INTO RestaurantMenu (RM_ID, Rest_ID, RM_MenuName, RM_Description, RM_Price) 
    VALUES (3, 2, 'Premium Beef Steak', 'Using an Australian beef with a special sauce', 75.50);

INSERT INTO RestaurantMenu (RM_ID, Rest_ID, RM_MenuName, RM_Description, RM_Price) 
    VALUES (4, 2, 'Chicken Chop Special', 'Chicken chop, broccoli, fries, mash potato, black pepper sauce and cheese sauce.', 45.50);

INSERT INTO RestaurantMenu (RM_ID, Rest_ID, RM_MenuName, RM_Description, RM_Price) 
    VALUES (5, 3, 'Mango Ice Blend with Honeycomb', 'Fresh mango with original honeycomb.', 18.50);

INSERT INTO RestaurantMenu (RM_ID, Rest_ID, RM_MenuName, RM_Description, RM_Price) 
    VALUES (6, 3, ' Strawberry Smoothie ', 'Fresh strawberry', 15);
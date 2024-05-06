CREATE TABLE Cart (
    CartID INT PRIMARY KEY AUTO_INCREMENT,
    TotalQuantity INT
);

CREATE TABLE Payment (
    PaymentID INT PRIMARY KEY AUTO_INCREMENT,
    Amount DECIMAL(10, 2),
    Date DATE NOT NULL,
    Method VARCHAR(255) NOT NULL
);

CREATE TABLE Invoice (
    InvoiceID INT PRIMARY KEY AUTO_INCREMENT,
    TotalCost DECIMAL(10, 2),
    Date DATE,
    Time TIME,
    PaymentID INT,
    CartID INT,
    FOREIGN KEY (PaymentID) REFERENCES Payment(PaymentID),
    FOREIGN KEY (CartID) REFERENCES Cart(CartID)
);

CREATE TABLE Customer (
    CustomerID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255),
    Contact VARCHAR(255),
    Phone VARCHAR(255),
    CartID INT,
    InvoiceID INT,
    FOREIGN KEY (CartID) REFERENCES Cart(CartID),
    FOREIGN KEY (InvoiceID) REFERENCES Invoice(InvoiceID)
);

CREATE TABLE Account (
    AccountID INT PRIMARY KEY AUTO_INCREMENT,
    Type VARCHAR(255),
    Balance DECIMAL(10, 2),
    Mail VARCHAR(255) UNIQUE,
    Password VARCHAR(255) UNIQUE,
    CustomerID INT,
    FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID)
);

CREATE TABLE Appointment (
    DoorstepID INT,
    MechanicID INT,
    Address VARCHAR(255)
);

CREATE TABLE AutoAccessories (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Description TEXT,
    Cost DECIMAL(10, 2),
    Name VARCHAR(255)
);

CREATE TABLE DoorstepService (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Date DATE,
    Time TIME,
    Name VARCHAR(255)
);

CREATE TABLE Mechanic (
    MechanicID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255),
    Specialization VARCHAR(255)
);

CREATE TABLE MechanicDoorstepService (
    MechanicID INT,
    DoorstepServiceID INT,
    PRIMARY KEY (MechanicID, DoorstepServiceID),
    FOREIGN KEY (MechanicID) REFERENCES Mechanic(MechanicID),
    FOREIGN KEY (DoorstepServiceID) REFERENCES DoorstepService(ID)
);

CREATE TABLE CartAccessories(
    Cart_ID INT,
    Accessories_ID INT,
    Quantity INT,
    CONSTRAINT cart_accessories_accessories FOREIGN KEY (Accessories_ID) REFERENCES AutoAccessories(ID),
    CONSTRAINT cart_accessories_cart FOREIGN KEY (Cart_ID) REFERENCES Cart(CartID),
    CONSTRAINT cart_accessories_unique UNIQUE (Cart_ID, Accessories_ID)
);

CREATE TABLE CartDoorstep(
    Cart_ID INT,
    Doorstep_ID INT,
    CONSTRAINT cart_doorsteo_doorstep FOREIGN KEY (Doorstep_ID) REFERENCES DoorstepService(ID),
    CONSTRAINT cart_doorstep_cart FOREIGN KEY (Cart_ID) REFERENCES Cart(CartID),
    CONSTRAINT cart_doorstep_unique UNIQUE (Cart_ID, Doorstep_ID)
);

-- Inserting data into the Payment table
INSERT INTO Payment (Amount, Date, Method) VALUES (50.00, '2024-05-04', 'Credit Card');

-- Inserting data into the Appointment table
INSERT INTO Appointment (DoorstepID, MechanicID, Address) VALUES (1, 1, '123 Main St');

-- Inserting data into the AutoAccessories table
INSERT INTO AutoAccessories (Name, Cost)
VALUES
    ('Steering Wheel', 99),
    ('Wheel', 99),
    ('Clutches', 19);

-- Inserting data into the DoorstepService table
INSERT INTO DoorstepService (Date, Time, Name) VALUES ('2024-05-05', '10:00:00', 'Oil Change');

-- Inserting data into the Mechanic table
INSERT INTO Mechanic (Name, Specialization) VALUES ('Mike Smith', 'Engine Repair');

-- Inserting data into the Mechanic_DoorstepService table (linking Mechanic and DoorstepService)
INSERT INTO MechanicDoorstepService (MechanicID, DoorstepServiceID) VALUES (1, 1);
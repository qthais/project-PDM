CREATE TABLE Cart (
    CartID INT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE Payment (
    PaymentID INT PRIMARY KEY AUTO_INCREMENT,
    Amount DECIMAL(10, 2),
    Date DATE,
    Method VARCHAR(255)
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
    Mail VARCHAR(255),
    Password VARCHAR(255),
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
    Name VARCHAR(255),
    CartID INT,
    FOREIGN KEY (CartID) REFERENCES Cart(CartID)
);

CREATE TABLE DoorstepService (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Date DATE,
    Time TIME,
    Name VARCHAR(255),
    CartID INT,
    FOREIGN KEY (CartID) REFERENCES Cart(CartID)
);

CREATE TABLE Mechanic (
    MechanicID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255),
    Specialization VARCHAR(255)
);

CREATE TABLE Mechanic_DoorstepService (
    MechanicID INT,
    DoorstepServiceID INT,
    PRIMARY KEY (MechanicID, DoorstepServiceID),
    FOREIGN KEY (MechanicID) REFERENCES Mechanic(MechanicID),
    FOREIGN KEY (DoorstepServiceID) REFERENCES DoorstepService(ID)
);
-- Inserting data into the Cart table
INSERT INTO Cart VALUES (NULL); -- Assuming CartID is auto-incremented

-- Inserting data into the Payment table
INSERT INTO Payment (Amount, Date, Method) VALUES (50.00, '2024-05-04', 'Credit Card');

-- Inserting data into the Invoice table
INSERT INTO Invoice (TotalCost, Date, Time, PaymentID, CartID) VALUES (50.00, '2024-05-04', '12:00:00', 1, 1);

-- Inserting data into the Customer table
INSERT INTO Customer (Name, Contact, Phone, CartID, InvoiceID) VALUES ('John Doe', 'john@example.com', '+1234567890', 1, 1);

-- Inserting data into the Account table
INSERT INTO Account (Type, Balance, Mail, Password, CustomerID) VALUES ('Regular', 100.00, 'john@example.com', 'password123', 1);

-- Inserting data into the Appointment table
INSERT INTO Appointment (DoorstepID, MechanicID, Address) VALUES (1, 1, '123 Main St');

-- Inserting data into the AutoAccessories table
INSERT INTO AutoAccessories (Name, Cost, Image, CartID)
VALUES
    ('Steering wheel', 99, './assets/css/img/Car_accessories/volang.jpg', NULL),
    ('Wheel', 99, './assets/css/img/Car_accessories/banhxe.jpg', NULL),
    ('Clutches', 19, './assets/css/img/Car_accessories/banhrang.jpg', NULL);


-- Inserting data into the DoorstepService table
INSERT INTO DoorstepService (Date, Time, Name, CartID) VALUES ('2024-05-05', '10:00:00', 'Oil Change', 1);

-- Inserting data into the Mechanic table
INSERT INTO Mechanic (Name, Specialization) VALUES ('Mike Smith', 'Engine Repair');

-- Inserting data into the Mechanic_DoorstepService table (linking Mechanic and DoorstepService)
INSERT INTO Mechanic_DoorstepService (MechanicID, DoorstepServiceID) VALUES (1, 1);


CREATE TABLE Payment (
    PaymentID INT PRIMARY KEY AUTO_INCREMENT,
    Amount DECIMAL(10, 2),
    Date DATE NOT NULL,
    Method VARCHAR(255) NOT NULL
);

CREATE TABLE Customer (
    CustomerID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255),
    Contact VARCHAR(255),
    Phone VARCHAR(255),
    InvoiceID INT
);

CREATE TABLE Account (
    AccountID INT PRIMARY KEY AUTO_INCREMENT,
    Type VARCHAR(255),
    Balance DECIMAL(10, 2),
    Mail VARCHAR(255) UNIQUE,
    Password VARCHAR(255) UNIQUE,
    CustomerID INT
);

CREATE TABLE Cart (
    CartID INT PRIMARY KEY AUTO_INCREMENT,
    TotalQuantity INT,
    AccountID INT,
    FOREIGN KEY (AccountID) REFERENCES Account(AccountID)
    CustomerID INT
);

CREATE TABLE Cart (
    CartID INT PRIMARY KEY AUTO_INCREMENT,
    TotalQuantity INT,
    AccountID INT,
    FOREIGN KEY (AccountID) REFERENCES Account(AccountID)
);

CREATE TABLE Appointment (
    DoorstepID INT,
    MechanicID INT,
    Address VARCHAR(255)
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
    PRIMARY KEY (MechanicID, DoorstepServiceID)
    PRIMARY KEY (MechanicID, DoorstepServiceID)
);

CREATE TABLE CartAccessories (
CREATE TABLE CartAccessories (
    Cart_ID INT,
    Accessories_ID INT,
    Quantity INT,
    CONSTRAINT cart_accessories_accessories FOREIGN KEY (Accessories_ID) REFERENCES AutoAccessories(ID),
    CONSTRAINT cart_accessories_cart FOREIGN KEY (Cart_ID) REFERENCES Cart(CartID),
    CONSTRAINT cart_accessories_unique UNIQUE (Cart_ID, Accessories_ID)
);

CREATE TABLE CartDoorstep (
CREATE TABLE CartDoorstep (
    Cart_ID INT,
    Doorstep_ID INT,
    CONSTRAINT cart_doorstep_doorstep FOREIGN KEY (Doorstep_ID) REFERENCES DoorstepService(ID),
    CONSTRAINT cart_doorstep_doorstep FOREIGN KEY (Doorstep_ID) REFERENCES DoorstepService(ID),
    CONSTRAINT cart_doorstep_cart FOREIGN KEY (Cart_ID) REFERENCES Cart(CartID),
    CONSTRAINT cart_doorstep_unique UNIQUE (Cart_ID, Doorstep_ID)
);

-- Adding Foreign Key Constraints
ALTER TABLE Customer ADD FOREIGN KEY (InvoiceID) REFERENCES Invoice(InvoiceID);
ALTER TABLE Account ADD FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID);
ALTER TABLE Appointment ADD FOREIGN KEY (DoorstepID) REFERENCES DoorstepService(ID);
ALTER TABLE Appointment ADD FOREIGN KEY (MechanicID) REFERENCES Mechanic(MechanicID);
ALTER TABLE MechanicDoorstepService ADD FOREIGN KEY (MechanicID) REFERENCES Mechanic(MechanicID);
ALTER TABLE MechanicDoorstepService ADD FOREIGN KEY (DoorstepServiceID) REFERENCES DoorstepService(ID);
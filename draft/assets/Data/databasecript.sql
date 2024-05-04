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

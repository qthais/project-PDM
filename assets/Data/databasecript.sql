CREATE TABLE Users (
        UserID INT PRIMARY KEY AUTO_INCREMENT,
        Name VARCHAR(255),
        Mail VARCHAR(255),
        Password VARCHAR(255),
        Phone VARCHAR(20)
    );
CREATE TABLE Cart (
    CartID INT PRIMARY KEY AUTO_INCREMENT,
    TotalQuantity INT,
    UserID INT
);
CREATE TABLE DoorstepService (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255)
);
CREATE TABLE AutoAccessories (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Description TEXT,
    Cost DECIMAL(10, 2),
    Name VARCHAR(255),
    Image VARCHAR(200)
);

CREATE TABLE Payment (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    CartID INT,
    PaymentDate DATETIME,
    CardNumber VARCHAR(16), -- Store securely
    CardHolderName VARCHAR(100),
    ExpirationYear VARCHAR(4),
    ExpirationMonth VARCHAR(2),
    CVV VARCHAR(3)
);

CREATE TABLE UserDoorstepService (
    UserID INT ,
    DoorstepServiceID INT ,
    Address VARCHAR(255),
    Date DATE,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (DoorstepServiceID) REFERENCES DoorstepService(ID)
);
CREATE TABLE CartAutoAccessories (
    CartID INT NULL,
    AutoAccessoryID INT NULL,
    Quantity INT,
    FOREIGN KEY (CartID) REFERENCES Cart(CartID),
    FOREIGN KEY (AutoAccessoryID) REFERENCES AutoAccessories(ID)
);
CREATE TABLE Contact (
    ContactID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    Message TEXT,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);
ALTER TABLE Cart
ADD FOREIGN KEY (UserID) REFERENCES Users(UserID);



ALTER TABLE Payment
ADD FOREIGN KEY (CartID) REFERENCES Cart(CartID);

INSERT INTO AutoAccessories (Name, Cost, Image)
VALUES
    ('Steering wheel', 99, './assets/css/img/Car_accessories/volang.jpg'),
    ('Wheel', 99, './assets/css/img/Car_accessories/banhxe.jpg'),
    ('Clutches', 19, './assets/css/img/Car_accessories/banhrang.jpg');
INSERT INTO doorstepservice(Name) 
VALUES
							('Oil Change'),
                            ('Battery Testing'),
                            ('Car Washing')
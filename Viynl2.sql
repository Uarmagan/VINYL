


CREATE TABLE owner(
fName		CHAR(20) NOT NULL,
lName		CHAR(20) NOT NULL,
address		CHAR(40) NOT NULL,
Email		CHAR(20) NOT NULL,
password    CHAR(40) NOT NULL,
ownerID		INT NOT NULL AUTO_INCREMENT,


PRIMARY KEY(ownerID)


);


CREATE TABLE store(

storeID			INT NOT NULL AUTO_INCREMENT,
storeName		CHAR(20) NOT NULL,
storeAddress	CHAR(20) NOT NULL,
description 	CHAR(50) NOT NULL,
ownerID			INT NOT NULL,

PRIMARY KEY(storeID),
FOREIGN KEY(ownerID)
	REFERENCES owner(ownerID)

);


CREATE TABLE inventory(

inventoryID     INT NOT NULL AUTO_INCREMENT,
albumName		CHAR(20) NOT NULL,
artistName		CHAR(20) NOT NULL,
cost 			INT NOT Null,
quantity 		INT NOT NULL,


PRIMARY KEY(inventoryID)


);

CREATE TABLE storeInventory(
storeInventoryID	INT NOT NULL,
storeID 			INT NOT NULL,
inventoryID			INT NOT NULL,

PRIMARY KEY(storeInventoryID),

FOREIGN KEY(storeID)
	REFERENCES store(storeID),

FOREIGN KEY(inventoryID)
	REFERENCES inventory(inventoryID)

);

/* CUSTOMER */

CREATE TABLE customer(
fName			CHAR(20) NOT NULL,
lName			CHAR(20) NOT NULL,
address 		CHAR(20) NOT NULL,
email 			CHAR(20) NOT NULL,
password		CHAR(40) NOT NULL,
customerID		INT NOT NULL AUTO_INCREMENT, 


PRIMARY KEY(customerID)
);


CREATE TABLE orders (
orderID			INT NOT NULL AUTO_INCREMENT,
orderDate		DATE NOT NULL, 
customerID 		INT NOT NULL,

PRIMARY KEY(orderID),


FOREIGN KEY(customerID)
	REFERENCES customer(customerID)


);


CREATE TABLE orderItem(

orderItemID		INT NOT NULL AUTO_INCREMENT,
ordersID 		INT NOT NULL,
inventoryID 	INT NOT NULL,

PRIMARY KEY(orderItemID),


FOREIGN KEY(ordersID)
	REFERENCES orders(orderID),

FOREIGN KEY(inventoryID)
	REFERENCES inventory(inventoryID)

);


CREATE TABLE Review(

reviewID 		INT NOT Null AUTO_INCREMENT,
customerID 		INT NOT NULL,
comment			CHAR(250) NOT NULL,
stareRating		INT NOT NULL,

PRIMARY KEY(reviewID),

FOREIGN KEY(customerID)
	REFERENCES customer(customerID)

);


CREATE TABLE Feedback(

FeedbackID 		INT NOT Null AUTO_INCREMENT,
storeID			INT NOT NULL,
reviewID		INT NOT NULL,

PRIMARY KEY(FeedbackID),

FOREIGN KEY(storeID)
	REFERENCES store(storeID),

FOREIGN KEY(reviewID)
	REFERENCES Review(reviewID) 



);










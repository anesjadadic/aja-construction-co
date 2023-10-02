create database Company;
use Company;

CREATE TABLE Customer (
	custID			int(6) 		PRIMARY KEY,
	lastName		char(20) 	NOT NULL,
    firstName       char(20)    NOT NULL,
	street			char(20) 	NOT NULL,
	city			char(20) 	NOT NULL,
	state			char(2) 	NOT NULL,
	phone			char(10) 	NOT NULL) ENGINE = InnoDB;

CREATE TABLE Project (
	projID 			int(6) 		PRIMARY KEY,
	startDate 		date		NOT NULL,
	custID			int(6)		NOT NULL,
	estEndDate 		date		NOT NULL,
	estCost 		int(6),
	actualEndDate 	date,
	street 			char(20)	NOT NULL,
	city 			char(20)	NOT NULL,
	state 			char(20)	NOT NULL,
    description		char(50),
	finalPrice 		int(6),
	CONSTRAINT Project_custID_fk FOREIGN KEY (custID) REFERENCES Customer(custID));

CREATE TABLE Employee (
	empID 			int(3) 		PRIMARY KEY,
	lastName 		char(20)	NOT NULL,
	firstName 		char(20)	NOT NULL,
	salaryPerHour 	int(2)		NOT NULL,
	specialty 		char(20)	NOT NULL,
	street 			char(20)	NOT NULL,
	city 			char(20)	NOT NULL,
	state 			char(20)	NOT NULL,
    phone 			char(10)    NOT NULL) ENGINE = InnoDB;

CREATE TABLE Material (
	matName			char(30) 	NOT NULL,
    prodID			int(6)		NOT NULL,
    supName 		char(20) 	NOT NULL,
    matType			char(20)	NOT NULL,
    price			float(6) 		NOT NULL,
    CONSTRAINT Material_prodID_pk PRIMARY KEY (prodID)); 


CREATE TABLE MaterialOnProject (
	prodID			int(6)		NOT NULL,
	projID			int(6)		NOT NULL,
	quantity		int(4)		NOT NULL,
	CONSTRAINT MaterialOnProject_prodID_projID_pk PRIMARY KEY (prodID, projID),
	CONSTRAINT MaterialOnProject_prodID_fk FOREIGN KEY (prodID) REFERENCES Material (prodID),
	CONSTRAINT MaterialOnProject_projID_fk FOREIGN KEY (projID) REFERENCES Project (projID));

CREATE TABLE Supplier (
	storeId			char(15)	PRIMARY KEY,
    supName			char(20) 	NOT NULL,
    street 			char(20),
    city			char(20),
    state			char(2)) ENGINE = InnoDB;
	
CREATE TABLE Tool (
	modelNumber		char(15) 	PRIMARY KEY,
	toolName		char(30) 	NOT NULL,
	brand			char(20) 	NOT NULL) ENGINE = InnoDB;

CREATE TABLE Job (
	jobID			int(6) 		PRIMARY KEY,
	jobType			char(30) 	NOT NULL,
	description		char(200) 	NOT NULL) ENGINE = InnoDB;

CREATE TABLE EmployeeToProject (
	empID			int(3),
    projID			int(6),
    hours			int(3),
    CONSTRAINT EmployeeToProject_empID_projID_pk PRIMARY KEY (empID, projID),
    CONSTRAINT EmployeeToProject_empID_fk FOREIGN KEY (empID) REFERENCES Employee (empID),
    CONSTRAINT EmployeeToProject_projID_fk FOREIGN KEY (projID) REFERENCES Project (projID));

CREATE TABLE ToolToJob (
	jobID			int(6)		NOT NULL,
	modelNumber		char(15)		NOT NULL,
	CONSTRAINT ToolToJob_jobID_modelNumber_pk PRIMARY KEY (jobID, modelNumber),
	CONSTRAINT ToolToJob_jobID_fk FOREIGN KEY (jobID) REFERENCES Job (jobID),
	CONSTRAINT ToolToJob_modelNumber_fk FOREIGN KEY (modelNumber) REFERENCES Tool (modelNumber));
    
    CREATE TABLE jobToProject (
    projID	int(6) NOT NULL,
    jobID   int(6) NOT NULL,
    CONSTRAINT jobToProject_projID_fk FOREIGN KEY (projID) REFERENCES project(projID),
    CONSTRAINT jobToProject_jobID_fk FOREIGN KEY (jobID) REFERENCES job(jobID));

INSERT INTO Customer VALUES (100101 , 'Swanson', 'Joe', '11 Strawberry St', 'New Rochelle', 'NY','3476569054');
INSERT INTO Customer VALUES (100102 , 'Griffon', 'Peter', '5 Easy Ln', 'White Plains', 'NY','3471122216');
INSERT INTO Customer VALUES (100103 , 'Arch', 'David', '54 Concord Ave', 'Mt. Kisco', 'NY','9149903418');
INSERT INTO Customer VALUES (100104 , 'Turner', 'Logan', '6598 Central Ave', 'Yonkers', 'NY','3475545001');
INSERT INTO Customer VALUES (100105 , 'White', 'Michelle', '31 Eastview St', 'White Plains', 'NY','6467821238');
INSERT INTO Customer VALUES (100106 , 'Romero', 'Jacob', '475 Seacord St', 'Scarsdale', 'NY', '9147584939');
INSERT INTO Customer VALUES (100107 , 'Miller', 'Joel', '67 Broad St', 'Mt. Kisco', 'NY', '9145758493');

INSERT INTO Project VALUES (201, '2022-07-05', 100101, '2022-07-15', 25000, '2022-07-14', '11 Strawberry St', 'New Rochelle', 'NY', 'Roofing', 22000);
INSERT INTO Project VALUES (202, '2022-07-15', 100102, '2022-07-20', 7000, '2022-07-20', '5 Easy Ln', 'White Plains', 'NY','Sheetrocking and Painting', 7500);
INSERT INTO Project VALUES (203, '2022-07-20', 100103, '2022-08-05', 20500, '2022-07-30', '54 Concord Ave', 'Mt. Kisco', 'NY', 'Roofing and Gutters', 20000);
INSERT INTO Project VALUES (204, '2022-08-05', 100104, '2022-09-10', 60500, '2022-09-14', '6598 Central Ave', 'Yonkers', 'NY', 'Decking, Balcony, Door Installation', 61500);
INSERT INTO Project VALUES (205, '2022-09-15', 100105, '2022-09-16', 2500, '2022-09-16', '31 Eastview St', 'White Plains', 'NY', 'Kitchen Tiling', 2400);
INSERT INTO Project VALUES (206, '2022-09-17', 100106, '2022-10-20', 20000, '2022-10-20', '475 Seacord St', 'Scarsdale', 'NY', 'Basement Renovation', 20500);
INSERT INTO Project VALUES (207, '2022-10-22', 100107, '2022-11-30', 25000, null, '67 Broad St', 'Mt. Kisco', 'NY', 'Bedroom addition, and roofing', null);

INSERT INTO Employee VALUES (101, 'Smith', 'John', 45, 'General Contractor', '45 North Central Ave', 'Yonkers', 'NY', '9143020022');
INSERT INTO Employee VALUES (102, 'Burns', 'Bill', 25, 'Carpentry', '84 Horseshoe Ln', 'Peekskill', 'NY', '8453829922');
INSERT INTO Employee VALUES (103, 'Lopez', 'Jose', 15, 'Carpentry Apprentice', '34 Main St', 'New Rochelle', 'NY', '9145647384');
INSERT INTO Employee VALUES (104, 'Williams', 'Jack', 30, 'Drywall/Taping', '3948 North Ave', 'New Rochelle', 'NY', '6315559203');
INSERT INTO Employee VALUES (105, 'Rivera', 'Abel', 25, 'Painting/Tiling', '9 Weaver St', 'Putnam Valley', 'NY', '9141035989');

INSERT INTO Material VALUES ('8ft 2x4 Stud', 161640, 'Home Depot', 'Framing', 3.75);
INSERT INTO Material VALUES ('8ft 2x6 Stud', 161713, 'Home Depot', 'Framing', 7.98);
INSERT INTO Material VALUES ('8ft 4x4 PT Post', '256276', 'Home Depot', 'Framing', 10.88);
INSERT INTO Material VALUES ('5/8 4 x 8 Plywood Sheet', 12242, 'Lowes', 'Framing', 33.27);
INSERT INTO Material VALUES ('Paslode Framing Nails', 524395, 'Lowes', 'Nails', 63.98);
INSERT INTO Material VALUES ('Paslode Plywood Nails', 517230, 'Home Depot', 'Nails', 65.98);
INSERT INTO Material VALUES ('Charcoal Gray Roof Shingles', 775276, 'Home Depot', 'Roofing', 41.50);
INSERT INTO Material VALUES ('Drywall Screws', 112276, 'Lowes', 'Screws', 49.98);
INSERT INTO Material VALUES ('1/2 Drywall Sheet', 210351, 'Lowes', 'Drywall', 15.38);
INSERT INTO Material VALUES ('Roofing Paper', 5008942, 'Ace Hardware', 'Roofing', 79.99);
INSERT INTO Material VALUES ('All Purpose Joint Compound', 12922, 'Ace Hardware', 'Drywall', 25.25);
INSERT INTO Material VALUES ('10ft Gutter', 279187, 'Lowes', 'Gutter', 5.98);
INSERT INTO Material VALUES ('All Purpose Primer', 14077, 'Home Depot', 'Paint', 23.98);
INSERT INTO Material VALUES ('BM White Interior Paint', 463, 'Wallauer', 'Paint', 48.54);
INSERT INTO Material VALUES ('Behr Brown Deck Paint', 1004120214, 'Home Depot', 'Paint', 44.98);
INSERT INTO Material VALUES ('16ft 2x6 PT  ', 1001753935, 'Home Depot', 'Framing', 15.98);
INSERT INTO Material VALUES ('2x6 Metal Hanger', 462152, 'Home Depot', 'Framing', 44.98);
INSERT INTO Material VALUES ('3inch Structural Screws', 517498, 'Home Depot', 'Framing', 26.87);
INSERT INTO Material VALUES ('Tile Mortar', 399775, 'Home Depot', 'Tiling', 19.98);
INSERT INTO Material VALUES ('Tiles 11.5 SQFT Bundle', 1005517416, 'Home Depot', 'Tiling', 80.84);

INSERT INTO MaterialOnProject VALUES (161713,201,10);
INSERT INTO MaterialOnProject VALUES (524395,201,2);
INSERT INTO MaterialOnProject VALUES (12242,201,15);
INSERT INTO MaterialOnProject VALUES (517230,201,15);
INSERT INTO MaterialOnProject VALUES (5008942,201,2);
INSERT INTO MaterialOnProject VALUES (279187,201,1);
INSERT INTO MaterialOnProject VALUES (462152,201,20);
INSERT INTO MaterialOnProject VALUES (775276,201,10);
INSERT INTO MaterialOnProject VALUES (517498,201,2);
INSERT INTO MaterialOnProject VALUES (112276,202,1);
INSERT INTO MaterialOnProject VALUES (210351,202,12);
INSERT INTO MaterialOnProject VALUES (12922,202,1);
INSERT INTO MaterialOnProject VALUES (14077,202,2);
INSERT INTO MaterialOnProject VALUES (463,202,2);
INSERT INTO MaterialOnProject VALUES (161713,203,15);
INSERT INTO MaterialOnProject VALUES (12242,203,10);
INSERT INTO MaterialOnProject VALUES (775276,203,10);
INSERT INTO MaterialOnProject VALUES (5008942,203,2);
INSERT INTO MaterialOnProject VALUES (279187,203,1);
INSERT INTO MaterialOnProject VALUES (462152,203,30);
INSERT INTO MaterialOnProject VALUES (524395,203,1);
INSERT INTO MaterialOnProject VALUES (256276,204,6);
INSERT INTO MaterialOnProject VALUES (524395,204,2);
INSERT INTO MaterialOnProject VALUES (1001753935,204,30);
INSERT INTO MaterialOnProject VALUES (1004120214,204,5);
INSERT INTO MaterialOnProject VALUES (462152,204,40);
INSERT INTO MaterialOnProject VALUES (517498,204,3);
INSERT INTO MaterialOnProject VALUES (399775,205,3);
INSERT INTO MaterialOnProject VALUES (1005517416,205,2);
INSERT INTO MaterialOnProject VALUES (161640,206,20);
INSERT INTO MaterialOnProject VALUES (524395,206,1);
INSERT INTO MaterialOnProject VALUES (112276,206,1);
INSERT INTO MaterialOnProject VALUES (210351,206,10);
INSERT INTO MaterialOnProject VALUES (12922,206,1);
INSERT INTO MaterialOnProject VALUES (14077,206,2);
INSERT INTO MaterialOnProject VALUES (463,206,2);
INSERT INTO MaterialOnProject VALUES (161640,207,10);
INSERT INTO MaterialOnProject VALUES (161713,207,18);
INSERT INTO MaterialOnProject VALUES (12242,207,16);
INSERT INTO MaterialOnProject VALUES (524395,207,1);
INSERT INTO MaterialOnProject VALUES (517230,207,1);
INSERT INTO MaterialOnProject VALUES (775276,207,12);
INSERT INTO MaterialOnProject VALUES (112276,207,1);
INSERT INTO MaterialOnProject VALUES (5008942,207,2);
INSERT INTO MaterialOnProject VALUES (12922,207,1);
INSERT INTO MaterialOnProject VALUES (14077,207,2);
INSERT INTO MaterialOnProject VALUES (463,207,2);
INSERT INTO MaterialOnProject VALUES (462152,207,36);
INSERT INTO MaterialOnProject VALUES (517498,207,3);

INSERT INTO Supplier VALUES ('AceHardwareYKTN' , 'Ace Hardware' , '3120 Lexington Ave' , 'Yorktown' , 'NY');
INSERT INTO Supplier VALUES ('HomeDepot8456' , 'Home Depot' , '1 Saw Mill River Rd' , 'Hawthorne' , 'NY');
INSERT INTO Supplier VALUES ('Lowes3360' , 'Lowes' , '3200 Crompond Rd' , 'Yorktown' , 'NY');
INSERT INTO Supplier VALUES ('HomeDepot1248' , 'Home Depot' , '601 South Sprain Rd' , 'Yonkers' , 'NY');
INSERT INTO Supplier VALUES ('Lowes3305' , 'Lowes' , '100 Ridgehill Blvd' , 'Yonkers' , 'NY');
 
INSERT INTO Tool VALUES ('271920', 'Sawzall', 'Milwaukee');
INSERT INTO Tool VALUES ('DCS391B', '6 1/2 Circular Saw', 'Dewalt');
INSERT INTO Tool VALUES ('285320', 'Impact Drill', 'Milwaukee');
INSERT INTO Tool VALUES ('273720', 'Jig Saw', 'Milwaukee');
INSERT INTO Tool VALUES ('CFN325XP', 'Framing Nailer', 'Paslode');
INSERT INTO Tool VALUES ('DCN45RND1', 'Roofing Nailer', 'Dewalt');
INSERT INTO Tool VALUES ('DCD777C2', 'Drill/Driver', 'Dewalt');
INSERT INTO Tool VALUES ('18PT0857', 'Joint Knife', 'Husky');
INSERT INTO Tool VALUES ('D1224-2', '24ft Extension Ladder', 'Werner');
INSERT INTO Tool VALUES ('R4031S', 'Tile Cutter', 'Rigid');
INSERT INTO Tool VALUES ('3830463', 'Paint Roller', 'Wagner');
INSERT INTO Tool VALUES ('1001713492', 'Sledgehammer', 'Husky');
INSERT INTO Tool VALUES ('1004797423', 'Floor Trowel', 'QEP');

INSERT INTO Job VALUES (010101,'Demolition','Demolish part of room/roof/house and clean up for renovation');
INSERT INTO Job VALUES (010102,'Roofing','Install new shingles to roof');
INSERT INTO Job VALUES (010103,'Framing','Install necessary framing to parts of house');
INSERT INTO Job VALUES (010104,'Tiling','Cutting and installing tiles');
INSERT INTO Job VALUES (010105,'Sheetrocking','Installing drywall');
INSERT INTO Job VALUES (010106,'Taping', 'Taping, Compound on Drywall');
INSERT INTO Job VALUES (010107, 'Painting', 'Priming, and Painting');

INSERT INTO ToolToJob VALUES ('010101', '271920');
INSERT INTO ToolToJob VALUES ('010101', 'DCN45RND1');
INSERT INTO ToolToJob VALUES ('010101', '1001713492');
INSERT INTO ToolToJob VALUES ('010102', 'D1224-2');
INSERT INTO ToolToJob VALUES ('010102','DCN45RND1');
INSERT INTO ToolToJob VALUES ('010103','DCS391B');
INSERT INTO ToolToJob VALUES ('010103','273720');
INSERT INTO ToolToJob VALUES ('010103','CFN325XP');
INSERT INTO ToolToJob VALUES ('010103','285320');
INSERT INTO ToolToJob VALUES ('010103','DCD777C2');
INSERT INTO ToolToJob VALUES ('010104','R4031S');
INSERT INTO ToolToJob VALUES ('010104','1004797423');
INSERT INTO ToolToJob VALUES ('010105','285320');
INSERT INTO ToolToJob VALUES ('010106','18PT0857');
INSERT INTO ToolToJob VALUES ('010107','3830463');

INSERT INTO EmployeeToProject VALUES (102, 201, 64);
INSERT INTO EmployeeToProject VALUES (102, 203, 128);
INSERT INTO EmployeeToProject VALUES (102, 204, 250);
INSERT INTO EmployeeToProject VALUES (102, 207, 152);
INSERT INTO EmployeeToProject VALUES (103, 201, 32);
INSERT INTO EmployeeToProject VALUES (103, 203, 64);
INSERT INTO EmployeeToProject VALUES (103, 204, 125);
INSERT INTO EmployeeToProject VALUES (103, 207, 76);
INSERT INTO EmployeeToProject VALUES (104, 202, 40);
INSERT INTO EmployeeToProject VALUES (104, 204, 150);
INSERT INTO EmployeeToProject VALUES (104, 206, 180);
INSERT INTO EmployeeToProject VALUES (104, 207, 128);
INSERT INTO EmployeeToProject VALUES (105, 202, 40);
INSERT INTO EmployeeToProject VALUES (105, 204, 16);
INSERT INTO EmployeeToProject VALUES (105, 205, 8);
INSERT INTO EmployeeToProject VALUES (105, 206, 100);
INSERT INTO EmployeeToProject VALUES (105, 207, 80);
	
INSERT INTO jobtoproject VALUES (201, 10101);
INSERT INTO jobtoproject VALUES (201, 10102);
INSERT INTO jobtoproject VALUES (201, 10103);
INSERT INTO jobtoproject VALUES (202, 10101);
INSERT INTO jobtoproject VALUES (202, 10105);
INSERT INTO jobtoproject VALUES (202, 10107);
INSERT INTO jobtoproject VALUES (203, 10101);
INSERT INTO jobtoproject VALUES (203, 10102);
INSERT INTO jobtoproject VALUES (203, 10103);
INSERT INTO jobtoproject VALUES (204, 10101);
INSERT INTO jobtoproject VALUES (204, 10103);
INSERT INTO jobtoproject VALUES (204, 10106);
INSERT INTO jobtoproject VALUES (204, 10107);
INSERT INTO jobtoproject VALUES (205, 10101);
INSERT INTO jobtoproject VALUES (205, 10104);
INSERT INTO jobtoproject VALUES (206, 10101);
INSERT INTO jobtoproject VALUES (206, 10103);
INSERT INTO jobtoproject VALUES (206, 10104);
INSERT INTO jobtoproject VALUES (206, 10105);
INSERT INTO jobtoproject VALUES (206, 10106);
INSERT INTO jobtoproject VALUES (206, 10107);
INSERT INTO jobtoproject VALUES (207, 10101);
INSERT INTO jobtoproject VALUES (207, 10102);
INSERT INTO jobtoproject VALUES (207, 10103);
INSERT INTO jobtoproject VALUES (207, 10105);
INSERT INTO jobtoproject VALUES (207, 10106);
INSERT INTO jobtoproject VALUES (207, 10107);
create database Company;
use Company;

CREATE TABLE Customer (
	custID			int(6) 		PRIMARY KEY,
	lastName		char(20) 	NOT NULL,
    firstName       char(20)    NOT NULL,
	street			char(20) 	NOT NULL,
	city			char(20) 	NOT NULL,
	state			char(2) 	NOT NULL,
	phone			char(10) 	NOT NULL) ENGINE = InnoDB;

CREATE TABLE Project (
	projID 			int(6) 		PRIMARY KEY,
	startDate 		date		NOT NULL,
	custID			int(6)		NOT NULL,
	estEndDate 		date		NOT NULL,
	estCost 		int(6),
	actualEndDate 	date,
	street 			char(20)	NOT NULL,
	city 			char(20)	NOT NULL,
	state 			char(20)	NOT NULL,
    description		char(50),
	finalPrice 		int(6),
	CONSTRAINT Project_custID_fk FOREIGN KEY (custID) REFERENCES Customer(custID));

CREATE TABLE Employee (
	empID 			int(3) 		PRIMARY KEY,
	lastName 		char(20)	NOT NULL,
	firstName 		char(20)	NOT NULL,
	salaryPerHour 	int(2)		NOT NULL,
	specialty 		char(20)	NOT NULL,
	street 			char(20)	NOT NULL,
	city 			char(20)	NOT NULL,
	state 			char(20)	NOT NULL,
    phone 			char(10)     NOT NULL) ENGINE = InnoDB;

CREATE TABLE Material (
	matName			char(30) 	NOT NULL,
    prodID			int(6)		NOT NULL,
    supName 		char(20) 	NOT NULL,
    matType			char(20)	NOT NULL,
    price			float(6) 		NOT NULL,
    CONSTRAINT Material_prodID_pk PRIMARY KEY (prodID)); 


CREATE TABLE MaterialOnProject (
	prodID			int(6)		NOT NULL,
	projID			int(6)		NOT NULL,
	quantity		int(4)		NOT NULL,
	CONSTRAINT MaterialOnProject_prodID_projID_pk PRIMARY KEY (prodID, projID),
	CONSTRAINT MaterialOnProject_prodID_fk FOREIGN KEY (prodID) REFERENCES Material (prodID),
	CONSTRAINT MaterialOnProject_projID_fk FOREIGN KEY (projID) REFERENCES Project (projID));

CREATE TABLE Supplier (
	storeId			char(15)	PRIMARY KEY,
    supName			char(20) 	NOT NULL,
    street 			char(20),
    city			char(20),
    state			char(2)) ENGINE = InnoDB;
	
CREATE TABLE Tool (
	modelNumber		char(15) 	PRIMARY KEY,
	toolName		char(30) 	NOT NULL,
	brand			char(20) 	NOT NULL) ENGINE = InnoDB;

CREATE TABLE Job (
	jobID			int(6) 		PRIMARY KEY,
	jobType			char(30) 	NOT NULL,
	description		char(200) 	NOT NULL) ENGINE = InnoDB;

CREATE TABLE EmployeeToProject (
	empID			int(3),
    projID			int(6),
    hours			int(3),
    CONSTRAINT EmployeeToProject_empID_projID_pk PRIMARY KEY (empID, projID),
    CONSTRAINT EmployeeToProject_empID_fk FOREIGN KEY (empID) REFERENCES Employee (empID),
    CONSTRAINT EmployeeToProject_projID_fk FOREIGN KEY (projID) REFERENCES Project (projID));

CREATE TABLE ToolToJob (
	jobID			int(6)		NOT NULL,
	modelNumber		char(15)		NOT NULL,
	CONSTRAINT ToolToJob_jobID_modelNumber_pk PRIMARY KEY (jobID, modelNumber),
	CONSTRAINT ToolToJob_jobID_fk FOREIGN KEY (jobID) REFERENCES Job (jobID),
	CONSTRAINT ToolToJob_modelNumber_fk FOREIGN KEY (modelNumber) REFERENCES Tool (modelNumber));
    
    CREATE TABLE jobToProject (
    projID	int(6) NOT NULL,
    jobID   int(6) NOT NULL,
    CONSTRAINT jobToProject_projID_fk FOREIGN KEY (projID) REFERENCES project(projID),
    CONSTRAINT jobToProject_jobID_fk FOREIGN KEY (jobID) REFERENCES job(jobID));

INSERT INTO Customer VALUES (100101 , 'Swanson', 'Joe', '11 Strawberry St', 'New Rochelle', 'NY','3476569054');
INSERT INTO Customer VALUES (100102 , 'Griffon', 'Peter', '5 Easy Ln', 'White Plains', 'NY','3471122216');
INSERT INTO Customer VALUES (100103 , 'Arch', 'David', '54 Concord Ave', 'Mt. Kisco', 'NY','9149903418');
INSERT INTO Customer VALUES (100104 , 'Turner', 'Logan', '6598 Central Ave', 'Yonkers', 'NY','3475545001');
INSERT INTO Customer VALUES (100105 , 'White', 'Michelle', '31 Eastview St', 'White Plains', 'NY','6467821238');
INSERT INTO Customer VALUES (100106 , 'Romero', 'Jacob', '475 Seacord St', 'Scarsdale', 'NY', '9147584939');
INSERT INTO Customer VALUES (100107 , 'Miller', 'Joel', '67 Broad St', 'Mt. Kisco', 'NY', '9145758493');

INSERT INTO Project VALUES (201, '2022-07-05', 100101, '2022-07-15', 25000, '2022-07-14', '11 Strawberry St', 'New Rochelle', 'NY', 'Roofing', 22000);
INSERT INTO Project VALUES (202, '2022-07-15', 100102, '2022-07-20', 7000, '2022-07-20', '5 Easy Ln', 'White Plains', 'NY','Sheetrocking and Painting', 7500);
INSERT INTO Project VALUES (203, '2022-07-20', 100103, '2022-08-05', 20500, '2022-07-30', '54 Concord Ave', 'Mt. Kisco', 'NY', 'Roofing and Gutters', 20000);
INSERT INTO Project VALUES (204, '2022-08-05', 100104, '2022-09-10', 60500, '2022-09-14', '6598 Central Ave', 'Yonkers', 'NY', 'Decking, Balcony, Door Installation', 61500);
INSERT INTO Project VALUES (205, '2022-09-15', 100105, '2022-09-16', 2500, '2022-09-16', '31 Eastview St', 'White Plains', 'NY', 'Kitchen Tiling', 2400);
INSERT INTO Project VALUES (206, '2022-09-17', 100106, '2022-10-20', 20000, '2022-10-20', '475 Seacord St', 'Scarsdale', 'NY', 'Basement Renovation', 20500);
INSERT INTO Project VALUES (207, '2022-10-22', 100107, '2022-11-30', 25000, null, '67 Broad St', 'Mt. Kisco', 'NY', 'Bedroom addition, and roofing', null);

INSERT INTO Employee VALUES (101, 'Smith', 'John', 45, 'General Contractor', '45 North Central Ave', 'Yonkers', 'NY', '9143020022');
INSERT INTO Employee VALUES (102, 'Burns', 'Bill', 25, 'Carpentry', '84 Horseshoe Ln', 'Peekskill', 'NY', '8453829922');
INSERT INTO Employee VALUES (103, 'Lopez', 'Jose', 15, 'Carpentry Apprentice', '34 Main St', 'New Rochelle', 'NY', '9145647384');
INSERT INTO Employee VALUES (104, 'Williams', 'Jack', 30, 'Drywall/Taping', '3948 North Ave', 'New Rochelle', 'NY', '6315559203');
INSERT INTO Employee VALUES (105, 'Rivera', 'Abel', 25, 'Painting/Tiling', '9 Weaver St', 'Putnam Valley', 'NY', '9141035989');

INSERT INTO Material VALUES ('8ft 2x4 Stud', 161640, 'Home Depot', 'Framing', 3.75);
INSERT INTO Material VALUES ('8ft 2x6 Stud', 161713, 'Home Depot', 'Framing', 7.98);
INSERT INTO Material VALUES ('8ft 4x4 PT Post', '256276', 'Home Depot', 'Framing', 10.88);
INSERT INTO Material VALUES ('5/8 4 x 8 Plywood Sheet', 12242, 'Lowes', 'Framing', 33.27);
INSERT INTO Material VALUES ('Paslode Framing Nails', 524395, 'Lowes', 'Nails', 63.98);
INSERT INTO Material VALUES ('Paslode Plywood Nails', 517230, 'Home Depot', 'Nails', 65.98);
INSERT INTO Material VALUES ('Charcoal Gray Roof Shingles', 775276, 'Home Depot', 'Roofing', 41.50);
INSERT INTO Material VALUES ('Drywall Screws', 112276, 'Lowes', 'Screws', 49.98);
INSERT INTO Material VALUES ('1/2 Drywall Sheet', 210351, 'Lowes', 'Drywall', 15.38);
INSERT INTO Material VALUES ('Roofing Paper', 5008942, 'Ace Hardware', 'Roofing', 79.99);
INSERT INTO Material VALUES ('All Purpose Joint Compound', 12922, 'Ace Hardware', 'Drywall', 25.25);
INSERT INTO Material VALUES ('10ft Gutter', 279187, 'Lowes', 'Gutter', 5.98);
INSERT INTO Material VALUES ('All Purpose Primer', 14077, 'Home Depot', 'Paint', 23.98);
INSERT INTO Material VALUES ('BM White Interior Paint', 463, 'Wallauer', 'Paint', 48.54);
INSERT INTO Material VALUES ('Behr Brown Deck Paint', 1004120214, 'Home Depot', 'Paint', 44.98);
INSERT INTO Material VALUES ('16ft 2x6 PT  ', 1001753935, 'Home Depot', 'Framing', 15.98);
INSERT INTO Material VALUES ('2x6 Metal Hanger', 462152, 'Home Depot', 'Framing', 44.98);
INSERT INTO Material VALUES ('3inch Structural Screws', 517498, 'Home Depot', 'Framing', 26.87);
INSERT INTO Material VALUES ('Tile Mortar', 399775, 'Home Depot', 'Tiling', 19.98);
INSERT INTO Material VALUES ('Tiles 11.5 SQFT Bundle', 1005517416, 'Home Depot', 'Tiling', 80.84);

INSERT INTO MaterialOnProject VALUES (161713,201,10);
INSERT INTO MaterialOnProject VALUES (524395,201,2);
INSERT INTO MaterialOnProject VALUES (12242,201,15);
INSERT INTO MaterialOnProject VALUES (517230,201,15);
INSERT INTO MaterialOnProject VALUES (5008942,201,2);
INSERT INTO MaterialOnProject VALUES (279187,201,1);
INSERT INTO MaterialOnProject VALUES (462152,201,20);
INSERT INTO MaterialOnProject VALUES (775276,201,10);
INSERT INTO MaterialOnProject VALUES (517498,201,2);
INSERT INTO MaterialOnProject VALUES (112276,202,1);
INSERT INTO MaterialOnProject VALUES (210351,202,12);
INSERT INTO MaterialOnProject VALUES (12922,202,1);
INSERT INTO MaterialOnProject VALUES (14077,202,2);
INSERT INTO MaterialOnProject VALUES (463,202,2);
INSERT INTO MaterialOnProject VALUES (161713,203,15);
INSERT INTO MaterialOnProject VALUES (12242,203,10);
INSERT INTO MaterialOnProject VALUES (775276,203,10);
INSERT INTO MaterialOnProject VALUES (5008942,203,2);
INSERT INTO MaterialOnProject VALUES (279187,203,1);
INSERT INTO MaterialOnProject VALUES (462152,203,30);
INSERT INTO MaterialOnProject VALUES (524395,203,1);
INSERT INTO MaterialOnProject VALUES (256276,204,6);
INSERT INTO MaterialOnProject VALUES (524395,204,2);
INSERT INTO MaterialOnProject VALUES (1001753935,204,30);
INSERT INTO MaterialOnProject VALUES (1004120214,204,5);
INSERT INTO MaterialOnProject VALUES (462152,204,40);
INSERT INTO MaterialOnProject VALUES (517498,204,3);
INSERT INTO MaterialOnProject VALUES (399775,205,3);
INSERT INTO MaterialOnProject VALUES (1005517416,205,2);
INSERT INTO MaterialOnProject VALUES (161640,206,20);
INSERT INTO MaterialOnProject VALUES (524395,206,1);
INSERT INTO MaterialOnProject VALUES (112276,206,1);
INSERT INTO MaterialOnProject VALUES (210351,206,10);
INSERT INTO MaterialOnProject VALUES (12922,206,1);
INSERT INTO MaterialOnProject VALUES (14077,206,2);
INSERT INTO MaterialOnProject VALUES (463,206,2);
INSERT INTO MaterialOnProject VALUES (161640,207,10);
INSERT INTO MaterialOnProject VALUES (161713,207,18);
INSERT INTO MaterialOnProject VALUES (12242,207,16);
INSERT INTO MaterialOnProject VALUES (524395,207,1);
INSERT INTO MaterialOnProject VALUES (517230,207,1);
INSERT INTO MaterialOnProject VALUES (775276,207,12);
INSERT INTO MaterialOnProject VALUES (112276,207,1);
INSERT INTO MaterialOnProject VALUES (5008942,207,2);
INSERT INTO MaterialOnProject VALUES (12922,207,1);
INSERT INTO MaterialOnProject VALUES (14077,207,2);
INSERT INTO MaterialOnProject VALUES (463,207,2);
INSERT INTO MaterialOnProject VALUES (462152,207,36);
INSERT INTO MaterialOnProject VALUES (517498,207,3);

INSERT INTO Supplier VALUES ('AceHardwareYKTN' , 'Ace Hardware' , '3120 Lexington Ave' , 'Yorktown' , 'NY');
INSERT INTO Supplier VALUES ('HomeDepot8456' , 'Home Depot' , '1 Saw Mill River Rd' , 'Hawthorne' , 'NY');
INSERT INTO Supplier VALUES ('Lowes3360' , 'Lowes' , '3200 Crompond Rd' , 'Yorktown' , 'NY');
INSERT INTO Supplier VALUES ('HomeDepot1248' , 'Home Depot' , '601 South Sprain Rd' , 'Yonkers' , 'NY');
INSERT INTO Supplier VALUES ('Lowes3305' , 'Lowes' , '100 Ridgehill Blvd' , 'Yonkers' , 'NY');
 
INSERT INTO Tool VALUES ('271920', 'Sawzall', 'Milwaukee');
INSERT INTO Tool VALUES ('DCS391B', '6 1/2 Circular Saw', 'Dewalt');
INSERT INTO Tool VALUES ('285320', 'Impact Drill', 'Milwaukee');
INSERT INTO Tool VALUES ('273720', 'Jig Saw', 'Milwaukee');
INSERT INTO Tool VALUES ('CFN325XP', 'Framing Nailer', 'Paslode');
INSERT INTO Tool VALUES ('DCN45RND1', 'Roofing Nailer', 'Dewalt');
INSERT INTO Tool VALUES ('DCD777C2', 'Drill/Driver', 'Dewalt');
INSERT INTO Tool VALUES ('18PT0857', 'Joint Knife', 'Husky');
INSERT INTO Tool VALUES ('D1224-2', '24ft Extension Ladder', 'Werner');
INSERT INTO Tool VALUES ('R4031S', 'Tile Cutter', 'Rigid');
INSERT INTO Tool VALUES ('3830463', 'Paint Roller', 'Wagner');
INSERT INTO Tool VALUES ('1001713492', 'Sledgehammer', 'Husky');
INSERT INTO Tool VALUES ('1004797423', 'Floor Trowel', 'QEP');

INSERT INTO Job VALUES (010101,'Demolition','Demolish part of room/roof/house and clean up for renovation');
INSERT INTO Job VALUES (010102,'Roofing','Install new shingles to roof');
INSERT INTO Job VALUES (010103,'Framing','Install necessary framing to parts of house');
INSERT INTO Job VALUES (010104,'Tiling','Cutting and installing tiles');
INSERT INTO Job VALUES (010105,'Sheetrocking','Installing drywall');
INSERT INTO Job VALUES (010106,'Taping', 'Taping, Compound on Drywall');
INSERT INTO Job VALUES (010107, 'Painting', 'Priming, and Painting');

INSERT INTO ToolToJob VALUES ('010101', '271920');
INSERT INTO ToolToJob VALUES ('010101', 'DCN45RND1');
INSERT INTO ToolToJob VALUES ('010101', '1001713492');
INSERT INTO ToolToJob VALUES ('010102', 'D1224-2');
INSERT INTO ToolToJob VALUES ('010102','DCN45RND1');
INSERT INTO ToolToJob VALUES ('010103','DCS391B');
INSERT INTO ToolToJob VALUES ('010103','273720');
INSERT INTO ToolToJob VALUES ('010103','CFN325XP');
INSERT INTO ToolToJob VALUES ('010103','285320');
INSERT INTO ToolToJob VALUES ('010103','DCD777C2');
INSERT INTO ToolToJob VALUES ('010104','R4031S');
INSERT INTO ToolToJob VALUES ('010104','1004797423');
INSERT INTO ToolToJob VALUES ('010105','285320');
INSERT INTO ToolToJob VALUES ('010106','18PT0857');
INSERT INTO ToolToJob VALUES ('010107','3830463');

INSERT INTO EmployeeToProject VALUES (102, 201, 64);
INSERT INTO EmployeeToProject VALUES (102, 203, 128);
INSERT INTO EmployeeToProject VALUES (102, 204, 250);
INSERT INTO EmployeeToProject VALUES (102, 207, 152);
INSERT INTO EmployeeToProject VALUES (103, 201, 32);
INSERT INTO EmployeeToProject VALUES (103, 203, 64);
INSERT INTO EmployeeToProject VALUES (103, 204, 125);
INSERT INTO EmployeeToProject VALUES (103, 207, 76);
INSERT INTO EmployeeToProject VALUES (104, 202, 40);
INSERT INTO EmployeeToProject VALUES (104, 204, 150);
INSERT INTO EmployeeToProject VALUES (104, 206, 180);
INSERT INTO EmployeeToProject VALUES (104, 207, 128);
INSERT INTO EmployeeToProject VALUES (105, 202, 40);
INSERT INTO EmployeeToProject VALUES (105, 204, 16);
INSERT INTO EmployeeToProject VALUES (105, 205, 8);
INSERT INTO EmployeeToProject VALUES (105, 206, 100);
INSERT INTO EmployeeToProject VALUES (105, 207, 80);
	
INSERT INTO jobtoproject VALUES (201, 10101);
INSERT INTO jobtoproject VALUES (201, 10102);
INSERT INTO jobtoproject VALUES (201, 10103);
INSERT INTO jobtoproject VALUES (202, 10101);
INSERT INTO jobtoproject VALUES (202, 10105);
INSERT INTO jobtoproject VALUES (202, 10107);
INSERT INTO jobtoproject VALUES (203, 10101);
INSERT INTO jobtoproject VALUES (203, 10102);
INSERT INTO jobtoproject VALUES (203, 10103);
INSERT INTO jobtoproject VALUES (204, 10101);
INSERT INTO jobtoproject VALUES (204, 10103);
INSERT INTO jobtoproject VALUES (204, 10106);
INSERT INTO jobtoproject VALUES (204, 10107);
INSERT INTO jobtoproject VALUES (205, 10101);
INSERT INTO jobtoproject VALUES (205, 10104);
INSERT INTO jobtoproject VALUES (206, 10101);
INSERT INTO jobtoproject VALUES (206, 10103);
INSERT INTO jobtoproject VALUES (206, 10104);
INSERT INTO jobtoproject VALUES (206, 10105);
INSERT INTO jobtoproject VALUES (206, 10106);
INSERT INTO jobtoproject VALUES (206, 10107);
INSERT INTO jobtoproject VALUES (207, 10101);
INSERT INTO jobtoproject VALUES (207, 10102);
INSERT INTO jobtoproject VALUES (207, 10103);
INSERT INTO jobtoproject VALUES (207, 10105);
INSERT INTO jobtoproject VALUES (207, 10106);
INSERT INTO jobtoproject VALUES (207, 10107);

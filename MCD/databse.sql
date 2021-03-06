CREATE TABLE Users(
   userId VARCHAR(50) ,
   cp VARCHAR(50) ,
   city VARCHAR(50) ,
   rue VARCHAR(50) ,
   firstName VARCHAR(50)  NOT NULL,
   lastName VARCHAR(50)  NOT NULL,
   phone VARCHAR(50)  NOT NULL,
   email VARCHAR(50)  NOT NULL,
   password VARCHAR(256) ,
   isAdmin INT,
   comment VARCHAR(256) ,
   PRIMARY KEY(userId)
);

CREATE TABLE Species(
   speciesId INT,
   speciesName VARCHAR(50)  NOT NULL,
   PRIMARY KEY(speciesId)
);

CREATE TABLE Race(
   raceId INT,
   raceName VARCHAR(50)  NOT NULL,
   speciesId INT NOT NULL,
   PRIMARY KEY(raceId),
   FOREIGN KEY(speciesId) REFERENCES Species(speciesId)
);

CREATE TABLE TimeSlotType(
   typeId INT,
   typeName VARCHAR(50)  NOT NULL,
   PRIMARY KEY(typeId)
);

CREATE TABLE GenderStatus(
   genderId INT,
   genderName VARCHAR(50)  NOT NULL,
   PRIMARY KEY(genderId)
);

CREATE TABLE Threat(
   ThreatId INT,
   ThreatName VARCHAR(50)  NOT NULL,
   PRIMARY KEY(ThreatId)
);

CREATE TABLE Products(
   productId INT,
   productName VARCHAR(50)  NOT NULL,
   quantity INT,
   quantityLimit INT NOT NULL,
   PRIMARY KEY(productId)
);

CREATE TABLE Command(
   commandId VARCHAR(50) ,
   commandPrice DECIMAL(15,2)   NOT NULL,
   commandDate DATE,
   PRIMARY KEY(commandId)
);

CREATE TABLE News(
   newsId INT,
   title VARCHAR(50)  NOT NULL,
   content TEXT NOT NULL,
   dateNews DATE NOT NULL,
   userId VARCHAR(50)  NOT NULL,
   PRIMARY KEY(newsId),
   FOREIGN KEY(userId) REFERENCES Users(userId)
);

CREATE TABLE Animal(
   animalId VARCHAR(50) ,
   name VARCHAR(50) ,
   birthDay DATE NOT NULL,
   deathDay VARCHAR(50) ,
   comment VARCHAR(256) ,
   userId VARCHAR(50)  NOT NULL,
   ThreatId INT NOT NULL,
   genderId INT NOT NULL,
   raceId INT NOT NULL,
   PRIMARY KEY(animalId),
   FOREIGN KEY(userId) REFERENCES Users(userId),
   FOREIGN KEY(ThreatId) REFERENCES Threat(ThreatId),
   FOREIGN KEY(genderId) REFERENCES GenderStatus(genderId),
   FOREIGN KEY(raceId) REFERENCES Race(raceId)
);

CREATE TABLE Meeting(
   meetingId VARCHAR(50) ,
   meetingDate DATE NOT NULL,
   isPayed INT NOT NULL,
   price DECIMAL(25,2)  ,
   userId VARCHAR(50)  NOT NULL,
   animalId VARCHAR(50)  NOT NULL,
   PRIMARY KEY(meetingId),
   FOREIGN KEY(userId) REFERENCES Users(userId),
   FOREIGN KEY(animalId) REFERENCES Animal(animalId)
);

CREATE TABLE TimeSlot(
   timeSlotId INT,
   startHour TIME,
   endHour TIME,
   dayName VARCHAR(50)  NOT NULL,
   typeId INT NOT NULL,
   PRIMARY KEY(timeSlotId),
   FOREIGN KEY(typeId) REFERENCES TimeSlotType(typeId)
);

CREATE TABLE Concern(
   meetingId VARCHAR(50) ,
   timeSlotId INT,
   PRIMARY KEY(meetingId, timeSlotId),
   FOREIGN KEY(meetingId) REFERENCES Meeting(meetingId),
   FOREIGN KEY(timeSlotId) REFERENCES TimeSlot(timeSlotId)
);

CREATE TABLE Content(
   productId INT,
   commandId VARCHAR(50) ,
   quantity INT NOT NULL,
   PRIMARY KEY(productId, commandId),
   FOREIGN KEY(productId) REFERENCES Products(productId),
   FOREIGN KEY(commandId) REFERENCES Command(commandId)
);

CREATE TABLE Horaire(
   userId VARCHAR(50) ,
   timeSlotId INT,
   PRIMARY KEY(userId, timeSlotId),
   FOREIGN KEY(userId) REFERENCES Users(userId),
   FOREIGN KEY(timeSlotId) REFERENCES TimeSlot(timeSlotId)
);

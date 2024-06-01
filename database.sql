-- create database College_Management_System;

-- drop database College_Management_System; 

-- use College_Management_System; 

CREATE TABLE Student (
    ROLL_NO varchar(10) PRIMARY KEY,
    ROOM_NO int,
	PASSWORD varchar(40),
    SNAME VARCHAR(50),
    GENDER varchar(20),
    DOB DATE,
    BRANCH VARCHAR(50),
    EMAIL_ID VARCHAR(50),
    SEMESTER INT,
    S_PNUMBER VARCHAR(15),
    FNAME VARCHAR(50),
    F_PNUMBER VARCHAR(15),
    STREET_ADDRESS VARCHAR(50),
    PIN_CODE VARCHAR(20),
    CITY VARCHAR(50),
    STATE VARCHAR(20)
);
-- Insert data into the Student table
INSERT INTO Student (ROLL_NO, ROOM_NO, PASSWORD, SNAME, GENDER, DOB, BRANCH, EMAIL_ID, SEMESTER, S_PNUMBER, FNAME, F_PNUMBER, STREET_ADDRESS, PIN_CODE, CITY, STATE)
VALUES 
-- Semester 1 Computer Science Engineering students
('2201001', 101, 'pass123', 'Rahul Sharma', 'Male', '2002-05-10', 'Computer Science Engineering', 'rahul@example.com', 1, '9876543210', 'Amit Sharma', '9876543211', '123, ABC Street', '123456', 'Delhi', 'Delhi'),
('2201002', 102, 'pass456', 'Priya Patel', 'Female', '2001-08-15', 'Computer Science Engineering', 'priya@example.com', 1, '9876543211', 'Rajesh Patel', '9876543212', '456, XYZ Street', '456789', 'Mumbai', 'Maharashtra'),
('2201003', 103, 'pass789', 'Amit Kumar', 'Male', '2001-11-20', 'Computer Science Engineering', 'amit@example.com', 1, '9876543212', 'Sanjay Kumar', '9876543213', '789, PQR Street', '789012', 'Bangalore', 'Karnataka'),
('2201004', 104, 'pass101112', 'Neha Singh', 'Female', '2002-03-25', 'Computer Science Engineering', 'neha@example.com', 1, '9876543213', 'Ravi Singh', '9876543214', '1010, LMN Street', '101112', 'Kolkata', 'West Bengal'),
('2201005', 105, 'pass131415', 'Manish Gupta', 'Male', '2001-06-30', 'Computer Science Engineering', 'manish@example.com', 1, '9876543214', 'Suresh Gupta', '9876543215', '1115, XYZ Street', '131415', 'Chennai', 'Tamil Nadu'),
('2201006', 106, 'pass161718', 'Deepika Singh', 'Female', '2001-09-05', 'Computer Science Engineering', 'deepika@example.com', 1, '9876543215', 'Alok Singh', '9876543216', '1216, HIJ Street', '161718', 'Hyderabad', 'Telangana'),
('2201007', 107, 'pass192021', 'Kiran Kumar', 'Male', '2002-04-15', 'Computer Science Engineering', 'kiran@example.com', 1, '9876543216', 'Sunil Kumar', '9876543217', '1319, OPQ Street', '192021', 'Pune', 'Maharashtra'),
('2201008', 108, 'pass222324', 'Divya Gupta', 'Female', '2002-07-20', 'Computer Science Engineering', 'divya@example.com', 1, '9876543217', 'Raj Gupta', '9876543218', '1420, RST Street', '222324', 'Jaipur', 'Rajasthan'),
('2201009', 109, 'pass252627', 'Rajesh Verma', 'Male', '2002-02-25', 'Computer Science Engineering', 'rajesh@example.com', 1, '9876543218', 'Sanjay Verma', '9876543219', '1527, UVW Street', '252627', 'Ahmedabad', 'Gujarat'),
('2201010', 110, 'pass282930', 'Anjali Mishra', 'Female', '2001-05-30', 'Computer Science Engineering', 'anjali@example.com', 1, '9876543220', 'Vijay Mishra', '9876543221', '1630, XYZ Street', '282930', 'Lucknow', 'Uttar Pradesh'),
('2201011', 111, 'pass313233', 'Suresh Sharma', 'Male', '2002-06-30', 'Electronics and Communication Engineering', 'suresh@example.com', 1, '9876543221', 'Anil Sharma', '9876543222', '1711, EFG Street', '313233', 'Surat', 'Gujarat'),
('2201012', 112, 'pass343536', 'Deepika Singh', 'Female', '2001-09-05', 'Electronics and Communication Engineering', 'deepika@example.com', 1, '9876543222', 'Alok Singh', '9876543223', '1812, HIJ Street', '343536', 'Nagpur', 'Maharashtra'),
('2201013', 113, 'pass373839', 'Kiran Kumar', 'Male', '2002-04-15', 'Electronics and Communication Engineering', 'kiran@example.com', 1, '9876543223', 'Sunil Kumar', '9876543224', '1913, OPQ Street', '373839', 'Pune', 'Maharashtra'),
('2201014', 114, 'pass404142', 'Divya Gupta', 'Female', '2002-07-20', 'Electronics and Communication Engineering', 'divya@example.com', 1, '9876543224', 'Raj Gupta', '9876543225', '2014, RST Street', '404142', 'Jaipur', 'Rajasthan'),
('2201015', 115, 'pass434445', 'Rajesh Verma', 'Male', '2002-02-25', 'Electronics and Communication Engineering', 'rajesh@example.com', 1, '9876543225', 'Sanjay Verma', '9876543226', '2115, UVW Street', '434445', 'Ahmedabad', 'Gujarat'),
('2201016', 116, 'pass464748', 'Anjali Mishra', 'Female', '2001-05-30', 'Electronics and Communication Engineering', 'anjali@example.com', 1, '9876543226', 'Vijay Mishra', '9876543227', '2216, XYZ Street', '464748', 'Lucknow', 'Uttar Pradesh'),
('2201017', 117, 'pass495051', 'Suresh Sharma', 'Male', '2002-06-30', 'Electronics and Communication Engineering', 'suresh@example.com', 1, '9876543227', 'Anil Sharma', '9876543228', '2317, EFG Street', '495051', 'Surat', 'Gujarat'),
('2201018', 118, 'pass525354', 'Deepika Singh', 'Female', '2001-07-23','Electronics and Communication Engineering','rakesh@example.com',1,'9876543228','Krish Sahu', '9876543229','3020, GCE Street','493801','Lucknow','Uttar Pradesh'),
('2201019', 119, 'pass555657', 'Kiran Kumar', 'Male', '2002-04-15', 'Electronics and Communication Engineering', 'kiran@example.com', 1, '9876543228', 'Sunil Kumar', '9876543229', '2419, OPQ Street', '555657', 'Pune', 'Maharashtra'),
('2201020', 120, 'pass595960', 'Divya Gupta', 'Female', '2002-07-20', 'Electronics and Communication Engineering', 'divya@example.com', 1, '9876543229', 'Raj Gupta', '9876543230', '2520, RST Street', '585960', 'Jaipur', 'Rajasthan'),
('2201021', 121, 'pass616263', 'Rajesh Verma', 'Male', '2002-02-25', 'Mathematics', 'rajesh@example.com', 1, '9876543230', 'Sanjay Verma', '9876543231', '2621, UVW Street', '616263', 'Ahmedabad', 'Gujarat'),
('2201022', 122, 'pass646566', 'Anjali Mishra', 'Female', '2001-05-30', 'Mathematics', 'anjali@example.com', 1, '9876543231', 'Vijay Mishra', '9876543232', '2722, XYZ Street', '646566', 'Lucknow', 'Uttar Pradesh'),
('2201023', 123, 'pass676869', 'Suresh Sharma', 'Male', '2002-06-30', 'Mathematics', 'suresh@example.com', 1, '9876543232', 'Anil Sharma', '9876543233', '2823, EFG Street', '676869', 'Surat', 'Gujarat'),
('2201024', 124, 'pass707172', 'Deepika Singh', 'Female', '2001-09-05', 'Mathematics', 'deepika@example.com', 1, '9876543233', 'Alok Singh', '9876543234', '2924, HIJ Street', '707172', 'Nagpur', 'Maharashtra'),
('2201025', 125, 'pass737475', 'Kiran Kumar', 'Male', '2002-04-15', 'Mathematics', 'kiran@example.com', 1, '9876543234', 'Sunil Kumar', '9876543235', '3025, OPQ Street', '737475', 'Pune', 'Maharashtra'),
('2201026', 126, 'pass767778', 'Divya Gupta', 'Female', '2002-07-20','Mathematics', 'divya@example.com', 1, '9876543235', 'Raj Gupta', '9876543236', '3126, RST Street', '767778', 'Jaipur', 'Rajasthan'),
('2201027', 127, 'pass111213', 'Kiran Kumar', 'Male', '2002-04-15', 'Mathematics', 'kiran@example.com', 1, '9876543245', 'Sunil Kumar', '9876543246', '4136, OPQ Street', '111213', 'Pune', 'Maharashtra'),
('2201028', 128, 'pass1145116', 'Divya Gupta', 'Female', '2002-07-20', 'Mathematics', 'divya@example.com', 1, '9876543246', 'Raj Gupta', '9876543247', '4237, RST Street', '114115116', 'Jaipur', 'Rajasthan'),
('2201029', 129, 'pass1178119', 'Rajesh Verma', 'Male', '2002-02-25', 'Mathematics', 'rajesh@example.com', 1, '9876543247', 'Sanjay Verma', '9876543248', '4338, UVW Street', '117118119', 'Ahmedabad', 'Gujarat'),
('2201030', 130, 'pass1201122', 'Anjali Mishra', 'Female', '2001-05-30', 'Mathematics', 'anjali@example.com', 1, '9876543248', 'Vijay Mishra', '9876543249', '4439, XYZ Street', '120121122', 'Lucknow', 'Uttar Pradesh'),
('2301001', 201, 'pass798081', 'Rajesh Verma', 'Male', '2002-02-25', 'Computer Science Engineering', 'rajesh@example.com', 3, '9876543236', 'Sanjay Verma', '9876543237', '3227, UVW Street', '798081', 'Ahmedabad', 'Gujarat'),
('2301002', 202, 'pass828384', 'Anjali Mishra', 'Female', '2001-05-30', 'Computer Science Engineering', 'anjali@example.com', 3, '9876543237', 'Vijay Mishra', '9876543238', '3328, XYZ Street', '828384', 'Lucknow', 'Uttar Pradesh'),
('2301003', 203, 'pass858687', 'Suresh Sharma', 'Male', '2002-06-30', 'Computer Science Engineering', 'suresh@example.com', 3, '9876543238', 'Anil Sharma', '9876543239', '3429, EFG Street', '858687', 'Surat', 'Gujarat'),
('2301004', 204, 'pass888990', 'Deepika Singh', 'Female', '2001-09-05', 'Computer Science Engineering', 'deepika@example.com', 3, '9876543239', 'Alok Singh', '9876543240', '3530, HIJ Street', '888990', 'Nagpur', 'Maharashtra'),
('2301005', 205, 'pass919293', 'Kiran Kumar', 'Male', '2002-04-15', 'Computer Science Engineering', 'kiran@example.com', 3, '9876543240', 'Sunil Kumar', '9876543241', '3631, OPQ Street', '919293', 'Pune', 'Maharashtra'),
('2301006', 206, 'pass125126127', 'Manish Gupta', 'Male', '2002-01-10', 'Computer Science Engineering', 'manish@example.com', 3, '9876543250', 'Suresh Gupta', '9876543251', '4536, OPQ Street', '125126127', 'Pune', 'Maharashtra'),
('2301007', 207, 'pass128129130', 'Neha Singh', 'Female', '2002-04-15', 'Computer Science Engineering', 'neha@example.com', 3, '9876543251', 'Ravi Singh', '9876543252', '4637, RST Street', '128129130', 'Jaipur', 'Rajasthan'),
('2301008', 208, 'pass131132133', 'Rahul Sharma', 'Male', '2002-07-20', 'Computer Science Engineering', 'rahul@example.com', 3, '9876543252', 'Amit Sharma', '9876543253', '4738, UVW Street', '131132133', 'Ahmedabad', 'Gujarat'),
('2301009', 209, 'pass134135136', 'Priya Patel', 'Female', '2002-02-25', 'Computer Science Engineering', 'priya@example.com', 3, '9876543253', 'Rajesh Patel', '9876543254', '4839, XYZ Street', '134135136', 'Lucknow', 'Uttar Pradesh'),
('2301010', 210, 'pass137138139', 'Amit Kumar', 'Male', '2001-05-30', 'Computer Science Engineering', 'amit@example.com', 3, '9876543254', 'Sanjay Kumar', '9876543255', '4940, ABC Street', '137138139', 'Mumbai', 'Maharashtra'),
('2301011', 206, 'pass949596', 'Divya Gupta', 'Female', '2002-07-20', 'Electronics and Communication Engineering', 'divya@example.com', 3, '9876543241', 'Raj Gupta', '9876543242', '3732, RST Street', '949596', 'Jaipur', 'Rajasthan'),
('2301012', 207, 'pass979899', 'Rajesh Verma', 'Male', '2002-02-25', 'Electronics and Communication Engineering', 'rajesh@example.com', 3, '9876543242', 'Sanjay Verma', '9876543243', '3833, UVW Street', '979899', 'Ahmedabad', 'Gujarat'),
('2301013', 208, 'pass100101102', 'Anjali Mishra', 'Female', '2001-05-30', 'Electronics and Communication Engineering', 'anjali@example.com', 3, '9876543243', 'Vijay Mishra', '9876543244', '3934, XYZ Street', '100101102', 'Lucknow', 'Uttar Pradesh'),
('2301014', 209, 'pass103104105', 'Suresh Sharma', 'Male', '2002-06-30', 'Electronics and Communication Engineering', 'gita@example.com', 3, '9876543259', 'Dipendu Sharma', '9876543295', '4036, RFG Street', '103104102', 'Surat', 'Gujarat'),
('2301015', 210, 'pass106107108', 'Deepika Singh', 'Female', '2001-09-05', 'Electronics and Communication Engineering','suresh@example.com', 3, '9876543244', 'Anil Sharma', '9876543245', '4035, EFG Street', '103104105', 'Surat', 'Gujarat'),
('2301016', 206, 'pass949596', 'Divya Gupta', 'Female', '2002-07-20', 'Electronics and Communication Engineering', 'divya@example.com', 3, '9876543241', 'Raj Gupta', '9876543242', '3732, RST Street', '949596', 'Jaipur', 'Rajasthan'),
('2301017', 207, 'pass979899', 'Rajesh Verma', 'Male', '2002-02-25', 'Electronics and Communication Engineering', 'rajesh@example.com', 3, '9876543242', 'Sanjay Verma', '9876543243', '3833, UVW Street', '979899', 'Ahmedabad', 'Gujarat'),
('2301018', 208, 'pass100101102', 'Anjali Mishra', 'Female', '2001-05-30', 'Electronics and Communication Engineering', 'anjali@example.com', 3, '9876543243', 'Vijay Mishra', '9876543244', '3934, XYZ Street', '100101102', 'Lucknow', 'Uttar Pradesh'),
('2301019', 209, 'pass103104105', 'Suresh Sharma', 'Male', '2002-06-30', 'Electronics and Communication Engineering', 'suresh@example.com', 3, '9876543244', 'Anil Sharma', '9876543245', '4035, EFG Street', '103104105', 'Surat', 'Gujarat'),
('2301020', 210, 'pass106107108', 'Deepika Singh', 'Female', '2001-09-05', 'Electronics and Communication Engineering', 'aditya@example.com', 3, '9876543249', 'Rakesh Sharma', '9376543245', '3035, TFG Street', '203104105', 'Surat', 'Gujarat'),
('2301021', 211, 'pass140141142', 'Sneha Gupta', 'Female', '2001-08-10', 'Mathematics', 'sneha@example.com', 3, '9876543256', 'Ravi Gupta', '9876543257', '5036, OPQ Street', '140141142', 'Pune', 'Maharashtra'),
('2301022', 212, 'pass143144145', 'Rahul Verma', 'Male', '2002-01-15', 'Mathematics', 'rahul@example.com', 3, '9876543257', 'Sanjay Verma', '9876543258', '5137, RST Street', '143144145', 'Jaipur', 'Rajasthan'),
('2301023', 213, 'pass146147148', 'Amita Singh', 'Female', '2002-04-20', 'Mathematics', 'amita@example.com', 3, '9876543258', 'Vijay Singh', '9876543259', '5238, UVW Street', '146147148', 'Ahmedabad', 'Gujarat'),
('2301024', 214, 'pass149150151', 'Rajesh Kumar', 'Male', '2001-09-25', 'Mathematics', 'rajesh@example.com', 3, '9876543259', 'Sanjay Kumar', '9876543260', '5339, XYZ Street', '149150151', 'Lucknow', 'Uttar Pradesh'),
('2301025', 215, 'pass152153154', 'Pooja Sharma', 'Female', '2002-02-28', 'Mathematics', 'pooja@example.com', 3, '9876543260', 'Rajesh Sharma', '9876543261', '5440, ABC Street', '152153154', 'Mumbai', 'Maharashtra'),
('2301026', 216, 'pass155156157', 'Manoj Verma', 'Male', '2001-07-05', 'Mathematics', 'manoj@example.com', 3, '9876543261', 'Suresh Verma', '9876543262', '5541, DEF Street', '155156157', 'Chennai', 'Tamil Nadu'),
('2301027', 217, 'pass158159160', 'Deepa Singh', 'Female', '2002-05-10', 'Mathematics', 'deepa@example.com', 3, '9876543262', 'Anil Singh', '9876543263', '5642, GHI Street', '158159160', 'Hyderabad', 'Telangana'),
('2301028', 218, 'pass161162163', 'Rahul Patel', 'Male', '2001-10-15', 'Mathematics', 'rahulpatel@example.com', 3, '9876543263', 'Sunil Patel', '9876543264', '5743, JKL Street', '161162163', 'Pune', 'Maharashtra'),
('2301029', 219, 'pass164165166', 'Shreya Gupta', 'Female', '2002-03-20', 'Mathematics', 'shreya@example.com', 3, '9876543264', 'Raj Gupta', '9876543265', '5844, MNO Street', '164165166', 'Jaipur', 'Rajasthan'),
('2301030', 220, 'pass167168169', 'Ajay Kumar', 'Male', '2001-08-25', 'Mathematics', 'ajay@example.com', 3, '9876543265', 'Sanjay Kumar', '9876543266', '5945, PQR Street', '167168169', 'Ahmedabad', 'Gujarat');


CREATE TABLE DEPARTMENT (
    DID VARCHAR(5) PRIMARY KEY,
    DNAME VARCHAR(50),
    BUILDING VARCHAR(50),
    BUDGET NUMERIC(8,2)
);

INSERT INTO DEPARTMENT (DID, DNAME, BUILDING, BUDGET)
VALUES
('D101', 'Computer Science Engineering','Computer Department', 500000.00),
('D102','Electronics and Communication Engineering',  'Electronics Department', 450000.50),
('D103', 'Mathematics ', 'Mathematics Department', 600000.75);
CREATE TABLE Faculty (
    F_ID varchar(20) PRIMARY KEY,
    PASSWORD varchar(10),
    FAC_NAME VARCHAR(50),
    EMAIL_ID VARCHAR(30),
    FAC_ROOM_NO INT,
    DID VARCHAR(5),
    foreign key(DID) references DEPARTMENT(DID)
);

INSERT INTO Faculty (F_ID, PASSWORD, FAC_NAME, EMAIL_ID, FAC_ROOM_NO, DID)
VALUES
("F1","fpassword" ,'Sumit Mishra', 'sumit.mishra@iiitg.ac.in', 201, 'D101'),
("F2","X8yZ0wP2" ,'Prof. Sneha Kapoor', 'sneha.kapoor@example.com', 202, 'D101'),
("F3","Q1rS3tU5" ,'Dr. Rajesh Verma', 'rajesh.verma@example.com', 203,'D102'),
("F4","H7iJ9kL1" ,'Prof. Preeti Desai', 'neha.singh@example.com', 204, 'D102'),
("F5","M4nO6pQ8" ,'Dr. Anil Desai', 'anil.desai@example.com', 205, 'D103'),
("F6","Y2zX4aB6" ,'Prof. Kavita Jain', 'kavita.jain@example.com', 206, 'D103');

CREATE TABLE BOOK (
    BOOK_ID INT PRIMARY KEY,
    TITLE VARCHAR(50),
    AUTHOR VARCHAR(50),
    BOOK_COUNT INT
);

INSERT INTO BOOK (BOOK_ID, TITLE, AUTHOR,  BOOK_COUNT)
VALUES
(100, 'The Great Gatsby', 'F. Scott Fitzgerald',  5),
(101, 'To Kill a Mockingbird', 'Harper Lee',  3),
(102, '1984', 'George Orwell',  8),
(103, 'Pride and Prejudice', 'Jane Austen',  6),
(104, 'The Catcher in the Rye', 'J.D. Salinger',  4),
(105, 'The Hobbit', 'J.R.R. Tolkien',  7),
(106, 'Brave New World', 'Aldous Huxley', 5),
(107, 'The Lord of the Rings', 'J.R.R. Tolkien', 10),
(108, 'The Alchemist', 'Paulo Coelho',  3),
(109, 'Harry Potter and the Sorcerer\'s Stone', 'J.K. Rowling', 6),
(110, 'The Da Vinci Code', 'Dan Brown',  8),
(111, 'The Chronicles of Narnia', 'C.S. Lewis',  5),
(112, 'The Great Expectations', 'Charles Dickens',  7),
(113, 'The Shawshank Redemption', 'Stephen King',  4),
(114, 'The Girl with the Dragon Tattoo', 'Stieg Larsson',  6),
(115, 'The Road', 'Cormac McCarthy',  3),
(116, 'The Hitchhiker\'s Guide to the Galaxy', 'Douglas Adams', 9),
(117, 'The Kite Runner', 'Khaled Hosseini',  5),
(118, 'The War of the Worlds', 'H.G. Wells', 7),
(119, 'The Art of War', 'Sun Tzu', 10),
(120, 'The Metamorphosis', 'Franz Kafka',  6),
(121, 'One Hundred Years of Solitude', 'Gabriel García Márquez',  8),
(122, 'The Picture of Dorian Gray', 'Oscar Wilde',  4),
(123, 'The Grapes of Wrath', 'John Steinbeck', 5),
(124, 'Moby-Dick', 'Herman Melville',  7),
(125, 'The Odyssey', 'Homer',  9),
(126, 'Crime and Punishment', 'Fyodor Dostoevsky',  5),
(127, 'Lord of the Flies', 'William Golding',  6),
(128, 'The Three Musketeers', 'Alexandre Dumas',  8),
(129, 'The Count of Monte Cristo', 'Alexandre Dumas',  7);

CREATE TABLE course (
    C_ID varchar(20) PRIMARY KEY,
    CNAME VARCHAR(50),
    CREDIT INT,
    DID VARCHAR(5),
    SEMESTER int,
    foreign key(DID) references DEPARTMENT(DID)
);

INSERT INTO course (C_ID, CNAME, CREDIT, DID, SEMESTER)
VALUES
('CS101', 'Introduction To C Prgraming', 4, 'D101', 1),
('CS103', 'Database Management System', 3, 'D101', 1),
('EC101', 'Digital Design', 4, 'D102', 1),
('EC102', 'Electrical Circuit Analysis ', 3, 'D102', 1),
('MA101', 'Calculus', 3, 'D103', 1),
('MA102', 'Algebra', 3, 'D103', 1),
('CS201', 'Algorithm', 4, 'D101', 3),
('CS202', 'JAVA', 4, 'D101', 3),
('EC201', 'Analog Circuit', 4, 'D102', 3),
('EC241', 'Single And Systems', 4, 'D102', 3),
('MA203', 'Probability', 4, 'D103', 3),
('MA205', 'Discreate Mathematics ', 3, 'D103', 3);

CREATE TABLE ISSUE (
    ISSUE_ID INT AUTO_INCREMENT PRIMARY KEY,
    ROLL_NO varchar(10),
    BOOK_ID int,
    ISSUE_DATE DATE,
    RETURN_DATE DATE,
    STATUS VARCHAR(20),
    FINE INT,
    foreign key(ROLL_NO) references STUDENT(ROLL_NO),
    foreign key(BOOK_ID) references BOOK(BOOK_ID)
);

INSERT INTO ISSUE (ISSUE_ID, ROLL_NO, BOOK_ID, ISSUE_DATE, RETURN_DATE, STATUS, FINE)
VALUES
(1, "2201001", 101, '2024-01-01', '2024-01-30', 'Returned', 0),
(2, "2201001", 102, '2024-01-01', '2024-01-30', 'Returned', 10),
(3, "2201001", 112, '2024-01-15', '2024-02-25', 'Not Returned', 0),
(4, "2201001", 108, '2024-02-01', '2024-02-28', 'Returned', 10),
(5, "2201001", 120, '2024-02-09', '2024-03-10', 'Returned', 0),
(6, "2201001", 115, '2024-02-12', '2024-03-15', 'Not Returned', 0),
(7, "2201001", 117, '2024-02-20', '2024-03-20', 'Returned', 0),
(8, "2201001", 106, '2024-02-20', '2024-03-15', 'Returned', 15),
(9, "2201001", 109, '2024-03-09', '2024-04-15', 'Not Returned', 0),
(10, "2201012", 119, '2024-03-09', '2024-04-16', 'Not Returned', 10),
(11, "2201019", 101, '2024-03-22', '2024-04-17', 'Not Returned', 0),
(12, "2201020", 102, '2024-01-04', '2024-02-18', 'Not Returned', 15),
(13, "2201020", 103, '2024-01-05', '2024-02-19', 'Returned', 0),
(14, "2201021", 104, '2024-03-06', '2024-05-20', 'Not Returned', 20),
(15, "2201018", 104, '2024-03-07', '2024-04-21', 'Returned', 0),
(16, "2201009", 125, '2024-03-08', '2024-05-22', 'Not Returned', 25),
(17, "2201002", 102, '2024-03-09', '2024-03-23', 'Returned', 70),
(18, "2201012", 102, '2024-03-10', '2024-04-24', 'Not Returned', 30);

create table MESS_COMPLAIN_TYPE(
	COMPLAIN_ID varchar(10) primary key,
    COMPLAIN varchar(100)
);

INSERT INTO MESS_COMPLAIN_TYPE (COMPLAIN_ID, COMPLAIN)
VALUES
('C001', 'Food issue'),
('C002', 'Hygein'),
('C003', 'Unclean plates'),
('C004', 'Staff behaviour'),
('C005', 'Overcrowding'),
('C006', 'Other');

create table MAKES_MESS(
	COMPLAIN_ID INT AUTO_INCREMENT PRIMARY KEY,
    DESCRIPTION varchar(100),
    ROLL_NO varchar(10),
    COMPLAIN_DATE date,
    STATUS varchar(20),
    foreign key(ROLL_NO) references STUDENT(ROLL_NO)
);

INSERT INTO MAKES_MESS(COMPLAIN_ID,DESCRIPTION, ROLL_NO, COMPLAIN_DATE, STATUS)
VALUES
(1,'Rooti is not satisfactory.', "2201001", '2024-02-01', "Unresolved"),
(2,'Daal is too watery.', "2201001", '2024-02-10', "Resolved"),
(3,'Mess fans are not running properly.', "2201001", '2024-02-28', "Resolved"),
(4,'Shortage of chairs.', "2201001", '2024-03-01', "Unresolved"),
(5,'Staffs do not serve food properly', "2201001", '2024-03-14', "Unresolved"),
(6,'Insects hover around food.', "2201001", '2024-03-10', "Resolved"),
(7,'Tables are dirty', "2201019", '2024-02-02', "Unresolved"),
(8,'Plates are cleaned properly', "2201023", '2024-02-03',"Resolved"),
(9,'Staffs do not serve food properly', "2201010", '2024-02-04',"Resolved"),
(10,'Too much oil in puri', "2201011", '2024-02-05',"Resolved"),
(11,'Less numbers of chairs', "2201005", '2024-02-20',"Unresolved");

CREATE TABLE TEACHES (
    F_ID varchar(20),
    C_ID VARCHAR(20),
    PRIMARY KEY (F_ID, C_ID),
    FOREIGN KEY (F_ID) REFERENCES faculty(F_ID),
    FOREIGN KEY (C_ID) REFERENCES course(C_ID)
);

INSERT INTO TEACHES (F_ID, C_ID)
VALUES
("F1", 'CS101'), 
("F4", 'CS103'), 
("F2", 'EC101'),  
("F5", 'EC102'), 
("F3", 'MA101'),  
("F6", 'MA102'),
("F1", 'CS201'), 
("F4", 'CS202'), 
("F5", 'EC201'), 
("F2", 'EC241'), 
("F6", 'MA203'),  
("F3", 'MA205'); 

-- ("F1", 'CS101'), 
-- ("F1", 'CS103'), 
-- ("F2", 'EC101'),  
-- ("F2", 'EC102'), 
-- ("F3", 'MA101'),  
-- ("F3", 'MA102'),
-- ("F4", 'CS201'), 
-- ("F4", 'CS202'), 
-- ("F5", 'EC201'), 
-- ("F5", 'EC241'), 
-- ("F6", 'MA203'),  
-- ("F6", 'MA205'); 

create table HOSTEL_COMPLAIN_TYPE(
	COMPLAIN_ID varchar(10) primary key,
    COMPLAIN varchar(100)
);

INSERT INTO HOSTEL_COMPLAIN_TYPE (COMPLAIN_ID, COMPLAIN)
VALUES
('H001', 'Electrical appliances issue'),
('H002', 'Clineaness'),
('H003', 'Wi-Fi'),
('H004', 'Furniture'),
('H005', 'Medicine issue'),
('H006', 'Other');


create table MAKES_HOSTEL(
	COMPLAIN_ID INT auto_increment PRIMARY KEY,
    DESCRIPTION varchar(100),
    ROLL_NO varchar(10),
    COMPLAIN_DATE date,
    STATUS varchar(20),
    foreign key(ROLL_NO) references STUDENT(ROLL_NO)
);

INSERT INTO MAKES_HOSTEL (COMPLAIN_ID,DESCRIPTION, ROLL_NO, COMPLAIN_DATE, STATUS)
VALUES 
    (1,'Fan not working', "2201001", '2024-01-06', "Resolved" ),
    (2,'Table is broken', "2201001", '2024-01-06', "Resolved" ),
    (3,'Too much noise from nescafe', "2201001", '2024-02-02', "Unresolved" ),
    (4,'Room is not clean', "2201001", '2024-03-06', "Unresolved" ),
    (5,'Wi-fi disconnects all the time', "2201001", '2024-02-15', "Resolved" ),
    (6,'Bed creates noise', "2201001", '2024-02-20', "Unresolved" ),
    (7, 'Tube light fushed', "2201001", '2024-02-28', "Unresolved" ),
    (8,'Room not cleaned since a month', "2201001", '2024-03-02',"Unresolved"),
    (9, 'Wi-Fi is very slow on 3rd floor', "2201002", '2024-03-08','Unresolved'),
    (10,'Table is broken', "2201002", '2024-03-09','Resolved'),
    (11,'Security guards are sleeping at night', "2201003", '2024-03-10','Unresolved'),
    (12,'Dirty water in washroom', "2201004", '2024-03-11','Resolved');

    
CREATE TABLE TAKES (
    ROLL_NO varchar(10),
    C_ID VARCHAR(20),
    PRIMARY KEY (ROLL_NO, C_ID),
    FOREIGN KEY (ROLL_NO) REFERENCES STUDENT(ROLL_NO),
    FOREIGN KEY (C_ID) REFERENCES COURSE(C_ID)
);

INSERT INTO takes (ROLL_NO, C_ID)
VALUES
    ("2201001", 'CS101'),
    ("2201001", 'CS103'),
    ("2201002", 'CS101'),
    ("2201002", 'CS103'),
    ("2201003", 'CS101'),
    ("2201003", 'CS103'),
    ("2201004", 'CS101'),
    ("2201004", 'CS103'),
    ("2201005", 'CS101'),
    ("2201005", 'CS103'),
    ("2201006", 'CS101'),
    ("2201006", 'CS103'),
    ("2201007", 'CS101'),
    ("2201007", 'CS103'),
    ("2201008", 'CS101'),
    ("2201008", 'CS103'),
    ("2201009", 'CS101'),
    ("2201009", 'CS103'),
    ("2201010", 'CS101'),
    ("2201010", 'CS103'),
    ("2201011", 'EC101'),
    ("2201011", 'EC102'),
    ("2201012", 'EC101'),
    ("2201012", 'EC102'),
    ("2201013", 'EC101'),
    ("2201013", 'EC102'),
    ("2201014", 'EC101'),
    ("2201014", 'EC102'),
    ("2201015", 'EC101'),
    ("2201015", 'EC102'),
    ("2201016", 'EC101'),
    ("2201016", 'EC102'),
    ("2201017", 'EC101'),
    ("2201017", 'EC102'),
    ("2201018", 'EC101'),
    ("2201018", 'EC102'),
    ("2201019", 'EC101'),
    ("2201019", 'EC102'),
    ("2201020", 'EC101'),
    ("2201020", 'EC102'),
    ("2201021", 'MA101'),
    ("2201021", 'MA102'),
    ("2201022", 'MA101'),
    ("2201022", 'MA102'),
    ("2201023", 'MA101'),
    ("2201023", 'MA102'),
    ("2201024", 'MA101'),
    ("2201024", 'MA102'),
    ("2201025", 'MA101'),
    ("2201025", 'MA102'),
    ("2201026", 'MA101'),
    ("2201026", 'MA102'),
    ("2201027", 'MA101'),
    ("2201027", 'MA102'),
    ("2201028", 'MA101'),
    ("2201028", 'MA102'),
    ("2201029", 'MA101'),
    ("2201029", 'MA102'),
    ("2201030", 'MA101'),
    ("2201030", 'MA102'),
    ("2301001", 'CS201'),
    ("2301001", 'CS202'),
    ("2301002", 'CS201'),
    ("2301002", 'CS202'),
    ("2301003", 'CS201'),
    ("2301003", 'CS202'),
    ("2301004", 'CS201'),
    ("2301004", 'CS202'),
    ("2301005", 'CS201'),
    ("2301005", 'CS202'),
    ("2301006", 'CS201'),
    ("2301006", 'CS202'),
    ("2301007", 'CS201'),
    ("2301007", 'CS202'),
    ("2301008", 'CS201'),
    ("2301008", 'CS202'),
    ("2301009", 'CS201'),
    ("2301009", 'CS202'),
    ("2301010", 'CS201'),
    ("2301010", 'CS202'),
    ("2301011", 'EC201'),
    ("2301011", 'EC241'),
    ("2301012", 'EC201'),
    ("2301012", 'EC241'),
    ("2301013", 'EC201'),
    ("2301013", 'EC241'),
    ("2301014", 'EC201'),
    ("2301014", 'EC241'),
    ("2301015", 'EC201'),
    ("2301015", 'EC241'),
    ("2301016", 'EC201'),
    ("2301016", 'EC241'),
    ("2301017", 'EC201'),
    ("2301017", 'EC241'),
    ("2301018", 'EC201'),
    ("2301018", 'EC241'),
    ("2301019", 'EC201'),
    ("2301019", 'EC241'),
    ("2301020", 'EC201'),
    ("2301020", 'EC241'),
    ("2301021", 'MA203'),
    ("2301021", 'MA205'),
    ("2301022", 'MA203'),
    ("2301022", 'MA205'),
    ("2301023", 'MA203'),
    ("2301023", 'MA205'),
    ("2301024", 'MA203'),
    ("2301024", 'MA205'),
    ("2301025", 'MA203'),
    ("2301025", 'MA205'),
    ("2301026", 'MA203'),
    ("2301026", 'MA205'),
    ("2301027", 'MA203'),
    ("2301027", 'MA205'),
    ("2301028", 'MA203'),
    ("2301028", 'MA205'),
    ("2301029", 'MA203'),
    ("2301029", 'MA205'),
    ("2301030", 'MA203'),
    ("2301030", 'MA205');

    
    
CREATE TABLE AMBULANCE_DETAIL (
    AMB_ID VARCHAR(10) PRIMARY KEY,
    ROLL_NO varchar(10),
    REASON VARCHAR(100),
    DATE DATETIME,
    FOREIGN KEY (ROLL_NO) REFERENCES STUDENT (ROLL_NO)
);

INSERT INTO AMBULANCE_DETAIL (AMB_ID, ROLL_NO, REASON, DATE)
VALUES
    ('A001', "2201001", 'Medical checkup', '2024-03-06 08:30:00'),
    ('A002', "2201002", 'Injury', '2024-03-07 10:45:00'),
    ('A003', "2201003", 'Illness', '2024-03-08 12:15:00'),
    ('A004', "2201004", 'Allergic reaction', '2024-03-09 14:20:00'),
    ('A005', "2201005", 'Medical appointment', '2024-03-10 16:30:00'),
    ('A006', "2201001", 'Fever', '2024-03-11 18:45:00'),
    ('A007', "2201002", 'Accident', '2024-03-12 20:00:00'),
    ('A008', "2201003", 'Emergency', '2024-03-13 22:10:00'),
    ('A009', "2201004", 'Breathing difficulties', '2024-03-14 23:30:00'),
    ('A010', "2201005", 'Infection', '2024-03-15 01:45:00'),
    ('A011', "2201006", 'Injury', '2024-03-16 03:00:00'),
    ('A012', "2201007", 'Illness', '2024-03-17 05:15:00'),
    ('A013', "2201008", 'Allergic reaction', '2024-03-18 07:30:00'),
    ('A014', "2201009", 'Medical appointment', '2024-03-19 09:45:00'),
    ('A015', "2201010", 'Fever', '2024-03-20 12:00:00'),
    ('A016', "2201006", 'Accident', '2024-03-21 14:15:00');
    
CREATE TABLE GATE_ENTRY (
	ROLL_NO VARCHAR(10),
	ENTRY_TIME DATETIME
);  

INSERT INTO GATE_ENTRY (roll_no, entry_time) 
VALUES
('2201001', '2024-01-01 08:00:00'),
('2201002', '2024-01-15 08:15:00'),
('2201003', '2024-01-29 08:30:00'),
('2201004', '2024-02-12 08:45:00'),
('2201005', '2024-02-26 09:00:00'),
('2201006', '2024-03-10 09:15:00'),
('2201007', '2024-03-14 09:30:00'),
('2201008', '2024-03-18 09:45:00'),
('2201009', '2024-03-22 10:00:00'),
('2201010', '2024-03-31 10:15:00');

create table ATTENDANCE(
	ROLL_NO varchar(10),
    C_ID varchar(20),
    TIME datetime,
    primary key(ROLL_NO,TIME)
);

create table study_from(
	ROLL_NO varchar(10),
    F_ID VARCHAR(20) ,
    C_ID VARCHAR(20),
    primary key(ROLL_NO,F_ID,C_ID),
    foreign key(ROLL_NO) references student(ROLL_NO),
    foreign key(F_ID) references faculty(F_ID),
	foreign key(C_ID) references course(C_ID)
);

insert into study_from(ROLL_NO,F_ID,C_ID)
values
	("2201001", 'F1','CS101'),
    ("2201001", 'F1','CS103'),
    ("2201002", 'F1','CS101'),
    ("2201002", 'F1','CS103'),
    ("2201003", 'F1','CS101'),
    ("2201003", 'F1','CS103'),
    ("2201004", 'F1','CS101'),
    ("2201004", 'F1','CS103'),
	("2201005", 'F1','CS101'),
    ("2201005", 'F1','CS103'),
    ("2201006", 'F1','CS101'),
    ("2201006", 'F1','CS103'),
    ("2201007", 'F1','CS101'),
    ("2201007", 'F1','CS103'),
    ("2201008", 'F1','CS101'),
    ("2201008", 'F1','CS103'),
    ("2201009", 'F1','CS101'),
    ("2201009", 'F1','CS103'),
    ("2201010", 'F1','CS101'),
    ("2201010", 'F1','CS103'),
    ("2201011", 'F3','EC101'),
    ("2201011", 'F3','EC102'),
    ("2201012", 'F3','EC101'),
    ("2201012", 'F3','EC102'),
    ("2201013", 'F3','EC101'),
    ("2201013", 'F3','EC102'),
    ("2201014", 'F3','EC101'),
    ("2201014", 'F3','EC102'),
	("2201015", 'F3','EC101'),
    ("2201015", 'F3','EC102'),
    ("2201016", 'F3','EC101'),
    ("2201016", 'F3','EC102'),
    ("2201017", 'F3','EC101'),
    ("2201017", 'F3','EC102'),
    ("2201018", 'F3','EC101'),
    ("2201018", 'F3','EC102'),
    ("2201019", 'F3','EC101'),
    ("2201019", 'F3','EC102'),
    ("2201020", 'F3','EC101'),
    ("2201020", 'F3','EC102'),
    ("2201021", 'F5','MA101'),
    ("2201021", 'F5','MA102'),
    ("2201022", 'F5','MA101'),
    ("2201022", 'F5','MA102'),
    ("2201023", 'F5','MA101'),
    ("2201023", 'F5','MA102'),
    ("2201024", 'F5','MA101'),
    ("2201024", 'F5','MA102'),
	("2201025", 'F5','MA101'),
    ("2201025", 'F5','MA102'),
    ("2201026", 'F5','MA101'),
    ("2201026", 'F5','MA102'),
    ("2201027", 'F5','MA101'),
    ("2201027", 'F5','MA102'),
    ("2201028", 'F5','MA101'),
    ("2201028", 'F5','MA102'),
    ("2201029", 'F5','MA101'),
    ("2201029", 'F5','MA102'),
    ("2201030", 'F5','MA101'),
    ("2201030", 'F5','MA102'),
	("2301001", 'F2','CS201'),
    ("2301001", 'F2','CS202'),
    ("2301002", 'F2','CS201'),
    ("2301002", 'F2','CS202'),
    ("2301003", 'F2','CS201'),
    ("2301003", 'F2','CS202'),
    ("2301004", 'F2','CS201'),
    ("2301004", 'F2','CS202'),
	("2301005", 'F2','CS201'),
    ("2301005", 'F2','CS202'),
    ("2301006", 'F2','CS201'),
    ("2301006", 'F2','CS202'),
    ("2301007", 'F2','CS201'),
    ("2301007", 'F2','CS202'),
    ("2301008", 'F2','CS201'),
    ("2301008", 'F2','CS202'),
    ("2301009", 'F2','CS201'),
    ("2301009", 'F2','CS202'),
    ("2301010", 'F2','CS201'),
    ("2301010", 'F2','CS202'),
    ("2301011", 'F4','EC201'),
    ("2301011", 'F4','EC241'),
    ("2301012", 'F4','EC201'),
    ("2301012", 'F4','EC241'),
    ("2301013", 'F4','EC201'),
    ("2301013", 'F4','EC241'),
    ("2301014", 'F4','EC201'),
    ("2301014", 'F4','EC241'),
	("2301015", 'F4','EC201'),
    ("2301015", 'F4','EC241'),
    ("2301016", 'F4','EC201'),
    ("2301016", 'F4','EC241'),
    ("2301017", 'F4','EC201'),
    ("2301017", 'F4','EC241'),
    ("2301018", 'F4','EC201'),
    ("2301018", 'F4','EC241'),
    ("2301019", 'F4','EC201'),
    ("2301019", 'F4','EC241'),
    ("2301020", 'F4','EC201'),
    ("2301020", 'F4','EC241'),
    ("2301021", 'F6','MA203'),
    ("2301021", 'F6','MA205'),
    ("2301022", 'F6','MA203'),
    ("2301022", 'F6','MA205'),
    ("2301023", 'F6','MA203'),
    ("2301023", 'F6','MA205'),
    ("2301024", 'F6','MA203'),
    ("2301024", 'F6','MA205'),
	("2301025", 'F6','MA203'),
    ("2301025", 'F6','MA205'),
    ("2301026", 'F6','MA203'),
    ("2301026", 'F6','MA205'),
    ("2301027", 'F6','MA203'),
    ("2301027", 'F6','MA205'),
    ("2301028", 'F6','MA203'),
    ("2301028", 'F6','MA205'),
    ("2301029", 'F6','MA203'),
    ("2301029", 'F6','MA205'),
    ("2301030", 'F6','MA203'),
    ("2301030", 'F6','MA205');
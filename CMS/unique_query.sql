-- 1
SELECT sname, roll_no, password 
FROM student 
WHERE roll_no = ?

-- 2
SELECT roll_no, DATE(entry_time) AS date, TIME(entry_time) AS time
FROM gate_entry;

-- 3
SELECT roll_no, entry_time, DATE(entry_time) AS date, TIME(entry_time) AS time
FROM gate_entry
WHERE entry_time >= DATE_SUB(CURDATE(), INTERVAL 7 DAY);

-- 4
SELECT roll_no, entry_time, DATE(entry_time) AS date, TIME(entry_time) AS time
FROM gate_entry
ORDER BY entry_time DESC;

-- 5
SELECT roll_no, DATE(entry_time) AS date, TIME(entry_time) AS time
FROM gate_entry;

-- 6
UPDATE makes_hostel
SET status='$status'
WHERE makes_hostel.complain_id=$complainID;

-- 7
SELECT roll_no, complain_id, description, complain_date, status
FROM makes_hostel
WHERE status='resolved';

-- 8
SELECT roll_no, complain_id, description, complain_date, status
FROM makes_hostel
WHERE status='unresolved';

-- 9
INSERT INTO issue (roll_no, book_id, issue_date, return_date, status, fine)
VALUES ('$rollno', '$bookID', '$issueDate', '$returnDate', '$status', '$fine');

-- 10
SELECT roll_no, issue_id, title, author, issue_date, return_date, status, fine
FROM book, issue
WHERE book.BOOK_ID = issue.BOOK_ID;

-- 11
SELECT course.cname AS cname, course.c_id AS c_id
FROM course,takes
WHERE takes.c_id=course.c_id AND roll_no=?;

-- 12
SELECT CLASS_COUNT as CLASS_COUNT
FROM total_classes
WHERE C_ID = ?;

-- 13
SELECT COUNT(*) AS total_attended
FROM attendance
WHERE roll_no = ? AND c_id = ?

-- 14
SELECT DAYNAME(time) AS day, DATE(time) AS date, TIME(time) AS time
FROM attendance
WHERE roll_no=? AND c_id=?;

-- 15
SELECT count(*)
FROM makes_mess
WHERE status='Resolved' AND roll_no = ?;

-- 16
SELECT description, complain_date, status
FROM makes_hostel
WHERE roll_no=?
ORDER BY complain_date DESC;

-- 17
insert into makes_hostel values(?,?,?,?,?);

-- 18
SELECT title, author, issue_date, return_date, status, fine
FROM book, issue
WHERE book.BOOK_ID = issue.BOOK_ID and status='returned' and roll_no=?;

-- 19
INSERT INTO attendance (roll_no, c_id, time) 
VALUES (?, ?, NOW())

-- 20
UPDATE total_classes
SET CLASS_COUNT = CLASS_COUNT + 1
WHERE C_ID = ?;
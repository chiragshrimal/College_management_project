-- 1
SELECT sname, roll_no, password 
FROM student 
WHERE roll_no = ?

-- 2
SELECT fac_name, f_id, password 
FROM faculty 
WHERE f_id = ?

-- 3
SELECT admin_name, admin_id, admin_pass 
FROM admin
WHERE admin_id = ?

-- 4
SELECT roll_no, DATE(entry_time) AS date, TIME(entry_time) AS time
FROM gate_entry;

-- 5
SELECT roll_no, entry_time, DATE(entry_time) AS date, TIME(entry_time) AS time
FROM gate_entry
WHERE entry_time >= DATE_SUB(CURDATE(), INTERVAL 7 DAY);

-- 6
SELECT roll_no, entry_time, DATE(entry_time) AS date, TIME(entry_time) AS time
FROM gate_entry
ORDER BY entry_time DESC;

-- 7
SELECT roll_no, DATE(entry_time) AS date, TIME(entry_time) AS time
FROM gate_entry;

-- 8
UPDATE makes_hostel
SET status='$status'
WHERE makes_hostel.complain_id=$complainID;

-- 9
SELECT roll_no, complain_id, description, complain_date, status
FROM makes_hostel;

-- 10
SELECT roll_no, complain_id, description, complain_date, status
FROM makes_hostel
WHERE complain_date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY);

-- 11
SELECT roll_no, complain_id, description, complain_date, status
FROM makes_hostel
ORDER BY complain_date DESC;

-- 12
SELECT roll_no, complain_id, description, complain_date, status
FROM makes_hostel
WHERE status='resolved';

-- 13
SELECT roll_no, complain_id, description, complain_date, status
FROM makes_hostel
WHERE status='unresolved';

-- 14
SELECT roll_no, complain_id, description, complain_date, status
FROM makes_hostel;

-- 15
UPDATE issue 
SET fine = $fine, status='$status'
WHERE issue.issue_id=$issueID;

-- 16
INSERT INTO issue (roll_no, book_id, issue_date, return_date, status, fine)
VALUES ('$rollno', '$bookID', '$issueDate', '$returnDate', '$status', '$fine');

-- 17
SELECT roll_no, issue_id, title, author, issue_date, return_date, status, fine
FROM book, issue
WHERE book.BOOK_ID = issue.BOOK_ID;

-- 18
UPDATE makes_mess
SET status='$status'
WHERE makes_mess.complain_id=$complainID;

-- 19
SELECT roll_no, complain_id, description, complain_date, status
FROM makes_mess;

-- 20
SELECT roll_no, complain_id, description, complain_date, status
FROM makes_mess
WHERE complain_date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY);

-- 21
SELECT roll_no, complain_id, description, complain_date, status
FROM makes_mess
ORDER BY complain_date DESC;

-- 22
SELECT roll_no, complain_id, description, complain_date, status
FROM makes_mess
WHERE status='resolved';

-- 23
SELECT roll_no, complain_id, description, complain_date, status
FROM makes_mess
WHERE status='unresolved';

-- 24
SELECT roll_no, complain_id, description, complain_date, status
FROM makes_mess;

-- 25
SELECT course.cname AS cname, course.c_id AS c_id
FROM course,takes
WHERE takes.c_id=course.c_id AND roll_no=?;

-- 26
SELECT CLASS_COUNT as CLASS_COUNT
FROM total_classes
WHERE C_ID = ?;

-- 27
SELECT CLASS_COUNT as CLASS_COUNT
FROM total_classes
WHERE C_ID = ?;

-- 28
SELECT COUNT(*) AS total_attended
FROM attendance
WHERE roll_no = ? AND c_id = ?

-- 29
SELECT DAYNAME(time) AS day, DATE(time) AS date, TIME(time) AS time
FROM attendance
WHERE roll_no=? AND c_id=?;

-- 30
SELECT f_id, fac_name, email_id, fac_room_no, dname
FROM faculty,department
WHERE faculty.did=department.did and f_id = ?

-- 31
SELECT roll_no, room_no, sname, dob, branch, email_id, semester, s_pnumber, fname, f_pnumber, street_address, pin_code, city, state 
FROM student 
WHERE roll_no = ?

-- 32
SELECT course.cname AS cname, course.c_id AS c_id
FROM course,takes
WHERE takes.c_id=course.c_id AND roll_no=?;

-- 33
SELECT count(*)
FROM makes_mess
WHERE status='Resolved' AND roll_no = ?;

-- 34
SELECT count(*)
FROM makes_mess
WHERE status='Unresolved' AND roll_no = ?;

-- 35
SELECT count(*)
FROM makes_hostel
WHERE status='Resolved' AND roll_no = ?;

-- 36
SELECT count(*)
FROM makes_hostel
WHERE status='Unresolved' AND roll_no = ?;

-- 37
SELECT CLASS_COUNT as CLASS_COUNT
FROM total_classes
WHERE C_ID = ?;

-- 38
SELECT COUNT(*) AS total_attended
FROM attendance
WHERE roll_no = ? AND c_id = ?

-- 39
SELECT issue_date, return_date, status, fine
FROM issue
WHERE ROLL_NO = ?;

-- 40
SELECT entry_time, DATE(entry_time) AS date, TIME(entry_time) AS time
FROM gate_entry
WHERE roll_no=?;

-- 41      
SELECT description, complain_date, status
FROM makes_hostel
WHERE ROLL_NO = ?;

-- 42
SELECT description, complain_date, status
FROM makes_hostel
WHERE complain_date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) and roll_no=?;

-- 43
SELECT description, complain_date, status
FROM makes_hostel
WHERE roll_no=?
ORDER BY complain_date DESC;

-- 44
SELECT description, complain_date, status
FROM makes_hostel
WHERE status='resolved' and roll_no=?;

-- 45
SELECT description, complain_date, status
FROM makes_hostel
WHERE status='unresolved' and roll_no=?;

-- 46
SELECT description, complain_date, status
FROM makes_hostel
WHERE ROLL_NO = ?;

-- 47
insert into makes_hostel values(?,?,?,?,?);

-- 48
SELECT title, author, issue_date, return_date, status, fine
FROM book, issue
WHERE book.BOOK_ID = issue.BOOK_ID AND ROLL_NO = ?;

-- 49
SELECT title, author, issue_date, return_date, status, fine
FROM book, issue
WHERE book.BOOK_ID = issue.BOOK_ID AND issue_date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) and roll_no=?;

-- 50
SELECT title, author, issue_date, return_date, status, fine
FROM book, issue
WHERE book.BOOK_ID = issue.BOOK_ID and roll_no=?
ORDER BY issue_date DESC;

-- 51
SELECT title, author, issue_date, return_date, status, fine
FROM book, issue
WHERE book.BOOK_ID = issue.BOOK_ID and status='returned' and roll_no=?;

-- 52
SELECT title, author, issue_date, return_date, status, fine
FROM book, issue
WHERE book.BOOK_ID = issue.BOOK_ID and status='not returned' and roll_no=?;

-- 53
SELECT title, author, issue_date, return_date, status, fine
FROM book, issue
WHERE book.BOOK_ID = issue.BOOK_ID and ROLL_NO = ?;

-- 54
SELECT description, complain_date, status
FROM makes_mess
WHERE ROLL_NO = ?;

-- 55
SELECT description, complain_date, status
FROM makes_mess
WHERE complain_date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) and roll_no=?;

-- 56
SELECT description, complain_date, status
FROM makes_mess
WHERE roll_no=?
ORDER BY complain_date DESC;

-- 57
SELECT description, complain_date, status
FROM makes_mess
WHERE status='resolved' and roll_no=?;

-- 58
SELECT description, complain_date, status
FROM makes_mess
WHERE status='unresolved' and roll_no=?;

-- 59
SELECT description, complain_date, status
FROM makes_mess
WHERE ROLL_NO = ?;

-- 60
SELECT roll_no 
FROM study_from
WHERE f_id=? AND roll_no=?;

-- 61
SELECT roll_no, room_no, sname, dob, branch, email_id, semester, s_pnumber, fname, f_pnumber, street_address, pin_code, city, state 
FROM student 
WHERE roll_no = ?

-- 62
SELECT c_id 
FROM teaches
WHERE f_id=?;

-- 63
SELECT sname,student.roll_no AS roll_no
FROM student,takes
WHERE takes.roll_no=student.roll_no AND c_id=?;

-- 64
SELECT CLASS_COUNT as CLASS_COUNT
FROM total_classes 
WHERE C_ID = ?;

-- 65
SELECT COUNT(*) AS total_attended
FROM attendance
WHERE roll_no = ? AND c_id = ?

-- 66
INSERT INTO attendance (roll_no, c_id, time) 
VALUES (?, ?, NOW())

-- 66
UPDATE total_classes
SET CLASS_COUNT = CLASS_COUNT + 1
WHERE C_ID = ?;
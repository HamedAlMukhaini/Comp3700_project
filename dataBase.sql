CREATE DATABASE booknest_db;
USE booknest_db;

CREATE TABLE Books (
    book_id INT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    author VARCHAR(100) NOT NULL,
    price DECIMAL(6,3) NOT NULL CHECK (price >= 0)
);

INSERT INTO Books VALUES
(1, 'The Great Gatsby', 'F. Scott Fitzgerald', 12.500),
(2, 'The Road', 'Cormac McCarthy', 10.000),
(3, 'The City of God', 'Saint Augustine', 15.250),
(4, 'Hamlet', 'William Shakespeare', 8.000),
(5, 'The Art of War', 'Sun Tzu', 5.500);

CREATE TABLE Categories (
    category_id INT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL,
    section VARCHAR(50) NOT NULL
);

INSERT INTO Categories VALUES
(101, 'Classic Literature', 'Wing A'),
(102, 'Modern Fiction', 'Wing B'),
(103, 'History & Philosophy', 'Wing C'),
(104, 'Science Fiction', 'Wing D'),
(105, 'Children Books', 'Wing E');

CREATE TABLE Transactions (
    transaction_id VARCHAR(10) PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    book_title VARCHAR(100) NOT NULL,
    due_date DATE NOT NULL
);

INSERT INTO Transactions VALUES
('T001', 'Ahmed Al-Saidi', 'The Great Gatsby', '2026-05-01'),
('T002', 'Sara Al-Balushi', 'The Road', '2026-04-20'),
('T003', 'Mohammed Al-Abri', 'The City of God', '2026-04-28'),
('T004', 'Maha Al-Hinai', 'Hamlet', '2026-05-10'),
('T005', 'Khalid Al-Rawahi', 'The Art of War', '2026-05-15');
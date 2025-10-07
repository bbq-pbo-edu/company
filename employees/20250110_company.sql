USE company;

DROP TABLE IF EXISTS employees;
CREATE TABLE employees
(
    id      INT AUTO_INCREMENT PRIMARY KEY,
    fname   VARCHAR(255),
    lname   VARCHAR(255)
);

INSERT INTO employees(fname, lname)
VALUES ('John', 'Doe'),
       ('Jane', 'Doe'),
       ('Joe', 'Doe');
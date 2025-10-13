USE company;

DROP TABLE IF EXISTS department;

CREATE TABLE department
(
    id      INT AUTO_INCREMENT PRIMARY KEY,
    name   VARCHAR(255)
);

INSERT INTO department(name)
VALUES ('Inhumane Resources'),
       ('Support'),
       ('Development');
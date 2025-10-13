USE company;

DROP TABLE IF EXISTS employee;
CREATE TABLE employee
(
    id      INT AUTO_INCREMENT PRIMARY KEY,
    first_name   VARCHAR(255),
    last_name   VARCHAR(255),
    created_at  TIMESTAMP(0) DEFAULT CURRENT_TIMESTAMP,
    last_updated TIMESTAMP(0) DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO employee(first_name, last_name)
VALUES ('John', 'Doe'),
       ('Jane', 'Doe'),
       ('Joe', 'Doe');
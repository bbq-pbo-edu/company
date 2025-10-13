USE company;

DROP TABLE IF EXISTS department;

CREATE TABLE department
(
    id      INT AUTO_INCREMENT PRIMARY KEY,
    name   VARCHAR(255),
    is_hiring   BOOL DEFAULT FALSE,
    work_mode   ENUM('remote', 'hybrid', 'onsite') DEFAULT 'onsite',
    created_at  TIMESTAMP(0) DEFAULT CURRENT_TIMESTAMP,
    last_updated TIMESTAMP(0) DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO department(name, is_hiring, work_mode)
VALUES ('Inhumane Resources', true, 'onsite'),
       ('Support', false, 'remote'),
       ('Development', true, 'hybrid');
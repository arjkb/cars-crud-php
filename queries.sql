DROP TABLE IF EXISTS cars;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20),
    useremail VARCHAR(30),
    passhash VARCHAR(256)
);

INSERT INTO users(username, useremail, passhash) VALUES
('Kim', 'kim@example.com', '$2y$10$yMQzS4rk6BkKW30OLq1ht.0D1wH8yeI5g/zJSSWcYCanlLBlSVHz.'), -- kim123
('Jim', 'jim@example.com', '$2y$10$U02p7io4NBPmeWXcR3oc0Oq5eH.FA4EI56bwM/un6o81/wkToYwNm'), -- jim123
('Tim', 'tim@example.com', '$2y$10$2Ow0i3XV0XaEvr4jDwSN0ecECuoEYGxbgGs3okY3tOO6kqSk1t8DW'); -- tim123

CREATE TABLE cars (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(20),
    model VARCHAR(20),
    year SMALLINT UNSIGNED,
    kilometer INT UNSIGNED,
    transmission ENUM('Manual',
                      'Automated-Manual',
                      'Continuously-Variable',
                      'Torque-Converter',
                      'Dual-Clutch') DEFAULT 'Manual',
    owner_id INTEGER,
    FOREIGN KEY (owner_id) REFERENCES users(id)
        ON DELETE CASCADE
);

INSERT INTO cars(make, model, year, kilometer, transmission, owner_id) VALUES
('Toyota', 'Crysta', 2017, 23452, 'Torque-Converter', 1),
('Skoda', 'Superb', 2015, 83452, 'Dual-Clutch', 2),
('Honda', 'City', 2016, 63452, 'Continuously-Variable', 3),
('Hyundai', 'Nios', 2019, 207, 'Automated-Manual', 1),
('VW', 'Vento', 2013, 145000, 'Manual', 2);

INSERT INTO cars(make, model, year, kilometer, owner_id) VALUES ('Tata', 'Tiago', 2018, 14567, 1);

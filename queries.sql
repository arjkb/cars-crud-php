DROP TABLE cars;

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
                      'Dual-Clutch') DEFAULT 'Manual'
);

INSERT INTO cars(make, model, year, kilometer, transmission) VALUES
('Toyota', 'Crysta', 2017, 23452, 'Torque-Converter'),
('Skoda', 'Superb', 2015, 83452, 'Dual-Clutch'),
('Honda', 'City', 2016, 63452, 'Continuously-Variable'),
('Hyundai', 'Nios', 2019, 207, 'Automated-Manual'),
('VW', 'Vento', 2013, 145000, 'Manual');

INSERT INTO cars(make, model, year, kilometer) VALUES ('Tata', 'Tiago', 2018, 14567);

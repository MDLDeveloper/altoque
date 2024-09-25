CREATE TABLE user (
    id_user INTEGER PRIMARY KEY AUTO_INCREMENT, 
    name VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    numberphone VARCHAR(15), 
    birthdate DATE NOT NULL,
    gender INTEGER NOT NULL, 
    singupdate DATE NOT NULL
); 

CREATE TABLE country (
    id_country INTEGER PRIMARY KEY AUTO_INCREMENT, 
    name VARCHAR(80) NOT NULL,
    code VARCHAR(5) NOT NULL UNIQUE
);

CREATE TABLE province (
    id_province INTEGER PRIMARY KEY AUTO_INCREMENT, 
    name VARCHAR(80) NOT NULL,
    id_country INTEGER NOT NULL,
    FOREIGN KEY (id_country) REFERENCES country(id_country) ON DELETE CASCADE
);

CREATE TABLE locality (
    id_locality INTEGER PRIMARY KEY AUTO_INCREMENT, 
    name VARCHAR(80) NOT NULL,
    id_province INTEGER NOT NULL,
    FOREIGN KEY (id_province) REFERENCES province(id_province) ON DELETE CASCADE
);

CREATE TABLE address (
    id_address INTEGER PRIMARY KEY AUTO_INCREMENT,
    address VARCHAR(150) NOT NULL, 
    number VARCHAR(10) NOT NULL,
    complement VARCHAR(255),
    id_country INTEGER NOT NULL,
    id_province INTEGER NOT NULL,
    id_locality INTEGER NOT NULL,
    id_user INTEGER NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE,
    FOREIGN KEY (id_country) REFERENCES country(id_country) ON DELETE CASCADE,
    FOREIGN KEY (id_province) REFERENCES province(id_province) ON DELETE CASCADE,
    FOREIGN KEY (id_locality) REFERENCES locality(id_locality) ON DELETE CASCADE
);

CREATE TABLE credentials (
    id_credentials INTEGER PRIMARY KEY AUTO_INCREMENT, 
    username VARCHAR(255) NOT NULL,
    psw VARCHAR(255) NOT NULL,
    token VARCHAR(255),
    lastlogin DATE, 
    id_user INTEGER NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE
);

-- Datos iniciales para el país
INSERT INTO country (name, code) VALUES ("Argentina", "ARG");
INSERT INTO country (name, code) VALUES ("Brasil", "BRA");
INSERT INTO country (name, code) VALUES ("Chile", "CHL");
INSERT INTO country (name, code) VALUES ("Colombia", "COL");
INSERT INTO country (name, code) VALUES ("Ecuador", "ECU");
INSERT INTO country (name, code) VALUES ("Mexico", "MEX");
INSERT INTO country (name, code) VALUES ("Peru", "PER");
INSERT INTO country (name, code) VALUES ("Uruguay", "URU");

-- Datos iniciales para la provincia
INSERT INTO province (name, id_country) VALUES ("Buenos Aires", 1);
INSERT INTO province (name, id_country) VALUES ("Ciudad Autónoma de Buenos Aires", 1);
INSERT INTO province (name, id_country) VALUES ("Entre Ríos", 1);
INSERT INTO province (name, id_country) VALUES ("La Pampa", 1);
INSERT INTO province (name, id_country) VALUES ("Mendoza", 1);
INSERT INTO province (name, id_country) VALUES ("Neuquén", 1);
INSERT INTO province (name, id_country) VALUES ("Río Negro", 1);
INSERT INTO province (name, id_country) VALUES ("Salta", 1);
INSERT INTO province (name, id_country) VALUES ("San Juan", 1);
INSERT INTO province (name, id_country) VALUES ("San Luis", 1);
INSERT INTO province (name, id_country) VALUES ("Santa Cruz", 1);
INSERT INTO province (name, id_country) VALUES ("Santa Fe", 1);
INSERT INTO province (name, id_country) VALUES ("Santiago del Estero", 1);
INSERT INTO province (name, id_country) VALUES ("Tierra del Fuego", 1);
INSERT INTO province (name, id_country) VALUES ("Tucumán", 1);

-- Datos iniciales para las ciudades
INSERT INTO locality (name, id_province) VALUES ("La Plata", 1);
INSERT INTO locality (name, id_province) VALUES ("Lomas de Zamora", 1);
INSERT INTO locality (name, id_province) VALUES ("Mar del Plata", 1);
INSERT INTO locality (name, id_province) VALUES ("San Miguel de Tucumán", 15);
INSERT INTO locality (name, id_province) VALUES ("San Nicolás de los Arroyos", 1);
INSERT INTO locality (name, id_province) VALUES ("Santa Teresa", 13);
INSERT INTO locality (name, id_province) VALUES ("Tacuarembó", 15);
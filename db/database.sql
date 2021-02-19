/**
 * Version Mysql
 */

CREATE DATABASE IF NOT EXISTS 'intelcost_bienes';
USE 'intelcost_bienes';


CREATE TABLE IF NOT EXISTS 'types' (
  'id' int(11) NOT NULL AUTO_INCREMENT,
  'type_name' varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY ('id')
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

CREATE TABLE IF NOT EXISTS 'cities' (
  'id' int(11) NOT NULL AUTO_INCREMENT,
  'city_name' varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY ('id')
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



CREATE TABLE IF NOT EXISTS 'realstate' (
    'id' int(11) NOT NULL AUTO_INCREMENT,
    'addres' varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
    'phone' varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
    'postal_code' varchar(6) COLLATE utf8_spanish2_ci NOT NULL,
    'price' float NOT NULL,
    'city_id' int(11) NOT NULL,
    'type_id' int(11) NOT NULL,
    PRIMARY KEY ('id'),
    CONSTRAINT FOREIGN KEY ('city_id') REFERENCES 'cities' ('id') ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FOREIGN KEY ('type_id') REFERENCES 'types' ('id') ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



INSERT INTO 'cities' ('id', 'city_name') VALUES
    (1, 'New York'),
    (2, 'Orlando'),
    (3, 'Los Angeles'),
    (4, 'Houston'),
    (5, 'Washington'),
    (6, 'Miami');

INSERT INTO 'types' ('id', 'city_name') VALUES
    (1, 'Casa'),
    (2, 'Casa de campo'),
    (3, 'Apartamento');


/**
 * Version Postgres
 */
CREATE DATABASE intelcost_bienes;

CREATE TABLE types(
    id SERIAL,
    type_name VARCHAR(50),
    PRIMARY KEY (id)
);

CREATE TABLE cities(
    id SERIAL,
    city_name VARCHAR(50),
    PRIMARY KEY (id)
);

CREATE TABLE realstate (
    id SERIAL,
    addres VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    postal_code VARCHAR(6) NOT NULL,
    price NUMERIC NOT NULL,
    city_id INTEGER NOT NULL,
    type_id INTEGER NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (city_id) REFERENCES cities(id) ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (type_id) REFERENCES types(id) ON UPDATE CASCADE ON DELETE RESTRICT
);


INSERT INTO cities (id, city_name) VALUES
    (1, 'New York'),
    (2, 'Orlando'),
    (3, 'Los Angeles'),
    (4, 'Houston'),
    (5, 'Washington'),
    (6, 'Miami');

INSERT INTO types (id, type_name) VALUES
    (1, 'Casa'),
    (2, 'Casa de campo'),
    (3, 'Apartamento');



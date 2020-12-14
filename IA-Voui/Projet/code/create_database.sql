CREATE DATABASE flights;

use flights;

CREATE TABLE flights
(
id int,
prix int,
nb_places int,
origin varchar(10),
destination varchar(10),
travel_time varchar(10),
travel_duration int
);


CREATE TABLE users
(
id int,
mail varchar(100),
id_reservation int
);

CREATE TABLE ville 
(
id int,
nom_airport varchar(10),
ville varchar(10)
);

source database_new.sql;

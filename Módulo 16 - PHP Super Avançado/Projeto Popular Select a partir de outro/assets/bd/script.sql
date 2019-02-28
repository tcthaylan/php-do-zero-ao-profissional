create database projeto_popular_select;

use projeto_popular_select;

create table modulos (
	id int primary key auto_increment,
    titulo varchar(50) not null
);

create table aulas (
	id int primary key auto_increment,
    id_modulo int,
    titulo varchar(50) not null
);

insert into modulos values 
(DEFAULT, 'Matemática'),
(DEFAULT, 'Português'),
(DEFAULT, 'História');

insert into aulas values 
(DEFAULT, 1, 'Soma'),
(DEFAULT, 1, 'Subtração'),
(DEFAULT, 1, 'Multiplicação'),
(DEFAULT, 1, 'Divisão'),
(DEFAULT, 2, 'Verbo'),
(DEFAULT, 2, 'Substantivo'),
(DEFAULT, 2, 'Adjetivo'),
(DEFAULT, 2, 'Pronome'),
(DEFAULT, 3, 'Brasil'),
(DEFAULT, 3, 'Japão'),
(DEFAULT, 3, 'Argentina'),
(DEFAULT, 3, 'Uruguai');


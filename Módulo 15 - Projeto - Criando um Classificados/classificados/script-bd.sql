create database estoque
default character set utf8
default collate utf8_general_ci;

use estoque;

create table users (
	id int primary key auto_increment,
    user_number int not null,
    user_pass varchar(32) not null,
    user_token varchar(32) null
)default charset = utf8;

create table pruducts (
	id int primary key auto_increment,
    cod int(30) null,
    name varchar(100) not null,
    price float not null,
    quantity float not null,
    min_quantity float not null
) default charset = utf8;

rename table pruducts to products;

select * from products;
desc products;

create table sales_historic (
	id int primary key auto_increment,
    id_product int not null,
    sales_quantity int not null
)default charset = utf8; 

select * from users;


create database dps;

use dps;

create table usuarios(
	id int not null auto_increment,
    nome varchar(300) not null,
    email varchar(300),
    senha varchar(300) not null,
    dataNasc date,
    primary key(id)
);

create table livros(
	isbn int not null auto_increment,
    nome varchar(300) not null,
    descricao varchar(1000) not null,
	paginas int not null,
    editora varchar(50) not null,
    primary key(isbn)
);

create table likes(
	id int not null auto_increment,
    idUsuarios int not null,
    isbnLivros int not null,
    likes int,
    primary key(id),
    foreign key (idUsuarios) references usuarios(id),
    foreign key (isbnLivros) references livros(isbn)
);

INSERT INTO usuarios VALUES 
(1, 'root', 'test@email.com', '12345', '2006-05-22');
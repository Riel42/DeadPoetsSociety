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

ALTER TABLE livros
ADD address varchar(255);

select * from livros;

INSERT INTO livros (nome, descricao, paginas, editora, address) VALUES 
("1984", "Romance distópico", 316, "Companhia das Letras", ""),
("A Metamorfose", "Romance - Ficção", 100, "Antofágica", ""),
("O Hobbit", "Livro de fantasia medieval infantojuvenil", 350, "HarperCollins Brasil", ""),
("O Pequeno Príncipe", "Livro de ficção infantojuvenil", 115, "Companhia das Letras", ""),
("Velho e o Mar", "Ficção cubana", 164, "Bertrand Brasil", "");


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

ALTER TABLE usuarios
ADD foto varchar(255);
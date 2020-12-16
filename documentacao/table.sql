/* Versão 2.0 */
drop database if exists prestadores;
create database prestadores;
use prestadores;

create table prestadores(
	id_prest integer primary key not null auto_increment, 
	nome varchar(40) not null,
    telefone varchar (15) not null,
    funcoes varchar (30) not null, 
    valorHora decimal (10,2) not null
);

create table obras(
	id_obra integer primary key not null auto_increment,
	descricao varchar(40) not null,
	duracao_prevista_horas integer
);

create table os(
	num_os integer primary key not null auto_increment,
	id_prest integer not null,
	id_obra integer not null,
    dataInicial date not null,
	dataFinal date,
    totalHoras integer,
	constraint fk_os_prestadores foreign key (id_prest) references prestadores(id_prest),
	constraint fk_os_obras foreign key (id_obra) references obras(id_obra)
);

show tables;

insert into prestadores values
(default,"Maísa Drudi", "19 99749-3553", "decoradora", 200),
(default,"Caio", "19 99255-2446", "pedreiro", 50),
(default,"Caique", "19 97421-5147", "encanador", 50),
(default,"Rafael", "19 98214-0611","eletricista", 100);

insert into obras values
(default, "Arrumar torneira", 4),
(default, "Decorar a sala", 8),
(default, "Trocar fiação cozinha", 16),
(default, "Reformar Banheiro", 40);

insert into os values
(default, 3, 1, curdate(), null, null),
(default, 1, 2, curdate()+5, null, null),
(default, 4, 3, curdate()-5, curdate()-4, 16),
(default, 2, 4,curdate()-10, curdate()-, 40),
(default, 2, 1, curdate()-10, curdate()-3, 12);

select * from prestadores;
select * from obras;
select * from os;

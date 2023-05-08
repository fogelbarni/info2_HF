drop schema if exists zh_gyak;
create schema zh_gyak;
use zh_gyak;

CREATE TABLE szinesz (
id int primary key auto_increment,
nev varchar(100)
);

CREATE TABLE film (
id int primary key auto_increment,
cim varchar(100)
);

CREATE TABLE szereples (
szinesz_id int,
film_id int,
foreign key(szinesz_id) references szinesz(id),
foreign key(film_id) references film(id)
);


INSERT INTO szinesz(nev) VALUES('George Clooney');
INSERT INTO szinesz(nev) VALUES('Sandra Bullock');
INSERT INTO szinesz(nev) VALUES('Graham Chapman');
INSERT INTO szinesz(nev) VALUES('Selena Gomez');

INSERT INTO film(cim) VALUES('Gravity');
INSERT INTO film(cim) VALUES('Vészhelyzet');
INSERT INTO film(cim) VALUES('Monty Phyton');
INSERT INTO film(cim) VALUES('The ideas of march');
INSERT INTO film(cim) VALUES('Hotel Transylvania');
INSERT INTO film(cim) VALUES('The Proposal');
INSERT INTO film(cim) VALUES('Miss Congeniality');

INSERT INTO szereples(szinesz_id, film_id) VALUES(1,1);
INSERT INTO szereples(szinesz_id, film_id) VALUES(1, 2);
INSERT INTO szereples(szinesz_id, film_id) VALUES(1, 4);
INSERT INTO szereples(szinesz_id, film_id) VALUES(2, 1);
INSERT INTO szereples(szinesz_id, film_id) VALUES(2, 6);
INSERT INTO szereples(szinesz_id, film_id) VALUES(2, 7);
INSERT INTO szereples(szinesz_id, film_id) VALUES(3, 3);
INSERT INTO szereples(szinesz_id, film_id) VALUES(4, 5);


drop schema if exists zh_gyak1;
create schema zh_gyak1;
use zh_gyak1;

CREATE TABLE mellek (
id int primary key,
szam int
);

CREATE TABLE szoba (
id int primary key,
szobaszam varchar(10)
);


CREATE TABLE kollega (
id int primary key,
nev varchar(100),
szoba_id int,
mellek_id int,
foreign key(szoba_id) references szoba(id),
foreign key(mellek_id) references mellek(id)
);

insert into mellek values(1, 3702);
insert into mellek values(2, 2870);
insert into mellek values(3, 2884);


insert into szoba values(1, "QB226");
insert into szoba values(2, "QB207");


insert into kollega values(1, "Csorba Kristóf", 1, 1);
insert into kollega values(2, "Ekler Péter", 1, 1);
insert into kollega values(3, "Almási Nóra", 2, 2);
insert into kollega values(4, "Táborszki Anna", 2, 3);

select kollega.nev, mellek.szam from kollega inner join szoba on szoba.id = kollega.szoba_id
inner join mellek on mellek.id = kollega.mellek_id where szoba.szobaszam = "QB226"
order by kollega.nev;




drop schema if exists zh2;
create schema zh2;
use zh2;

create table arufeltolto(
	id int primary key,
    nev varchar(50),
    fizetes int
);

insert into arufeltolto values(1, "Nagy Dénes", 255000);
insert into arufeltolto values(2, "Nagy Erika", 255000);
insert into arufeltolto values(3, "Kiss János", 200000);


create table bolt(
	id int primary key,
    cim varchar(30),
    terulet int,
    arufeltoltoid int,
    foreign key(arufeltoltoid) references arufeltolto(id)
);

insert into bolt values(1, "Kő utca 3", 200, 1);
insert into bolt values(2, "Fa út 4/B", 150, 2);
insert into bolt values(3, "Fa út 224", 300, 1);
insert into bolt values(4, "Nagy tér 1", 125, 3);


create table elado(
	id int primary key auto_increment,
    nev varchar(50),
	fizetes int,
    boltid int,
    foreign key(boltid) references bolt(id)
);

insert into elado values(1, "Kiss Anna", 300000, 1);
insert into elado values(2, "Nagy Cecil", 370000, 1);
insert into elado values(3, "Közepes Béla", 350000, 2);

select arufeltolto.nev, count(bolt.id) as 'boltok szama', sum(bolt.terulet) as 'terulet'
from arufeltolto inner join bolt on arufeltolto.id = bolt.arufeltoltoid
where arufeltolto.fizetes > 250000
group by arufeltolto.id;


insert into elado(nev, fizetes) values('valaki', 1500);
select * from elado;


drop schema if exists mintazh;
create schema mintazh;
use mintazh;

create table allat(
	id int primary key,
    nev varchar(50),
    faj varchar(50)
);

insert into allat values(1, 'Glória', 'viziló');
insert into allat values(2, 'Bálint', 'viziló');
insert into allat values(3, 'Meng', 'panda');
insert into allat values(4, 'Theo', 'zsiráf');

create table gondozo(
	id int primary key,
    nev varchar(50),
    kor int
);

insert into gondozo values(1,'Kiss Anna', 28);
insert into gondozo values(2,'Közepes Béla', 42 );
insert into gondozo values(3,'Nagy Cecil', 56);

create table kapcsolat(
	allatid int,
    gondozoid int,
    foreign key(allatid) references allat(id),
    foreign key(gondozoid) references gondozo(id)
);

insert into kapcsolat values(1,1);
insert into kapcsolat values(3,1);
insert into kapcsolat values(4,1);
insert into kapcsolat values(2,2);
insert into kapcsolat values(2,3);

select allat.id as 'id', allat.nev as 'nev', min(gondozo.kor) as 'legfiatalabb'
from allat inner join kapcsolat on allat.id = kapcsolat.allatid
inner join gondozo on gondozo.id = kapcsolat.gondozoid
where allat.faj = 'viziló'
group by allat.id
order by allat.nev;

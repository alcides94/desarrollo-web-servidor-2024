CREATE SCHEMA animes_bd;
USE animes_bd;

CREATE TABLE estudios (
	nombre_estudio VARCHAR(30) PRIMARY KEY,
    ciudad VARCHAR(40),
    anno_fundacion NUMERIC(4,0)
);

CREATE TABLE animes (
	id_anime INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(80) UNIQUE,
    nombre_estudio VARCHAR(30),
    anno_estreno NUMERIC(4,0),
    num_temporadas NUMERIC(2,0),
    FOREIGN KEY (nombre_estudio) REFERENCES estudios(nombre_estudio)
);

INSERT INTO estudios VALUES ('Kyoto Animation', 'Kioto', 1981);
INSERT INTO estudios VALUES ('Diomedéa', 'Tokio', 2005);
INSERT INTO estudios VALUES ('Studio Deen', 'Nanto', 1975);
INSERT INTO estudios VALUES ('Mappa', 'Tokio', 2011);
INSERT INTO estudios VALUES ('Studio Ghibli', 'Tokio', 1985);
INSERT INTO estudios VALUES ('A-1 Pictures', 'Tokio', 2005);
INSERT INTO estudios VALUES ('CloverWorks', 'Tokio', 2018);
INSERT INTO estudios VALUES ('Toei Animation', 'Tokio', 1948);
INSERT INTO estudios VALUES ('Trigger', 'Tokio', 2011);
INSERT INTO estudios VALUES ('Madhouse', 'Tokio', 1972);
INSERT INTO estudios VALUES ('Bones', 'Tokio', 1998);
INSERT INTO estudios VALUES ('TOHO Animation', 'Tokio', 2012);
INSERT INTO estudios VALUES ('Wit Studio', 'Tokio', 2012);
INSERT INTO estudios VALUES ('OLM', 'Tokio', 1990);

INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Hibike! Euphonium', 'Kyoto Animation', 2015, 3);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Frieren', 'Madhouse', 2023, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Violet Evergarden', 'Kyoto Animation', 2018, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Sword Art Online', 'A-1 Pictures', 2012, 3);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Kaguya-sama: Love is War', 'A-1 Pictures', 2019, 3);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('86 Eighty Six', 'A-1 Pictures', 2021, 3);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Bocchi the Rock!', 'CloverWorks', 2022, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Tragones y Mazmorras', 'Trigger', 2024, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Little Witch Academia', 'Trigger', 2017, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('The Magical Revolution of the Reincarnated Princess and the Genius Young Lady', 'Diomedéa', 2023, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Shinsekai Yori', 'A-1 Pictures', 2012, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Fullmetal Alquemist', 'Bones', 2009, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Los diarios de la boticaria', 'TOHO Animation', 2023, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Ataque a los titanes', 'Wit Studio', 2013, 4);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('One Piece', 'Toei Animation', 1999, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Hunter x Hunter', 'Madhouse', 2011, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Death Note', 'Madhouse', 2006, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Nana', 'Madhouse', 2006, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Spy x Family', 'CloverWorks', 2022, 2);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('A Place Further than the Universe', 'Madhouse', 2018, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Summertime Render', 'OLM', 2022, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Nichijou', 'Kyoto Animation', 2011, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Girls Band Cry', 'Toei Animation', 2024, 1);
    
    
USE animes_bd;
/*mostrar titulo y nombre de estudio*/
select titulo, nombre_estudio from animes;

/*mostrar titulo y nombre de estudio ORDENADO descendente*/
select titulo, nombre_estudio from animes order by titulo DESC;

/*mostrar animes con titulo Frieren*/
select * from animes where titulo="Frieren";

/*mostrar titulo que solo comienzan con F*/

select * from animes where titulo like "f%";

/*mostrar que contenga a*/
select * from animes where titulo like "%a%";

/*un buscador*/
select * from animes where titulo like "%Frieren%";

/*toda la info de anime y de estudios*/
select * from animes;
select * from estudios;

-- nombre anime estudio ciudad

select a.titulo, e.nombre_estudio, e.ciudad 
	from animes a join estudios e 
    ON a.nombre_estudio =e.nombre_estudio;


-- nombre anime estudio ciudad con un filtro

select a.titulo, e.nombre_estudio, e.ciudad 
	from animes a join estudios e 
    ON a.nombre_estudio =e.nombre_estudio
    where titulo like "F%"
    order by titulo;


/*Insertar */    
insert into estudios values ("Pierrot", "Tokio", 1979);
insert into animes values (26,"black over", "Pierrot", 2017,1);

select * from animes;
select * from estudios;

update animes
set num_temporadas=2
where titulo="black over";

select * from animes where titulo="black over";

/*eliminar*/
delete from animes where titulo="black over";

insert into animes (titulo,nombre_estudio,anno_estreno,num_temporadas)
values ("black over", "Pierrot", 2017,1);

select * from animes;
/*`PARA VOLVER A UN MOMENTO ANTES PRIMERO SE EJECUTA AUTOCOMMIT Y DESPUES SE INSERTA O DEMAS Y DESPUES SI NO SABEMOS ROLLBACK*/
set autocommit=0;
insert into animes values(29,"Kimetsu JA", "Pierrot",2020,3);

/*ROLLBACK BORRA TODO HASTA EL ULTIMO PUNTO GUARDADO*/
rollback;
select * from animes;

/*actualizamos en modo admin*/
set sql_safe_updates=0;

/*eliminamos la tabla animes*/
set autocommit=0;
delete from animes;
select * from animes;
rollback;

/**/
insert into animes values (31,"black", "Pierrot", 2017,1);

/*COMMIT CREA UN PUNTO DE GUARDADO*/
commit;
insert into animes values (32,"blacka", "Pierrot", 2017,1);
rollback;
select * from animes;
rollback;
select * from animes;
select * from estudios;
/*TRANSACCION ATOMICA:TODAS LAS  INSTRUCCIONES SE EJECUTAN COMO SI
FUERAN UNA SOLA O SE EJECUTA TODO O NADA*/

select * FROM animes_bd.animes;

/*CREAMOS UNA NUEVVA COLUMNA PARA AGREGAR IMAGENES*/
ALTER TABLE animes ADD column imagen VARCHAR(80);






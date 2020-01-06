CREATE TABLE infotarjeta(
 id SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT primary key,
 fullname varchar (50) NOT NULL,
 direccion varchar (45) NOT NULL,
 pais varchar (45) NOT NULL,
 localidad varchar (40) NOT NULL,
 cp_zip varchar (6) NOT NULL,
 namecard varchar(45) not null,
 numerotarjeta varchar(16) not null,
 exp_month varchar(45)not null,
 exp_year varchar(4)not null,
 cvv varchar(4)not null
);


CREATE TABLE Formas_de_Pagos (
  id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT primary key,
  clave CHAR(2) NULL,
  descripcion VARCHAR(50) NULL,
  infotarjeta_id SMALLINT UNSIGNED NOT NULL,
  INDEX fk_Formas_de_Pagos_infotarjeta1_idx (infotarjeta_id ASC),
  CONSTRAINT fk_Formas_de_Pagos_infotarjeta1
    FOREIGN KEY (infotarjeta_id)
    REFERENCES glitchord.infotarjeta (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE ventas (
  id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT primary key,
  cantidad TINYINT NULL,
  iva DECIMAL(6,2) NULL,
  total DECIMAL(7,2) NULL,
  Formas_de_Pagos_id TINYINT UNSIGNED NOT NULL,
  usuarios_id SMALLINT(5) UNSIGNED NOT NULL,
  productos_id smallint unsigned not null,
  INDEX fk_ventas_Formas_de_Pagos1_idx (Formas_de_Pagos_id ASC),
  INDEX fk_productos1_idx (productos_id ASC),
  INDEX fk_ventas_usuarios1_idx (usuarios_id ASC),
  CONSTRAINT fk_ventas_Formas_de_Pagos1
    FOREIGN KEY (Formas_de_Pagos_id)
    REFERENCES glitchord.Formas_de_Pagos (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT fk_ventas_productos1
    FOREIGN KEY (productos_id)
    REFERENCES glitchord.productos (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_ventas_usuarios1
    FOREIGN KEY (usuarios_id)
    REFERENCES glitchord.usuarios (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- ///////////////////////////////////////////////////////////////////////////////////////////////////
-- ///////////////////////////////////////////////////////////////////////////////////////////////////

drop database glitchord;
create database glitchord;
use glitchord;
CREATE TABLE usuarios(
 id SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT primary key,
 uname varchar (10) NOT NULL UNIQUE,
 email varchar (20) NOT NULL UNIQUE,
 psw varchar (30) NOT NULL,
 nombre varchar(20) not null,
 apellido varchar(20) not null,
 edad TINYINT(2)not null,
 genero varchar(6)not null
);



CREATE TABLE admins(
 idadmin int(6) UNSIGNED NOT NULL AUTO_INCREMENT primary key,
 uname varchar (10) NOT NULL UNIQUE,
 psw varchar (30) not null
);

/*inserta un admin por default*/
insert into admins values (null,'admin','%ÕZÒƒª@\nôdÇmq<­');

CREATE TABLE productos (
  id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT primary key,
  codigo CHAR(5) NULL,
  descripcion VARCHAR(45) NULL,
  imagen VARCHAR(30) null,
  precio DECIMAL(6,2) NULL,
  etiqueta_new varchar(2)
);
select * from productos;
/*insertar productos*/
insert into productos (codigo,descripcion,imagen,precio,etiqueta_new) values('pmwb1',"Sudadera Mujer","girl_white_3.png",249.99,"si");
insert into productos (codigo,descripcion,imagen,precio,etiqueta_new) values('pmgb1',"Sudadera Mujer","girl_gray_black_3.png",249.99,"");
insert into productos (codigo,descripcion,imagen,precio,etiqueta_new) values('pmwr1',"Sudadera Mujer","girl_white_red_3.png",249.99,"");
insert into productos (codigo,descripcion,imagen,precio,etiqueta_new) values('pmbr1',"Sudadera Mujer","girl_black_red_3.png",249.99,"si");
insert into productos (codigo,descripcion,imagen,precio,etiqueta_new) values('pmbw1',"Sudadera Mujer","girl_black_2.png",249.99,"");

insert into productos (codigo,descripcion,imagen,precio,etiqueta_new) values('cmbw1',"Camiseta Mujer","girl_black_1.png",139.99,"");
insert into productos (codigo,descripcion,imagen,precio,etiqueta_new) values('cmwb1',"Camiseta Mujer","girl_white_1.png",139.99,"");
insert into productos (codigo,descripcion,imagen,precio,etiqueta_new) values('chbw1',"Camiseta Hombre","boy_black_1.png",139.99,"si");
insert into productos (codigo,descripcion,imagen,precio,etiqueta_new) values('chbw2',"Camiseta Hombre","boy_black_2.png",139.99,"");
insert into productos (codigo,descripcion,imagen,precio,etiqueta_new) values('chbw3',"Camiseta Hombre","boy_black_3.png",139.99,"");


CREATE TABLE compras(
 id SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT primary key,
 numventa INT NOT NULL,
 nombre varchar (30) NOT NULL,
 imagen varchar (30) NOT NULL,
 precio DECIMAL(6,2) NULL,
 cantidad TINYINT NULL,
 subtotal DECIMAL(6,2) NULL
);

select * from compras;
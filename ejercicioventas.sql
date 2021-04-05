
CREATE TABLE `clientes` (
  `Cli_Id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `Cli_Nombre` varchar(80) NOT NULL DEFAULT '',
  `Cli_DPI` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Cli_Id`)
);

INSERT into clientes(Cli_Nombre, Cli_DPI) Values('Juan', 123456781), ('Sofia', 123456782), ('Madison', 123456783), ('Alex', 123456784);

select * from clientes;

CREATE TABLE `vendedores` (
  `Vnrs_Id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `Vnrs_Nombre` varchar(80) NOT NULL DEFAULT '',
  `Vnrs_Codigo` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Vnrs_Id`)
);

INSERT into vendedores(Vnrs_Nombre, Vnrs_Codigo) Values('Carlos', 201), ('Karla', 202), ('Luis', 203), ('Joan', 204), ('Javier', 205);

select * from vendedores;

CREATE TABLE `proveedores` (
  `Prov_Id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `Prov_Nombre` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`Prov_Id`)
);

INSERT into proveedores (Prov_Nombre) Values('La Terminal'), ('San Jose'), ('La Quinta'), ('Cerveceria Centro Amaricana'), ('San Julian');

select * from proveedores;

CREATE TABLE `medios_de_pago` (
  `MP_Id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `MP_Descripcion` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`MP_Id`)
);

INSERT into medios_de_pago (MP_Descripcion) Values('efectivo'), ('visa'), ('master card'), ('american express'), ('cripto');

select * from medios_de_pago;

CREATE TABLE `productos` (
  `Prod_Id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `Prod_Descripcion` varchar(80) NOT NULL DEFAULT '',
  `Prod_Precio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `Prod_Prov_Id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Prod_Id`),
  KEY `Prod_Prov_Id` (`Prod_Prov_Id`)
);

INSERT into productos (Prod_Descripcion, Prod_Precio, Prod_Prov_Id) 
Values
('Jabon Aromatico', 15.50, 1), 
('Pantene', 50.99, 1), 
('Carne', 3.50, 1), 
('Salchichas', 30.00, 2),
('Agua Pura', 2.00, 2), 
('Cerveza Gallo', 13.50, 4), 
('Dorada Ice', 6.50, 4), 
('Avena', 20.25, 3), 
('Aguacate', 5.99, 3);

select * from productos;

CREATE TABLE `medios_de_pago_detalle` (
  `MPD_Id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `MPD_Ven_Id` int(8) DEFAULT 0,
  `MPD_MP_Id` int(8) DEFAULT 0,
  `MPD_Importe` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`MPD_Id`),
  KEY `MPD_Ven_Id` (`MPD_Ven_Id`),
  KEY `MPD_MP_Id` (`MPD_MP_Id`)
);

desc medios_de_pago_detalle;

CREATE TABLE `ventas` (
  `Ven_Id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `Ven_Cli_Id` int(8) DEFAULT 0,
  `Ven_Vnrs_Id` int(8) DEFAULT 0,
  `Ven_Factura` int(8) DEFAULT 0,
  `Ven_Total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `Ven_Fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Ven_Id`),
  KEY `Ven_Cli_Id` (`Ven_Cli_Id`),
  KEY `Ven_Vnrs_Id` (`Ven_Vnrs_Id`)
);


CREATE TABLE `ventas_detalle` (
  `VenD_Id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `VenD_Ven_Id` int(8) DEFAULT 0,
  `VenD_Prod_Id` int(8) DEFAULT 0,
  `VenD_Cantidad` int(8) DEFAULT 0,
  `VenD_Total` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`VenD_Id`),
  KEY `VenD_Ven_Id` (`VenD_Ven_Id`),
  KEY `VenD_Prod_Id` (`VenD_Prod_Id`)
);



-- Insertar en tk_proveedores
INSERT INTO tk_proveedores(nombre_de_la_empresa, correo_electronico, celular)
VALUES('soriana', 'supply.business@soriana.com', '1122334455');
INSERT INTO tk_proveedores(nombre_de_la_empresa, correo_electronico, celular)
VALUES('wallmart', 'negocios@wallmart.com', '5471966732');

-- Insertar en tk_repartidores
INSERT INTO tk_repartidores(nombre, apellidos, correo_electronico, celular, sueldo, comision)
VALUES('Light', 'Yagami', 'kira.world@outlook.com.jp', '6276885421', 200, 10);
INSERT INTO tk_repartidores(nombre, apellidos, correo_electronico, celular, sueldo, comision)
VALUES('Baki', 'Hanma', 'tunometecabra@xd.com', '5522887777', 200, 10);
INSERT INTO tk_repartidores(nombre, apellidos, correo_electronico, celular, sueldo, comision)
VALUES('Tobio', 'Kageyama', 'miyagiKarasuno@gmail.edu', '6582119883', 200, 10);

-- Insertar en tk_usuarios
INSERT INTO tk_usuarios(nombre, apellidos, fecha_nacimiento, correo_electronico, celular, contrasena)
VALUES('Minato', 'Namikaze', '2000-01-01', 'cuartohokage@hotmail.com', '2745632477', 'narutouzumaki');
INSERT INTO tk_usuarios(nombre, apellidos, fecha_nacimiento, correo_electronico, celular, contrasena)
VALUES('Kaguya', 'Shinomiya', '2001-05-24', 'teamomiyuki@yahoo.com', '3311774653','yukiyuki2');
INSERT INTO tk_usuarios(nombre, apellidos, fecha_nacimiento, correo_electronico, celular, contrasena)
VALUES('Tanjiro', 'Kamado', '1994-07-04', 'rengokuhashira@gmail.com', '7563669412','Tanjiro1234');
INSERT INTO tk_usuarios(nombre, apellidos, fecha_nacimiento, correo_electronico, celular, contrasena)
VALUES('Nino', 'Nakano', '1989-11-10', 'futarouesugi@hotmail.com.jp', '5522334411','nn1989');
INSERT INTO tk_usuarios(nombre, apellidos, fecha_nacimiento, correo_electronico, celular, contrasena, administrador)
VALUES('Mauricio', 'Solano', '2001-11-01', 'mauricio.solano@upaep.edu.mx', '5212215740459','deathlinex2001','1');
INSERT INTO tk_usuarios(nombre, apellidos, fecha_nacimiento, correo_electronico, celular, contrasena, administrador)
VALUES('Omar Arturo', 'Diaz Alarcón Aguilar', '2002-09-12', 'omararturo.diazalarcon@upaep.edu.mx', '5212211191720','c323965a2f50f07ea288b851e80d38df','1');


-- Insertar en tk_direccion_clientes
INSERT INTO tk_direccion_clientes(direccion_linea_1, direccion_linea_2, estado, ciudad, codigo_postal, cte_id)
VALUES('Primer Hokage 15', 'Segunda Seccion', 'CDMX', 'Konoha', 17263, '1');
INSERT INTO tk_direccion_clientes(direccion_linea_1, estado, ciudad, codigo_postal, cte_id)
VALUES('Alvaro Obregon 3419 Reforma Japonesa', 'Puebla', 'Tokio', 94385, '2');
INSERT INTO tk_direccion_clientes(direccion_linea_1, direccion_linea_2, estado, ciudad, codigo_postal, cte_id)
VALUES('Nivel Uno 66 Nerv', 'Edificio 2', 'Nuevo Leon','Tokio 3', 95894, '3');
INSERT INTO tk_direccion_clientes(direccion_linea_1, estado, ciudad, codigo_postal, cte_id)
VALUES('Lobo Blanco 4 Cuarta Seccion', 'CDMX', 'Konoha', 17263, '4');

-- Insertar en tk_articulos
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Penafiel', 35.00, 'Mezcladores', 'Agua mineral Penafiel de 2L embotellada', 200, '1');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Coca Cola', 42.00, 'Mezcladores', 'Refresco Cola Cola de 2L embotellada', 200, '1');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Manzana', 36.00, 'Mezcladores', 'Refresco Manzana de 2L embotellada', 200, '1');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Sprite', 36.00, 'Mezcladores', 'Refresco Sprite de 2L embotellada', 200, '1');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Clamato Natural', 28.00, 'Mezcladores', 'Jugo de Tomate Clamato Natural de 473ml embotellada', 200, '1');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Marlboro Gold', 80.00, 'Cigarros', 'Cajetilla Marlboro Gold', 100, '2');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Marlboro Rojos', 80.00, 'Cigarros', 'Cajetilla Marlboro Rojos', 100, '2');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Johnnie Walker Blanco', 849.00, 'Licores', 'Whisky Johnnie Walker Blanco de 750ml', 50, '2');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Don Julio Reposado', 659.00, 'Licores', 'Tequila Don Julio Reposado de 700ml', 50, '2');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Maestro Dobel Diamante', 880.00, 'Licores', 'Tequila Maestro Dobel Diamante de 700ml', 50, '2');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Bacardi Carta Blanca', 199.00, 'Licores', 'Ron Bacardi Carta Blanca de 750ml', 50, '2');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Smirnoff', 219.00, 'Licores', 'Vodka Smirnoff de 750ml', 50, '2');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Corona Laton', 80.00, 'Cervezas', '4 pack Corona Laton 473ml c/u', 50, '1');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Victoria Laton', 80.00, 'Cervezas', '4 pack Victoria Laton 473ml c/u', 50, '1');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Poker', 85.00, 'Extras', 'Cartas de Poker Plastificadas', 20, '2');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('PAKETAXTO Xtra Flamin Hot', 54.00, 'Extras', 'Frituras PAKETAXTO Xtra Flamin Hot 228g', 100, '2');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('PAKETAXTO Botanero', 54.00, 'Extras', 'Frituras PAKETAXTO Botanero 270g', 100, '2');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Bolsa de Hielos', 34.00, 'Extras', 'Bolsa de Hielos de 5Kg', 50, '2');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Patuchela', 29.90, 'Extras', 'Chamoy preparado Patuchela', 50, '2');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('MEGA - Miguelito', 34.50, 'Extras', 'Chamoy + chile MEGA - Miguelito, 200g chamoy y 125g chile', 20, '2');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Electrolit Mora Azul', 28.50, 'Extras', 'Suero Electrolit Mora Azul 625ml', 100, '1');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Electrolit Fresa Kiwi', 28.50, 'Extras', 'Suero Electrolit Fresa Kiwi 625ml', 100, '1');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Redbull', 54.00, 'Extras', 'Bebida energetica Redbull 250ml', 100, '1');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Monster', 39.00, 'Extras', 'Bebida energetica Monster 473ml', 100, '1');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Gatorade Uva', 25.00, 'Extras', 'Bebida energetica Gatorade Uva 600ml', 200, '1');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Gatorade Ponche', 25.00, 'Extras', 'Bebida energetica Gatorade Ponche 600ml', 200, '1');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Gatorade Moras', 25.00, 'Extras', 'Bebida energetica Gatorade Moras 600ml', 200, '1');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Trident Freshmint', 15.00, 'Extras', 'Chicles Trident Freshmint 12pzs', 200, '2');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Trident Menta', 15.00, 'Extras', 'Chicles Trident Menta 12pzs', 200, '2');
INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
VALUES('Halls Menta', 10.00, 'Extras', 'Pastillas Halls Menta 12pzs', 200, '2');

-- Insertar en tk_pedidos
INSERT INTO tk_pedidos(fecha, hora, estado, cte_id, rpr_id)
VALUES('2003-01-01', '00:00:00', 'COMPLETADO', '1', '1');
INSERT INTO tk_pedidos(fecha, hora, estado, cte_id, rpr_id)
VALUES('2022-02-05', '19:44:35', 'CANCELADO', '2', '3');
INSERT INTO tk_pedidos(fecha, hora, estado, cte_id, rpr_id)
VALUES('2022-02-27', '20:26:13', 'COMPLETADO', '3', '2');
INSERT INTO tk_pedidos(fecha, hora, estado, cte_id, rpr_id)
VALUES('2022-03-10', '23:10:41', 'COMPLETADO', '2', '2');
INSERT INTO tk_pedidos(fecha, hora, estado, cte_id, rpr_id)
VALUES('2022-04-22', '20:30:45', 'EN PROCESO', '4', '1');

-- Insertar en tk_ato_pedidos
INSERT INTO tk_ato_pedidos(pdo_id, ato_id, cantidad_pedida)
VALUES('1','9', 2);
INSERT INTO tk_ato_pedidos(pdo_id, ato_id, cantidad_pedida)
VALUES('1','30', 1);
INSERT INTO tk_ato_pedidos(pdo_id, ato_id, cantidad_pedida)
VALUES('2','15', 1);
INSERT INTO tk_ato_pedidos(pdo_id, ato_id, cantidad_pedida)
VALUES('3','13', 5);
INSERT INTO tk_ato_pedidos(pdo_id, ato_id, cantidad_pedida)
VALUES('3','1', 2);
INSERT INTO tk_ato_pedidos(pdo_id, ato_id, cantidad_pedida)
VALUES('3','16', 3);
INSERT INTO tk_ato_pedidos(pdo_id, ato_id, cantidad_pedida)
VALUES('4','2', 5);
INSERT INTO tk_ato_pedidos(pdo_id, ato_id, cantidad_pedida)
VALUES('4','12', 2);
INSERT INTO tk_ato_pedidos(pdo_id, ato_id, cantidad_pedida)
VALUES('5','23', 1);
INSERT INTO tk_ato_pedidos(pdo_id, ato_id, cantidad_pedida)
VALUES('5','17', 1);
INSERT INTO tk_ato_pedidos(pdo_id, ato_id, cantidad_pedida)
VALUES('5','14', 1);
INSERT INTO tk_ato_pedidos(pdo_id, ato_id, cantidad_pedida)
VALUES('5','30', 1);
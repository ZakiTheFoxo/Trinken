CREATE TABLE tk_articulos (
    id          INTEGER(6) PRIMARY KEY AUTO_INCREMENT,
    nombre      VARCHAR(30) NOT NULL,
    precio      DECIMAL(10, 2) NOT NULL,
    categoria   VARCHAR(30) NOT NULL,
    descripcion VARCHAR(150) NOT NULL,
    existencia  INTEGER(10) NOT NULL,
    pvr_id      INTEGER(6) NOT NULL
);

CREATE TABLE tk_ato_pedidos (
    pdo_id           INTEGER(6) NOT NULL,
    ato_id           INTEGER(6) NOT NULL,
    cantidad_pedida  INTEGER(5) NOT NULL,
    cantidad_enviada INTEGER(5) NOT NULL
);

ALTER TABLE tk_ato_pedidos ADD CONSTRAINT ato_pdo_pk PRIMARY KEY ( pdo_id, ato_id );


CREATE TABLE tk_usuarios (
    id                 INTEGER(6) PRIMARY KEY AUTO_INCREMENT,
    nombre             VARCHAR(30) NOT NULL,
    apellidos          VARCHAR(60) NOT NULL,
    fecha_nacimiento   DATE NOT NULL,
    correo_electronico VARCHAR(60) NOT NULL,
    administrador      BOOLEAN DEFAULT FALSE,
    celular            VARCHAR(14) NOT NULL,
    contrasena         VARCHAR(30) NOT NULL
);

CREATE TABLE tk_direccion_clientes (
    direccion_linea_1 VARCHAR(30) NOT NULL,
    direccion_linea_2 VARCHAR(30),
    estado            VARCHAR(20) NOT NULL,
    ciudad            VARCHAR(20) NOT NULL,
    codigo_postal     INTEGER(5) NOT NULL,
    cte_id            INTEGER(6) NOT NULL
);

CREATE TABLE tk_pedidos (
    id                    INTEGER(6) PRIMARY KEY AUTO_INCREMENT,
    fecha                 DATE NOT NULL DEFAULT (CURRENT_DATE),
    hora                  TIME NOT NULL,
    estado                VARCHAR(30) NOT NULL,
    cte_id                INTEGER(6) NOT NULL,
    rpr_id                INTEGER(6) NOT NULL
);

CREATE TABLE tk_proveedores (
    id                   INTEGER(6) PRIMARY KEY AUTO_INCREMENT,
    nombre_de_la_empresa VARCHAR(30) NOT NULL,
    correo_electronico   VARCHAR(60) NOT NULL,
    celular              VARCHAR(14) NOT NULL
);

CREATE TABLE tk_repartidores (
    id                 INTEGER(6) PRIMARY KEY AUTO_INCREMENT,
    nombre             VARCHAR(30) NOT NULL,
    apellidos          VARCHAR(60) NOT NULL,
    correo_electronico VARCHAR(60) NOT NULL,
    celular            VARCHAR(14) NOT NULL,
    sueldo             DECIMAL(10, 2) NOT NULL,
    comision           DECIMAL(10, 2) NOT NULL
);

CREATE TABLE tk_promociones (
    
);

ALTER TABLE tk_ato_pedidos
    ADD CONSTRAINT ato_pdo_ato_fk FOREIGN KEY ( ato_id )
        REFERENCES tk_articulos ( id );

ALTER TABLE tk_ato_pedidos
    ADD CONSTRAINT ato_pdo_pdo_fk FOREIGN KEY ( pdo_id )
        REFERENCES tk_pedidos ( id );

ALTER TABLE tk_articulos
    ADD CONSTRAINT ato_pvr_fk FOREIGN KEY ( pvr_id )
        REFERENCES tk_proveedores ( id );

ALTER TABLE tk_direccion_clientes
    ADD CONSTRAINT direccion_cte_cte_fk FOREIGN KEY ( cte_id )
        REFERENCES tk_usuarios ( id );

ALTER TABLE tk_pedidos
    ADD CONSTRAINT pdo_cte_fk FOREIGN KEY ( cte_id )
        REFERENCES tk_usuarios ( id );

ALTER TABLE tk_pedidos
    ADD CONSTRAINT pdo_rpr_fk FOREIGN KEY ( rpr_id )
        REFERENCES tk_repartidores ( id );
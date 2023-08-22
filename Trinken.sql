CREATE TABLE tk_articulos (
    id          INTEGER(6) PRIMARY KEY AUTO_INCREMENT,
    nombre      VARCHAR(30) NOT NULL,
    precio      DECIMAL(10, 2) NOT NULL,
    categoria   VARCHAR(30) NOT NULL,
    descripcion VARCHAR(150) NOT NULL,
    existencia  INTEGER(10) NOT NULL,
    imagen      VARCHAR(255),
    pvr_id      INTEGER(6) NOT NULL
);

CREATE TABLE tk_ato_pedidos (
    pdo_id           INTEGER(6) NOT NULL,
    ato_id           INTEGER(6) NOT NULL,
    cantidad_pedida  INTEGER(5) NOT NULL
);

ALTER TABLE tk_ato_pedidos ADD CONSTRAINT ato_pdo_pk PRIMARY KEY ( pdo_id, ato_id );


CREATE TABLE tk_usuarios (
    id                 INTEGER(6) PRIMARY KEY AUTO_INCREMENT,
    nombre             VARCHAR(30) NOT NULL,
    apellidos          VARCHAR(60) NOT NULL,
    fecha_nacimiento   DATE NOT NULL,
    correo_electronico VARCHAR(60) NOT NULL,
    administrador      INTEGER DEFAULT 0,
    celular            VARCHAR(14) NOT NULL,
    contrasena         VARCHAR(35) NOT NULL,
    validado           INT(1),
    imagen_ine         text
);

CREATE TABLE tk_direccion_clientes (
    direccion_linea_1 VARCHAR(50) NOT NULL,
    direccion_linea_2 VARCHAR(50),
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
    rpr_id                INTEGER(6) NOT NULL,
    total                 DECIMAL(6,2)
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
    id               INTEGER(6) PRIMARY KEY AUTO_INCREMENT,
    ato_id           INTEGER(6) NOT NULL,
    precio           DECIMAL(10, 2) NOT NULL,
    comp1_id         INTEGER(6),
    comp2_id         INTEGER(6),
    comp3_id         INTEGER(6),
    comp4_id         INTEGER(6)
);

CREATE TABLE tk_carrito(
    ato_id           INTEGER(6) NOT NULL,
    cte_id           INTEGER(6) NOT NULL,
    cantidad_pedida  INTEGER(5) NOT NULL
);


ALTER TABLE tk_carrito
    ADD CONSTRAINT cat_ato_fk FOREIGN KEY ( ato_id )
        REFERENCES tk_articulos ( id );

ALTER TABLE tk_carrito
    ADD CONSTRAINT cat_cte_fk FOREIGN KEY ( cte_id )
        REFERENCES tk_usuarios ( id );

ALTER TABLE tk_promociones
    ADD CONSTRAINT prn_ato_fk FOREIGN KEY ( ato_id )
        REFERENCES tk_articulos ( id );

ALTER TABLE tk_promociones
    ADD CONSTRAINT prn_ato1_fk FOREIGN KEY ( comp1_id )
        REFERENCES tk_articulos ( id );

ALTER TABLE tk_promociones
    ADD CONSTRAINT prn_ato2_fk FOREIGN KEY ( comp2_id )
        REFERENCES tk_articulos ( id );

ALTER TABLE tk_promociones
    ADD CONSTRAINT prn_ato3_fk FOREIGN KEY ( comp3_id )
        REFERENCES tk_articulos ( id );

ALTER TABLE tk_promociones
    ADD CONSTRAINT prn_ato4_fk FOREIGN KEY ( comp4_id )
        REFERENCES tk_articulos ( id );

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
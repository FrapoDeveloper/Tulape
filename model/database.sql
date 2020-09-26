CREATE TABLE almacen(
id_almacen INT NOT NULL AUTO_INCREMENT,
direccion_almacen VARCHAR(100),
ciudad_almacen VARCHAR(100),
encargado_almacen VARCHAR(100),
telefono_almacen BIGINT,
CONSTRAINT pk_almacen PRIMARY KEY(id_almacen)
)

CREATE TABLE lote(
id_lote INT NOT NULL AUTO_INCREMENT,
produccion_lote INT,
inversion_lote FLOAT,
fechaproduccion_lote DATETIME,
fechacaducidad_lote DATETIME,
CONSTRAINT pk_lote PRIMARY KEY(id_lote)
)

CREATE TABLE producto(
id_producto INT NOT NULL AUTO_INCREMENT,
id_almacen_fk INT,
id_lote_fk INT,
nombre_producto VARCHAR(100),
presentacion_producto VARCHAR(100),
precio_producto FLOAT,
descripcion_producto VARCHAR(300),
foto_producto VARCHAR(100),
CONSTRAINT pk_producto PRIMARY KEY(id_producto),
CONSTRAINT fk_almacen FOREIGN KEY(id_almacen_fk)
REFERENCES almacen(id_almacen),
CONSTRAINT fk_lote FOREIGN KEY(id_lote_fk) 
REFERENCES lote(id_lote)
)

CREATE TABLE usuario(
id_usuario INT NOT NULL AUTO_INCREMENT,
nombre_usuario VARCHAR(100),
clave_usuario VARCHAR(100),
puntos_usuario INT,
CONSTRAINT pk_usuario PRIMARY KEY(id_usuario)
)

CREATE TABLE proveedor(
id_proveedor INT NOT NULL AUTO_INCREMENT,
id_usuario_fk INT,
nombre_proveedor VARCHAR(100),
direccion_proveedor VARCHAR(100),
telefono_proveedor BIGINT,
dni_proveedor BIGINT,
foto_proveedor VARCHAR(100),
CONSTRAINT pk_proveedor PRIMARY KEY(id_proveedor),
CONSTRAINT fk_usuario FOREIGN KEY(id_usuario_fk)
REFERENCES usuario(id_usuario)
)

CREATE TABLE venta(
id_venta INT NOT NULL AUTO_INCREMENT,
id_proveedor_fk INT,
id_producto_fk INT,
fecha_venta DATETIME ON UPDATE CURRENT_TIMESTAMP,
cantidad_productos INT,
tipo_pago VARCHAR(100),
importe_venta FLOAT,
CONSTRAINT pk_venta PRIMARY KEY(id_venta),
CONSTRAINT fk_proveedor FOREIGN KEY(id_proveedor_fk)
REFERENCES proveedor(id_proveedor),
CONSTRAINT fk_producto FOREIGN KEY(id_producto_fk) 
REFERENCES producto(id_producto)
)
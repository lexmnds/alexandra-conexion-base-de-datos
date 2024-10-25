<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "sqlite:categorias_eventos.db",
    // usuario
    null,
    // contraseña
    null,
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS categorias_eventos (
      CATE_ID INTEGER,
      CATE_NOMBRE TEXT NOT NULL,
      CATE_DESCRIPCION TEXT NOT NULL,
      CATE_IMAGEN TEXT NOT NULL,
      CONSTRAINT CATE_PK
       PRIMARY KEY(CATE_ID),
      CONSTRAINT CATE_NOM_UNQ
       UNIQUE(CATE_NOMBRE)
     )"
   );
  }

  return self::$pdo;
 }
}

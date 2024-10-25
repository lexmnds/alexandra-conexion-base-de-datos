<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaDescripcion.php";
require_once __DIR__ . "/../lib/php/validaImagen.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_CATEGORIAS_EVENTOS.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");
 $nombre = recuperaTexto("nombre");
 $descripcion = recuperaTexto("descripcion");
 $imagen = recuperaTexto("imagen");

 $nombre = validaNombre($nombre);
 $descripcion = validaDescripcion("descripcion");
 $imagen = validaImagen("imagen");

 update(
  pdo: Bd::pdo(),
  table: CATEGORIAS_EVENTOS,
  set: [CATE_NOMBRE => $nombre, CATE_DESCRIPCION => $descripcion, CATE_IMAGEN => $imagen],
  where: [CATE_ID => $id]
 );

 devuelveJson([
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "descripcion" => ["value" => $descripcion],
  "imagen" => ["value" => $imagen]
 ]);
});

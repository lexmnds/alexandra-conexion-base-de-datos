<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaDescripcion.php";
require_once __DIR__ . "/../lib/php/validaImagen.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_CATEGORIAS_EVENTOS.php";

ejecutaServicio(function () {

 $nombre = recuperaTexto("nombre");
 $descripcion = recuperaTexto("descripcion");
 $imagen = recuperaTexto("imagen");

 $nombre = validaNombre($nombre);
 $descripcion = validaDescripcion($descripcion);
 $imagen = validaImagen($imagen);

 $pdo = Bd::pdo();
 insert(pdo: $pdo, into: CATEGORIAS_EVENTOS, values: [CATE_NOMBRE => $nombre, CATE_DESCRIPCION =>  $descripcion, CATE_IMAGEN => $imagen]);
 $id = $pdo->lastInsertId();

 $encodeId = urlencode($id);
 devuelveCreated("/srv/categorias_evento.php?id=$encodeId", [
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "imagen" => ["value" => $imagen]
 ]);
});

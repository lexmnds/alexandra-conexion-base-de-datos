<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_CATEGORIAS_EVENTOS.php";

ejecutaServicio(function () {

 $lista = select(pdo: Bd::pdo(),  from: CATEGORIAS_EVENTOS,  orderBy: CATE_NOMBRE);

 $render = "";
 foreach ($lista as $modelo) {
  $encodeId = urlencode($modelo[CATE_ID]);
  $id = htmlentities($encodeId);
  $nombre = htmlentities($modelo[CATE_NOMBRE]);
  $descripcion = htmlentities($modelo[CATE_DESCRIPCION]);
  $imagen = htmlentities($modelo[CATE_IMAGEN]);
  $render .=
   "<dl>
     <dt><strong> <a href='modifica.html?id=$id'>$nombre</a> </strong></dt> 
     <dd><strong>Descripción: </strong>{$descripcion}</dd>
     <dd><strong>Imagen: </strong>{$imagen}</dd>
    </dl>";
 }

 devuelveJson(["lista" => ["innerHTML" => $render]]);
});

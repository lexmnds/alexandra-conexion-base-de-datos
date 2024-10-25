<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaImagen(false|string $imagen)
{

 if ($imagen === false)
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta la imagen.",
   type: "/error/faltaimagen.html",
   detail: "La solicitud no contiene la imagen."
  );

 $trimImagen = trim($imagen);

 if ($trimImagen === "")
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Imagen en blanco.",
   type: "/error/imagenenblanco.html",
   detail: "Coloca un valor en el campo imagen.",
  );

 return $trimImagen;
}
<?php
// --- Script para generar IP y Fecha/Hora para App Inventor ---
// Este archivo devuelve DIRECTAMENTE el texto que App Inventor necesita.

// 1. OBTENER LA IP PÚBLICA DESDE IPIFY.ORG
// file_get_contents es la forma más simple en PHP de obtener el contenido de una URL.
$ip_publica = file_get_contents('https://api.ipify.org?format=text');

// Se agrega una verificación simple por si el servicio de ipify.org falla.
if ($ip_publica === false) {
    $ip_publica = "ERROR_AL_OBTENER_IP";
}

// 2. ESTABLECER LA ZONA HORARIA CORRECTA (¡MUY IMPORTANTE!)
// Asegúrate de que coincida con tu ubicación.
date_default_timezone_set('America/Argentina/Buenos_Aires');

// 3. OBTENER LA FECHA Y HORA EN EL FORMATO EXACTO SOLICITADO
// Formato: 21-10-2025_09:29:17
$fecha_hora = date('d-m-Y_H:i:s');

// 4. COMBINAR LA IP Y LA FECHA/HORA EN UNA SOLA LÍNEA DE TEXTO (CSV)
$resultado_csv = $ip_publica . "," . $fecha_hora;


// --- CONFIGURACIÓN FINAL PARA LA RESPUESTA ---

// Esta línea es crucial. Le dice a App Inventor que la respuesta es solo texto plano.
header('Content-Type: text/plain; charset=utf-8');

// Imprimimos el resultado. Esto será lo ÚNICO que se envíe como respuesta.
echo $resultado_csv;

// Finalizamos la ejecución del script para no enviar nada más.
exit;
?>

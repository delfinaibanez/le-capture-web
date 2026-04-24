<?php
$archivo = __DIR__ . '/uploads/post_1777043618_708.png';
echo 'Existe: ' . (file_exists($archivo) ? 'SÍ' : 'NO') . '<br>';
echo 'Ruta: ' . $archivo . '<br>';
echo '<img src="/LeCapture_Fotografia/uploads/post_1777043618_708.png">';
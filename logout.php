<?php
session_start();
session_unset();
session_destroy();
// No redirigir aquí porque es llamada desde JS sendBeacon
?>

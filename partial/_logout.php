<?php

session_start();

session_destroy();

header('Location: /iforum/index.php');

?>
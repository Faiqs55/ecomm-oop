<?php

include "header.php";
session_unset();
session_destroy();

header("Location: http://localhost/ecomm.oop/admin");


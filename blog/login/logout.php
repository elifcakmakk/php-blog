<?php

session_start();
 
ob_start();
 
session_destroy();

header("Location: ../home/index.php");
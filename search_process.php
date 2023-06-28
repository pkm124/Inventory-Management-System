<?php

require_once('conn.php');

$search_select = $_GET['search_select'];
$search_bar = $_GET['search_bar'];

header("Location: dashboard.php?search_select=$search_select&search_bar=$search_bar");

?>
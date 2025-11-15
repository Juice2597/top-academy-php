<?php
$errors = $_GET['errors'] ?? null;

var_dump(json_decode($errors, true));
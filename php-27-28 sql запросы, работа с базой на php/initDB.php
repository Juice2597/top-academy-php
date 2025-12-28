<?php

$db = new PDO('sqlite:db.sqlite');

$db->exec('PRAGMA foreign_keys = ON');

$sql = file_get_contents('db.sql');

$result = $db->exec($sql);

<?php
require_once __DIR__ . '/core/functions.php';
session_unset();
session_destroy();
redirect('login.php');

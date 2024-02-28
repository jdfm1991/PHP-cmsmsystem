<?php
session_name('smcwebside');
session_start();
session_destroy();
header('Location: ../');



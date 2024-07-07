<?php
session_start();
session_unset();
session_destroy();

header("Location: /WebsiteRaicabUpdate/index.php");
exit();
?>
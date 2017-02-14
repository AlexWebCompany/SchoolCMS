<?php exec('php site/artisan key:generate'); header("Location: /"); unlink('install.php'); exit;?> 

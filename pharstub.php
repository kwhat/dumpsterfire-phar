<?php

Phar::interceptFileFuncs();
set_include_path("phar://" . __FILE__ . PATH_SEPARATOR . get_include_path());

include "public/index.php";
__HALT_COMPILER();

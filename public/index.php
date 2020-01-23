<?php

use What4\Phar\DumpsterFire\BrokenPhar;

require_once "../vendor/autoload.php";

echo "Include Path: " . get_include_path() . "\n";

$borken = new BrokenPhar();
$borken->checkIsDir();
$borken->checkIsFile();
$borken->checkFileExists();
$borken->checkIsReadable();
$borken->checkIsWriteableDir();
$borken->checkIsWriteableFile();
$borken->checkGlob();
$borken->checkScandir();
$borken->checkInclude();

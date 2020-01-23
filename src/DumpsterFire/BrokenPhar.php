<?php

namespace What4\Phar\DumpsterFire;

class BrokenPhar
{
    public function checkIsDir()
    {
        echo "\n\n";
        echo 'is_dir("config/"): ' . var_export(is_dir("config/"), true) . "\n";
        echo 'is_dir("./config/"): ' . var_export(is_dir("./config/"), true) . "\n";
        echo 'is_dir("../config/"): ' . var_export(is_dir("../config/"), true) . "\n";
        echo 'is_dir("archive.phar/config/"): ' . var_export(is_dir("archive.phar/config/"), true) . "\n";
        echo 'is_dir("phar:///tmp/archive.phar/config/"): ' . var_export(is_dir("phar:///tmp/archive.phar/config/"), true) . "\n";
    }

    public function checkIsFile()
    {
        echo "\n\n";
        echo 'is_file("config/test.php"): ' . var_export(is_file("config/test.php"), true) . "\n";
        echo 'is_file("./config/test.php"): ' . var_export(is_file("./config/test.php"), true) . "\n";
        echo 'is_file("../config/test.php"): ' . var_export(is_file("../config/test.php"), true) . "\n";
        echo 'is_file("archive.phar/config/test.php"): ' . var_export(is_file("archive.phar/config/test.php"), true) . "\n";
        echo 'is_file("phar:///tmp/archive.phar/config/test.php"): ' . var_export(is_file("phar:///tmp/archive.phar/config/test.php"), true) . "\n";
    }

    public function checkFileExists()
    {
        echo "\n\n";
        echo 'file_get_contents("config/test.php"): ' . var_export(@file_get_contents("config/test.php") !== false, true) . "\n";
        echo 'file_get_contents("./config/test.php"): ' . var_export(@file_get_contents("./config/test.php") !== false, true) . "\n";
        echo 'file_get_contents("../config/test.php"): ' . var_export(@file_get_contents("../config/test.php") !== false, true) . "\n";
        echo 'file_get_contents("archive.phar/config/test.php"): ' . var_export(@file_get_contents("archive.phar/config/test.php") !== false, true) . "\n";
        echo 'file_get_contents("phar:///tmp/archive.phar/config/test.php"): ' . var_export(@file_get_contents("phar:///tmp/archive.phar/config/test.php") !== false, true) . "\n";
    }

    public function checkIsReadable()
    {
        echo "\n\n";
        echo 'is_readable("config/test.php"): ' . var_export(is_readable("config/test.php"), true) . "\n";
        echo 'is_readable("./config/test.php"): ' . var_export(is_readable("./config/test.php"), true) . "\n";
        echo 'is_readable("../config/test.php"): ' . var_export(is_readable("../config/test.php"), true) . "\n";
        echo 'is_readable("archive.phar/config/test.php"): ' . var_export(is_readable("archive.phar/config/test.php"), true) . "\n";
        echo 'is_readable("phar:///tmp/archive.phar/config/test.php"): ' . var_export(is_readable("phar:///tmp/archive.phar/config/test.php"), true) . "\n";
    }

    public function checkIsWriteableDir()
    {
        echo "phar.readonly = " . var_export(ini_get("phar.readonly"), true) . "\n";
        echo 'is_writeable("config/"): ' . var_export(is_writeable("config/"), true) . "\n";
        echo 'is_writeable("./config/"): ' . var_export(is_writeable("./config/"), true) . "\n";
        echo 'is_writeable("../config/"): ' . var_export(is_writeable("../config/"), true) . "\n";
        echo 'is_writeable("archive.phar/config/"): ' . var_export(is_writeable("archive.phar/config/"), true) . "\n";
        echo 'is_writeable("phar:///tmp/archive.phar/config/"): ' . var_export(is_writeable("phar:///tmp/archive.phar/config/"), true) . "\n";
    }

    public function checkIsWriteableFile()
    {
        echo "\n\n";
        echo "phar.readonly = " . var_export(ini_get("phar.readonly"), true) . "\n";
        echo 'is_writeable("config/test.php"): ' . var_export(is_writeable("config/test.php"), true) . "\n";
        echo 'is_writeable("./config/test.php"): ' . var_export(is_writeable("./config/test.php"), true) . "\n";
        echo 'is_writeable("../config/test.php"): ' . var_export(is_writeable("../config/test.php"), true) . "\n";
        echo 'is_writeable("archive.phar/config/test.php"): ' . var_export(is_writeable("archive.phar/config/test.php"), true) . "\n";
        echo 'is_writeable("phar:///tmp/archive.phar/config/test.php"): ' . var_export(is_writeable("phar:///tmp/archive.phar/config/test.php"), true) . "\n";
    }

    public function checkGlob()
    {
        echo "\n\n";
        echo 'glob("config/*"): ' . var_export(!empty(glob("config/*")), true) . "\n";
        echo 'glob("./config/*"): ' . var_export(!empty(glob("./config/*")), true) . "\n";
        echo 'glob("../config/*"): ' . var_export(!empty(glob("../config/*")), true) . "\n";
        echo 'glob("archive.phar/config/*"): ' . var_export(!empty(glob("archive.phar/config/*")), true) . "\n";
        echo 'glob("phar:///tmp/archive.phar/config/*"): ' . var_export(!empty(glob("phar:///tmp/archive.phar/config/*")), true) . "\n";
    }

    public function checkScandir()
    {
        echo "\n\n";
        echo 'scandir("config/*"): ' . var_export(is_array(@scandir("config/")), true) . "\n";
        echo 'scandir("./config/*"): ' . var_export(is_array(@scandir("./config/")), true) . "\n";
        echo 'scandir("../config/*"): ' . var_export(is_array(@scandir("../config/")), true) . "\n";
        echo 'scandir("archive.phar/config/*"): ' . var_export(is_array(@scandir("archive.phar/config/")), true) . "\n";
        echo 'scandir("phar:///tmp/archive.phar/config/*"): ' . var_export(is_array(@scandir("phar:///tmp/archive.phar/config/")), true) . "\n";
    }

    public function checkInclude()
    {
        echo "\n\n";
        echo 'include("config/test.php"): ' . var_export(is_array(@include("config/test.php")), true) . "\n";
        echo 'include("./config/test.php"): ' . var_export(is_array(@include("./config/test.php")), true) . "\n";
        echo 'include("../config/test.php"): ' . var_export(is_array(@include("../config/test.php")), true) . "\n";
        echo 'include("archive.phar/config/test.php"): ' . var_export(is_array(@include("archive.phar/config/test.php")), true) . "\n";
        echo 'include("phar:///tmp/archive.phar/config/test.php"): ' . var_export(is_array(@include("phar:///tmp/archive.phar/config/test.php")), true) . "\n";
    }
}

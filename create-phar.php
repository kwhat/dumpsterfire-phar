#!/usr/bin/env php
<?php

// FIXME There is another issue if this doesn't happen and something specific changes
@unlink('/tmp/archive.phar');

$it = new AppendIterator();
$it->append(new RecursiveIteratorIterator(new RecursiveDirectoryIterator("config/", FilesystemIterator::SKIP_DOTS)));
$it->append(new RecursiveIteratorIterator(new RecursiveDirectoryIterator("public/", FilesystemIterator::SKIP_DOTS)));
$it->append(new RecursiveIteratorIterator(new RecursiveDirectoryIterator("src/", FilesystemIterator::SKIP_DOTS)));
$it->append(new RegexIterator(new RecursiveIteratorIterator(new RecursiveDirectoryIterator("vendor/", FilesystemIterator::SKIP_DOTS)), '/\.(?:php)$/i'));

$phar = new Phar('/tmp/archive.phar');
$phar->startBuffering();
$phar->buildFromIterator($it, ".");
$phar->setStub(file_get_contents("pharstub.php"));
// FIXME Compression is broken for files of any meaningful size
//$phar->compressFiles(Phar::GZ);
$phar->stopBuffering();

// Just to be extra sure phar sucks
chmod('/tmp/archive.phar', 0777);

// FIXME The phar archive is never updated after buildFromIterator, create a new one.
$phar = new Phar($phar->getPath());
foreach (new RecursiveIteratorIterator($phar) as $file) {
    /** @var PharFileInfo $file */
    echo substr($file->getPath(), strlen($phar->getPath()) + 8) . DIRECTORY_SEPARATOR . $file->getFilename() . "\n";
}

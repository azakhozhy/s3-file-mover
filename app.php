<?php

require_once __DIR__.'/vendor/autoload.php';

use Azk\S3FileMover\Console\Commands\FileMoverCommand;
use Azk\S3FileMover\Components\StorageManager;
use Azk\S3FileMover\Contracts\StorageInterface;
use Azk\S3FileMover\Storages\AwsS3Storage;
use Azk\S3FileMover\Storages\DigitalOceanS3Storage;
use Azk\S3FileMover\Storages\SelectelS3Storage;

$app = new Symfony\Component\Console\Application('S3 File Mover', '1.0.0');

$storages = [
    SelectelS3Storage::class,
    DigitalOceanS3Storage::class,
    AwsS3Storage::class
];

$storageManager = new StorageManager();

/** @var string|StorageInterface $storage */
foreach ($storages as $storage) {
    $storageManager->register($storage::getName(), new $storage());
}

$app->add(new FileMoverCommand($storageManager));

$app->run();

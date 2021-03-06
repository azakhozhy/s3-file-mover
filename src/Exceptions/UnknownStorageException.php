<?php

declare(strict_types=1);

namespace Azk\S3FileMover\Exceptions;

use RuntimeException;

class UnknownStorageException extends RuntimeException
{
    public function message(): ?string
    {
        return 'Unknown storage.';
    }
}

<?php declare(strict_types=1);

use Shopware\Core\Kernel;
use Symfony\Component\Dotenv\Dotenv;

set_time_limit(0);

require __DIR__ . '/../../../../vendor/autoload.php';

if (!class_exists(Dotenv::class)) {
    throw new \RuntimeException('APP_ENV environment variable is not defined. You need to define environment variables for configuration or add "symfony/dotenv" as a Composer dependency to load variables from a .env file.');
}

(new Dotenv())->load(__DIR__ . '/../../../../.env');

umask(0000);

return Kernel::getConnection();
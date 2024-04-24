<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Random\RandomException;

class GenerateEncryptionKey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-encryption-key';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a new encryption key and updates the .env file';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws RandomException
     */
    public function handle(): int
    {
        $key = base64_encode(random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES));
        $this->setEnvironmentValue('ENCRYPTION_KEY', $key);

        $this->info('[DONE] VibeChat Encryption is generated and updated in the .env file.');

        return 0;
    }

    /**
     * Set or update an environment variable's value.
     *
     * @param string $key
     * @param  mixed  $value
     * @return void
     */
    protected function setEnvironmentValue(string $key, mixed $value): void
    {
        $envFile = app()->environmentFilePath();
        $str = File::get($envFile);

        $oldValue = env($key);

        if (str_contains($str, "{$key}={$oldValue}")) {
            $str = str_replace("{$key}={$oldValue}", "{$key}={$value}", $str);
        } else {
            $str .= "\n{$key}={$value}\n";
        }

        File::put($envFile, $str);
    }
}

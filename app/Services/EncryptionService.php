<?php

namespace App\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

/**
 * Service to handle encryption and decryption operations.
 */
class EncryptionService
{
    private $cipher;
    private $key;

    public function __construct()
    {
        $this->cipher = Config::get('encryption.cipher', 'aes-256-cbc');
        $this->key = base64_decode(Config::get('encryption.key'));
    }

    public function encrypt($plaintext)
    {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher));

        try {
            $ciphertext = openssl_encrypt($plaintext, $this->cipher, $this->key, 0, $iv);
            return [
                'ciphertext' => $ciphertext,
                'iv' => base64_encode($iv)
            ];
        } catch (\Exception $e) {
            Log::error('Encryption error', ['exception' => $e->getMessage()]);
            return ['error' => 'Encryption failed'];
        }
    }

    public function decrypt($ciphertext, $iv)
    {
        $iv = base64_decode($iv);

        try {
            $plaintext = openssl_decrypt($ciphertext, $this->cipher, $this->key, 0, $iv);
            return ['plaintext' => $plaintext];
        } catch (\Exception $e) {
            Log::error('Decryption error', ['exception' => $e->getMessage()]);
            return ['error' => 'Decryption failed'];
        }
    }
}

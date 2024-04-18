<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

/**
 * Handles cryptographic operations using Libsodium for secure data transmission.
 * This service provides methods for encryption, decryption, and key management
 * tailored for high security standards.
 */
class EncryptionService
{
    private $key;

    /**
     * Constructs the encryption service, initializing key management.
     *
     * @throws Exception If key loading fails
     */
    public function __construct()
    {
        $this->loadKey();
    }

    /**
     * Loads and validates the encryption key from configuration.
     *
     * @throws Exception If the key is not set or invalid
     */
    private function loadKey()
    {
        $encodedKey = Config::get('encryption.key');
        if (empty($encodedKey)) {
            Log::error('Encryption key is not set in the configuration.');
            throw new Exception('Encryption key is not set.');
        }

        $this->key = base64_decode($encodedKey);
        if ($this->key === false || strlen($this->key) !== SODIUM_CRYPTO_SECRETBOX_KEYBYTES) {
            Log::error('Invalid encryption key in the configuration.');
            throw new Exception('Invalid encryption key.');
        }
    }

    /**
     * Encrypts plaintext using a secure key and nonce.
     *
     * @param string $plaintext The data to encrypt.
     * @return array Encrypted data with nonce.
     * @throws Exception If encryption fails.
     */
    public function encrypt($plaintext)
    {
        $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        $ciphertext = sodium_crypto_secretbox($plaintext, $nonce, $this->key);

        if ($ciphertext === false) {
            Log::error('Encryption failed.', compact('plaintext'));
            throw new Exception('Encryption failed.');
        }

        return [
            'ciphertext' => base64_encode($ciphertext),
            'nonce' => base64_encode($nonce)
        ];
    }

    /**
     * Decrypts ciphertext using a stored key and provided nonce.
     *
     * @param string $ciphertext The encrypted data.
     * @param string $nonce The nonce used during encryption.
     * @return array Decrypted data.
     * @throws Exception If decryption fails.
     */
    public function decrypt($ciphertext, $nonce)
    {
        $ciphertext = base64_decode($ciphertext);
        $nonce = base64_decode($nonce);

        if ($ciphertext === false || $nonce === false) {
            Log::error('Decryption failed due to invalid input.', compact('ciphertext', 'nonce'));
            throw new Exception('Decryption failed due to invalid input.');
        }

        $plaintext = sodium_crypto_secretbox_open($ciphertext, $nonce, $this->key);

        if ($plaintext === false) {
            Log::error('Decryption failed.', compact('ciphertext', 'nonce'));
            throw new Exception('Decryption failed.');
        }

        return ['plaintext' => $plaintext];
    }

    /**
     * Generates a new encryption key and updates the application configuration.
     *
     * @return void
     * @throws Exception If key generation or update fails.
     */
    public function rotateKey()
    {
        $newKey = sodium_crypto_secretbox_keygen();
        $encodedKey = base64_encode($newKey);

        try {
            // Assuming there's a method to safely update config values
            Config::set('encryption.key', $encodedKey);
            // Reload the key to ensure it's used immediately
            $this->loadKey();
        } catch (Exception $e) {
            Log::error('Failed to rotate the encryption key.', ['exception' => $e->getMessage()]);
            throw new Exception('Failed to rotate the encryption key.');
        }
    }
}

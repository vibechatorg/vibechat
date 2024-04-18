<?php

/*
 * Encryption Configuration for VibeChat Application
 * Developed by Olivier Flentge
 * This file contains the encryption key configuration for the application.
 * Please note that the encryption key is stored in the .env file and should not be committed to version control.
 * This file and its contents are free to use and modify as needed.
 */

return [
    'key' => env('ENCRYPTION_KEY', 'base64-encoded-key-here'),
];

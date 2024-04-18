<?php

use App\Services\EncryptionService;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


beforeEach(function () {
    $this->service = new EncryptionService();
});

it('encrypts a plaintext message', function () {
    $plaintext = 'Hello, world!';
    $result = $this->service->encrypt($plaintext);

    expect($result)->toHaveKey('ciphertext');
    expect($result)->toHaveKey('iv');
});

it('decrypts a ciphertext message', function () {
    $plaintext = 'Hello, world!';
    $encrypted = $this->service->encrypt($plaintext);
    $decrypted = $this->service->decrypt($encrypted['ciphertext'], $encrypted['iv']);

    expect($decrypted)->toBeArray()->toHaveKey('plaintext');
    expect($decrypted['plaintext'])->toBe($plaintext);
});

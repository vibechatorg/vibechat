<?php

namespace App\Http\Controllers\Encryption;

use App\Http\Controllers\Controller;
use App\Services\EncryptionService;
use Illuminate\Http\Request;

/**
 * Handles encryption and decryption requests.
 */
class CryptController extends Controller
{
    protected $encryptionService;

    /**
     * Constructor injection of the EncryptionService
     */
    public function __construct(EncryptionService $encryptionService)
    {
        $this->encryptionService = $encryptionService;
    }

    /**
     * Encrypts a plaintext message received via HTTP request.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function encrypt(Request $request)
    {
        $plaintext = $request->input('message');
        $result = $this->encryptionService->encrypt($plaintext);

        return response()->json($result);
    }

    /**
     * Decrypts a ciphertext message received via HTTP request.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function decrypt(Request $request)
    {
        $ciphertext = $request->input('ciphertext');
        $iv = $request->input('iv');
        $result = $this->encryptionService->decrypt($ciphertext, $iv);

        return response()->json($result);
    }
}


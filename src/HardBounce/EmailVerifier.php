<?php
declare(strict_types=1);

namespace App\HardBounce;

use QuickEmailVerification\Client;

final class EmailVerifier
{
    private $verifier;

    public function __construct(string $apiKey)
    {
        $this->verifier = (new Client($apiKey))->quickemailverification();
    }

    public function verify(string $email): VerificationResult
    {
        return new VerificationResult($this->verifier->verify($email)->body);
    }
}

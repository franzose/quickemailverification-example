<?php
declare(strict_types=1);

namespace App\HardBounce;

final class VerificationResult
{
    private $isValid;
    private $result;

    public function __construct(array $result)
    {
        $this->isValid = $result['result'] === 'valid';
        $this->result = $result;
    }

    public function isValid(): bool
    {
        return $this->isValid;
    }

    public function toArray(): array
    {
        return ['valid' => $this->isValid] + $this->result;
    }

    public function toString(): string
    {
        return json_encode($this->toArray(), JSON_PRETTY_PRINT);
    }
}

<?php
declare(strict_types=1);

namespace App\HardBounce;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class VerifyEmailAction extends AbstractController
{
    private $verifier;

    public function __construct(EmailVerifier $verifier)
    {
        $this->verifier = $verifier;
    }

    public function __invoke(Request $request): Response
    {
        $email = $request->query->get('email');
        $result = $this->verifier->verify($email);

        return new JsonResponse($result->toArray());
    }
}

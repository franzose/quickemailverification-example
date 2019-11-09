<?php
declare(strict_types=1);

namespace App\HardBounce;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

final class VerifyEmailCommand extends Command
{
    protected static $defaultName = 'app:verify-email';

    private $verifier;

    public function __construct(EmailVerifier $verifier)
    {
        parent::__construct();
        $this->verifier = $verifier;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Verifies email via QuickEmailVerification API.')
            ->addArgument('email', InputArgument::REQUIRED, 'Email to verify')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $console = new SymfonyStyle($input, $output);;

        $result = $this->verifier->verify($input->getArgument('email'));

        $result->isValid()
            ? $console->success('Email is valid!')
            : $console->warning('Email is invalid!');

        $output->writeln($result->toString());
    }
}

<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

class CreateUserCommand extends Command
{
    protected static $defaultName = 'app:create-user';
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Create a new User')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->writeln("You're about to create a new User");
        $user = new User();
        $questionUsername = new Question('Enter Username: ');
        $questionUsername->setValidator(function ($answer) {
            if (!is_string($answer)) {
                throw new \RuntimeException(
                    'Username must be a string'
                );
            }
            return ($answer);
        });
        $questionPassword = new Question('Enter Password: ');
        $questionPassword->setHidden(true);
        $questionRole = new ChoiceQuestion('Choose Role (default ROLE_ADMIN): ', ['ROLE_ADMIN', 'ROLE_USER'], 0);
        $username = $this->getHelper('question')->ask($input, $output, $questionUsername);
        $password = $this->getHelper('question')->ask($input, $output, $questionPassword);
        $role = $this->getHelper('question')->ask($input, $output, $questionRole);

        $user->setUsername($username);
        $user->setPassword($password);
        $user->setRoles(array($role));
        $this->em->persist($user);
        $this->em->flush();

        $io->success('User created with success !');

        return (0);
    }
}

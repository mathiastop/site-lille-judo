<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use http\Exception\RuntimeException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreateUserCommand extends Command
{
    protected static $defaultName = 'app:create-user';
    private $em;
    private $encoder;

    public function __construct(EntityManagerInterface $em, UserPasswordEncoderInterface $encoder)
    {
        $this->em = $em;
        $this->encoder = $encoder;

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
        $encodedPassword = $this->encoder->encodePassword($user, $password);
        $role = $this->getHelper('question')->ask($input, $output, $questionRole);

        $user->setUsername($username);
        $user->setPassword($encodedPassword);
        $user->setRoles(array($role));
        $this->em->persist($user);
        $this->em->flush();

        $io->success('User created with success !');

        return (0);
    }
}

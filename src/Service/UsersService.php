<?php

namespace App\Service;

use App\Entity\Address;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class UsersService {

    private $container;
    /**
     * @var EntityManagerInterface $enManager
     */
    private $enManager;

    public function __construct(ContainerInterface $container, EntityManagerInterface $entityManager)
    {
        $this->container = $container;
        $this->enManager = $entityManager;
    }

    /**
     * @return array
     */
    public function getUsers() :array
    {
        try {
            $users = $this->enManager->getRepository(Users::class)->findBy(['ghost' => false]);
            $output = [];
            /**
             * @var  $key
             * @var Users $val
             */
            foreach ($users as $key => $val) {
                $output[] = [
                    'id' => $val->getId(),
                    'login' => $val->getLogin(),
                    'firstname' => $val->getFirstname(),
                    'lastname' => $val->getLastname()
                ];
            }
            return $output;
        } catch (\Exception $e) {

        }
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getUser(Request $request) :array
    {
        try {
            $user = $this->enManager->getRepository(Users::class)->find($request->get('id'));
            return $output = [
                'id' => $user->getId(),
                'login' => $user->getLogin(),
                'firstname' => $user->getFirstname(),
                'lastname' => $user->getLastname()
            ];
        } catch (\Exception $e) {
        }
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function addUser(Request $request) :bool
    {
        try {
            $user = (new Users)
                ->setLogin($request->get('login'))
                ->setPassword($request->get('password'))
                ->setFirstname($request->get('firstname'))
                ->setLastname($request->get('lastname'));

           $this->enManager->persist($user);
           $this->enManager->flush();
           return true;
        } catch (\Exception $e) {
        }
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function editUser(Request $request) :bool
    {
        try {
            $user = $this->enManager->getRepository(Users::class)->find($request->get('id'));
            $user->setFirstname($request->get('firstname'))
                ->setLastname($request->get('lastname'));

            $this->enManager->flush();
            return true;
        } catch (\Exception $e) {
        }
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function removeUser(Request $request) :bool
    {
        try {
            $user = $this->enManager->getRepository(Users::class)->find($request->get('id'));
            $user->setGhost(true);

            $this->enManager->flush();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getUserAddresses(Request $request) :array
    {
        try {
            $addresses = $this->enManager->getRepository(Address::class)->findBy(['user_id' => $request->get('id'), 'ghost' => false]);
            $output = [];
            /**
             * @var  $key
             * @var Users $val
             */
            foreach ($addresses as $key => $val) {
                $output[] = [
                    'id' => $val->getId(),
                    'street' => $val->getStreet(),
                    'city' => $val->getCity(),
                    'zipcode' => $val->getZipcode()
                ];
            }
            return $output;
        } catch (\Exception $e) {
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getUserAddress(Request $request) :array
    {
        try {
            $address = $this->enManager->getRepository(Address::class)->find($request->get('id'));
            return $output = [
                'id' => $address->getId(),
                'street' => $address->getStreet(),
                'city' => $address->getCity(),
                'zipcode' => $address->GetZipcode()
            ];
        } catch (\Exception $e) {
        }
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function addUserAddress(Request $request) :bool
    {
        try {
            $address = (new Address())
                ->setUserId($request->get('id'))
                ->setStreet($request->get('street'))
                ->setCity($request->get('city'))
                ->setZipcode($request->get('zipcode'));

            $this->enManager->persist($address);
            $this->enManager->flush();
            return true;
        } catch (\Exception $e) {
        }
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function editUserAddress(Request $request) :bool
    {
        try {
            $address = $this->enManager->getRepository(Address::class)->find($request->get('id'));
            $address->setStreet($request->get('street'))
                ->setCity($request->get('city'))
                ->setZipcode($request->get('zipcode'));

            $this->enManager->flush();
            return true;
        } catch (\Exception $e) {
        }
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function removeUserAddress(Request $request) :bool
    {
        try {
            $address = $this->enManager->getRepository(Address::class)->find($request->get('id'));
            $address->setGhost(true);

            $this->enManager->flush();
            return true;
        } catch (\Exception $e) {
        }
    }
}
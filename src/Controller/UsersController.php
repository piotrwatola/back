<?php

namespace App\Controller;

use App\Entity\Token;
use App\Service\UsersService;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\Operation;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends FOSRestController
{

    const TOKEN = "aabbcc";

    public function auth(Request $request)
    {
        $hash  = $request->get('hash');
        if ($hash == self::TOKEN) {
            return true;
        }
        return false;
    }

    /**
     * Szczegóły użytkownika
     *
     * @Route("/api/user", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Szczegóły użytkownika",
     * )
     * @SWG\Parameter(
     *     name="hash",
     *     in="query",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="id",
     *     in="query",
     *     type="string",
     * )
     * @SWG\Tag(name="users")
     */
    public function getUserAction(Request $request)
    {
        if (!$this->auth($request)) {
            return $this->createNotFoundException('Not Found');
        }
        $userService = $this->get(UsersService::class);
        $users = $userService->getUser($request);

        $view = $this->view($users, Response::HTTP_OK); //To JSON
        return $view;
    }

    /**
     * Lista użytkowników
     *
     * @Route("/api/users", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Lista użytkowników",
     * )
     * @SWG\Parameter(
     *     name="hash",
     *     in="query",
     *     type="string",
     * )
     * @SWG\Tag(name="users")
     */
    public function getUsersAction(Request $request)
    {
        if (!$this->auth($request)) {
            return $this->createNotFoundException('Not Found');
        }
        $userService = $this->get(UsersService::class);
        $users = $userService->getUsers();

        $view = $this->view($users, Response::HTTP_OK); //To JSON
        return $view;
    }

    /**
     *
     * @Route("/api/add/users", methods={"POST"})
     * @Operation(
     *     tags={"users service"},
     *     consumes={"multipart/form-data"},
     *     summary="Dodaj użytkownika",
     *     @SWG\Response(
     *     response=200,
     *     description="Dodaj użytkownika",
     * ),
     * @SWG\Parameter(
     *     name="hash",
     *     in="formData",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="login",
     *     in="formData",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="password",
     *     in="formData",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="firstname",
     *     in="formData",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="lastname",
     *     in="formData",
     *     type="string",
     * )
     * )
     *
     */
    public function postAddUserAction(Request $request)
    {
        if (!$this->auth($request)) {
            return $this->createNotFoundException('Not Found');
        }
        $userService = $this->get(UsersService::class);
        $users = $userService->addUser($request);

        $view = $this->view(['code' => 1], Response::HTTP_OK); //To JSON
        return $view;
    }

    /**
     *
     * @Route("/api/edit/users", methods={"POST"})
     * @Operation(
     *     tags={"users service"},
     *     consumes={"multipart/form-data"},
     *     summary="Edycja użytkownika",
     *     @SWG\Response(
     *     response=200,
     *     description="Edycja użytkownika",
     * ),
     * @SWG\Parameter(
     *     name="hash",
     *     in="formData",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="id",
     *     in="formData",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="firstname",
     *     in="formData",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="lastname",
     *     in="formData",
     *     type="string",
     * )
     * )
     *
     */
    public function postEditUserAction(Request $request)
    {
        if (!$this->auth($request)) {
            return $this->createNotFoundException('Not Found');
        }
        $userService = $this->get(UsersService::class);
        $userService->editUser($request);

        $view = $this->view(['code' => 1], Response::HTTP_OK); //To JSON
        return $view;
    }

    /**
     *
     * @Route("/api/remove/users", methods={"POST"})
     * @Operation(
     *     tags={"users service"},
     *     consumes={"multipart/form-data"},
     *     summary="Usunięcie użytkownika",
     *     @SWG\Response(
     *     response=200,
     *     description="Usunięcie użytkownika",
     * ),
     * @SWG\Parameter(
     *     name="hash",
     *     in="formData",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="id",
     *     in="formData",
     *     type="string",
     * )
     * )
     *
     */
    public function postRemoveUserAction(Request $request)
    {
        if (!$this->auth($request)) {
            return $this->createNotFoundException('Not Found');
        }
        $userService = $this->get(UsersService::class);
        $code = $userService->removeUser($request);

        $view = $this->view(['code' => $code], Response::HTTP_OK); //To JSON
        return $view;
    }

    /**
     * Szczegóły adresu użytkownika
     *
     * @Route("/api/user/address", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Szczegóły adresu użytkownika",
     * )
     * @SWG\Parameter(
     *     name="hash",
     *     in="query",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="id",
     *     in="query",
     *     type="string",
     * )
     * @SWG\Tag(name="users")
     */
    public function getUserAddressAction(Request $request)
    {
        if (!$this->auth($request)) {
            return $this->createNotFoundException('Not Found');
        }
        $userService = $this->get(UsersService::class);
        $users = $userService->getUserAddress($request);

        $view = $this->view($users, Response::HTTP_OK); //To JSON
        return $view;
    }

    /**
     * Lista adresów użytkownika
     *
     * @Route("/api/user/addresses", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Lista adresów użytkownika",
     * )
     * @SWG\Parameter(
     *     name="hash",
     *     in="query",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="id",
     *     in="query",
     *     type="string",
     * )
     * @SWG\Tag(name="users")
     */
    public function getUserAddressesAction(Request $request)
    {
        if (!$this->auth($request)) {
            return $this->createNotFoundException('Not Found');
        }
        $userService = $this->get(UsersService::class);
        $addresses = $userService->getUserAddresses($request);

        $view = $this->view($addresses, Response::HTTP_OK); //To JSON
        return $view;
    }

    /**
     *
     * @Route("/api/add/address", methods={"POST"})
     * @Operation(
     *     tags={"users service"},
     *     consumes={"multipart/form-data"},
     *     summary="Dodaj adres użytkownika",
     *     @SWG\Response(
     *     response=200,
     *     description="Dodaj adres użytkownika",
     *      ),
     * @SWG\Parameter(
     *     name="hash",
     *     in="formData",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="id",
     *     in="formData",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="street",
     *     in="formData",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="city",
     *     in="formData",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="zipcode",
     *     in="formData",
     *     type="string",
     * )
     * )
     *
     */
    public function postAddUserAddressAction(Request $request)
    {
        if (!$this->auth($request)) {
            return $this->createNotFoundException('Not Found');
        }
        $userService = $this->get(UsersService::class);
        $userService->addUserAddress($request);

        $view = $this->view(['code' => 1], Response::HTTP_OK); //To JSON
        return $view;
    }

    /**
     *
     * @Route("/api/edit/address", methods={"POST"})
     * @Operation(
     *     tags={"users service"},
     *     consumes={"multipart/form-data"},
     *     summary="Edycja adresu użytkownika",
     *     @SWG\Response(
     *     response=200,
     *     description="Edycja adresu użytkownika",
     * ),
     * @SWG\Parameter(
     *     name="hash",
     *     in="formData",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="id",
     *     in="formData",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="street",
     *     in="formData",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="city",
     *     in="formData",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="zipcode",
     *     in="formData",
     *     type="string",
     * )
     * )
     *
     */
    public function postEditUserAddressAction(Request $request)
    {
        if (!$this->auth($request)) {
            return $this->createNotFoundException('Not Found');
        }
        $userService = $this->get(UsersService::class);
        $userService->editUserAddress($request);

        $view = $this->view(['code' => 1], Response::HTTP_OK); //To JSON
        return $view;
    }

    /**
     *
     * @Route("/api/remove/address", methods={"POST"})
     * @Operation(
     *     tags={"users service"},
     *     consumes={"multipart/form-data"},
     *     summary="Usunięcie adresu użytkownika",
     *     @SWG\Response(
     *     response=200,
     *     description="Edycja adresu użytkownika",
     * ),
     * @SWG\Parameter(
     *     name="hash",
     *     in="formData",
     *     type="string",
     * ),
     * @SWG\Parameter(
     *     name="id",
     *     in="formData",
     *     type="string",
     * )
     * )
     *
     */
    public function postRemoveUserAddressAction(Request $request)
    {
        if (!$this->auth($request)) {
            return $this->createNotFoundException('Not Found');
        }
        $userService = $this->get(UsersService::class);
        $userService->removeUserAddress($request);

        $view = $this->view(['code' => 1], Response::HTTP_OK); //To JSON
        return $view;
    }
}
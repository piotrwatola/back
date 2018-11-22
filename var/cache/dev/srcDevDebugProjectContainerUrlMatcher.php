<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = $allowSchemes = array();
        if ($ret = $this->doMatch($pathinfo, $allow, $allowSchemes)) {
            return $ret;
        }
        if ($allow) {
            throw new MethodNotAllowedException(array_keys($allow));
        }
        if (!in_array($this->context->getMethod(), array('HEAD', 'GET'), true)) {
            // no-op
        } elseif ($allowSchemes) {
            redirect_scheme:
            $scheme = $this->context->getScheme();
            $this->context->setScheme(key($allowSchemes));
            try {
                if ($ret = $this->doMatch($pathinfo)) {
                    return $this->redirect($pathinfo, $ret['_route'], $this->context->getScheme()) + $ret;
                }
            } finally {
                $this->context->setScheme($scheme);
            }
        } elseif ('/' !== $pathinfo) {
            $pathinfo = '/' !== $pathinfo[-1] ? $pathinfo.'/' : substr($pathinfo, 0, -1);
            if ($ret = $this->doMatch($pathinfo, $allow, $allowSchemes)) {
                return $this->redirect($pathinfo, $ret['_route']) + $ret;
            }
            if ($allowSchemes) {
                goto redirect_scheme;
            }
        }

        throw new ResourceNotFoundException();
    }

    private function doMatch(string $rawPathinfo, array &$allow = array(), array &$allowSchemes = array()): ?array
    {
        $allow = $allowSchemes = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $context = $this->context;
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        switch ($pathinfo) {
            default:
                $routes = array(
                    '/api/user' => array(array('_route' => 'app_users_getuser', '_controller' => 'App\\Controller\\UsersController::getUserAction'), null, array('GET' => 0), null),
                    '/api/users' => array(array('_route' => 'app_users_getusers', '_controller' => 'App\\Controller\\UsersController::getUsersAction'), null, array('GET' => 0), null),
                    '/api/add/users' => array(array('_route' => 'app_users_postadduser', '_controller' => 'App\\Controller\\UsersController::postAddUserAction'), null, array('POST' => 0), null),
                    '/api/edit/users' => array(array('_route' => 'app_users_postedituser', '_controller' => 'App\\Controller\\UsersController::postEditUserAction'), null, array('POST' => 0), null),
                    '/api/remove/users' => array(array('_route' => 'app_users_postremoveuser', '_controller' => 'App\\Controller\\UsersController::postRemoveUserAction'), null, array('POST' => 0), null),
                    '/api/user/address' => array(array('_route' => 'app_users_getuseraddress', '_controller' => 'App\\Controller\\UsersController::getUserAddressAction'), null, array('GET' => 0), null),
                    '/api/user/addresses' => array(array('_route' => 'app_users_getuseraddresses', '_controller' => 'App\\Controller\\UsersController::getUserAddressesAction'), null, array('GET' => 0), null),
                    '/api/add/address' => array(array('_route' => 'app_users_postadduseraddress', '_controller' => 'App\\Controller\\UsersController::postAddUserAddressAction'), null, array('POST' => 0), null),
                    '/api/edit/address' => array(array('_route' => 'app_users_postedituseraddress', '_controller' => 'App\\Controller\\UsersController::postEditUserAddressAction'), null, array('POST' => 0), null),
                    '/api/remove/address' => array(array('_route' => 'app_users_postremoveuseraddress', '_controller' => 'App\\Controller\\UsersController::postRemoveUserAddressAction'), null, array('POST' => 0), null),
                    '/api/doc.json' => array(array('_route' => 'app.swagger', '_controller' => 'nelmio_api_doc.controller.swagger'), null, array('GET' => 0), null),
                    '/' => array(array('_route' => 'NelmioApiDocBundle', '_controller' => 'nelmio_api_doc.controller.swagger_ui'), null, array('GET' => 0), null),
                );

                if (!isset($routes[$pathinfo])) {
                    break;
                }
                list($ret, $requiredHost, $requiredMethods, $requiredSchemes) = $routes[$pathinfo];

                $hasRequiredScheme = !$requiredSchemes || isset($requiredSchemes[$context->getScheme()]);
                if ($requiredMethods && !isset($requiredMethods[$canonicalMethod]) && !isset($requiredMethods[$requestMethod])) {
                    if ($hasRequiredScheme) {
                        $allow += $requiredMethods;
                    }
                    break;
                }
                if (!$hasRequiredScheme) {
                    $allowSchemes += $requiredSchemes;
                    break;
                }

                return $ret;
        }

        $matchedPathinfo = $pathinfo;
        $regexList = array(
            0 => '{^(?'
                    .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .')$}sD',
        );

        foreach ($regexList as $offset => $regex) {
            while (preg_match($regex, $matchedPathinfo, $matches)) {
                switch ($m = (int) $matches['MARK']) {
                    default:
                        $routes = array(
                            35 => array(array('_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code', '_format'), null, null),
                        );

                        list($ret, $vars, $requiredMethods, $requiredSchemes) = $routes[$m];

                        foreach ($vars as $i => $v) {
                            if (isset($matches[1 + $i])) {
                                $ret[$v] = $matches[1 + $i];
                            }
                        }

                        $hasRequiredScheme = !$requiredSchemes || isset($requiredSchemes[$context->getScheme()]);
                        if ($requiredMethods && !isset($requiredMethods[$canonicalMethod]) && !isset($requiredMethods[$requestMethod])) {
                            if ($hasRequiredScheme) {
                                $allow += $requiredMethods;
                            }
                            break;
                        }
                        if (!$hasRequiredScheme) {
                            $allowSchemes += $requiredSchemes;
                            break;
                        }

                        return $ret;
                }

                if (35 === $m) {
                    break;
                }
                $regex = substr_replace($regex, 'F', $m - $offset, 1 + strlen($m));
                $offset += strlen($m);
            }
        }
        if ('/' === $pathinfo && !$allow && !$allowSchemes) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        return null;
    }
}

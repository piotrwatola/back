<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'router.cache_warmer' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/CacheWarmer/RouterCacheWarmer.php';

return $this->privates['router.cache_warmer'] = new \Symfony\Bundle\FrameworkBundle\CacheWarmer\RouterCacheWarmer((new \Symfony\Component\DependencyInjection\ServiceLocator(array('router' => function () {
    return ($this->services['router'] ?? $this->getRouterService());
})))->withContext('router.cache_warmer', $this));

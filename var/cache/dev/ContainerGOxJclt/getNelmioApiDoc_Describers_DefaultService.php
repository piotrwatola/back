<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'nelmio_api_doc.describers.default' shared service.

include_once $this->targetDirs[3].'/vendor/nelmio/api-doc-bundle/Describer/DescriberInterface.php';
include_once $this->targetDirs[3].'/vendor/nelmio/api-doc-bundle/Describer/DefaultDescriber.php';

return $this->privates['nelmio_api_doc.describers.default'] = new \Nelmio\ApiDocBundle\Describer\DefaultDescriber();

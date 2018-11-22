<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'nelmio_api_doc.describers.config' shared service.

include_once $this->targetDirs[3].'/vendor/nelmio/api-doc-bundle/Describer/DescriberInterface.php';
include_once $this->targetDirs[3].'/vendor/nelmio/api-doc-bundle/Describer/ExternalDocDescriber.php';

return $this->privates['nelmio_api_doc.describers.config'] = new \Nelmio\ApiDocBundle\Describer\ExternalDocDescriber(array('schemes' => array(0 => 'http', 1 => 'https'), 'info' => array('title' => 'Senetic', 'version' => '1.0.0'), 'securityDefinitions' => array('Bearer' => array('type' => 'apiKey', 'description' => 'Value: Bearer {jwt}', 'name' => 'Authorization', 'in' => 'header')), 'security' => array(0 => array('Bearer' => array()))));
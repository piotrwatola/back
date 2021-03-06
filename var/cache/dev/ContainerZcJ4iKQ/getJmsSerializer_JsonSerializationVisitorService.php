<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'jms_serializer.json_serialization_visitor' shared service.

include_once $this->targetDirs[3].'/vendor/jms/serializer/src/JMS/Serializer/VisitorInterface.php';
include_once $this->targetDirs[3].'/vendor/jms/serializer/src/JMS/Serializer/AbstractVisitor.php';
include_once $this->targetDirs[3].'/vendor/jms/serializer/src/JMS/Serializer/GenericSerializationVisitor.php';
include_once $this->targetDirs[3].'/vendor/jms/serializer/src/JMS/Serializer/JsonSerializationVisitor.php';
include_once $this->targetDirs[3].'/vendor/jms/serializer/src/JMS/Serializer/Accessor/AccessorStrategyInterface.php';
include_once $this->targetDirs[3].'/vendor/jms/serializer/src/JMS/Serializer/Accessor/DefaultAccessorStrategy.php';

$this->services['jms_serializer.json_serialization_visitor'] = $instance = new \JMS\Serializer\JsonSerializationVisitor(($this->privates['jms_serializer.cache_naming_strategy'] ?? $this->load('getJmsSerializer_CacheNamingStrategyService.php')), ($this->privates['jms_serializer.accessor_strategy.default'] ?? $this->privates['jms_serializer.accessor_strategy.default'] = new \JMS\Serializer\Accessor\DefaultAccessorStrategy()));

$instance->setOptions(1216);

return $instance;

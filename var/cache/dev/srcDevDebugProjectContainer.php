<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerGOxJclt\srcDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerGOxJclt/srcDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerGOxJclt.legacy');

    return;
}

if (!\class_exists(srcDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerGOxJclt\srcDevDebugProjectContainer::class, srcDevDebugProjectContainer::class, false);
}

return new \ContainerGOxJclt\srcDevDebugProjectContainer(array(
    'container.build_hash' => 'GOxJclt',
    'container.build_id' => 'a7dd69fd',
    'container.build_time' => 1542899233,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerGOxJclt');

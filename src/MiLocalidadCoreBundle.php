<?php
namespace MiLocalidad\CoreBundle;

use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class MiLocalidadCoreBundle extends AbstractBundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->registerForAutoconfiguration(EntityRepository::class)
            ->addTag('doctrine.repository_service');
    }
}
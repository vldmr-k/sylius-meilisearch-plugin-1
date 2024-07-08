<?php

declare(strict_types=1);

namespace Setono\SyliusMeilisearchPlugin;

use Setono\CompositeCompilerPass\CompositeCompilerPass;
use Setono\SyliusMeilisearchPlugin\DataMapper\CompositeDataMapper;
use Setono\SyliusMeilisearchPlugin\Form\Builder\CompositeFacetFormBuilder;
use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class SetonoSyliusMeilisearchPlugin extends Bundle
{
    use SyliusPluginTrait;

    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        // Register services in composite services
        $container->addCompilerPass(new CompositeCompilerPass(
            CompositeFacetFormBuilder::class,
            'setono_sylius_meilisearch.facet_form_builder',
        ));

        $container->addCompilerPass(new CompositeCompilerPass(
            CompositeDataMapper::class,
            'setono_sylius_meilisearch.data_mapper',
        ));

        $container->addCompilerPass(new CompositeCompilerPass(
            'setono_sylius_meilisearch.url_generator.composite',
            'setono_sylius_meilisearch.url_generator',
        ));

        $container->addCompilerPass(new CompositeCompilerPass(
            'setono_sylius_meilisearch.provider.index_scope.composite',
            'setono_sylius_meilisearch.index_scope_provider',
        ));

        $container->addCompilerPass(new CompositeCompilerPass(
            'setono_sylius_meilisearch.filter.doctrine.composite',
            'setono_sylius_meilisearch.doctrine_filter',
        ));

        $container->addCompilerPass(new CompositeCompilerPass(
            'setono_sylius_meilisearch.filter.object.composite',
            'setono_sylius_meilisearch.object_filter',
        ));
    }
}

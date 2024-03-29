<?php

namespace OpenLdapObject\Bundle\LdapObjectBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('ldap_object');

        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->scalarNode('host')->defaultNull()->end()
                ->scalarNode('port')->defaultValue(389)->end()
                ->scalarNode('dn')->defaultNull()->end()
                ->scalarNode('base_dn')->defaultNull()->end()
                ->scalarNode('password')->defaultNull()->end()
            ->end()
        ->end();


        return $treeBuilder;
    }
}

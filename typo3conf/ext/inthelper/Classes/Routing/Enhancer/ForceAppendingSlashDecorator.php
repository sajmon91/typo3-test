<?php
declare(strict_types=1);

namespace Int\Inthelper\Routing\Enhancer;

use TYPO3\CMS\Core\Routing\Enhancer\AbstractEnhancer;
use TYPO3\CMS\Core\Routing\Enhancer\DecoratingEnhancerInterface;
use TYPO3\CMS\Core\Routing\RouteCollection;

class ForceAppendingSlashDecorator extends AbstractEnhancer implements DecoratingEnhancerInterface
{
    /**
     * {@inheritdoc}
     */
    public function getRoutePathRedecorationPattern(): string
    {
        return '\/$';
    }

    /**
     * {@inheritdoc}
     */
    public function decorateForMatching(RouteCollection $collection, string $routePath): void
    {
        foreach ($collection->all() as $route) {
            $route->setOption('_decoratedRoutePath', '/' . trim($routePath, '/'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function decorateForGeneration(RouteCollection $collection, array $parameters): void
    {
        foreach ($collection->all() as $routeName => $existingRoute) {
            $existingRoutePath = rtrim($existingRoute->getPath(), '/');
            $existingRoute->setPath($existingRoutePath . '/');
        }
    }
}

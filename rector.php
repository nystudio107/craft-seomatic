<?php
declare(strict_types=1);

use craft\rector\SetList as CraftSetList;
use Rector\Core\Configuration\Option;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    // Skip integrations and generated JSONLD classes
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::SKIP, [
        __DIR__ . '/src/integrations',
    ]);

    $containerConfigurator->import(CraftSetList::CRAFT_CMS_40);
};

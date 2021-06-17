<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Php74\Rector\Property\TypedPropertyRector;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    // get parameters
    $parameters = $containerConfigurator->parameters();

    // paths to refactor; solid alternative to CLI arguments
    $parameters->set(Option::PATHS, [__DIR__ . '/src'/*, __DIR__ . '/tests'*/]);

    // Run Rector only on changed files
    $parameters->set(Option::ENABLE_CACHE, true);
    //$parameters->set(Option::CACHE_DIR, __DIR__ . '/tmp/rector_cached_files');

    // Path to phpstan with extensions, that PHPSTan in Rector uses to determine types
    //$parameters->set(Option::PHPSTAN_FOR_RECTOR_PATH, getcwd() . '/phpstan-for-config.neon');

    // Define what rule sets will be applied
    $containerConfigurator->import(SetList::DEFLUENT);
    $containerConfigurator->import(SetList::ACTION_INJECTION_TO_CONSTRUCTOR_INJECTION);
    $containerConfigurator->import(SetList::CODE_QUALITY);
    $containerConfigurator->import(SetList::CODE_QUALITY_STRICT);
    $containerConfigurator->import(SetList::CODING_STYLE);
    $containerConfigurator->import(SetList::DEAD_CODE);
    $containerConfigurator->import(SetList::FRAMEWORK_EXTRA_BUNDLE_50);
    $containerConfigurator->import(SetList::MONOLOG_20);
    $containerConfigurator->import(SetList::MYSQL_TO_MYSQLI);
    $containerConfigurator->import(SetList::NAMING);
    $containerConfigurator->import(SetList::ORDER);
    $containerConfigurator->import(SetList::PHP_74);
    //$containerConfigurator->import(SetList::PRIVATIZATION);
    $containerConfigurator->import(SetList::PSR_4);
    //$containerConfigurator->import(SetList::SAFE_07);
    $containerConfigurator->import(SetList::TYPE_DECLARATION);
    $containerConfigurator->import(SetList::TYPE_DECLARATION_STRICT);
    $containerConfigurator->import(SetList::UNWRAP_COMPAT);
    $containerConfigurator->import(SetList::EARLY_RETURN);

    // get services (needed for register a single rule)
    // $services = $containerConfigurator->services();

    // register a single rule
    // $services->set(TypedPropertyRector::class);
};

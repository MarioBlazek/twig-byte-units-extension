<?php

declare(strict_types=1);

namespace Marek\Twig\Tests;

use Marek\Twig\ByteUnitsExtension;
use Twig_Test_IntegrationTestCase;

class ByteUnitsExtensionIntegrationTest extends Twig_Test_IntegrationTestCase
{
    protected function getFixturesDir()
    {
        return dirname(__FILE__) . '/Fixtures/';
    }

    protected function getExtensions()
    {
        return array(
            new ByteUnitsExtension(),
        );
    }
}

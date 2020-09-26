<?php

declare(strict_types=1);

namespace Marek\Twig\Tests;

use Marek\Twig\ByteUnitsExtension;
use Twig\Test\IntegrationTestCase;

class ByteUnitsExtensionIntegrationTest extends IntegrationTestCase
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

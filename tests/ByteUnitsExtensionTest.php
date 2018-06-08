<?php

declare(strict_types=1);

namespace Marek\Twig\Tests;

use Marek\Twig\ByteUnitsExtension;
use PHPUnit\Framework\TestCase;

final class ByteUnitsExtensionTest extends TestCase
{
    /**
     * @var \Marek\Twig\ByteUnitsExtension
     */
    private $extension;

    public function setUp(): void
    {
        $this->extension = new ByteUnitsExtension();
    }

    public function testGetFormatedMetricValue()
    {
        $this->assertEquals(
            '1.32MB',
            $this->extension->getFormatedMetricValue(1322000, 'MB')
        );

        $this->assertEquals(
            '1.32MB',
            $this->extension->getFormatedMetricValue(1322000)
        );

        $this->assertEquals(
            '1.32 MB',
            $this->extension->getFormatedMetricValue(1322000, 'MB', \ByteUnits\Metric::DEFAULT_FORMAT_PRECISION, ' ')
        );

        $this->assertEquals(
            '1.32/MB',
            $this->extension->getFormatedMetricValue(1322000, 'MB', \ByteUnits\Metric::DEFAULT_FORMAT_PRECISION, '/')
        );
    }

    public function testGetMetricBytes()
    {
        $this->assertEquals(
            '1322000',
            $this->extension->getMetricBytes(1322000)
        );
    }

    public function testGetFormatedBinaryValue()
    {
        $this->assertEquals(
            '1.26MiB',
            $this->extension->getFormatedBinaryValue(1322000, 'MB')
        );

        $this->assertEquals(
            '1.26 MiB',
            $this->extension->getFormatedBinaryValue(1322000, 'MB', \ByteUnits\Metric::DEFAULT_FORMAT_PRECISION, ' ')
        );

        $this->assertEquals(
            '1.26/MiB',
            $this->extension->getFormatedBinaryValue(1322000, 'MB', \ByteUnits\Metric::DEFAULT_FORMAT_PRECISION, '/')
        );
    }

    public function testGetBinaryBytes()
    {
        $this->assertEquals(
            '1322000',
            $this->extension->getBinaryBytes(1322000)
        );
    }
}

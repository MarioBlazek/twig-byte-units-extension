<?php

declare(strict_types=1);

namespace Marek\Twig\Tests;

use Marek\Twig\ByteUnitsExtension;
use PHPUnit\Framework\TestCase;
use Twig\TwigFilter;

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

    /**
     * @covers \Marek\Twig\ByteUnitsExtension::getFilters()
     */
    public function testGetFilters()
    {
        $filters = $this->extension->getFilters();
        foreach ($filters as $filter) {
            $this->assertInstanceOf(TwigFilter::class, $filter);
        }
    }

    /**
     * @covers \Marek\Twig\ByteUnitsExtension::getFormatedMetricValue()
     */
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

    /**
     * @covers \Marek\Twig\ByteUnitsExtension::getMetricBytes()
     */
    public function testGetMetricBytes()
    {
        $this->assertEquals(
            '1322000',
            $this->extension->getMetricBytes(1322000)
        );
    }

    /**
     * @covers \Marek\Twig\ByteUnitsExtension::getFormatedBinaryValue()
     */
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

    /**
     * @covers \Marek\Twig\ByteUnitsExtension::getBinaryBytes()
     */
    public function testGetBinaryBytes()
    {
        $this->assertEquals(
            '1322000',
            $this->extension->getBinaryBytes(1322000)
        );
    }
}

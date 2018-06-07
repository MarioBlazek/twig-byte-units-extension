<?php

declare(strict_types=1);

namespace Marek\Twig;

use ByteUnits\Metric;
use ByteUnits\Binary;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class ByteUnitsExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter(
                'byte_units_format_metric',
                [$this, 'getFormatedMetricValue']
            ),
            new TwigFilter(
                'byte_units_bytes_metric',
                [$this, 'getMetricBytes']
            ),
            new TwigFilter(
                'byte_units_format_binary',
                [$this, 'getFormatedBinaryValue']
            ),
            new TwigFilter(
                'byte_units_bytes_binary',
                [$this, 'getBinaryBytes']
            ),
        ];
    }

    public function getFormatedMetricValue(int $value, string $format = null, $precision = Metric::DEFAULT_FORMAT_PRECISION, $separator = ''): string
    {
        $metric = new Metric($value, $precision);

        return $metric->format($format, $separator);
    }

    public function getMetricBytes(int $value, $precision = Metric::DEFAULT_FORMAT_PRECISION)
    {
        $binary = new Metric($value, $precision);

        return $binary->numberOfBytes();
    }

    public function getFormatedBinaryValue(int $value, string $format = null, $precision = Metric::DEFAULT_FORMAT_PRECISION, $separator = ''): string
    {
        $binary = new Binary($value, $precision);

        return $binary->format($format, $separator);
    }

    public function getBinaryBytes(int $value, $precision = Metric::DEFAULT_FORMAT_PRECISION)
    {
        $binary = new Binary($value, $precision);

        return $binary->numberOfBytes();
    }
}

<?php

namespace Yandex\Market\Partner\Data;

use DateTimeImmutable;
use DateTime;

class DateType
{
    const FORMAT_PUBLIC = 'd-m-Y';
    const FORMAT_USER = DateTime::ISO8601;

    public function getDateTimeImmutable($format, $date)
    {
        return DateTimeImmutable::createFromFormat($format, $date);
    }
}
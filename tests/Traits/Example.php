<?php

namespace Mireon\YandexTurbo\Tests\Traits;

use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;
use Mireon\YandexTurbo\Traits\Renderer;

class Example
{
    use Creator;
    use MagicSetter;
    use Renderer;

    private ?string $data = null;

    public function __construct(?string $data = null)
    {
        $this->setData($data);
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(?string $data = null): ?string
    {
        return $this->data = $data;
    }

    public function addSuffix(?string $suffix = null): ?string
    {
        return $this->data .= $suffix;
    }
}

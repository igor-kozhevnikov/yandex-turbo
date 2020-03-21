<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks;

use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The abstract block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks
 */
abstract class Block implements BlockInterface
{
    use Creator;
    use MagicSetter;
    use Renderer;
}

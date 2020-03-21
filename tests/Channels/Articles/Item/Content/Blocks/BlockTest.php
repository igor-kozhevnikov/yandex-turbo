<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Block;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks
 */
class BlockTest extends TestCase
{
    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Block::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $stub = $this->getMockForAbstractClass(Block::class);
        $this->assertInstanceOf(Block::class, $stub::create());
    }
}

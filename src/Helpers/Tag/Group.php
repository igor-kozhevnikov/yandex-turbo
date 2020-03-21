<?php

namespace Mireon\YandexTurbo\Helpers\Tag;

use Mireon\YandexTurbo\Traits\Creator;

/**
 * The group of tags.
 *
 * @package Mireon\YandexTurbo\Helpers\Tag
 */
class Group
{
    use Creator;

    /**
     * The array of tags.
     *
     * @var Tag[] $tags
     */
    private array $tags = [];

    /**
     * The constructor.
     *
     * @param Tag[]|null $tags
     *   A list of tags.
     */
    public function __construct(?array $tags = null)
    {
        $this->tags($tags);
    }

    /**
     * Sets a list of tags.
     *
     * @param array|null $tags
     *   A list of tags.
     *
     * @return self
     */
    public function tags(?array $tags): self
    {
        $this->tags = [];

        if (empty($tags)) {
            return $this;
        }

        foreach ($tags as $tag) {
            $this->tag($tag);
        }

        return $this;
    }

    /**
     * Adds tag to the list.
     *
     * @param Tag|null $tag
     *   A tag.
     *
     * @return self
     */
    public function tag(?Tag $tag): self
    {
        if (!is_null($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    /**
     * Renders the group.
     *
     * @return string|null
     */
    public function render(): ?string
    {
        return array_reduce($this->tags, fn($output, Tag $tag) => $output . $tag);
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->render() ?? '';
    }
}

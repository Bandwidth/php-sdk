<?php

namespace Bandwidth\Model\Bxml;

class Tag extends Verb
{
    /**
     * @param string $content A custom string sent with this and all future callbacks unless
     *                        overwritten or cleared. Max length 256 characters.
     */
    public function __construct(
        public readonly string $content,
    ) {
        parent::__construct('Tag', $content);
    }

    protected function attributes(): array
    {
        return [];
    }
}

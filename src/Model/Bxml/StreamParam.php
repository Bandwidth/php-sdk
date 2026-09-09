<?php

namespace Bandwidth\Model\Bxml;

class StreamParam extends Verb
{
    /**
     * @param string|null $name  The name of the stream parameter.
     * @param string|null $value The value of the stream parameter.
     */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $value = null,
    ) {
        parent::__construct('StreamParam');
    }

    protected function attributes(): array
    {
        return [
            'name' => $this->name,
            'value' => $this->value,
        ];
    }
}

<?php

namespace Bandwidth\Model\Bxml;

class CustomParam extends Verb
{
    /**
     * @param string|null $name  The name of the custom parameter.
     * @param string|null $value The value of the custom parameter.
     */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $value = null,
    ) {
        parent::__construct('CustomParam');
    }

    protected function attributes(): array
    {
        return [
            'name' => $this->name,
            'value' => $this->value,
        ];
    }
}

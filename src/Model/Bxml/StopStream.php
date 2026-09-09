<?php

namespace Bandwidth\Model\Bxml;

class StopStream extends Verb
{
    /**
     * @param string|null $name The name of the stream to stop. Either the name given when sending
     *                          StartStream, or the system generated name returned in the Media
     *                          Stream Started webhook if StartStream was sent with no name.
     * @param bool|null   $wait If true, the BXML interpreter waits for the stream to stop before
     *                          processing the next verb.
     */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?bool $wait = null,
    ) {
        parent::__construct('StopStream');
    }

    protected function attributes(): array
    {
        return [
            'name' => $this->name,
            'wait' => $this->wait,
        ];
    }
}

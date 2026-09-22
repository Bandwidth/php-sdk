<?php

namespace Bandwidth\Model\Bxml;

use DOMDocument;

abstract class Root
{
    /** @var Verb[] */
    protected array $verbs = [];

    /**
     * @param Verb[] $verbs
     */
    public function __construct(
        protected readonly string $tagName,
        array $verbs = [],
    ) {
        $this->addVerb(...array_values($verbs));
    }

    public function addVerb(Verb ...$verbs): void
    {
        foreach ($verbs as $verb) {
            $this->verbs[] = $verb;
        }
    }

    public function toBxml(): string
    {
        $doc = new DOMDocument('1.0', 'UTF-8');
        $root = $doc->createElement($this->tagName);

        foreach ($this->verbs as $verb) {
            $root->appendChild($verb->toElement($doc));
        }

        $doc->appendChild($root);

        return rtrim($doc->saveXML(), "\n");
    }
}

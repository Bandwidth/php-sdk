<?php

namespace Bandwidth\Model\Bxml;

use BackedEnum;
use DOMDocument;
use DOMElement;

abstract class Verb
{
    public function __construct(
        protected readonly string $tagName,
        protected readonly ?string $textContent = null,
    ) {
    }

    /**
     * XML attribute name => value. Null values are omitted from output.
     *
     * @return array<string, mixed>
     */
    abstract protected function attributes(): array;

    public function toElement(DOMDocument $doc): DOMElement
    {
        $element = $doc->createElement($this->tagName);

        $this->appendContent($doc, $element);

        foreach ($this->attributes() as $name => $value) {
            $normalized = self::normalize($value);
            if ($normalized !== null) {
                $element->setAttribute($name, $normalized);
            }
        }

        return $element;
    }

    public function toBxml(): string
    {
        $doc = new DOMDocument('1.0', 'UTF-8');
        $doc->appendChild($this->toElement($doc));

        return $doc->saveXML($doc->documentElement);
    }

    protected function appendContent(DOMDocument $doc, DOMElement $element): void
    {
        if ($this->textContent !== null) {
            $element->textContent = $this->textContent;
        }
    }

    protected static function normalize(mixed $value): ?string
    {
        return match (true) {
            $value === null => null,
            $value instanceof BackedEnum => (string) $value->value,
            \is_bool($value) => $value ? 'true' : 'false',
            default => (string) $value,
        };
    }
}

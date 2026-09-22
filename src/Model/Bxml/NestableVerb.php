<?php

namespace Bandwidth\Model\Bxml;

use DOMDocument;
use DOMElement;
use InvalidArgumentException;

abstract class NestableVerb extends Verb
{
    /** @var Verb[] */
    protected array $children = [];

    /**
     * @param Verb[] $children
     */
    public function __construct(string $tagName, ?string $textContent = null, array $children = [])
    {
        parent::__construct($tagName, $textContent);

        $children = array_values($children);
        $this->assertAllowed($children);

        $this->children = $children;
    }

    /**
     * The class or interface every child must satisfy, paired with the class names to list in
     * error messages. Return null to accept any Verb.
     *
     * @return array{0: class-string, 1: string[]}|null
     */
    abstract protected function childConstraint(): ?array;

    public function toElement(DOMDocument $doc): DOMElement
    {
        $element = parent::toElement($doc);

        foreach ($this->children as $child) {
            $element->appendChild($child->toElement($doc));
        }

        return $element;
    }

    public function addVerb(Verb ...$verbs): void
    {
        $this->assertAllowed($verbs);

        foreach ($verbs as $verb) {
            $this->children[] = $verb;
        }
    }

    /**
     * @param Verb[] $verbs
     */
    private function assertAllowed(array $verbs): void
    {
        $constraint = $this->childConstraint();

        if ($constraint === null) {
            return;
        }

        [$type, $accepted] = $constraint;

        foreach (array_values($verbs) as $index => $verb) {
            if ($verb instanceof $type) {
                continue;
            }

            throw new InvalidArgumentException(\sprintf(
                '%s accepts only %s; got %s at index %d',
                $this->tagName,
                implode(', ', $accepted),
                \is_object($verb) ? self::shortName($verb) : get_debug_type($verb),
                $index,
            ));
        }
    }

    protected static function shortName(object $object): string
    {
        $parts = explode('\\', $object::class);

        return end($parts);
    }
}

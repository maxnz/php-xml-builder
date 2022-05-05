<?php

namespace GTS\Tools\Util\XML;

use DOMDocument;
use DOMElement;

class XMLElement {
    public string $qualifiedName;
    public string $value;
    public array $attributes;
    /**
     * @var XMLElement[] $children
     */
    public array $children;

    /**
     * @param XMLElement[] $children
     */
    public function __construct(
        string $qualifiedName,
        string $value = "",
        array $attributes = [],
        array $children = [],
    ) {
        $this->qualifiedName = $qualifiedName;
        $this->value = $value;
        $this->attributes = $attributes;
        $this->children = $children;
    }

    public function toDOMElement(DOMDocument $dom): DOMElement {
        $element = $dom->createElement($this->qualifiedName, $this->value);

        foreach ($this->attributes as $attrKey => $attrVal) $element->setAttribute($attrKey, $attrVal);
        foreach ($this->children as $child) $element->appendChild($child->toDOMElement($dom));

        return $element;
    }

    public function buildXML(): string {
        $dom = new DOMDocument();
        $dom->appendChild($this->toDOMElement($dom));
        return $dom->saveHTML();
    }
}

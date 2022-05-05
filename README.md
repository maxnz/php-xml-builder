# php-xml-builder

Build XML in PHP easily and concisely.

## Usage

### A Single XML element

```php
$xml = new XMLElement(
    qualifiedName: "elementName",
    value: "element value",
);

print($xml->buildXML());
```

```xml
<elementName>element value</elementName>
```

### Adding Attributes

```php
$xml = new XMLElement(
    qualifiedName: "elementName",
    value: "element value",
    attributes: [
        "attribute1" => "attribute 1 value",
        "attribute2" => "attribute 2 value",
    ],
);

print($xml->buildXML());
```

```xml
<elementName attribute1="attribute 1 value" attribute2="attribute 2 value">element value</elementName>
```

### Child Elements

```php
$xml = new XMLElement(
    "elementName",
    "element value",
    [
        "attribute1" => "attribute 1 value",
        "attribute2" => "attribute 2 value",
    ],
    [
        new XMLElement(
            "child1",
            children: [
                new XMLElement(
                    "childOfChild",
                    "valueOfChild",
                )
            ]
        ),
        new XMLElement(
            "AnotherChild",
            "child2 Value",
        ),
    ],
);

print($xml->buildXML());
```

```xml
<elementName attribute1="attribute 1 value" attribute2="attribute 2 value">element value<child1><childOfChild>valueOfChild</childOfChild></child1><AnotherChild>child2 Value</AnotherChild></elementName>
```

# Biano coding standard

* Run `composer require --dev biano/coding-standard`
* Create `phpcs.xml.dist` file with:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<ruleset name="Coding Standard">
    <!-- basic settings -->
    <arg name="extensions" value="php"/>
    <arg name="encoding" value="utf-8"/>
    <arg name="colors"/>
    <arg value="sp"/>
    <file>src</file>
    <file>tests</file>
    <!-- standard -->
    <rule ref="BianoCodingStandard" />
</ruleset>
```

# PhpStorm

Exported settings for PhpStorm are in the file `PhpStorm.xml`.

<?php

declare(strict_types=1);

namespace WPBLOX;

class BlockScript
{
    private $name;
    private $uri;
    private $dependencies;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->dependencies = ['wp-blocks', 'wp-element', 'wp-components', 'wp-i18n'];
    }

    public function setUri(string $uri): BlockScript
    {
        $this->uri = $uri;
        return $this;
    }

    public function setDependencies(array $dependencies): BlockScript
    {
        $this->dependencies = array_merge($this->dependencies, $dependencies);
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getDependencies(): array
    {
        return $this->dependencies;
    }
}

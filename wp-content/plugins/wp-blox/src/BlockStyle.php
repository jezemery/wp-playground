<?php

declare(strict_types=1);

namespace WPBLOX;

/**
 *
 */
class BlockStyle
{
    /**
     * @var string
     */
    private string $name;
    /**
     * @var string
     */
    private string $uri;
    /**
     * @var array
     */
    private array $dependencies;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->dependencies = [];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     * @return $this
     */
    public function setUri(string $uri): BlockStyle
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return $this->dependencies;
    }

    /**
     * @param array $dependencies
     * @return $this
     */
    public function setDependencies(array $dependencies): BlockStyle
    {
        $this->dependencies = array_merge($this->dependencies, $dependencies);
        return $this;
    }
}

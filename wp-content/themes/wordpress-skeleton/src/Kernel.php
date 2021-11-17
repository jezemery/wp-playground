<?php
declare(strict_types=1);

namespace WPSKL;

class Kernel
{
    private array $registeredClasses;

    /**
     * @param array $classes
     */
    public function registerClasses(array $classes): void
    {
        $this->setRegisteredClasses($classes);
    }

    /**
     * @return array
     */
    public function getRegisteredClasses(): array
    {
        return $this->registeredClasses;
    }

    /**
     * @param array $registeredClasses
     */
    private function setRegisteredClasses(array $registeredClasses): void
    {
        $this->registeredClasses = $registeredClasses;
    }
}

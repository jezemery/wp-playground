<?php
declare(strict_types=1);

namespace WPSKL;
class App
{
    /**
     * @var Kernel
     */
    private Kernel $kernel;

    /**
     * @param Kernel $kernel
     */
    public function __construct(Kernel $kernel)
    {
        $this->kernel = $kernel;
    }

    public function start(): void
    {
        foreach ($this->kernel->getRegisteredClasses() as $class) {
            new $class();
        }
    }
}

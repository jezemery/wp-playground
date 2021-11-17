<?php

declare(strict_types=1);

namespace WPBLOX;

interface BlockInterface
{
    public function __construct(PluginConfig $config, string $dir = '');

    public function loadFrontendScripts(): void;

    public function loadEditorFiles(string $dir): void;

    public function getBlockName(bool $FQN = false): string;

    public function getDistPath(string $dir, string $filename): string;
}

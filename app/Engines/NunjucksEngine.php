<?php

namespace App\Engines;

use Illuminate\Contracts\View\Engine;
use Illuminate\Filesystem\Filesystem;
use Nunjucks\Environment;
use Nunjucks\Loader\FilesystemLoader;

class NunjucksEngine implements Engine
{
    protected $environment;
    protected $finder;

    public function __construct(Filesystem $finder)
    {
        $this->finder = $finder;
        $loader = new FilesystemLoader($this->finder->getPaths());
        $this->environment = new Environment($loader);
    }

    public function get($path, array $data = [])
    {
        return $this->environment->render($path, $data);
    }

    public function getCompiler()
    {
        // Not required for Nunjucks, you can return null or an empty string
        return null;
    }

    public function isExpired($path)
    {
        // Not required for Nunjucks, you can return false
        return false;
    }
}

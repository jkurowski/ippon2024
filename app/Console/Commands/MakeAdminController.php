<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Composer;

class MakeAdminController extends Command
{
    protected $signature = 'make:controller-admin {name}';
    protected $description = 'Create a new admin controller';
    protected Filesystem $files;
    protected Composer $composer;

    public function __construct(Filesystem $files, Composer $composer)
    {
        parent::__construct();

        $this->files = $files;
        $this->composer = $composer;
    }

    public function handle()
    {
        $name = $this->argument('name');

        $fileName = $this->getPath($name);

        if ($this->files->exists($fileName)) {
            $this->error('Controller already exists!');
            return false;
        }

        $this->makeDirectory($name);

        $className = basename(str_replace('\\', '/', $name));

        $stub = $this->files->get($this->getStub());
        $stub = str_replace('{{ namespace }}', $this->getNamespace($name), $stub);
        $stub = str_replace('{{ class }}', $className, $stub);

        $this->files->put($fileName, $stub);

        $this->info('Controller created successfully.');

        $this->composer->dumpAutoloads();
    }

    protected function getStub()
    {
        return base_path('stubs/controller-admin.stub');
    }

    protected function getPath($name)
    {

        $segments = explode('\\', $name);
        $className = array_pop($segments);
        $baseNamespace = 'Http\Controllers\Admin';

        if (!empty($segments)) {
            $baseNamespace .= '\\' . implode('\\', $segments);
        }

        return app_path("{$baseNamespace}/{$className}.php");
    }

    protected function getNamespace($name)
    {
        $segments = explode('\\', $name);
        array_pop($segments);
        $namespace = 'App\Http\Controllers\Admin';

        // Check if the provided name contains a namespace
        if (!empty($segments)) {
            $namespace .= '\\' . implode('\\', $segments);
        }

        return $namespace;
    }

    protected function makeDirectory($name)
    {
        $directory = $this->getNamespaceDirectory($name);

        if (!$this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true, true);
        }
    }

    protected function getNamespaceDirectory($name)
    {
        $segments = explode('\\', $name);
        array_pop($segments);

        return app_path('Http/Controllers/Admin/' . implode('/', $segments));
    }

    private function rootNamespace()
    {
    }
}

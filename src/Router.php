<?php

namespace KCS;

use ReflectionClass;

class Router
{
    private array $controllers;

    public function __construct()
    {
        $this->controllers = [];
    }

    public function handleRequest(RequestHandler $request): void
    {
        $controller = $request->gauti('ct');
        $method = strtolower($request->gautiUzklausosMetoda());

        if ($this->isDefinedController($controller) && $this->hasDefinedAction($controller, $method)) {
            $namespace = $this->getClassNameSpace($controller);
            (new $namespace)->{$method}($request);
        } else {
            throw new \RuntimeException('Missing controller or bad method provided');
        }
    }

    private function isDefinedController(?string $class): bool
    {
        $classNameSpace = $this->getClassNameSpace($class);

        return in_array($classNameSpace, $this->controllers, false);
    }

    public function add(string $class): void
    {
        if (!$this->isDefinedController($class)) {
            $this->controllers[] = $class;
        }
    }

    private function hasDefinedAction(string $class, string $method): bool
    {
        $classNameSpace = $this->getClassNameSpace($class);

        return method_exists(new $classNameSpace, $method);
    }

    private function getClassNameSpace(?string $class): string
    {
        try {
            $reflection = new ReflectionClass($class);
        } catch (\Throwable $exception) {
            $reflection = new ReflectionClass('KCS\\Controller\\'.$class);
        }

        return $reflection->getName();
    }
}
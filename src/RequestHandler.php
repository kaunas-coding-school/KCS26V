<?php  declare(strict_types=1);

namespace KCS;

use Exception;

class RequestHandler
{
    /**
     * @var array
     */
    private array $request;
    private string $method;

    public function __construct()
    {
        $this->request = $_REQUEST;
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return array
     * @throws Exception
     */
    public function gautiUzklausosDuomenis(): array
    {
        return $this->request;
    }

    public function gautiUzklausosMetoda(): string
    {
        return $this->method;
    }

    public function gauti(string $string): ?string
    {
        return $this->request[$string] ?? null;
    }
}
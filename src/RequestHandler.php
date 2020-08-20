<?php  declare(strict_types=1);

namespace KCS;

use Exception;
use InvalidArgumentException;
use RuntimeException;

class RequestHandler
{
    public const AMZIAUS_LIMITAS = 20;
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
    public function gautiUzklausosDuoemnis(): array
    {
        $this->validuotiDuomenis();
        return $this->request;
    }

    public function gautiUzklausosMetoda(): string
    {
        return $this->method;
    }

    /**
     * @throws Exception
     */
    private function validuotiDuomenis(): void
    {
        if (!array_key_exists('vardas', $this->request) || empty($this->request['vardas'])){
            throw new InvalidArgumentException('Nenurodytas Vardas');
        }

        if (!array_key_exists('elpastas', $this->request) || empty($this->request['elpastas'])){
            throw new InvalidArgumentException('Nenurodytas el pastas');
        }

        if (!array_key_exists('msg', $this->request) || empty($this->request['msg'])){
            throw new InvalidArgumentException('Nera zinutes');
        }
    }
}
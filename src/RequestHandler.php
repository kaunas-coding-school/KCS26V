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
//        if (!array_key_exists('amzius', $this->request)){
//            throw new RuntimeException('Nenurodytas amžiaus kintamasis');
//        }
//
//        if (!$this->request['amzius'] || (int) $this->request['amzius'] < self::AMZIAUS_LIMITAS){
//            throw new InvalidArgumentException('Esate per jaunas');
//        }
    }
}
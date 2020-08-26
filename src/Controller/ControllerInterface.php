<?php

namespace KCS\Controller;

use KCS\RequestHandler;

interface ControllerInterface
{
    public function get(?RequestHandler $request);
    public function post(?RequestHandler $request);
    public function patch(?RequestHandler $request);
    public function delete(?RequestHandler $request);
}
<?php

namespace Core\Http\Message;

interface ServerRequestInterface{

    public function getUri();

    public function getMethod();
 }
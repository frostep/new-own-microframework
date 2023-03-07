<?php

declare(strict_types=1);

namespace Framework\Http;

class Request implements ServerRequestInterface
{
    public function __construct(
        private array $queryParams = [],
        private $parsedBody = null,
    ) {
        $this->queryParams = $queryParams;
        $this->parsedBody = $parsedBody;
    }

    public function withQueryParams(array $query)
    {
        $new = clone $this;
        $new->queryParams = $query;

        return $new;
    }

    // для get
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    // Этот метод для http-методов post, patch, put, delete
    public function getParsedBody()
    {
        return $this->parsedBody;
    }

    public function withParsedBody($data)
    {
        $new = clone $this;
        $new->parsedBody = $data;

        return $new;
    }
}

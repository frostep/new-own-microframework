<?php

declare(strict_types=1);

namespace Tests\Framework\Http;

use Framework\Http\Request;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class RequestTest extends TestCase
{
    public function testEmpty(): void
    {
        $request = new Request();

        self::assertEquals([], $request->getQueryParams());
        self::assertNull($request->getParsedBody());
    }

    public function testQueryParams(): void
    {
        $request = (new Request())
            ->withQueryParams($data = [
                'name' => 'John',
                'age' => 28,
            ])
        ;

        self::assertEquals($data, $request->getQueryParams());
        self::assertNull($request->getParsedBody());
    }

    public function testParsedBody(): void
    {
        $request = (new Request())
            ->withParsedBody($data = [
                'test' => 'test',
            ])
        ;

        self::assertEquals([], $request->getQueryParams());
        self::assertEquals($data, $request->getParsedBody());
    }
}

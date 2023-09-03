<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;

class HeaderDumper
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->logger->info(
            'request',
            [
                'header' => strval($request->headers)
            ]
        );
        // 헬퍼 함수 이용 시에는 다음과 같다
        // info('request', ['header' => strval($request->headers)]);
        $response = $next($request);
        $this->logger->info(
            'response',
            [
                'header' => strval($response->headers)
            ]
        );
        return $response;
    }
}

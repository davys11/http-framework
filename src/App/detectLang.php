<?php

declare(strict_types=1);

namespace App;

use Framework\Http\Message\ServerRequest;

function detectLang(ServerRequest $request, string $default): string
{
    if (!empty($request->getQueryParams()['lang']) && is_string($request->getQueryParams()['lang'])) {
        return $request->getQueryParams()['lang'];
    }

    if (!empty($request->getCookieParams()['lang'])) {
        return (string)$request->getCookieParams()['lang'];
    }

    if (!empty($request->getHeaders()['Accept-Language'])) {
        return substr((string)$request->getHeaders()['Accept-Language'], 0, 2);
    }

    return $default;
}
<?php

namespace YasinKose\ApiResponder\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static notFound(string $message, $errors = [])
 * @method static ok(string $message = "OK", $attr = [])
 * @method static unAuthenticated(string $message = "Unauthorized", $errors = [])
 * @method static forbidden(string $message = "Forbidden", $errors = [])
 * @method static error(string $message = null, $errors = [])
 * @method static created($attr = null)
 * @method static failedValidation(string $message = "Unprocessable Entity", $errors = [])
 * @method static noContent(string $message = "No Content", $errors = [])
 * @method static accepted(string $message = "Accepted", $attr = [])
 */
class ApiResponder extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'api-responder';
    }
}

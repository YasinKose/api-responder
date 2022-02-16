<?php

namespace YasinKose\ApiResponder;

use Exception;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\JsonResponse;
use JsonSerializable;
use Symfony\Component\HttpFoundation\Response;

class ApiResponder
{
    /**
     * @param string $message
     * @param array|mixed $errors
     * @return JsonResponse
     */
    public function notFound(string $message, $errors = []): JsonResponse
    {
        return $this->apiResponse([
            'message' => $message,
            'errors' => $errors
        ], Response::HTTP_NOT_FOUND);
    }

    /**
     * @param array|mixed $data
     * @param int $code
     * @return JsonResponse
     */
    private function apiResponse(array $data, int $code = 200): JsonResponse
    {
        return response()->json([
            'message' => $this->morphMessage($data['message'] ?? ""),
            'attr' => $this->morphToArray($data['attr'] ?? []),
            'errors' => $this->morphToError($data['errors'] ?? []),
        ], $code, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param $message
     * @return string|null
     */
    private function morphMessage($message): ?string
    {
        return $message instanceof Exception ? $message->getMessage() : ($message ?? null);
    }

    /**
     * @param $data
     * @return array|mixed
     */
    private function morphToArray($data)
    {
        if ($data instanceof Arrayable) {
            return $data->toArray();
        }

        if ($data instanceof JsonSerializable) {
            return $data->jsonSerialize();
        }

        return $data ?? [];
    }

    private function morphToError($errors = [])
    {
        if ($errors instanceof Arrayable) {
            return $errors->toArray();
        }

        if ($errors instanceof JsonSerializable) {
            return $errors->jsonSerialize();
        }

        foreach (array_filter($errors) as $index => $error) {
            if (is_string($error)) {
                unset($errors[$index]);
                $errors[$index][] = $error;
            }
        }

        return $errors;
    }

    /**
     * @param string $message
     * @param array|mixed $attr
     * @return JsonResponse
     */
    public function ok(string $message = "OK", $attr = []): JsonResponse
    {
        return $this->apiResponse([
            'message' => $message,
            'attr' => $attr
        ], Response::HTTP_OK);
    }

    /**
     * @param string $message
     * @param array|mixed $errors
     * @return JsonResponse
     */
    public function unAuthenticated(string $message = "Unauthorized", $errors = []): JsonResponse
    {
        return $this->apiResponse([
            'message' => $message,
            'errors' => $errors
        ], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * @param string $message
     * @param array|mixed $errors
     * @return JsonResponse
     */
    public function forbidden(string $message = "Forbidden", $errors = []): JsonResponse
    {
        return $this->apiResponse([
            'message' => $message,
            'errors' => $errors
        ], Response::HTTP_FORBIDDEN);
    }

    /**
     * @param string|null $message
     * @param array|mixed $errors
     * @return JsonResponse
     */
    public function error(string $message = null, $errors = []): JsonResponse
    {
        return $this->apiResponse([
            'message' => $message,
            'errors' => $errors
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * @param null $attr
     * @return JsonResponse
     */
    public function created($attr = null): JsonResponse
    {
        return $this->apiResponse([
            'attr' => $attr
        ], Response::HTTP_CREATED);
    }

    /**
     * @param string $message
     * @param array|mixed $errors
     * @return JsonResponse
     */
    public function failedValidation(string $message = "Unprocessable Entity", $errors = []): JsonResponse
    {
        return $this->apiResponse([
            'message' => $message,
            'errors' => $errors
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @param string $message
     * @param array|mixed $errors
     * @return JsonResponse
     */
    public function noContent(string $message = "No Content", $errors = []): JsonResponse
    {
        return $this->apiResponse([
            'message' => $message,
            'errors' => $errors
        ], Response::HTTP_NO_CONTENT);
    }

    /**
     * @param string $message
     * @param array $attr
     * @return JsonResponse
     */
    public function accepted(string $message = "Accepted", $attr = []): JsonResponse
    {
        return $this->apiResponse([
            'message' => $message,
            'attr' => $attr
        ], Response::HTTP_ACCEPTED);
    }
}

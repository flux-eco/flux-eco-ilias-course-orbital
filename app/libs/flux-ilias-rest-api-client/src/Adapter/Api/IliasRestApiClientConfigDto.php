<?php

namespace FluxIliasRestApiClient\Adapter\Api;

use Exception;
use SensitiveParameter;

class IliasRestApiClientConfigDto
{

    private function __construct(
        public readonly string $url,
        public readonly string $user,
        public readonly string $password,
        public readonly string $client,
        public readonly bool $trust_self_signed_certificate,
        public readonly bool $nginx_server
    ) {

    }


    public static function new(
        string $url,
        string $user,
        #[SensitiveParameter] string $password,
        ?string $client = null,
        ?bool $trust_self_signed_certificate = null,
        ?bool $nginx_server = null
    ) : static {
        if ($url === "") {
            throw new Exception("Missing url");
        }
        if ($user === "") {
            throw new Exception("Missing user");
        }
        if ($password === "") {
            throw new Exception("Missing password");
        }
        if (($client ?? "") === "") {
            $client = "default";
        }

        return new static(
            $url,
            $user,
            $password,
            $client,
            $trust_self_signed_certificate ?? false,
            $nginx_server ?? true
        );
    }


    public static function newFromEnv() : static
    {
        $url = $_ENV["FLUX_ILIAS_REST_API_CLIENT_URL"] ?? "";
        if ($url === "") {
            throw new Exception("Missing FLUX_ILIAS_REST_API_CLIENT_URL");
        }

        $user = ($_ENV["FLUX_ILIAS_REST_API_CLIENT_USER"] ?? null) ??
            (($user_file = $_ENV["FLUX_ILIAS_REST_API_CLIENT_USER_FILE"] ?? "") !== "" && file_exists($user_file) ? rtrim(file_get_contents($user_file) ?: "", "\n\r") : "");
        if ($user === "") {
            throw new Exception("Missing FLUX_ILIAS_REST_API_CLIENT_USER or FLUX_ILIAS_REST_API_CLIENT_USER_FILE");
        }

        $password = ($_ENV["FLUX_ILIAS_REST_API_CLIENT_PASSWORD"] ?? null) ??
            (($password_file = $_ENV["FLUX_ILIAS_REST_API_CLIENT_PASSWORD_FILE"] ?? "") !== "" && file_exists($password_file) ? rtrim(file_get_contents($password_file) ?: "", "\n\r") : "");
        if ($password === "") {
            throw new Exception("Missing FLUX_ILIAS_REST_API_CLIENT_PASSWORD or FLUX_ILIAS_REST_API_CLIENT_PASSWORD_FILE");
        }

        return static::new(
            $url,
            $user,
            $password,
            ($_ENV["FLUX_ILIAS_REST_API_CLIENT_CLIENT"] ?? null) ??
            (($client_file = $_ENV["FLUX_ILIAS_REST_API_CLIENT_CLIENT_FILE"] ?? "") !== "" && file_exists($client_file) ? rtrim(file_get_contents($client_file) ?: "", "\n\r") : null),
            ($trust_self_signed_certificate = $_ENV["FLUX_ILIAS_REST_API_CLIENT_TRUST_SELF_SIGNED_CERTIFICATE"] ?? null) !== null ? in_array($trust_self_signed_certificate, ["true", "1"]) : null,
            ($nginx_server = $_ENV["FLUX_ILIAS_REST_API_CLIENT_NGINX_SERVER"] ?? null) !== null ? in_array($nginx_server, ["true", "1"]) : null
        );
    }
}

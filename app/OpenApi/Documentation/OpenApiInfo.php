<?php

namespace App\OpenApi\Documentation;

/**
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 *
 * @OA\Info(
 *     title="SANParks API",
 *     version="1.0.0",
 *     description="This is the SANParks Api Documentation"
 * )
 */
class OpenApiInfo {}

<?php

namespace App\OpenApi\Documentation\Response;

/**
 * @OA\Schema(
 *     schema="SuccessCreateSchema",
 *     type="object",
 *
 *     @OA\Property(property="status", type="string", example="success"),
 *     @OA\Property(property="message", type="string", example="Model created successfully"),
 *     @OA\Property(
 *          property="data",
 *          type="array",
 *
 *          @OA\Items(
 *              type="object",
 *
 *              @OA\Property(property="id", type="integer", example="24")
 *          )
 *      )
 * )
 */
class SuccessCreateSchema
{
    // Empty class, annotations only
}

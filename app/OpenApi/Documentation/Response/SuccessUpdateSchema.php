<?php

namespace App\OpenApi\Documentation\Response;

/**
 * @OA\Schema(
 *     schema="SuccessUpdateSchema",
 *     type="object",
 *
 *     @OA\Property(property="status", type="string", example="success"),
 *     @OA\Property(property="message", type="string", example="Model updated successfully"),
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
class SuccessUpdateSchema
{
    // Empty class, annotations only
}


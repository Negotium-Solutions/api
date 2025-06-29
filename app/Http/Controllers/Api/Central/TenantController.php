<?php

namespace App\Http\Controllers\Api\Central;

use App\Http\Controllers\Controller;
use App\Http\Requests\Central\TenantRequest;
use App\Models\Central\Tenant;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TenantController extends Controller
{
    use ApiResponse;

    /**
     * Create a new resource.
     * @return JsonResponse
     */
    public function create(TenantRequest $request): JsonResponse
    {
        try {
            $tenant = Tenant::create([
                'plan' => 'free'
            ]);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode(), []);
        }

        return $this->success('Park created successfully.', Response::HTTP_CREATED, ['id' => $tenant->id]);
    }
}

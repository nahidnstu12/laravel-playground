<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Services\PermissionService;

class PermissionController extends Controller
{
    public PermissionService $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function index(Request $request): JsonResponse
    {
        $filter = $this->permissionService->filterValidator($request)->validate();

        $response = $this->permissionService->getAllPermission($filter);

        return Response::json($response, 200);
    }

    public function show(int $id): JsonResponse
    {
        $response['data'] = $this->permissionService->getOne($id) ?: [];

        return Response::json($response, 200);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $permission = $this->permissionService->getOne($id);

        $validated = $this->permissionService->filterValidator($request, $id)->validate();


        $permission = $this->permissionService->update($validated, $permission);

        $response = [
            "data" => $permission ?: [],
            "_response_status" => [
                "success" => true,
                "code" => 200
            ]
        ];

        return Response::json($response, 200);
    }

    public function store(Request $request): JsonResponse
    {

        $permission = app(Permission::class);
        $validated = $this->permissionService->validator($request)->validate();
        $permissions = $this->permissionService->store($permission, $validated);

        $response = [
            "data" => $permissions ?: [],
            "_response_status" => [
                "success" => true,
                "code" => 201,
                "message" => "Permission added successfully."
            ]
        ];

        return Response::json($response, 201);
    }
}

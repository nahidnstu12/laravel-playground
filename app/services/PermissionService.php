<?php

namespace App\Services;

use App\Models\BaseModel;
use App\Models\Permission;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class PermissionService
{
    public function store(Permission $permission, array $data): Permission
    {

        $permission->fill($data);
        $permission->save();

        return $permission;
    }

    public function getAllPermission(array $request): array
    {
        $pageSize = $request['page_size'] ?? "";
        $paginate = $request['page'] ?? "";
        $title = $request["title"] ?? "";
        $module_name = $request["module_name"] ?? "";
        $row_status = $request["row_status"] ?? "";
        $method = $request["method"] ?? "";

        $permissionBuilder = Permission::select([
            'permissions.id',
            'permissions.title',
            'permissions.key',
            'permissions.module_name',
            'permissions.method',
            'permissions.row_status',
        ])->orderBy('permissions.id');

        if (!empty($title)) {
            $permissionBuilder->where(function ($builder) use ($title) {
                $builder->where('permissions.title', 'like', '%' . $title . '%');
                $builder->orWhere('permissions.key', 'like', '%' . $title . '%');
            });
        }

        if (!empty($module_name)) {
            $permissionBuilder->where('permissions.module_name', 'like', '%' . $module_name . '%');
        }

        if (is_numeric($row_status)) {
            $permissionBuilder->where('permissions.row_status', $row_status);
        }
        // dd($method, is_numeric($method), $module_name);
        // todo: not working properly
        if (is_numeric($method)) {
            $permissionBuilder->where('permissions.method',  $method);
        }


        if (is_numeric($pageSize) || is_numeric($paginate)) {
            $pageSize = $pageSize ?: 10;

            $permissions = $permissionBuilder->paginate($pageSize);

            $paginateData = (object)$permissions->toArray();

            $response['current_page'] = $paginateData->current_page;
            $response['total'] = $paginateData->total;
            $response['page_size'] = $paginateData->per_page;
            $response['total_page'] = $paginateData->last_page;
        } else {
            $permissions = $permissionBuilder->get();
        }


        $response['data'] = $permissions->toArray()['data'] ?? $permissions->toArray();

        foreach ($response['data'] as $item => $index) {
            $mn = $this->getMethodName($index["method"]);
            $response['data'][$item] = array_merge($response['data'][$item], ["method_name" => $mn]);
        }

        $response['_response_status'] = [
            "success" => true,
            "code" => 200
        ];



        return $response;
    }

    public function update(array $data, Permission $permission): Permission
    {
        $permission->fill($data);
        $permission->save();

        return $permission;
    }

    public function getOne(int $id): Permission
    {
        $permissionBuilder = Permission::select([
            'permissions.id',
            'permissions.title',
            'permissions.key',
            'permissions.module_name',
            'permissions.method',
            'permissions.row_status',
        ]);
        return $permissionBuilder->where('permissions.id', $id)->firstOrFail();

        // $response['data'] = $permissionBuilder;

        // return $response;
    }

    public function validator(Request $request, $id = null)
    {

        $customMessage = [
            'row_status.in' => 'Row status must be within 1 or 0.'
        ];

        $rules = [
            'title' => ['required', 'min:3', 'max:200'],
            'key' => ['required', 'min:3', 'max:100', 'unique:permissions,key,' . $id],
            'module_name' => ['required', 'min:3', 'max:200'],
            'method' => ['required', 'int'],
            'row_status' => [
                'required_if:' . $id . ',!=,null',
                'nullable',
                Rule::in([BaseModel::ROW_STATUS_ACTIVE, BaseModel::ROW_STATUS_INACTIVE]),
            ],
        ];
        //dd($request->all());
        return Validator::make($request->all(), $rules, $customMessage);
    }

    public function filterValidator(Request $request): ValidationValidator
    {
        $customMessage = [
            'row_status.in' => 'Row status must be within 1 or 0.'
        ];
        $rules = [
            'page_size' => ['int', 'gt:0'],
            'page' => ['int', 'gt:0'],
            'title' => ['nullable', 'max:300', 'min:2'],
            'module_name' =>
            ['nullable', 'max:300', 'min:2'],
            'method' => ['nullable', 'int', 'gte:1', 'lte:5'],
            'row_status' => [
                "nullable", "int", Rule::in([BaseModel::ROW_STATUS_ACTIVE, BaseModel::ROW_STATUS_INACTIVE])
            ]
        ];


        return Validator::make($request->all(), $rules, $customMessage);
    }

    private function getMethodName($item): string
    {
        return match ($item) {
            1 => "GET",
            2 => "POST",
            3 => "PUT",
            4 => "PATCH",
            5 => "DELETE"
        };
    }
}

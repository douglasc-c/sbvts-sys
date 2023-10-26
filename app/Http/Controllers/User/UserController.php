<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Delete a user
     *
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        UserResource::delete($id);

        return response()->json([
            'status'  => true,
            'message' => 'O cliente foi deletada com sucesso.',
        ]);
    }

    // /**
    //  * Update a user instance.
    //  *
    //  * @param  UpdateUserRequest $request
    //  * @param  string $id
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function update(UpdateUserRequest $request, $id)
    // {
    //     try {
    //         $user = UserResource::update($request->all(), $id);

    //         if (!$user) {
    //             return response()->json([
    //                 'status'  => true,
    //                 'message' => 'O cliente não foi localizada.',
    //             ]);
    //         }

    //         return response()->json([
    //             'status'  => true,
    //             'message' => 'O cliente foi atualizado com sucesso.',
    //             'user' => $user,
    //         ]);

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => $e->getMessage()
    //         ], 400);
    //     }
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateUserRequest $request)
    {
        try {
            $user = UserResource::create($request->all());

            return response()->json([
                'status'  => true,
                'message' => 'O usuário foi criado com sucesso.',
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }


    /**
     * Get a user information
     *
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        try {
            $user = UserResource::get($id);

            if (!$user) {
                return response()->json([
                    'status'  => true,
                    'message' => 'O usuário não foi localizado.',
                ]);
            }

            return response()->json([
                'status'  => true,
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], $e->getCode() ?? 400);
        }
    }

    /**
     * Get all users
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll()
    {
        try {
            $users = UserResource::getAll();

            return response()->json([
                'status'  => true,
                'users' => $users,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], $e->getCode() ?? 400);
        }
    }
}

<?php

namespace App\Http\Resources\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Delete a company.
     *
     * @return array
     */
    public static function delete(string $id)
    {
        $user = User::find($id);

        $user->delete();

        return true;
    }

    /**
     * Updating company data
     * @return \App\Models\User
     */
    public static function update(array $data, string $id)
    {
        $user = User::find($id);

        if ($user) {
            // if (isset($data['name'])) {
            //     $user->name = $data['name'];
            // }

            // if (isset($data['type'])) {
            //     $user->type = $data['type'];
            // }

            // if (isset($data['document'])) {
            //     $user->document = $data['document'];
            // }

            // if (isset($data['social_reason'])) {
            //     $user->social_reason = $data['social_reason'];
            // }

            // if (isset($data['company'])) {
            //     $user->company = $data['company'];
            // }

            $user->save();

            return $user;
        }

        throw new \Exception('Cliente não encontrada', 404);
    }

    /**
     * Create a new company.
     *
     * @return \App\Models\User
     */
    public static function create(array $data)
    {
        $user = User::create([
            'fullname' => $data['fullname'],
            'nickname' => $data['nickname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'type' => $data['type'],
            'document' => $data['document'],
        ]);

        if (isset($data['roles'])) {
            $user->roles()->sync($data['roles']);
        }

        return $user;
    }


    /**
     * Get the company information
     *
     * @return \App\Models\User
     */
    public static function get(string $id)
    {
        return User::find($id);
    }

    /**
     * Get all companies
     *
     * @return \App\Models\User
     */
    public static function getAll()
    {
        return User::get();
    }
}

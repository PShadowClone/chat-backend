<?php

namespace User\App\Repositories;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use User\App\Models\User;

class Repository extends \Core\App\Repositories\Repository
{
    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(authenticated_id());
        $data = $request->only($user->getFillable());
        try {
            $newAvatar = upload_file($request->file('avatar'), '/avatars');
            delete_file($user->avatar);
            $user->avatar = $newAvatar;
        } catch (FileNotFoundException $fileNotFoundException) {
        }
        $user->fill(collect($data)->except(['avatar'])->toArray());
        $user->save();
        return $this->collection($user , false, 'UpdatingProfile');
    }
}

<?php

namespace User\App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends \Core\App\Http\Resources\Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'avatar' => storage_assets($this->avatar)
        ];
    }

    /**
     * serialize the collection of all users
     * @return array
     * @author Amr
     */
    public function serializeForindex($request)
    {
        return $this->toArray($request);
    }

    public function serializeForUpdatingProfile($request)
    {
        return [
            ...$this->toArray($request),
            'bio' => $this->bio
        ];
    }
}

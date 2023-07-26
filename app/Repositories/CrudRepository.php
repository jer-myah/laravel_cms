<?php

namespace App\Repositories;

use App\Interfaces\CrudInterface;

class CrudRepository implements CrudInterface
{
    /**
     * @
     */
    public function index($model)
    {
        return $model->all();
    }

    /**
     * @
     */
    public function show($model, $id)
    {
        return $model->where('id', $id)->first();
    }
    
    /**
     * @
     * 
     */
    public function store($model, $data)
    {
        return $model->create($data);
    }

    /**
     * @
     */
    public function update($model, $id, $data)
    {
        if ($this->existsInDb($model, $id)) {
            return $model->where('id', $id)->update($data);
        } else {
            return 'Could not find given resource ID';
        }
    }

    /**
     * @param Resource ID $id
     * @param Resource model $model
     */
    public function destroy($model, $id)
    {
        if ($this->existsInDb($model, $id)) {
            $model->where('id', $id)->delete();
            return 'Delete operation successful!';
        }
        return 'Could not find given resource ID';
    }

    public function existsInDb($model, $id)
    {
        if ($model->where('id', $id)->exists()) {
            return true;
        } else {
            return false;
        }
    }
}
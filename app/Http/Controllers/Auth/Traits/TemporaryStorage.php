<?php

namespace App\Http\Controllers\Auth\Traits;

trait TemporaryStorage
{
    /**
     * Store data temporarily in the database
     * 
     * @param  array  $data
     * 
     * @return \App\Models\TemporaryStorage
     */
    public function storeTemp(array $data)
    {
        return $this->tempStorage($data);
    }

    /**
     * Create a new temporary storage data instance.
     *
     * @param  array  $data
     * 
     * @return \App\Models\TemporaryStorage
     */
    protected function tempStorage(array $data)
    {
        return \App\Models\TemporaryStorage::create([
            'data' => $data,
        ]);
    }
}

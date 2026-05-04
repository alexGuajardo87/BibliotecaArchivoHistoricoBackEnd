<?php

namespace App\Observers;

class UserABCObserver
{
    public function creating($model)
    {
        if (auth()->check()) {
            $model->created_by = auth()->id();
        }
    }

    public function updating($model)
    {
        if (auth()->check()) {
            $model->updated_by = auth()->id();
        }
    }

    public function deleting($model)
    {
        if (auth()->check()) {
            $model->deleted_by = auth()->id();

            // Evita disparar eventos otra vez
            $model->saveQuietly();
        }
    }
}
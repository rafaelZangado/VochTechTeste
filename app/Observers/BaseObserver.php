<?php
namespace App\Observers;

use App\Models\Audit;
use Illuminate\Support\Facades\Auth;

class BaseObserver
{
    public function created($model)
    {
        Audit::create([
            'model_type' => get_class($model),
            'model_id' => $model->id,
            'user_id' => Auth::id(),
            'action' => 'created',
            'new_data' => $model->toArray(),
        ]);
    }

    public function updated($model)
    {
        Audit::create([
            'model_type' => get_class($model),
            'model_id' => $model->id,
            'user_id' => Auth::id(),
            'action' => 'updated',
            'old_data' => $model->getOriginal(),
            'new_data' => $model->getChanges(), 
        ]);
    }

    public function deleted($model)
    {
        Audit::create([
            'model_type' => get_class($model),
            'model_id' => $model->id,
            'user_id' => Auth::id(),
            'action' => 'deleted',
            'old_data' => $model->toArray(),
        ]);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Antoan Popov <antoanpopoff@gmail.com>
 * Date: 7.10.2017 г.
 * Time: 18:13
 */

namespace Modules\Health\Listeners;

class Creating
{
    /**
     * When the model is being created.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function handle($model)
    {
        if (!$model->isUserstamping()) {
            return;
        }
        if (is_null($model->created_by)) {
            $model->created_by = auth()->id();
        }
        $model->setUpdatedAt(null);
    }
}
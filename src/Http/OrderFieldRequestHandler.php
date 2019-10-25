<?php

namespace Signifly\Nova\Fields\Order\Http;

use Illuminate\Routing\Controller;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\EloquentSortable\Sortable;

class OrderFieldRequestHandler extends Controller
{
    /**
     * @param  NovaRequest $request
     */
    public function __invoke(NovaRequest $request)
    {
        $resourceId = $request->get('resourceId');
        $model = $request->findModelOrFail($resourceId);

        if (!$model instanceof Sortable) {
            abort(500, "Model should implement " . Sortable::class . " interface");
        }

        $direction = $request->get('direction');

        switch ($direction) {
            case 'up':
                $model->moveOrderUp();
                // no break
            case 'top':
                $model->moveToStart();
                // no break
            case 'bottom':
                $model->moveToEnd();
                // no break
            case 'down':
                $model->moveOrderDown();
        }
    }
}

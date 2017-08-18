<?php

namespace App\Http\Controllers\Api;

use App\Models\Purchase;
use App\Transformers\PurchaseTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class PurchasesController extends ApiController
{
    /**
     * Returns all instances of the model
     *
     * @return json
     */
    public function index()
    {
        $paginator = Purchase::orderBy('id', 'desc')->paginate(25);
        $purchases = $paginator->getCollection();

        return response()
            ->json(fractal()
            ->collection($purchases, new PurchaseTransformer())
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->toArray());
    }

    /**
     * Returns an instance of the model
     *
     * @param int $id
     * @return json
     */
    public function show($id)
    {
        $purchase = Purchase::findOrFail($id);

        $this->authorize('view', $purchase);

        return response()
            ->json(fractal()
            ->item($purchase, new PurchaseTransformer())
            ->parseIncludes(['items'])
            ->toArray());
    }
}

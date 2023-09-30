<?php

namespace App\Http\Controllers;

use App\Actions\GetElementsAction;
use App\Http\Requests\ElementIndexRequest;
use Illuminate\Http\JsonResponse;

class ElementController extends Controller
{
    public function index(ElementIndexRequest $request): JsonResponse
    {
        $elements = app(GetElementsAction::class)->run($request);

        return response()->json($elements);
    }
}

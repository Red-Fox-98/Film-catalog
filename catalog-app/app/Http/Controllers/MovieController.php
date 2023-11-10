<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movie\IndexRequest;
use App\Services\MovieService;
use App\Transformers\MovieTransformer;
use Illuminate\Http\JsonResponse;

class MovieController extends Controller
{
    public function __construct(private readonly MovieService $movieService)
    {
    }

    public function index(IndexRequest $request): JsonResponse
    {
        $movies = $this->movieService->index($request->getData());

        return responder()->success($movies, new MovieTransformer())->respond();
    }
}

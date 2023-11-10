<?php

namespace App\Http\Controllers;

use App\Http\Requests\Review\CreateRequest;
use App\Models\Review;
use App\Services\ReviewService;
use App\Transformers\ReviewTransformer;

class ReviewController extends Controller
{
    public function __construct(private readonly ReviewService $reviewService)
    {
    }

    public function create(int $id, CreateRequest $request)
    {
        $review = $this->reviewService->create($id, $request->getData());

        return responder()->success($review, new ReviewTransformer())->respond();
    }
}

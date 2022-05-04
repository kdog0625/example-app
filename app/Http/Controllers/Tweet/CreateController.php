<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\RedirectResponse;


class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function __invoke(CreateRequest $request, TweetService $tweetService): RedirectResponse
    {
        $tweetService->saveTweet(
            $request->userId(),
            $request->tweet(),
            $request->images()
        );
        return redirect()->route('tweet.index');
    }
}

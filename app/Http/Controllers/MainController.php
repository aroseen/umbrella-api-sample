<?php

namespace App\Http\Controllers;

use App\Components\UrlShortener;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class MainController.
 *
 * @package App\Http\Controllers
 */
class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(Authenticate::class);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getShort(Request $request): JsonResponse
    {
        if ($request->has('url') && $request->input('url') !== null) {
            return new JsonResponse([
                'status' => self::STATUS_SUCCESS,
                'short'  => UrlShortener::generateShortUrl($request->input('url')),
            ], 200);
        }

        return new JsonResponse([
            'status' => self::STATUS_ERROR,
        ], 422);
    }
}

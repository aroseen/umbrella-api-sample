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
        if (($url = $request->input('url')) && ($prefix = $request->input('prefix'))) {
            return new JsonResponse([
                'status' => self::STATUS_SUCCESS,
                'short'  => $prefix.UrlShortener::generateShortUrl($url),
            ], 200);
        }

        return new JsonResponse([
            'status' => self::STATUS_ERROR,
        ], 422);
    }
}

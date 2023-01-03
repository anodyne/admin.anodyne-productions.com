<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class RegisterGameController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $url = str($request->url);

            if ($url->contains(['localhost', '127.0.0.1', '.test'])) {
                return false;
            }

            return $next($request);
        });
    }

    public function __invoke(Request $request)
    {
        Game::updateOrCreate(
            ['url' => $request->url],
            [
                'name' => $request->name,
                'genre' => $request->genre,
                'version' => $request->version,
                'php_version' => $request->php_version,
                'db_driver' => $request->db_driver,
                'db_version' => $request->db_version,
                'server_software' => $request->server_software,
            ]
        );

        return response()->json();
    }
}

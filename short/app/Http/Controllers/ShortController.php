<?php

namespace App\Http\Controllers;

use App\Models\Shortly;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Http\Requests\ShortlyRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redis;

class ShortController extends Controller
{
    CONST EXPIRE_TIME = 5;

    private $redis;




    public function __construct()
    {
        $this->redis = Redis::connection();
    }





        
    /**
     * index
     *
     * @return View
     */
    public function index(): View{

        $links = [];

        if(auth()->check()){
            $links = auth()->user()->links->toArray();
        }

        return view('home', compact('links'));
    }





        
    /**
     * addLink
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function addLink(ShortlyRequest $request): RedirectResponse{

        $forward_url = $request->input('url');

        $code = $this->generateUniqueLink();

        if(! auth()->check()){

            $this->putRedis($code, $forward_url);

            return redirect()->back()->with('links', [compact('code', 'forward_url')]);
        }

        $this->putForUser($code, $forward_url);

        return redirect()->back();
    }





        
        
    /**
     * generateUniqueLink
     *
     * @param  mixed $url
     * @return string
     */
    private function generateUniqueLink(): string{
        $shortCode = Str::random(6);

        $shortCode = preg_replace("/[^A-Za-z0-9]/", '', $shortCode);


        return $shortCode;
    }


    
    


    /**
     * putForUser
     *
     * @param  mixed $code
     * @param  mixed $url
     * @return bool
     */
    private function putForUser($code, $forward_url): bool{

        Shortly::create([
            'user_id' => auth()->user()->id,
            'code' => $code,
            'forward_url' => $forward_url,
        ]);


        return true;
    }
    


    
    
    
    /**
     * putRedis
     *
     * @param  mixed $url
     * @param  mixed $code
     * @return void
     */
    private function putRedis(string $code, string $forward_url): void{

        if(! $this->redis->exists($code)){

            $this->redis->set($code, $forward_url);

            $this->redis->expire($code, self::EXPIRE_TIME);
        }
    }
}

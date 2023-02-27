<?php

namespace App\Http\Controllers;

use App\Models\Shortly;
use Illuminate\Support\Facades\Redis;

class ShortlyController extends Controller
{
    private $redis;

    public function __construct()
    {
        $this->redis = Redis::connection();    
    }
    
    
    
    
    
        
    /**
     * index
     *
     * @param  mixed $code
     * @return void
     */
    public function index($code){

        $forwardUrl = null;

        if($this->redis->exists($code)){
            $forwardUrl = $this->redis->get($code);
        }else{
            $forwardUrl = Shortly::where('code', $code)->first()?->forward_url;
        }

        abort_if(! $forwardUrl, 404);

        return redirect($forwardUrl);
    }
}

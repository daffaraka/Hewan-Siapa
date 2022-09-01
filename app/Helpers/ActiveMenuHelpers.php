<?php

if(!function_exists('set_active_views')){

    function set_active_views($uri,$output = 'active')
    {
        if (is_array($uri)) {
            foreach($uri as $u) {
                if(Route::is($u)){
                    return $output;
                }
            }
        } else {
           if(Route::is($uri)){
               return $output;
           }
        }
        
    }
}

if(!function_exists('set_show_collapse')){

    function set_show_collapse($uri,$output = 'show'){
        $activeView = set_active_views($uri);
        if (is_array($activeView)) {
            foreach($activeView as $u) {
                if(Route::is($u)){
                    return $output;
                }
            }
        } else {
           if(Route::is($activeView)){
               return $output;
           }
        }
    }
}



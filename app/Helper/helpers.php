<?php

/** 
 * All of the helper functions will go here. 
**/

/** Set Sidebar Item Active. **/
if (!function_exists('setActive')) 
{
    function setActive(array $routes) 
    {
        if (is_array($routes)) 
        {
            foreach ($routes as $route) 
            {
                if (request()->routeIs($route)) {
                    return 'active';
                }
            }
        }
    }
}//End Method

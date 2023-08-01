<?php

if (! function_exists('backend_asset')) {
    function backend_asset($path)
    {
       return env('BACKEND_APP_URL').$path;
    }
}


if (! function_exists('region_check')) {
    function region_check($id)
    {
       $RegionData =  \App\Region::where('id',$id)->select('name')->first();
       return isset($RegionData->name) ? $RegionData->name : '';
    }
}
?>
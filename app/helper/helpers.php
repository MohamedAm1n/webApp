<?php

/**
 * @param string $routeName
 * @return string
 */


function is_active(string $routeName)
{

    return null !== request()->segment(2) && request()->segment(2) == $routeName ? "active" : '';
}
function getYoutubeId($url)
{
    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $url, $match)) {
        return isset($match[1]) ? $match[1] : null;
    }
}

function uploadImage($request)
{
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('upload'), $file_name);
        return $file_name;
    }
}

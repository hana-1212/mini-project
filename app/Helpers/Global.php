<?php
if (!function_exists('validate'))
{
    function validate($validator)
    {
        if($validator->fails())
        {
            $message = $validator->errors()->all();
            $message = implode(', ',$message);
            redirectBackWithInput($message);
        }
    }
}

if (!function_exists('redirectBackWithInput'))
{
    function redirectBackWithInput($message)
    {
        $res = redirect()->back()
        ->with([
            'message' =>  $message,
            'message_type' => 'warning',
        ])
        ->withInput();

        \Session::driver()->save();
        $res->send();
        exit;
    }
}

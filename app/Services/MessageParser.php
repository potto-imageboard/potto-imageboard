<?php namespace Potto\Services;

use Validator;

// more docu at:
// https://gist.github.com/lucadegasperi/11078350
// https://laracasts.com/lessons/controller-cleanup

class MessageParser
{
    public function parse($input)
    {
    }

    /**
    * Internal function used to make urls to clickable links
    *
    */
    private function makeClickable($message)
    {
        // TODO: Replace with internal derefer link
        $message = preg_replace('#(http://|https://|ftp://)([^(\s<|\[)]*)#', '<a href="\\1\\2" rel="nofollow" target="_blank">\\1\\2</a>', $message);

        return $message;
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}

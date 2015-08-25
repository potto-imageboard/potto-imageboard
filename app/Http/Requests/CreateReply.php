<?php namespace Potto\Http\Requests;

use Potto\Http\Requests\Request;

class CreateReply extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'max:72',
            'board' => 'required|integer',
            'thread' => 'required|integer',
            'password' => 'max:72',
            'file' => 'mimes:jpeg,bmp,png,gif,webm,mp4,ogg|max:5120',
            'file-url' => 'url',
            'message' => 'string|required|max:8192',
        ];
    }
}

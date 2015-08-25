<?php namespace Potto\Http\Controllers;

use Potto\Http\Controllers\Controller;
use Potto\Http\Requests\CreateReply;
use Illuminate\Http\Request;
use Potto\Post;
use Potto\Board;
use Potto\Upload;
use Image;

class ReplyController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function storeReply(CreateReply $request)
    {
        $board = Board::whereId($request->board)->firstOrFail();
        $post_get = $board->current_post_get + 1;
        

        if ($request->file('file')) {
            $newFileName = time() . mt_rand(1, 99);
            # TODO: Check against memory usage of Image Intervention for getClientOriginalExtension() and alike
            $newFileName = $newFileName . ".". strtolower($request->file('file')->getClientOriginalExtension());

            $file = Image::make($request->file('file'));

            // gifs are transformed to static images
            // see https://github.com/Intervention/image/issues/176
            if ($request->file('file')->getClientOriginalExtension() == 'gif') {
                copy($request->file('file'), 'src/' . $board->name . "/". $newFileName);
            } else {
                $file->orientate()->save('src/' . $board->name . "/". $newFileName);
            }
            
            

            $image_w = $file->width();
            $image_h = $file->height();
            $thumb = $file->resize(150, 150,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            )->save('thumb/' . $board->name . "/". $newFileName, 75);


            $upload = new Upload();

            $upload->is_nsfw = false;
            $upload->file_name = $newFileName;
            $upload->file_thumb = $newFileName;
            $upload->file_sha1 = sha1($file);
            $upload->file_type = strtoupper($request->file('file')->getClientOriginalExtension());
            $upload->file_original = $request->file('file')->getClientOriginalName();
            $upload->file_size = $request->file('file')->getSize();

            $upload->image_w = $image_w;
            $upload->image_h = $image_h;


            $upload->thumb_w = $thumb->width();
            $upload->thumb_h = $thumb->height();
            $upload->save();
        }

        // if anon fills the name input get it, otherwise get board's default name
        $post_name = ($request->name != null ? $request->name : $board->default_name);


        $post = new Post();

        $post->id          = null;
        $post->thread_id   = $request->thread;
        $post->upload_id   = (isset($upload->id) ? $upload->id : 0);
        $post->post_get    = $post_get;
        $post->is_spoiler  = false;
        $post->name        = htmlspecialchars($post_name, ENT_QUOTES);
        $post->tripcode    = '#Antena9';
        $post->content     = htmlspecialchars($request->message, ENT_QUOTES);

        $post->ip =          0;
        $post->save();

        $board->increment('current_post_get');
        $board->save();


        // return ;
        return redirect()->back();
    }

    // public function
}

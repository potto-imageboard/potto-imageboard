<?php namespace Potto\Http\Controllers;

use Potto\Thread;
use Potto\Board;
use Potto\Post;
use Cache;
use Request;

class BoardController extends Controller {

	public function index($name)
	{

		$board = Board::whereName($name)->firstOrFail();

		$threads = Thread::whereBoardId($board->id)
							// ->with('posts')
							->orderBy('updated_at', 'desc')
							->paginate(10);
		
		return view('board.index')->with(array(
			'threads' => $threads,
			'board' => $board
			)
		);
	}


	public function thread($name, $id)
	{

		$board = Board::whereName($name)->firstOrFail();

		$thread = Thread::whereBoardIdAndPostGet($board->id, $id)->with('posts')->first();

		return view('board.thread')->with(array(
			'thread' => $thread,
			'board' => $board
			)
		);
	}

}

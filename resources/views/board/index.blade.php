<!DOCTYPE html>
<html lang="@yield('potto_lang', 'en')">
  <head>
    <title>Board</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="/4chan.css" rel="stylesheet">
    <link href="/4chan-mobile.css" rel="stylesheet">
    <style type="text/css">
      div.post-form.boardBanner {
        text-align: left;
      }
    </style>
  </head>

  <body>
    <div class="container-fluid">

      <div class="boardBanner">
        <h2 class="boardTitle">/{{ $board->name }}/ - {{ $board->description }}</h2>
        {!! $board->header_content !!}
      </div>

      <hr />

      @include('partials.post-form')

      <hr />

      <div id="threads" class="board">

        @foreach ($threads as $thread)
        <div class="thread" id="t{{ $thread->post_get }}">
          <div class="postContainer opContainer" id="pc{{$thread->id}}">
            <div id="p{{ $thread->post_get }}" class="post op"><span id="sa{{ $thread->post_get }}"><img alt="H" class="extButton threadHideButton" data-cmd="hide" data-id="{{ $thread->post_get }}" src="//s.4cdn.org/image/buttons/burichan/post_expand_minus.png" title="Hide thread"></span>
              <div class="postInfoM mobile" id="pim{{ $thread->post_get }}"><span class="nameBlock"><span class="name">{{ $thread->name }}</span>
                <br><span class="subject">{{ $thread->subject }}</span> </span><span class="dateTime postNum" data-utc="1427302385">{{ $thread->created_at }} <a href="board/{{ $board->name }}/thread/{{ $thread->post_get }}#p{{ $thread->post_get }}" title="Link to this post">No.</a><a href="board/{{ $board->name }}/thread/{{ $thread->post_get }}#q{{ $thread->post_get }}" title="Reply to this post">{{ $thread->post_get }}</a></span>
              </div>
              @if ($thread->upload)
               <div class="file" id="f{{ $thread->post_get }}">
                  <div class="fileText" id="fT{{ $thread->post_get }}">File: <a href="{{ '/src/' . $board->name . '/'. $thread->upload->file_name }}" target="_blank">{{ $thread->upload->file_original }}</a> (626 KB, {{ $thread->upload->image_w }}x{{ $thread->upload->image_h }})</div>
                  <a class="fileThumb" href="{{ '/src/' . $board->name . '/'. $thread->upload->file_name }}" target="_blank"><img src="{{ '/thumb/' . $board->name . '/'. $thread->upload->file_thumb }}" alt="626 KB" style="height: {{$thread->upload->thumb_h}}px; width: {{$thread->upload->thumb_w}}px;">
                    <div  class="mFileInfo mobile">626 KB PNG</div>
                  </a>
                </div>
              @endif

              <div class="postInfo desktop" id="pi{{ $thread->post_get }}">
                <input type="checkbox" name="{{ $thread->post_get }}" value="delete"> <span class="subject">{{ $thread->subject }}</span> <span class="nameBlock"><span class="name">{{ $thread->name }}</span> </span> <span class="dateTime" data-utc="1427302385">{{ $thread->created_at }}</span> <span class="postNum desktop"><a href="thread/{{ $thread->post_get }}#p{{ $thread->post_get }}" title="Link to this post">No.</a><a href="thread/{{ $thread->post_get }}#q{{ $thread->post_get }}" title="Reply to this post">{{ $thread->post_get }}</a> &nbsp; <span>[<a href="/board/{{ $board->name }}/thread/{{ $thread->post_get }}" class="replylink">Reply</a>]</span></span><a href="#" class="postMenuBtn" title="Post menu" data-cmd="post-menu">▶</a>
              </div>
              <blockquote class="postMessage" id="m{{ $thread->post_get }}">{!! $thread->content !!}</blockquote>
            </div>
            <div class="postLink mobile"><span class="info">x Replies / y Images</span><a href="thread/{{ $thread->post_get }}" class="button">View Thread</a></div>
          </div>


          <span class="summary desktop"><img class="extButton expbtn" title="Expand thread" alt="+" data-cmd="expand" data-id="{{ $thread->post_get }}" src="//s.4cdn.org/image/buttons/burichan/post_expand_plus.png"><span class="">x replies and y images omitted. <a href="thread/{{ $thread->post_get }}" class="replylink">Click here</a> to view.</span><span style="display: none;">Showing all replies.</span></span>


          {{-- start $posts // reverse them to display them in chronological order --}}
          @foreach ($thread->lastPosts->reverse() as $post)
          <div class="postContainer replyContainer" id="pc{{ $post->post_get }}">
            <div class="sideArrows" id="sa{{ $post->post_get }}">&gt;&gt;</div>
            <div id="p{{ $post->post_get }}" class="post reply">
              <div class="postInfoM mobile" id="pim{{ $post->post_get }}"><span class="nameBlock"><span class="name">{{ $post->name }}</span>
                <br>
                </span><span class="dateTime postNum" data-utc="1427360093">03/26/15(Thu)04:54:53 <a href="thread/{{ $thread['post_get'] }}#p{{ $post->post_get }}" title="Link to this post">No.</a><a href="thread/{{ $thread['post_get'] }}#q{{ $post->post_get }}" title="Reply to this post">{{ $post->post_get }}</a></span></div>
              <div class="postInfo desktop" id="pi{{ $post->post_get }}">
                <input type="checkbox" name="{{ $post->post_get }}" value="delete"> <span class="nameBlock"><span class="name">{{ $post->name }}</span> </span> <span class="dateTime" data-utc="1427360093">{{ $post->updated_at }}</span> <span class="postNum desktop"><a href="thread/{{ $thread['post_get'] }}#p{{ $post->post_get }}" title="Link to this post">No.</a><a href="thread/{{ $thread['post_get'] }}#q{{ $post->post_get }}" title="Reply to this post">{{ $post->post_get }}</a></span><a href="#" class="postMenuBtn" title="Post menu" data-cmd="post-menu">▶</a></div>

                @if ($post->upload)
                  <div id="f48584422" class="file">
                    <div id="fT48584422" class="fileText">File: <a target="_blank" href="{{ '/src/' . $board->name . '/'. $post->upload->file_name }}">{{ $post->upload->file_original }}</a> (40 KB, {{ $post->upload->image_w .'x'. $post->upload->image_h }})</div>
                    <a target="_blank" href="{{ '/src/' . $board->name . '/'. $post->upload->file_name }}" class="fileThumb"><img alt="40 KB" src="{{ '/thumb/' . $board->name . '/'. $post->upload->file_name }}">
                        <div class="mFileInfo mobile" >40 KB PNG</div>
                    </a>
                </div>
                @endif

              <blockquote class="postMessage" id="m{{ $post->post_get }}">{!! $post->content !!}</blockquote>
            </div>
          </div>
          @endforeach
          {{-- end $posts --}}
        </div>
        <hr />
        @endforeach

      </div>{{--  #threads --}}

      {{-- pagination --}}
      <?php echo $threads->render() ?>

    </div>{{-- .container-fluid --}}

  </body>
</html>
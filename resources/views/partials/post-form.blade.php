<div class="post-form boardBanner">
	@foreach ($errors->all() as $error)
		<ul>
			<li>{{ $error }}</li>
		</ul>
	@endforeach

	@if (isset($thread))
		<h3>Reply</h3>
	@else
		<h3>Create thread</h3>
	@endif

		@if (isset($thread))
			{!! Form::open(array('files' => true, 'url' => 'dev/reply')) !!}
			{!! Form::hidden('thread', $thread->id) !!}
		@else
			{!! Form::open(array('files' => true, 'url' => 'dev/thread')) !!}
		@endif

		{!! Form::hidden('board', $board->id) !!}

		{!! Form::label('name', 'Name', array('class' => 'label')) !!}
		{!! Form::text('name') !!}<br />

		{!! Form::label('pasword', 'Password', array('class' => 'label')) !!}
		{!! Form::password('password') !!}<br />

		{!! Form::label('file', 'File', array('class' => 'label')) !!}
		{!! Form::file('file') !!}<br />

		{!! Form::label('file-url', 'File Url', array('class' => 'label')) !!}
		{!! Form::text('file-url') !!}<br />

		{!! Form::label('message', 'Message', array('class' => 'label')) !!}<br />
		{!! Form::textarea('message') !!}<br />

		<button>Send</button>
	{!! Form::close() !!}
</div>
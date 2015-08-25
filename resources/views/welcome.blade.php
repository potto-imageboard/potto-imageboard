<html>
	<head>
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #1DB755;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
				background: #39424E;
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				padding: 5px;
				line-height: 120px;
				border-radius: 5px;
			}

			.quote {
				font-size: 32px;
				line-height: 32px;
			}

			.desc {
				font-size: 16px;
				line-height: 92px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">Potto</div>
				<div class="quote">Imageboard software based on Laravel</div>
				<div class="desc">Coming soon to a imageboard site near you.<br/><span style="color:#fff">(ಠ_ಠ)</span></div>
				<audio controls="controls">
                    <source src="{{ asset('potto-imageboard.wav') }}" type="audio/wav">
                </audio>
			</div>
		</div>
	</body>
</html>

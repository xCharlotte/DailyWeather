<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Het weer vandaag in {{ $data->liveweer[0]->plaats }}</h2>
    <h5>{{ $data->liveweer[0]->verw }}</h5>
    <img src="images/{{ $data->liveweer[0]->image }}.png" class="weather-img"></img>
    <p>{{ $data->liveweer[0]->temp }}°</p>
	</body>
</html>
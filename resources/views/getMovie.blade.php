<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies</title>
</head>
<body>
    <div>
        <form action="{{ route('movie.index') }}" method="GET">

        @csrf
            <div>keyword    
                <input type="text" name="keyword">
            </div>
            <div>公開状況
                <input type="radio" name="is_showing" value="2" checked>すべて
                <input type="radio" name="is_showing" value="1">上映中
                <input type="radio" name="is_showing" value="0">上映予定&nbsp
                <input type="hidden" name="search" value="se">
                <input type="submit" value="検索">
            </div>
        </form>
    </div>

    <ul>
    @foreach ($movies as $movie)
        <li>title: {{ $movie->title }}</li>
        <img src="{{ $movie->image_url }}" alt="">
    @endforeach
    </ul>
</body>
</html>
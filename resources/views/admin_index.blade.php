<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MovieAdmin</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>画像</th>
                <th>公開年</th>
                <th>上映状況</th>
                <th>概要</th>
                <th>登録日時</th>
                <th>更新日時</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php  
            $o = "";
            foreach($movies as $movie){
                $o .= "<tr>";
                $o .= "<td>".$movie->id."</td>";
                $o .= "<td>".$movie->title."</td>";
                $o .= "<td><img src='".$movie->image_url."' alt=''></td>";
                $o .= "<td>".$movie->published_year."</td>";
                if ($movie->is_showing){
                    $o .= "<td>上映中</td>";
                } else {
                    $o .= "<td>上映予定</td>";
                }
                $o .= "<td>".$movie->description."</td>";
                $o .= "<td>".$movie->created_at."</td>";
                $o .= "<td>".$movie->updated_at."</td>";
                $o .= "<td><button type='button' onclick='location.href=\"" . route('movie.movieEdit', ['id' => $movie->id]) . "\"'>編集</button></td>"; 
                $o .= "</tr>";         
            }
            echo $o;
            ?>
        </tbody>
    </table>
</body>
</html>
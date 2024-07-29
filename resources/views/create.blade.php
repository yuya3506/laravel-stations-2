<?php 

$o  = "";
$o .= "<div>";
foreach ($errors->all() as $error){
    $o .= "<li>".$error."</li>";
}
$o .= "<h1>新規データを登録</h1>";
$o .= "<form action='/admin/movies/store' method='POST'>";
$o .= "    <div>タイトル<br><input type='text' name='title'></div>";
$o .= "    <div>画像URL<br><input type='url' name='image_url'></div>";
$o .= "    <div>公開年<br><input type='datetime-local' name='published_year'></div>";
$o .= "    <div>概要<br><input type='text' name='description'></div>";
$o .= "    <div>公開中<br><input type='checkbox' name='is_showing'></div>";
$o .= "    <div><input type='submit' value='登録'></div>";
$o .= "</form>";
$o .= "</div>";

echo $o;
?>
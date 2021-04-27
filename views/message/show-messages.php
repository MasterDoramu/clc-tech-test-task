
<p>Вы добавили новую запись в бд:</p>

<?
foreach ($messages as $message){
    foreach ($message as $key=>$item){
     echo "$key: $item <br>";
    }
    echo '<hr>';
}
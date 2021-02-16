<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <style href="list_style.css"></style>
    <title>timetable</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="mt-3"><h1 class="text-center" id="h1">時間割</h1></div>
    </div>
    <div class="row">
        <div class="mt-5">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">月</th>
                <th scope="col">火</th>
                <th scope="col">水</th>
                <th scope="col">木</th>
                <th scope="col">金</th>
                <th scope="col">土</th>
                <th scope="col">日</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                for($i=1; $i<10; $i++){
                    echo '<tr><th scope="row">' , $i , '</th>';
                    for($j=0; $j<7; $j++){
                        echo '<td><a href="/class_room"></td>';
                    }
                    echo '</tr>';
                }
            ?>
        </tbody>
        </table>
        </div>
    </div>
    <div class="row">
        <div class="mt-5 text-right">
            <a class="btn btn-dark" href="/class_room" role="button">時間割の追加</a>
        </div>
    </div>
</div>

</body>
</html>
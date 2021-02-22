<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">    <title>timetable</title>
    <style>
        a.cell{
            display:block;
            padding: 1.2em 1.2em; 
            background-color: #eeffff; 
        }
    </style>
</head>
<body>
@foreach($lessons as $day_lessons)
    @foreach($day_lessons as $day_lesson)
    {{$day_lesson->name}}
    {{$day_lesson->time_id}}
    @endforeach
@endforeach

<div class="container">
    <div class="row">
        <div class="mt-3"><h1 class="text-center" id="h1">時間割</h1></div>
    </div>
    <div class="row">
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
                        echo '<td><a class="cell" data-toggle="modal" data-target="#exampleModal"></a></td>';
                    }
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <form action="/" method="post">
            @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">授業を追加する</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">授業名</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">曜日</label><br>
                <select class="form-select" name="day">
                    <option selected>曜日を選んでください</option>
                    <option value="0">月</option>
                    <option value="1">火</option>
                    <option value="2">水</option>
                    <option value="3">木</option>
                    <option value="4">金</option>
                    <option value="5">土</option>
                    <option value="6">日</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">時限</label><br>
                <select class="form-select" name="time">
                    <option selected>時限を選んでください</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">戻る</button>
            <button type="submit" class="btn btn-primary">決定</button>
        </div>
        </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">    <title>timetable</title>
    <style>
        td{
            position:relative;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="mt-3 mr-auto ml-auto mb-3"><h1 id="h1">時間割</h1></div>
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
                        if(isset($lessons[$j][$i])){
                            echo '<td class="cell" data-toggle="modal" data-target="#informationModal" data-day="' . $j . '" data-time="' . $i . '">' . $lessons[$j][$i]->name . '</td>';
                        }else {
                            echo '<td class="cell" data-toggle="modal" data-target="#formModal" data-day="' . $j . '" data-time="' . $i . '"></td>';
                        }
                    }
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- formModal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <form action="/" method="post">
            @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="formModalLabel">授業を追加</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">曜日</label><br>
                <select class="form-select" id="day" name="day">
                    <option value="0">月</option>
                    <option value="1">火</option>
                    <option value="2">水</option>
                    <option value="3">木</option>
                    <option value="4">金</option>
                    <option value="5">土</option>
                    <option value="6">日</option>
                </select>
                曜日
            </div>
            <div class="mb-3">
                <label class="form-label">時限</label><br>
                <select class="form-select" id="time" name="time">
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
                限
            </div>
            <div class="mb-3">
                <label class="form-label">授業名</label>
                <input type="text" class="form-control" name="name">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">決定</button>
        </div>
        </form>
        </div>
    </div>
</div>

<!-- informationModal -->
<div class="modal fade" id="informationModal" tabindex="-1" role="dialog" aria-labelledby="informationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="informationModalLabel">課題一覧</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
      </div>
      <div class="modal-footer">
        <div><a href="" class="btn btn-primary" data-toggle="modal" data-target="#taskModal">課題追加</a></div>
        <div><a href="" class="btn btn-danger" id="delete">削除</a></div>
      </div>
    </div>
  </div>
</div>

<!-- tasknModal -->
<div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="tasknModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="informationModalLabel">課題追加</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <div><a href="" class="btn btn-danger" id="delete">削除</a></div>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script type="text/javascript">
    $('#formModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);  
    var day_raw = button.data('day');
    if(day_raw + 1 >6){
        var day = 0;
    }else {
        var day = day_raw + 1;
    }
    var dayOfWeekStr = [ "日", "月", "火", "水", "木", "金", "土" ][day];
    var time = button.data('time');

    document.getElementById('day').options[day_raw].selected = true;
    document.getElementById('time').options[time - 1].selected = true;
    })

    $('#informationModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var day_raw = button.data('day');
    var time = button.data('time');
    console.log(day_raw);

    document.getElementById('delete').href = '/delete/' + day_raw + '/' + time;
    })

</script>

</body>
</html>

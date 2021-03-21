@extends('layouts.app')

@section('css')
    <style type="text/css">
        .mycontent{
            background-color: white;
        }
    </style>
@endsection

@section('content')
<div class="container mycontent">
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
                            echo '<td class="cell" data-toggle="modal" data-target="#detailModal" data-day="' . $j . '" data-time="' . $i . '" data-lesson="' . $lessons[$j][$i]->id . '" data-name="' . $lessons[$j][$i]->name . '">' . $lessons[$j][$i]->name . '</td>';
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
@endsection


@section('javascript')
<!-- formModal -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <form action="/addLesson" method="post">
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

<!-- detailModal -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/deleteTask" method="post">
        @csrf
        <ul class="list-group" id="list-group">
        </ul>
        </form>
      </div>
      <div class="modal-footer" id="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- taskModal -->
<div class="modal fade" id="taskModal" data-keyboard="false" data-backdrop="static"　tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="taskModalLabel"></h5>
        <button type="button" class="close" onclick="location.href='/toppage'">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 
      <form action="/addTask" method="post">
        @csrf
        <div class="modal-body">
                <input type="hidden" value="" name="task_lesson_id" id="task_lesson_id">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">課題内容</label>
                    <textarea class="form-control" id="task" name="task" rows="1"></textarea>
                </div>
                <div class="form-group">
                    <label class="mb-2">提出期限</label><br>
                    <input type="date" id="deadline" name="deadline">
                </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">追加</button>
        </div>

      <form　action="" method="post">
      <div class="modal-body">
            <input type="hidden" value="" name="" id="input_lesson_id">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">課題内容</label>
                <textarea class="form-control" id="task" name="task" rows="1"></textarea>
            </div>
            <div class="form-group">
                <label class="mb-2">提出期限</label><br>
                <input type="date" id="deadline" name="deadline">
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">追加</button>
      </div>

      </form>
    </div>
  </div>
</div>
@endsection
 


@section('javascript')
 
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

    $('#detailModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var day_raw = button.data('day');
    var time = button.data('time');
    var lesson_id = button.data('lesson');
    var name = button.data('name');
    var tasks = {
    <?php
    foreach($tasks as $key=>$task){
        echo $key . ':[' ;
        foreach($task as $element){
          echo  '["' . $element[0] . '","' . $element[1] . '","' . $element[2] . '"],';
        }
        echo '],';
    }
    ?>
    }
    var task_html = "";
    if(typeof tasks[lesson_id] === 'undefined'){
    }else{
        tasks[lesson_id].forEach((data)=>{
            task_html = task_html + '<li class="list-group-item"><div class="row"><div class="col-6">' + data[0] + '</div><div class="col-4">' + data[1] + '</div><button type="submit" class="col-2" name="task_id" id="task_id" value="' + data[2] + '">完了</button></div></li>';
        })
    }
    var detail_modal_footer = '<div><a href="/chat_room/' + lesson_id + '" class="btn btn-success">チャット</a></div><div><a href="" class="btn btn-primary" data-toggle="modal" data-target="#taskModal">課題追加</a></div><div><a href="' + '/delete/' + lesson_id + '/' + day_raw + '/' + time + '" class="btn btn-danger" id="delete">授業を削除</a></div>'
    document.getElementById('list-group').innerHTML = task_html;
    document.getElementById('task_lesson_id').value = lesson_id;
    document.getElementById('detailModalLabel').innerHTML = name;
    document.getElementById('taskModalLabel').innerHTML = name + 'の課題を追加する';
    document.getElementById('modal-footer').innerHTML = detail_modal_footer;
    })

    $('#taskModal').on('show.bs.modal', function (event) {
        $('#detailModal').modal('hide');
    })
    $('#taskModal').on('hide.bs.modal', function (event) {
        $('#detailModal').modal('show');
    })
</script>
@endsection

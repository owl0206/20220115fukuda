<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <link rel="stylesheet" href="reset.css" />
  <style>
    body {
      margin: 0;
    }

    .background {
      background-color: #1c315d;
      height: 100vh;
      width: 100vw;
      position: relative;
    }

    .contents {
      background-color: white;
      width: 50vw;
      position: absolute;
      padding: 20px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border-radius: 10px;
    }

    h1 {
      margin-left: 30px;
      font-size: 30px;
      font-weight: bold;
    }

    .createbox {
      width: 70%;
      height: 35px;
      border-radius: 5px;
      border: 1px solid gray;
      font-size: 15px;
    }

    .create-button {
      height: 40px;
      font-size: 15px;
      padding: 8px 12px;
      border: 2px solid #ff2599;
      color: #ff2599;
      background-color: white;
      font-weight: bold;
      border-radius: 5px;
      padding-left: 15px;
      cursor: pointer;
      transition: 0.4s;
      margin-left: 20px;
    }

    .create-button:hover {
      background-color: #ff2599;
      color: white;
    }

    .todolist {
      width: 50vw;
      vertical-align: baseline;
      margin: 10px 35px;
    }

    tr {
      height: 50px;
    }

    .content {
      height: 22px;
      margin-left: 10px;
    }

    .update-button {
      height: 30px;
      font-size: 13px;
      font-weight: bold;
      padding: 3px 8px;
      border: 2px solid orange;
      color: orange;
      background-color: white;
      border-radius: 5px;
      margin-left: 10px;
      cursor: pointer;
    }

    .update-button:hover {
      background-color: orange;
      color: white;
    }

    .delete-button {
      height: 30px;
      font-size: 13px;
      font-weight: bold;
      padding: 3px 8px;
      border: 2px solid skyblue;
      color: skyblue;
      background-color: white;
      border-radius: 5px;
      margin-left: 10px;
    }

    .delete-button:hover {
      background-color: skyblue;
      color: white;
    }
  </style>
</head>


<body>
  <div class="background">
    <div class="contents">
      <h1>ToDo List</h1>
      <div class="todolist">
        <form action="/todo/create" method="post">
          @csrf
          @if ($errors)
            @foreach ($errors->all() as $error)
              <p>{{$error}}</p>
            @endforeach
          @endif
          <input type="text" name="content" class="createbox">
          <input type="submit" value="追加" class="create-button">
        </form>
        <table>
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
          @foreach ($items as $item)
          <tr>
            <td>
              {{$item->created_at}}
            </td>
            <td>
              <form action="/todo/update/{{$item->id}}" method="post">
                @csrf
                <input type="text" placeholder="{{$item->content}}" name="content" class="content">
            </td>
            <td>
              <input type="submit" value="更新" value="{{$item->content}}" class="update-button">
              </form>
            </td>
            <td>
              <form action="/todo/delete/{{$item->id}}" method="post">
                @csrf
                <input type="submit" value="削除" class="delete-button">
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
</body>

</html>
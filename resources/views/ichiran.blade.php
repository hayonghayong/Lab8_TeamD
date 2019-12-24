@extends('layouts.app')
@section('content')
</head>
<body>
@include('menu')
<!--Main layout-->
<main>
@if (count($users) > 0)
  <div class="card-body">
    <table class="table table-striped task-table">
      <!-- テーブルヘッダ -->
      <thead>
        <th>会員一覧</th>
        <th>&nbsp;</th>
      </thead>
      <!-- テーブル本体 -->
      <tbody>
      @foreach ($users as $users)
        <tr>
          <td class="table-text">
            <div> {{$users->name }} </div> 
          </td>
          @if(Auth::user()->kanri ==1)
          <!-- 本: 削除ボタン -->
          <td>
          @if(Auth::user()->id == $users->id)
            <button class="btn btn-danger disabled"> ログイン</button>
          @else
            <form action="{{ url('users/'.$users->id) }}" method="POST"> {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-danger"> 削除</button>
            </form>
          @endif
          </td>
          @endif
        </tr>
      @endforeach
      </tbody> 
    </table>
  </div>
@endif
</main>
</body>
@endsection
<!DOCTYPE html>
<html>
    <head>
        <title>つぶやき</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <div class="col-sm-4">
<div class="card mb-5">
    <div class="card-header">詳細検索</div>
    <div class="card-body">
        <p class="card-text">
        <div class="form-group row">
            <div class="col-md-4">IDを入力:</div>
            <div class="col-md-4">
                <input class="form-control" id="id_number">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <button class="bg-gray-400 hover:bg-gray-300 text-white rounded px-4 py-2">詳細ボタン</button>
            </div>
        </div>
        </div>
        <!-- 取得したレコードを表示 -->
        <div class="col-md-12" id="result"></div>
        </p>
    </div>
</div>

    <table border = "1">
        @foreach ($twitter as $twitter)                
         <tr><td>{{ $twitter->text }}</td></tr>         
        @endforeach
    </table>
</html>
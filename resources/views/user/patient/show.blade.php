@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
            @endif

                <div class="card-header">{{ $patient->patient_name}}さんの詳細ページ</div>
                <h5 class="card-title"></h5>
                    <form  method="GET" action="{{ route('user.patient.store')}}">
                        @csrf
                        名前：{{ $patient->patient_name}}<br>
                        メールアドレス：{{ $patient->email}}<br>
                        年齢：{{ $patient->age}}<br>
                        性別：{{ $gender}}<br>
                        作成日：{{ $patient->created_at}}<br>
                    </form>

                        <form method="GET" action=" {{route('user.patient.edit',['id' => $patient->id ])}}">
                            <input class="btn btn-info" type="submit" value="変更する">
                        </form>
                        <form method="POST" action="{{ route('user.patient.destroy',['id' => $patient->id ])}}" id="delete_{{ $patient->id }}">
                            @csrf
                            <a href="#" class="btn btn-danger" data-id="{{ $patient->id }}" onclick="deletePost(this);">削除する</a>
                        </form>
                        <form method="GET" action=" {{route('user.condition.create',['id' => $patient->id])}}">
                            <input class="btn btn-info" type="submit" value="記録する">
                        </form>
                        <a href="{{ route('user.patient.index') }}"><input class="btn btn-info" type="" value="一覧画面に戻る"></a>

              </div>
        </div>

     </div>
</div>

</div>
<script>
function deletePost(e) {
     'use strict';
     if(confirm('本当に削除していいですか？')){
         document.getElementById('delete_' + e.dataset.id).submit();
     }
}

</script>
@endsection

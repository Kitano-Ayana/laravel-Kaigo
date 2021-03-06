@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}さんの担当患者</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('user.patient.create') }}"><input class="btn btn-info" type="" value="新規登録"></a>
                        <form method="GET" action="{{ route('user.patient.index') }}" class="form-inline">
                            <input class="form-control mr-sm-2" name="search" type="search" placeholder="検索" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索する</button>
                        </form>
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">名前</th>
                        <th scope="col">年齢</th>
                        <th scope="col">詳細</th>
                        <th scope="col">記録</th>
                        <th scope="col">履歴</th>

                        </tr>
                    </thead>
                     @foreach($patients as $patient)
                    <tbody>
                        <tr>
                        <td>{{ $patient->patient_name}}</td>
                        <td>{{ $patient->age}} </td>
                        <td><a href="{{ route('user.patient.show', ['id' => $patient->id] )}}">詳細</a></td>
                        <td><a href=" {{route('user.condition.create',['id' => $patient->id])}}">記録</a></td>
                        <td><a href=" {{route('user.condition.index',['id' => $patient->id])}}">履歴</a></td>

                        </tr>
                    </tbody>
                     @endforeach 
                     </table>
                     {{ $patients->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

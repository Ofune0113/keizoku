
@extends('layouts.app')

@section('title','プロジェクト作成')

{{-- @include('nav') --}}

@section('content')
<form method="POST" action="{{ route('projects.update',['project'=> $project]) }}">
    @method("PATCH")
    @include('projects.form')
    <button type="submit" class="ui primary button">
        Save
    </button>
</form>
@endsection

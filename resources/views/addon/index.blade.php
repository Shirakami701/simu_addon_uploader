@extends('layouts.app')

@section('title')
トップ@endsection

@section('og-description')
{{ config('app.description') }}@endsection

@section('content')
<div class="container">
@include('parts.upload')
  <h2>一覧</h2>
  <ul class="content-list">
    <li class="content-title">
      <div class="row">
        <div class="col-sm-5">ファイル名</div>
        <div class="col-sm-2">投稿者</div>
        <div class="col-sm-2">Pakサイズ</div>
        <div class="col-sm-1">DL回数</div>
        <div class="col-sm-2">投稿日</div>
      </div>
    </li>
@forelse ($models as $model)
    <li class="content-item">
      <div class="row">
        <div class="col-sm-5 break">
          <a href="{{ route('addon.show', ['id' => $model->id]) }}">
            <strong>{{ $model->title }}</strong>
          </a>
        </div>
        <div class="col-sm-2">
          {{ $model->user->name }}
        </div>
        <div class="col-sm-2">
          @include('parts.paksize-list', ['items' => $model->paks])
        </div>
        <div class="col-sm-1">
          {{ $model->getCount() }}
        </div>
        <div class="col-sm-2">
          {{ $model->created_at }}
        </div>
      </div>
    </li>
@empty
    <li class="content-item">
      投稿がありません
    </li>
@endforelse
  </ul>

  {{ $models->links() }}
</div>
@endsection
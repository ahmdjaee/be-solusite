@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Create Portfolio" subtitle="Tambah karya baru.">
    @include('admin.portfolio.form', ['action' => route('admin.portfolio.store'), 'method' => 'POST', 'submit' => 'Save Portfolio'])
  </x-table-card>
@endsection

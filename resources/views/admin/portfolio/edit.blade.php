@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Edit Portfolio" subtitle="Perbarui karya.">
    @include('admin.portfolio.form', ['action' => route('admin.portfolio.update', $portfolio), 'method' => 'PUT', 'submit' => 'Update Portfolio'])
  </x-table-card>
@endsection

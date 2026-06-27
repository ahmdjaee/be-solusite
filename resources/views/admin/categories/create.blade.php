@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Create Category" subtitle="Tambah kategori produk baru.">
    @include('admin.categories.form', [
      'action' => route('admin.categories.store'),
      'method' => 'POST',
      'submit' => 'Save Category',
    ])
  </x-table-card>
@endsection

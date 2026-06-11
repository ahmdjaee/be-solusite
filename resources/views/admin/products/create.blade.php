@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Create Product" subtitle="Tambah produk digital baru.">
    @include('admin.products.form', [
      'action' => route('admin.products.store'),
      'method' => 'POST',
      'submit' => 'Save Product',
    ])
  </x-table-card>
@endsection

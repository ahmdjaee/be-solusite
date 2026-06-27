@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Edit Category" subtitle="Perbarui kategori produk.">
    @include('admin.categories.form', [
      'action' => route('admin.categories.update', $category),
      'method' => 'PUT',
      'submit' => 'Update Category',
    ])
  </x-table-card>
@endsection

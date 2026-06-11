@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Edit Product" subtitle="Perbarui produk digital.">
    @include('admin.products.form', [
      'action' => route('admin.products.update', $product),
      'method' => 'PUT',
      'submit' => 'Update Product',
    ])
  </x-table-card>
@endsection

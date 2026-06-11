@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Edit Discount" subtitle="Perbarui promo product.">
    @include('admin.discounts.form', ['action' => route('admin.discounts.update', $discount), 'method' => 'PUT', 'submit' => 'Update Discount'])
  </x-table-card>
@endsection

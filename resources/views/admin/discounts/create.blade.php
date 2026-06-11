@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Create Discount" subtitle="Tambah promo product.">
    @include('admin.discounts.form', ['action' => route('admin.discounts.store'), 'method' => 'POST', 'submit' => 'Save Discount'])
  </x-table-card>
@endsection

@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Create Plan" subtitle="Tambah paket pricing.">
    @include('admin.plans.form', ['action' => route('admin.plans.store'), 'method' => 'POST', 'submit' => 'Save Plan'])
  </x-table-card>
@endsection

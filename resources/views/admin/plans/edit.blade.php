@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Edit Plan" subtitle="Perbarui paket pricing.">
    @include('admin.plans.form', ['action' => route('admin.plans.update', $plan), 'method' => 'PUT', 'submit' => 'Update Plan'])
  </x-table-card>
@endsection

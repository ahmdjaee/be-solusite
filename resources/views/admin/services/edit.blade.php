@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Edit Service" subtitle="Perbarui layanan.">
    @include('admin.services.form', ['action' => route('admin.services.update', $service), 'method' => 'PUT', 'submit' => 'Update Service'])
  </x-table-card>
@endsection

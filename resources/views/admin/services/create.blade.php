@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Create Service" subtitle="Tambah layanan baru.">
    @include('admin.services.form', ['action' => route('admin.services.store'), 'method' => 'POST', 'submit' => 'Save Service'])
  </x-table-card>
@endsection

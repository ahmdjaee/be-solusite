@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Portfolio" subtitle="Studi kasus dan karya produk digital.">
    <x-slot:actions>
      <a class="btn btn-primary" href="{{ route('admin.portfolio.create') }}"><i class="bi bi-plus-lg me-1"></i>Create</a>
    </x-slot:actions>

    <div class="table-responsive">
      <table class="table align-middle mb-0" data-table data-per-page="10">
        <thead><tr><th>Name</th><th>Description</th><th>Stack</th><th class="text-end" data-sortable="false">Actions</th></tr></thead>
        <tbody>
          @foreach ($portfolios as $portfolio)
            <tr>
              <td class="fw-semibold">{{ $portfolio->name }}</td>
              <td>{{ Str::limit($portfolio->description, 100) }}</td>
              <td>{{ implode(', ', $portfolio->stack ?? []) }}</td>
              <td class="text-end">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.portfolio.edit', $portfolio) }}"><i class="bi bi-pencil"></i></a>
                <form class="d-inline" action="{{ route('admin.portfolio.destroy', $portfolio) }}" method="POST" onsubmit="return confirm('Hapus portfolio ini?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger" type="submit"><i class="bi bi-trash"></i></button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </x-table-card>
@endsection

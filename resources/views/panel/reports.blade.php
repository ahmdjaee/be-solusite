@extends('layouts.app')

@section('content')
  <x-metric-grid :metrics="$metrics" />

  <div class="row g-3 mb-3">
    <div class="col-xl-8">
      <x-chart-bars :chart="$chart">
        <x-slot:actions>
          <select class="form-select" style="max-width: 200px" data-control="select2">
            <option selected>All Channels</option>
            <option>Website</option>
            <option>Marketplace</option>
            <option>Retail</option>
          </select>
        </x-slot:actions>
      </x-chart-bars>
    </div>
    <div class="col-xl-4">
      <div class="surface p-3 h-100">
        <h2 class="h5 fw-bold mb-3">Sales Funnel</h2>
        @foreach ($funnel as $step)
          <div class="mb-3">
            <div class="d-flex justify-content-between small mb-1"><span>{{ $step['label'] }}</span><strong>{{ $step['value'] }}</strong></div>
            <div class="progress-thin"><span style="width: {{ $step['percent'] }}%"></span></div>
          </div>
        @endforeach
        <div class="small text-secondary">Insight: marketplace campaigns have the highest checkout rate, but higher refunds.</div>
      </div>
    </div>
  </div>

  <x-table-card title="Top Products" subtitle="Products with the highest revenue contribution">
    <x-slot:actions>
      <button class="btn btn-outline-primary"><i class="bi bi-calendar3 me-1"></i><span>Last 30 Days</span></button>
      <button class="btn btn-primary"><i class="bi bi-download me-1"></i><span>Export</span></button>
      <button class="btn btn-outline-primary"><i class="bi bi-share me-1"></i><span>Share</span></button>
    </x-slot:actions>
    <table class="table align-middle" data-table data-per-page="5">
      <thead><tr><th>Product</th><th>Revenue</th><th>Orders</th><th>Margin</th><th>Trend</th></tr></thead>
      <tbody>
        @foreach ($topProducts as $product)
          <tr>
            <td><strong>{{ $product['name'] }}</strong><div class="small text-secondary">{{ $product['category'] }}</div></td>
            <td>{{ $product['revenue'] }}</td>
            <td>{{ $product['orders'] }}</td>
            <td>{{ $product['margin'] }}</td>
            <td><span class="metric-trend trend-{{ $product['trend_tone'] }}"><i class="bi bi-arrow-{{ $product['trend_tone'] }}"></i>{{ $product['trend'] }}</span></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </x-table-card>
@endsection

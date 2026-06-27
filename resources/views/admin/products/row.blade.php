@php($reorder = $reorder ?? false)
<tr @if ($reorder) data-order-id="{{ $product->id }}" @endif>
  @if ($reorder)
    <td class="table-reorder-cell">
      <button class="table-reorder-handle" type="button" title="Drag to reorder" aria-label="Drag {{ $product->name }} to reorder">
        <i class="bi bi-grip-vertical"></i>
      </button>
    </td>
  @endif
  <td>
    @if ($product->thumbnail_url)
      <img src="{{ $product->thumbnail_url }}" alt="{{ $product->name }}" class="rounded" style="width: 48px; height: 48px; object-fit: cover;">
    @else
      <div class="rounded bg-light d-flex align-items-center justify-content-center text-secondary" style="width: 48px; height: 48px;">
        <i class="bi bi-image"></i>
      </div>
    @endif
  </td>
  <td>
    <div class="fw-semibold">{{ $product->name }}</div>
    <div class="small text-secondary">{{ $product->short }}</div>
  </td>
  <td><span class="badge bg-info-subtle text-info-emphasis">{{ $product->category?->name ?? '—' }}</span></td>
  <td><span class="badge bg-secondary">{{ $product->type }}</span></td>
  <td>Rp {{ number_format((float) $product->price, 0, ',', '.') }}</td>
  <td>Rp {{ number_format($product->finalPrice(), 0, ',', '.') }}</td>
  <td><span class="badge bg-primary">{{ $product->status }}</span></td>
  <td class="text-end">
    <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.products.edit', $product) }}"><i class="bi bi-pencil"></i></a>
    <form class="d-inline" action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Hapus product ini?')">
      @csrf
      @method('DELETE')
      <button class="btn btn-sm btn-outline-danger" type="submit"><i class="bi bi-trash"></i></button>
    </form>
  </td>
</tr>

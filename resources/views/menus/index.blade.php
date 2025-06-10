<x-layouts.app :title="__('Menu')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Daftar Menu</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage data Menu</flux:heading>
            <flux:separator variant="subtle" />
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Text</th>
                            <th>Icon</th>
                            <th>URL</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($menus as $menu)
                            <tr>
                                <td>{{ $menu->id }}</td>
                                <td>{{ $menu->menu_text }}</td>
                                <td>
                                    @if ($menu->menu_icon)
                                        <i class="{{ $menu->menu_icon }}"></i> {{ $menu->menu_icon }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $menu->menu_url }}</td>
                                <td>{{ $menu->menu_order }}</td>
                                <td>
                                    <span class="badge bg-{{ $menu->status == 'active' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($menu->status) }}
                                    </span>
                                </td>
                                <td>{{ $menu->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('menus.show', $menu) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('menus.edit', $menu) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('menus.destroy', $menu) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus menu ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data menu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $menus->links() }}
        </div>
    </div>
</x-layouts.app>

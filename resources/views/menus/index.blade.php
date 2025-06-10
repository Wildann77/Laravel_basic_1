<x-layouts.app :title="__('Menu')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Daftar Menu</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage data Menu</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

        <div class="flex justify-between items-center mb-4">
        <div>
            <form action="{{ route('menus.index') }}" method="get">
                @csrf
                <flux:input icon="magnifying-glass"  placeholder="Search Menu" />
            </form>
        </div>
        <div>
            <flux:button icon="plus">
                <flux:link href="{{ route('menus.create') }}" variant="subtle">Add New Menu</flux:link>
            </flux:button>
        </div>
    </div>

    @if(session()->has('successMessage'))
    <flux:badge color="lime" class="mb-3 w-full">{{ session()->get('successMessage') }}</flux:badge>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Text</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Icon</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">URL</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Order</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Created At</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($menus as $menu)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-black text-sm">{{ $menu->id }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-black text-sm">{{ $menu->menu_text }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-black text-sm">
                        @if ($menu->menu_icon)
                            <i class="{{ $menu->menu_icon }}"></i> {{ $menu->menu_icon }}
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-black text-sm">{{ $menu->menu_url }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-black text-sm">{{ $menu->menu_order }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-black text-sm">
                        <span class="badge bg-{{ $menu->status == 'active' ? 'success' : 'secondary' }}">
                            {{ ucfirst($menu->status) }}
                        </span>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-black text-sm">{{ $menu->created_at->format('d/m/Y H:i') }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-black text-sm">
                        <flux:dropdown>
                            <flux:button icon:trailing="chevron-down">Actions</flux:button>

                            <flux:menu>
                                <flux:menu.item icon="pencil" href="{{ route('menus.edit', $menu) }}">Edit</flux:menu.item>
                                <flux:menu.item icon="trash" variant="danger"
                                    onclick="event.preventDefault(); if(confirm('Yakin ingin menghapus menu ini?')) document.getElementById('delete-form-{{ $menu->id }}').submit();">
                                    Delete
                                </flux:menu.item>
                                <form id="delete-form-{{ $menu->id }}" action="{{ route('menus.destroy', $menu) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </flux:menu>
                        </flux:dropdown>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-5 py-5 border-b border-gray-200 bg-white text-center text-sm text-gray-500">
                        Tidak ada data menu
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $menus->links() }}
        </div>
    </div>
</x-layouts.app>

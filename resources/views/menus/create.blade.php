<x-layouts.app :title="__('Menus')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Tambah Menu Baru</flux:heading>
        <flux:subheading size="lg" class="mb-6">Form untuk menambahkan data menu navigasi</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if(session()->has('successMessage'))
        <flux:badge color="lime" class="mb-3 w-full">{{ session('successMessage') }}</flux:badge>
    @elseif(session()->has('errorMessage'))
        <flux:badge color="red" class="mb-3 w-full">{{ session('errorMessage') }}</flux:badge>
    @endif

    <form action="{{ route('menus.store') }}" method="POST">
        @csrf

        <flux:input label="Menu Text" name="menu_text" value="{{ old('menu_text') }}" class="mb-3" />
        <flux:input label="Menu Icon (opsional)" name="menu_icon" value="{{ old('menu_icon') }}" class="mb-3" placeholder="fas fa-home" />
        <flux:input label="Menu URL" name="menu_url" value="{{ old('menu_url') }}" class="mb-3" placeholder="/dashboard" />
        <flux:input type="number" label="Menu Order" name="menu_order" value="{{ old('menu_order', 0) }}" class="mb-3" min="0" />

        <flux:select label="Status" name="status" class="mb-3">
            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </flux:select>

        <flux:separator />
        <div class="mt-4">
            <flux:button type="submit" variant="primary">Simpan Menu</flux:button>
            <flux:link href="{{ route('menus.index') }}" variant="ghost" class="ml-3">Kembali</flux:link>
        </div>
    </form>
</x-layouts.app>

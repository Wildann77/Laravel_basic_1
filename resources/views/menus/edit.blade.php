<x-layouts.app :title="__('Menus')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Update Menu</flux:heading>
        <flux:subheading size="lg" class="mb-6">Edit menu navigation data</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if(session()->has('successMessage'))
        <flux:badge color="lime" class="mb-3 w-full">{{ session()->get('successMessage') }}</flux:badge>
    @elseif(session()->has('errorMessage'))
        <flux:badge color="red" class="mb-3 w-full">{{ session()->get('errorMessage') }}</flux:badge>
    @endif

    <form action="{{ route('menus.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')

        <flux:input label="Menu Text" name="menu_text" value="{{ old('menu_text', $menu->menu_text) }}" class="mb-3" />
        <flux:input label="Menu Icon" name="menu_icon" value="{{ old('menu_icon', $menu->menu_icon) }}" class="mb-3"
            placeholder="fas fa-home" />
        <flux:input label="Menu URL" name="menu_url" value="{{ old('menu_url', $menu->menu_url) }}" class="mb-3" />
        <flux:input type="number" label="Menu Order" name="menu_order" value="{{ old('menu_order', $menu->menu_order) }}"
            class="mb-3" min="0" />

        <div class="mb-3">
            <flux:label for="status">Status</flux:label>
            <select id="status" name="status" class="form-select">
                <option value="active" {{ old('status', $menu->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $menu->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        <flux:separator />
        <div class="mt-4">
            <flux:button type="submit" variant="primary">Update</flux:button>
            <flux:link href="{{ route('menus.index') }}" variant="ghost" class="ml-3">Kembali</flux:link>
        </div>
    </form>
</x-layouts.app>

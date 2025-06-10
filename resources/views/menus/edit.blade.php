<x-layouts.app :title="__('Menu')">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Edit Menu</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('menus.update', $menu) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="menu_text" class="form-label">Menu Text</label>
                            <input type="text" class="form-control @error('menu_text') is-invalid @enderror"
                                id="menu_text" name="menu_text" value="{{ old('menu_text', $menu->menu_text) }}">
                            @error('menu_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="menu_icon" class="form-label">Menu Icon (opsional)</label>
                            <input type="text" class="form-control @error('menu_icon') is-invalid @enderror"
                                id="menu_icon" name="menu_icon" value="{{ old('menu_icon', $menu->menu_icon) }}"
                                placeholder="fas fa-home">
                            <div class="form-text">Contoh: fas fa-home, fas fa-user, dll.</div>
                            @error('menu_icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="menu_url" class="form-label">Menu URL</label>
                            <input type="text" class="form-control @error('menu_url') is-invalid @enderror"
                                id="menu_url" name="menu_url" value="{{ old('menu_url', $menu->menu_url) }}">
                            @error('menu_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="menu_order" class="form-label">Menu Order</label>
                            <input type="number" class="form-control @error('menu_order') is-invalid @enderror"
                                id="menu_order" name="menu_order" value="{{ old('menu_order', $menu->menu_order) }}"
                                min="0">
                            @error('menu_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status"
                                name="status">
                                <option value="active" {{ old('status', $menu->status) == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ old('status', $menu->status) == 'inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('menus.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update Menu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
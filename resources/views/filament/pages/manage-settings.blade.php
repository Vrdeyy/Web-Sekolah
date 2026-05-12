<x-filament-panels::page>
    <form wire:submit="save">
        {{ $this->form }}

        <div class="mt-6">
            <x-filament::button type="submit" size="lg" wire:loading.attr="disabled" wire:target="save">
                <span wire:loading.remove wire:target="save">
                    Simpan Perubahan
                </span>
                <span wire:loading wire:target="save">
                    Sedang Menyimpan...
                </span>
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>

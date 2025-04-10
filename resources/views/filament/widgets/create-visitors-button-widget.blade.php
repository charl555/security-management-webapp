<x-filament::card>
    <div class=" w-[200px] flex flex-col justify-center items-center space-y-4">
        <h2 class="text-lg font-bold">Visitors</h2>
        <x-filament::button
            tag="a"
            href="{{ route('filament.admin.resources.visitors.create') }}"
            color="primary"
        >
            Create Visitor
        </x-filament::button>
    </div>
</x-filament::card>
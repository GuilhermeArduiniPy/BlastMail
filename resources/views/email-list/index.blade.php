<x-layouts::app :title="__('Email List')">
    <x-card class="space-y-4">

        @unless ($emailLists->isEmpty() && blank($search))
        <div class="flex justify-between h-20">
            <x-link-button href=" {{ route('email-list.create') }}">
                {{ __('Create a new Email List') }}
            </x-link-button>

            <x-form :action="route('email-list.index')" get class="w-1/3">
                <flux:input
                    name="search"
                    :label="__('Search Email Lists')"
                    type="text"
                    :value="$search ?? ''"
                    placeholder="{{ __('Search Email Lists') }}" />
            </x-form>
        </div>
        <x-table :headers="[ 
            __('Id List'),
            __('Title Email List'),
            __('# Subscribers'),
            __('Actions'),
        ]">
            <x-slot name="body">
                @foreach ($emailLists as $list)
                <tr>
                    <x-table.td>{{ $list->id }}</x-table.td>
                    <x-table.td>{{ $list->title }}</x-table.td>
                    <x-table.td>{{ $list->subscribers_count }}</x-table.td>
                    <x-table.td>//</x-table.td>
                </tr>
                @endforeach
            </x-slot>

        </x-table>
        {{ $emailLists->links() }}

        @else
        <div class="flex justify-center">
            <x-link-button href=" {{ route('email-list.create') }}">
                {{ __('Create your first Email List') }}
            </x-link-button>
        </div>
        @endunless
    </x-card>
</x-layouts::app>
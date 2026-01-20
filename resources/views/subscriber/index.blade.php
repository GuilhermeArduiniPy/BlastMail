<x-layouts::app :title="__('Email List')">
    <x-card class="space-y-4">
        <h2>{{__('Email List') }} > {{__($emailList->title)}} > {{__('Subscribers')}}</h2>

        <div class="flex justify-between h-20">
            <x-link-button href=" {{ route('subscribers.create', $emailList) }}">
                {{ __('Add a new subscriber') }}
            </x-link-button>

            <x-form :action="route('subscribers.index', $emailList)" get class="w-1/3">
                <flux:input
                    name="search"
                    :label="__('Search Email Lists')"
                    type="text"
                    :value="$search ?? ''"
                    placeholder="{{ __('Search Email Lists') }}" />
            </x-form>
        </div>
        <x-table :headers="[ 
            __('Id Sub'),
            __('Name'),
            __('Email'),
            __('Actions'),
        ]">
            <x-slot name="body">
                @foreach ($subscribers as $subscriber)
                <tr>
                    <x-table.td>{{ $subscriber->id }}</x-table.td>
                    <x-table.td>{{ $subscriber->name }}</x-table.td>
                    <x-table.td>{{ $subscriber->email }}</x-table.td>
                    <x-table.td>//</x-table.td>
                </tr>
                @endforeach
            </x-slot>

        </x-table>
        {{ $subscribers->links() }}

    </x-card>
</x-layouts::app>
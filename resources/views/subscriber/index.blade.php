<x-layouts::app :title="__('Email List')">
    <x-card class="space-y-4">
        <h2>{{__('Email List') }} > {{__($emailList->title)}} > {{__('Subscribers')}}</h2>

        <div class="flex justify-between h-25">
            <x-link-button href=" {{ route('subscribers.create', $emailList) }}">
                {{ __('Add a new subscriber') }}
            </x-link-button>

            <x-form :action="route('subscribers.index', $emailList)" class="w-2/5" x-data x-ref="form">
                <label for=" show_trash" class="inline-flex items-center">
                    <input id="show_trash" type="checkbox" value="1"
                        @click="$refs.form.submit()" @if ($showTrash) checked @endif
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-400"
                        name="showTrash">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{__('Show Deleted Records')}}</span>
                </label>
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
                    <x-table.td>
                        @unless ($subscriber->trashed())
                        <x-form
                            :action="route('subscribers.destroy',[ $emailList, $subscriber])"
                            delete flat onsubmit="return confirm('{{ __('Are you sure?') }}')">
                            <x-button>Delete</x-button>
                        </x-form>
                        @else
                        <flux:badge color="red">
                            Deleted
                        </flux:badge>

                        @endunless

                    </x-table.td>
                </tr>
                @endforeach
            </x-slot>

        </x-table>
        {{ $subscribers->links() }}

    </x-card>
</x-layouts::app>
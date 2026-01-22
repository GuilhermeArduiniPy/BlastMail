<x-layouts::app :title="__('Email List')">
    <x-card class="space-y-4">
        <h2>{{__('Templates') }}</h2>

        <div class="flex justify-between h-25">
            <x-link-button href=" {{ route('template.create') }}">
                {{ __('Create a new template') }}
            </x-link-button>

            <x-form :action="route('template.index')" class="w-2/5" x-data x-ref="form">
                <label for=" show_trash" class="inline-flex items-center">
                    <input id="show_trash" type="checkbox" value="1"
                           @click="$refs.form.submit()" @if ($withTrashed) checked @endif
                           class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-400"
                           name="showTrash">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{__('Show Deleted Records')}}</span>
                </label>
                <flux:input
                    name="search"
                    :label="__('Search Templates Lists')"
                    type="text"
                    :value="$search ?? ''"
                    placeholder="{{ __('Search Templates Lists') }}" />
            </x-form>
        </div>
        <x-table :headers="[
            '#',
            __('Name'),
            __('Actions'),
        ]">
            <x-slot name="body">
                @foreach ($templates as $template)
                    <tr>
                        <x-table.td>{{ $template->name }}</x-table.td>
                        <x-table.td>{{ $template->body }}</x-table.td>
                        <x-table.td>
                            <x-link-button :href="route('template.edit', $template)">
                                Edit
                            </x-link-button>
                            @unless ($template->trashed())
                                <x-form
                                    :action="route('template.destroy', $template)"
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
        {{ $templates->links() }}

    </x-card>
</x-layouts::app>

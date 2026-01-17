<x-layouts::app :title="__('Email List')">
    <x-h2>
        {{ __('Email Lists') }} > {{ __('Create a new list') }}
    </x-h2>
    <x-card>
        <x-form :action="route('email-list.store')" post>
            <div class="space-y-4">
                <div>
                    <flux:input
                        name="title"
                        :label="__('Title')"
                        :value="old('title')"
                        type="text"
                        autofocus
                        placeholder="Title" />
                </div>

                <div>
                    <flux:input
                        name="file"
                        :label="__('List File')"
                        type="file"
                        autofocus
                        placeholder="Title" />
                </div>
            </div>
            </br>
            <div class="flex items-center space-x-4">
                <x-primary-button>
                    {{ __('Save') }}
                </x-primary-button>
                <x-secondary-button>
                    {{ __('Cancel') }}
                </x-secondary-button>
            </div>
        </x-form>
    </x-card>
</x-layouts::app>
<x-layouts::app :title="__('Email List')">
    <x-h2>
        {{ __('Templates') }} >{{ __('Create Template') }}
    </x-h2>
    <x-card>
        <x-form :action="route('template.store')" post>
            <div class="space-y-4">
                <div>
                    <flux:input
                        name="name"
                        :label="__('Name')"
                        :value="old('name')"
                        type="text"
                        autofocus
                        placeholder="Name" />
                </div>

                <div>
                    <flux:input
                        name="body"
                        :label="__('Body')"
                        type="text"
                        :value="old('body')"
                        autofocus
                        placeholder="Body" />
                </div>
            </div>
            </br>
            <div class="flex items-center space-x-4">
                <x-primary-button>
                    {{ __('Save') }}
                </x-primary-button>
                <x-link-button :href="route('template.index')">
                    {{ __('Cancel') }}
                </x-link-button>
            </div>
        </x-form>
    </x-card>
</x-layouts::app>

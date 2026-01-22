<x-layouts::app :title="__('Email List')">
    <x-h2>
        {{ __('Email Lists') }} > {{$emailList->title}} > {{ __('Add a new Subscriber') }}
    </x-h2>
    <x-card>
        <x-form :action="route('subscribers.create', $emailList)" post>
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
                        name="email"
                        :label="__('Email')"
                        type="email"
                        :value="old('email')"
                        autofocus
                        placeholder="Email" />
                </div>
            </div>
            </br>
            <div class="flex items-center space-x-4">
                <x-primary-button>
                    {{ __('Save') }}
                </x-primary-button>
                <x-link-button :href="route('subscribers.index', $emailList)">
                    {{ __('Cancel') }}
                </x-link-button>
            </div>
        </x-form>
    </x-card>
</x-layouts::app>

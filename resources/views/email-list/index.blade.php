<x-layouts::app :title="__('Email List')">
    <x-card>
        @forelse ($emailLists as $emailList)
        // exibir cada email list
        @empty
        <div class="flex justify-center">
            <x-link-button href=" {{ route('email-list.create') }}">
                {{ __('Create your first Email List') }}
            </x-link-button>
        </div>
        @endforelse
    </x-card>
</x-layouts::app>
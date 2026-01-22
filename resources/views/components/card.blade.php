<div class="max-w-7xl mx-auto sm:px-6 lg: px-8 ">
    <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6 ">
        <div {{ $attributes->class(['grid auto-rows-min gap-4 md:grid-cols-1']) }}>
            {{ $slot }}
        </div>
    </div>
</div>
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __("Your Group's Information") }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your group's name.") }}
        </p>
    </header>

    <form method="post" action="{{ route('users.group.update', ['id' => $group->id]) }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="name" :value="__('Group Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" autocomplete="name" />
            <x-input-error :messages="$errors->updatePassword->get('name')" class="mt-2" />TODO
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>

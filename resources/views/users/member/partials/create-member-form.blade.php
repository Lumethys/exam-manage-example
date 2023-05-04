<section>
    <form method="post" action="{{ route('users.member.store', ['id' => $group->id]) }}" class="mt-6 space-y-6">
        @csrf
        @method('post')
        <div>
            <x-input-label for="fullname" :value="__('Full Name')" />
            <x-text-input id="fullname" name="fullname" type="text" class="mt-1 block w-full" :value="old('fullname')" autocomplete="fullname" />
            <x-input-error :messages="$errors->addMember->get('fullname')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="age" :value="__('Age')" />
            <x-text-input id="age" name="age" type="number" class="mt-1 block w-full" :value="old('age')"  autocomplete="age" />
            <x-input-error :messages="$errors->addMember->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="gender" :value="__('Gender')" />
            <select id="gender" name="gender" type="text" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" autocomplete="gender">
                <option value=0 selected>Male</option>
                <option value=1>Female</option>
            </select>
            <x-input-error :messages="$errors->addMember->get('gender')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="tel" :value="__('Phone Number')" />
            <x-text-input id="tel" name="tel" type="text" class="mt-1 block w-full" :value="old('tel')" autocomplete="tel" />
            <x-input-error :messages="$errors->addMember->get('tel')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address')" autocomplete="address" />
            <x-input-error :messages="$errors->addMember->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="position" :value="__('Position')" />
            <select id="position" name="position" type="text" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" autocomplete="position">
                <option value=0 selected>Regular</option>
                <option value=1>Leader</option>
                <option value=2>Teacher</option>
            </select>
            <x-input-error :messages="$errors->addMember->get('position')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Create') }}</x-primary-button>
        </div>
    </form>
</section>

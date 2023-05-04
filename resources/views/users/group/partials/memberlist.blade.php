<section>
    <x-primary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'add-new-member')"
    >{{ __('Add New Team Member') }}</x-primary-button>

    <x-modal name="add-new-member" :show="$errors->addMember->isNotEmpty()" focusable>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('users.member.partials.create-member-form')
            </div>
        </div>
    </x-modal>

    @foreach($group->members as $member)
        {{$member}}
    @endforeach
</section>

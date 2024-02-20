
@if (request()->user()->roles()->where('name','admin')->exists())
    <x-admin.layout>
        <x-user-profile  />
    </x-admin.layout>
@else
    @if (request()->user()->roles()->where('name','root')->exists())
        <x-admin.layout>
            <x-user-profile  />
        </x-admin.layout>
    @else
        <x-layout>
            <x-user-profile  />
        </x-layout>
    @endif
   
@endif
<x-app-layout>
    <link rel="stylesheet" href="{{asset("fonts/fonts.css")}}">
    <x-slot name="header">
        <h2>Hi {{\Illuminate\Support\Facades\Auth::user()->email}}</h2>
        <b>رضا مصلایی خواه</b>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table table-striped">

                    @php($i="test")

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Create</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($users as $user)
                           <tr>
                               <td>{{$user->id}}</td>
                               <td>{{$user->name}}</td>
                               <td>{{$user->email}}</td>

                               <td>{{$user->created_at->diffForHumans()}}</td>


                           </tr>
                       @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>

@extends("layouts.css")
<x-app-layout>

    <x-slot name="header">

        {{--metod $users faqat az samt controller miad     --}}
        @if(isset($users))
        <h4 id="h4_sayWelcome">سلام {{\Illuminate\Support\Facades\Auth::user()->name}}</h4>
       <b style="float: left;">مجموع کاربران
           <span class="alert alert-danger" style="font-size: 17px;color: white; border: none; background-color: lightcoral; padding: 4px 4px 4px 4px">{{count($users)}}</span>
       </b>
        @endif
        <br>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if(isset($users))
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>شناسه</th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>عضویت</th>
                        </tr>
                    </thead>
                    <tbody>

                    {{--metod $users faqat az samt controller miad     --}}

                       @foreach($users as $user)
                           <tr>
                               <td>{{$user->id}}</td>
                               <td>{{$user->name}}</td>
                               <td>{{$user->email}}</td>

                               <td>{{\Morilog\Jalali\Jalalian::forge($user->created_at)->ago()}}</td>

                           </tr>
                       @endforeach
                    </tbody>
                </table>
                @endif

            </div>
        </div>
    </div>

</x-app-layout>

@extends("layouts.css")
<x-app-layout>
    <link rel="stylesheet" href="{{asset("fonts/fonts.css")}}">
    <x-slot name="header">
        <h4>سلام {{\Illuminate\Support\Facades\Auth::user()->name}}</h4>
       <b style="float: left;">مجموع کاربران
           <span class="alert alert-danger" style="font-size: 17px;color: white; border: none; background-color: lightcoral; padding: 4px 4px 4px 4px">{{count($users)}}</span>
       </b>
        <br>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table table-striped">

                    @php($i="test")

                    <thead>
                        <tr>
                            <th>شناسه</th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>عضویت</th>
                        </tr>
                    </thead>
                    <tbody>
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

            </div>
        </div>
    </div>

</x-app-layout>

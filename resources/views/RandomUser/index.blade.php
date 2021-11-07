@extends('layouts.main')

@section('content')
@auth
                <form action="{{ route('getUsers.store') }}" method="post">
                    @csrf

                    <input type="hidden" name="addUsers" value="1">
                    <button type="submit" class="btn btn-info btn-add"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Users</button>
                </form>
                <div class="table">
                    <div class="thead-dark">
                        <div class="row">
                            <div class="tr col-10">
                                <div class="row">
                                    <div class="col-1 th">{{ __('ID') }}</div>
                                    <div class="col-8 th">{{ __('Name') }}</div>
                                    <div class="col-2 th">{{ __('Gender') }}</div>
                                    <div class="col-1 th">{{ __('Age') }}</div>                                
                                </div>
                                <div class="row">
                                    <div class="col-3 th">{{ __('City') }}</div>
                                    <div class="col-3 th">{{ __('Country') }}</div>
                                    <div class="col-4 th">{{ __('Email') }}</div>
                                    <div class="col-2 th">{{ __('Salt') }}</div>                                  
                                </div>
                                <div class="row">
                                    <div class="col th">{{ __('Password sha256 hash') }}</div>
                                </div>
                            </div>
                            <div class="col-2 th">{{ __('Image') }}</div>
                        </div>
                    </div>
                    <div class="tbody-striped">
@if (count($data) > 0)
@foreach($data as $row)
                        <div class="row tr">
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-1 td font-weight-bold">{{ $row->id }}</div>
                                    <div class="col-8 td">{{ $row->name }}</div>
                                    <div class="col-2 td">{{ $row->gender }}</div>
                                    <div class="col-1 td">{{ $row->age }}</div>                                
                                </div>
                                <div class="row">
                                    <div class="col-3 td">{{ $row->city }}</div>
                                    <div class="col-3 td">{{ $row->country }}</div>
                                    <div class="col-4 td">{{ $row->email }}</div>
                                    <div class="col-2 td">{{ $row->salt }}</div>                                  
                                </div>
                                <div class="row">
                                    <div class="col td">{{ $row->passwsha256 }}</div>
                                </div>
                            </div>@php $img=base64_encode($row->image) @endphp
                            <div class="col-2 td last-td"><img src="data:image/jpeg;base64,{{$img}}" alt="user photos" /></div>                        
                        </div>
@endforeach
@else
                        <div class="row tr">
                            <div class="col td colspan-2">There's nothing to do!</div>
                        </div>
@endif
                    </div>
                </div>
                        
                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $data->links() !!}
                </div>
@else
                <div class="col">The user register is only visible after login!</div>
@endauth
@endsection
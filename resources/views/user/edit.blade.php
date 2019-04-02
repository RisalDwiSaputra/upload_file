@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="#" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                                {{-- ?? auth()->user()->name (untuk menampilkan nam file yang sedang login) --}}
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name')}}</label> 

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') ?? auth()->user()->name  }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Upload file') }}</label>
                            <div class="col-md-6">
                                <img src="{{ asset ('storage/' . auth()->user()->avatar)}}" alt="" height="120">
                                
                                @if (auth()->user()->avatar != null)
                                    <a href="{{route('avatar.delete')}}" class="btn btn-danger"
                                    {{-- fungsi tag dibawah apa? --}}
                                    onclick="event.preventDefault();
                                            document.getElementById('remove-avatar').submit();">
                                    Hapus Profil</a>
                                @endif
                                
                                <input id="avatar" type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" required>

                                @if ($errors->has('avatar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <form action="{{route('avatar.delete')}}" id="remove-avatar" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

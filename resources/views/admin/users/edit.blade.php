@extends('layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route("admin.users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name" class="form-label">{{ trans('cruds.user.fields.name') }}*</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                                @if($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.user.fields.name_helper') }}
                                </p>
                            </div>
                            <div class="mb-3 {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email" class="form-label">{{ trans('cruds.user.fields.email') }}*</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                                @if($errors->has('email'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.user.fields.email_helper') }}
                                </p>
                            </div>
                            <div class="mb-3 {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password" class="form-label">{{ trans('cruds.user.fields.password') }}</label>
                                <input type="password" id="password" name="password" class="form-control">
                                @if($errors->has('password'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.user.fields.password_helper') }}
                                </p>
                            </div>
                            <div class="mb-3 {{ $errors->has('roles') ? 'has-error' : '' }}">
                                <label for="roles" class="form-label">{{ trans('cruds.user.fields.roles') }}*
                                <span class="btn btn-info btn-sm select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-sm deselect-all">{{ trans('global.deselect_all') }}</span></label>
                                <select name="roles[]" id="roles" class="form-select select2" style="width: 100%;" multiple="multiple" required>
                                    @foreach($roles as $id => $roles)
                                    <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('roles'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('roles') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.user.fields.roles_helper') }}
                                </p>
                            </div>
                            <div>
                                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
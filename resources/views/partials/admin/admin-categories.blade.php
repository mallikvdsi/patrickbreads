@extends('layouts.app')

@section('body_class', 'default admin-page')

@section('content')
<div class="container categories admin">
    <div class="col-md-10 offset-md-1">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('messages.category')</div>
            <div class="panel-body">
                <form method="POST" action="/admin/category">
                    <div class="form-group">
                        <input type="text" id="story-title" name="category" placeHolder="Category Name">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="thumb_img" placeHolder="Thumb Image">
                    </div>
                    <div class="form-group">
                        <input type="text" name="url" placeHolder="URL">
                    </div>
                    <div class="form-group">
                        <input type="text" name="hero_img" placeHolder="Hero Image">
                    </div>
                    <div class="form-group">
                        <input type="text" name="parent_id" placeHolder="Parent Category Id">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">@lang('messages.create') @lang('messages.category')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-10 offset-md-1 table-responsive">
        <h4>@lang('messages.category') @lang('messages.list')</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('messages.category') @lang('messages.name')</th>
                    <th>@lang('messages.thumb') @lang('messages.image')</th>
                    <th>@lang('messages.category') @lang('messages.url')</th>
                    <th>@lang('messages.hero') @lang('messages.image')</th>
                    <th>@lang('messages.parent') @lang('messages.id')</th>
                    <th>@lang('messages.action')</th>
                </tr>
            </thead>
            <tbody>
              @foreach($data as $category)
                <tr>
                    <th>{{ $category->id }}</th>
                    <td>
                        <a href="/admin/category/{{ $category->id }}">{{ $category->name }}</a>
                    </td>
                    <td>
                        {{ $category->thumb_img }}
                    </td>
                    <td>
                        {{ $category->url }}
                    </td>
                    <td>
                        {{ $category->hero_img }}
                    </td>
                    <td>
                        {{ $category->parent_id }}
                    </td>
                    <td>
                        <a class="update" href="/admin/category/{{ $category->id }}/edit">@lang('messages.update')</a>
                        <a href="/admin/category/{{ $category->id }}" data-method="delete" data-token="{{csrf_token()}}">@lang('messages.delete')</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

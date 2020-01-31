@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.badge.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.badges.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.badge.fields.id') }}
                        </th>
                        <td>
                            {{ $badge->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.badge.fields.name') }}
                        </th>
                        <td>
                            {{ $badge->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.badge.fields.icon') }}
                        </th>
                        <td>
                            @if($badge->icon)
                                <a href="{{ $badge->icon->getUrl() }}" target="_blank">
                                    <img src="{{ $badge->icon->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.badges.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#badges_employees" role="tab" data-toggle="tab">
                {{ trans('cruds.employee.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="badges_employees">
            @includeIf('admin.badges.relationships.badgesEmployees', ['employees' => $badge->badgesEmployees])
        </div>
    </div>
</div>

@endsection
<table class="table table-condensed table-hover table-responsive">
    <thead>
    <tr>
        <th>{{ trans_choice('web::seat.corporation', 1) }}</th>
        <th>{{ trans_choice('web::seat.title', 1) }}</th>
        <th>{{ trans('discord-connector::seat.discord_role') }}</th>
        <th>{{ trans('web::seat.created') }}</th>
        <th>{{ trans('web::seat.updated') }}</th>
        <th>{{ trans('web::seat.status') }}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($title_filters as $filter)
        <tr>
            <td>{{ $filter->corporation->name }}</td>
            <td>{{ strip_tags($filter->titleName) }}</td>
            <td>{{ $filter->discord_role->name }}</td>
            <td>{{ $filter->created_at }}</td>
            <td>{{ $filter->updated_at }}</td>
            <td>
                @if ($filter->enabled)
                    <span class="fa fa-check text-success"></span>
                @else
                    <span class="fa fa-times text-danger"></span>
                @endif
            </td>
            <td>
                <div class="btn-group">
                    <form method="post" action="{{ route('discord-connector.title.remove', ['corporation_id' => $filter->corporation_id, 'title_id' => $filter->title_id, 'discord_role_id' => $filter->discord_role_id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-xs col-xs-12">{{ trans('web::seat.remove') }}</button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="users-table">
            <thead>
            <tr>
                <th>Rol</th>
                <th>Name</th>
                <th>Email</th>
                <!--<th>Email Verified At</th>-->
                <!--<th>Password</th>-->
                <!--<th>Remember Token</th>-->
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->roles['name'] }}</td>
                    <td><a href="{{ route('users.show', [$user->id]) }}"  class='btn btn-outline-info'>
                               {{ $user->name }}
                        </a>
                    </td>
                    <td>{{ $user->email }}</td>
                    <!--<td>{{ $user->email_verified_at }}</td>-->
                    <!--<td>{{ $user->password }}</td>-->
                    <!--<td>{{ $user->remember_token }}</td>-->

                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>

                            
                                <a href="{{ route('users.show', [$user->id]) }}"
                                class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                            
                            @if(Auth::check() && Auth::user()->roles['id'] == 1)
                                <a href="{{ route('users.edit', [$user->id]) }}"
                                class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                            
                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            @endif
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $users])
        </div>
    </div>
</div>

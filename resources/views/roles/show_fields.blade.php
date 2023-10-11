<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $roles->name }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $roles->created_at }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $roles->updated_at }}</p>
</div>

<h1>Usuarios {{ $roles->name }}</h1>

<div class="col-sm-12 table table-striped">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($roles->users as $user)
            <tr>
                <td>
                    <a href="../users/{{$user->id}}">{{ $user->id}}</a>
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

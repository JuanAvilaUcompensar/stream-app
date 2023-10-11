<!-- Roles Id Field -->
<div class="col-sm-12">
    {!! Form::label('roles_id', 'Roles Id:') !!}
    <p>
        <a href="{{ route('roles.show', $user->roles['id']) }}" class="btn btn-outline-info"> {{$user->roles['name']}} </a>
    </p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Email Verified At Field -->
<div class="col-sm-12">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $user->email_verified_at }}</p>
</div>

<!-- Password Field -->
<div class="col-sm-12">

    <table>
        <thead>
            <tr>
                <th>sdf</th>
                <th>sdf</th>
                <th>sdf</th>
                <th>sdf</th>
            </tr>
        </thead>
        
       <tbody>
            <tr>
                @foreach($user->transactions as $transaction)
                    <th>{{ $transaction->amount}}</th> 
                @endforeach        
            </tr>
       </tbody>
    </table>
</div>

<!-- Remember Token Field -->
<div class="col-sm-12">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{{ $user->remember_token }}</p>
</div>


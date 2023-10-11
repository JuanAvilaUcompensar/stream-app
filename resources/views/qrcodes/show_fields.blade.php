<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'Propietario de producto') !!}
    <p>
        <a href="../users/{{ $qrcode->user['id'] }}" class="btn btn-outline-info">{{ $qrcode->user['name'] }}</a>
    </p>
</div>

<!-- Website Field -->
<div class="col-sm-12">
    {!! Form::label('website', 'Website:') !!}
    <p><a href="{{ $qrcode->website }}" target="_blank">{{ $qrcode->website }}</a></p>
</div>

<!-- Company Name Field -->
<div class="col-sm-12">
    {!! Form::label('company_name', 'Company Name:') !!}
    <p>{{ $qrcode->company_name }}</p>
</div>

<!-- Product Name Field -->
<div class="col-sm-12">
    {!! Form::label('product_name', 'Product Name:') !!}
    <p>{{ $qrcode->product_name }}</p>
</div>

<!-- Product Url Field -->
<div class="col-sm-12">
    {!! Form::label('product_url', 'Product Url:') !!}
    <p>{{ $qrcode->product_url }}</p>
</div>

<!-- Callback Url Field -->
<div class="col-sm-12">
    {!! Form::label('callback_url', 'Callback Url:') !!}
    <p>{{ $qrcode->callback_url }}</p>
</div>

<!-- Qrcode Path Field -->
<div class="col-sm-12">
    {!! Form::label('qrcode_path', 'Qrcode Path:') !!}
    <p>{{ $qrcode->qrcode_path }}</p>    
    <p> <img src="{{asset($qrcode->qrcode_path)}}" ></p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $qrcode->amount }}</p>
</div>

<!-- Product Url Image Path Field -->
<div class="col-sm-12">
    {!! Form::label('product_url_image_path', 'Product Url Image Path:') !!}
    <p>{{ $qrcode->product_url_image_path }}</p>
    <p> <img  width="150" height="150" src="{{asset($qrcode->product_url_image_path)}}" ></p>
</div>

<h1>Transacciones de este producto</h1>
<div class="col-sm-12 table table-striped">
    <table>
        <thead class="thead-dark">
            <tr>
                <th>Transactions Id</th>
                <th>Amount</th>
                <th>Payment_method</th>
                <th>Status</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalAmount = 0;
            @endphp
            @foreach ($qrcode->transactions as $transaction)
                @php
                    $totalAmount += $transaction->amount;
                @endphp
                <tr>
                    <td>
                        <a href="../transactions/{{ $transaction->user['id'] }}">{{ $transaction-> id }}</a>
                    </td>
                    <td>${{ $transaction->amount }}</td>
                    <td>{{ $transaction->payment_method }}</td>
                    <td>{{ $transaction->status }}</td>
                    <td>
                        <a href="../users/{{ $transaction->user['id'] }}">{{ $transaction->user['name'] }}</a>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2"></td>
                <td><h3>Total:</h3>
                    <h4>${{ number_format($totalAmount, 2) }}</h4>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>


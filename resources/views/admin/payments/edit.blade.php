{{ Form::model( $payment, ['route' => ['payments.update', $payment->id], 'method' => 'put', 'role' => 'form'] ) }}
    @include('admin.payments._fields')
{{ Form::close() }}
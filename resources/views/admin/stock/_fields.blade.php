<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Save Stock</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
        <div class="box-body">

            <div class="row">
                <div class="col-md-12">
                    {!! Form::label('date', 'Date:'); !!}
					@if(!isset($stock))
						{!! Form::text('date',null,['class'=>'form-control','autocomplete'=>'off','id' => 'datetimepicker']); !!}
					@else
						<input type="text" id="datetimepicker" value="{{ date('m/d/Y H:i:s', $stock->date) }}" name="date" class="form-control" autocomplete="off">
					@endif
                </div>

                @if (!isset($stock))
                    @foreach($tanks as $tank)
                    <div class="col-md-6">
                        <label>Select Tank</label>
                        <select name="tank[]" class="form-control">
                                <option value="{{ $tank->id }}" selected>{{ $tank->name .' | '. $tank->product->name }}</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Amount</label>
                        {!! Form::number('amount[]',null,['class'=>'form-control','placeholder'=>'10 lit','step'=>'any']); !!}
                    </div>
                    @endforeach
                @else
                    <div class="col-md-6">
                        <label>Select Tank</label>
                        <select name="tank" class="form-control">
                        @foreach($tanks as $tank)
                            <option value="{{ $tank->id }}" {{ ($tank->id == $stock->tank_id) ? 'selected': '' }}>{{ $tank->name }} | {{$tank->product->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Amount</label>
                        <input class="form-control" value="{{ $stock->amount }}" step="any" name="amount" type="number">
                    </div>
                @endif
            </div>
            <br>

        </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary" name="upload">Save</button>
      </div>

  </div>

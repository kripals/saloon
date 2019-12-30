<div class="row">
    <div class="col-md-12">
        @include('partials.errors')
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-head">
                <header>{!! $header !!}</header>
                <div class="tools visible-xs">
                    <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                        <i class="md md-arrow-back"></i>
                        Back
                    </a>
                    <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Save">
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::text('first_name',old('first_name'),['class'=>'form-control', 'required']) }}
                            {{ Form::label('first_name','First Name') }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::text('last_name',old('last_name'),['class'=>'form-control', 'required']) }}
                            {{ Form::label('last_name','Last Name') }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::text('in_time',old('in_time'),['class'=>'form-control time-picker', 'required']) }}
                            {{ Form::label('in_time','In Time (24 Hour Format)') }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::text('out_time',old('out_time'),['class'=>'form-control time-picker', 'required']) }}
                            {{ Form::label('out_time','Out Time (24 Hour Format)') }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::text('phone_number',old('phone_number'),['class'=>'form-control', 'required']) }}
                            {{ Form::label('phone_number','Phone Number') }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::text('address',old('address'),['class'=>'form-control', 'required']) }}
                            {{ Form::label('address','Address') }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::text('hired_date',old('hired_date'),['class'=>'form-control date-picker', 'required']) }}
                            {{ Form::label('hired_date','Hired Date') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <button type="reset" class="btn btn-default ink-reaction">Reset</button>
                    <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Submit">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-affix affix-4">
            <div class="card-head">
                <div class="tools">
                    <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                        <i class="md md-arrow-back"></i>
                        Back
                    </a>
                </div>
            </div>

            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <button type="reset" class="btn btn-default ink-reaction">Reset</button>
                    <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Save">
                </div>
            </div>
        </div>
    </div>
</div>

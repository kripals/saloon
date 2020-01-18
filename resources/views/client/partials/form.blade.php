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
                            {{ Form::select('gender', [ 'MALE' => 'Male', 'FEMALE' => 'Female' ], old('gender'), ['class' => 'form-control', 'required']) }}
                            {{ Form::label('gender', 'Gender') }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::text('mobile_number',old('mobile_number'),['class'=>'form-control', 'required']) }}
                            {{ Form::label('mobile_number','Mobile Number') }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::text('address',old('address'),['class'=>'form-control', 'required']) }}
                            {{ Form::label('address','Address') }}
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
                    <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Submit">
                </div>
            </div>
        </div>
    </div>
</div>

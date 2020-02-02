<div class="row">
    <div class="col-md-12">
        @include('partials.errors')
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-head">
                <header>{!! $header !!}</header>
                <div class="tools visible-xs">
                    <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Submit">
                </div>
                <div class="tools">
                    <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                        <i class="md md-arrow-back"></i>
                        Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{ Form::date('date', old('date'),['class'=>'form-control date-picker', 'required']) }}
                            {{ Form::label('date','Date') }}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{ Form::text('time',old('time'),['class'=>'form-control time-picker', 'required']) }}
                            {{ Form::label('time','Time') }}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{ Form::number('duration',old('duration'),['class'=>'form-control', 'required']) }}
                            {{ Form::label('duration','Duration In Hrs') }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::select('client', $clients, isset($appointment) ? $appointment->client->id : old('client'), ['class' => 'form-control select2-list', 'required']) }}
                            {{ Form::label('client', 'Client') }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::select('service[]', $services, isset($appointment) ? $appointment->service->pluck('id') : old('service'), ['class' => 'form-control select2-list', 'required', 'multiple' => 'multiple']) }}
                            {{ Form::label('service', 'Service') }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::select('employee', $employees, isset($appointment) ? $appointment->employee->id : old('employee'), ['class' => 'form-control select2-list', 'required']) }}
                            {{ Form::label('employee', 'Employee') }}
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
</div>

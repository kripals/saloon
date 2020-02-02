<div class="row">
    <div class="col-md-12">
        @include('partials.errors')
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-head">
                <header>{!! $header !!}</header>
                <div class="tools visible-xs">
                    <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Save">
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
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::text('name',old('name'),['class'=>'form-control', 'required']) }}
                            {{ Form::label('name','Name') }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::email('email',old('email'),['class'=>'form-control', 'required']) }}
                            {{ Form::label('email','Email') }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::password('password',['class'=>'form-control', 'id' => 'password', 'required']) }}
                            {{ Form::label('password','Password') }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::select('branch', $branches, isset($user) ? $user->branch->id : old('branch'), ['class' => 'form-control select2-list', 'required']) }}
                            {{ Form::label('branch', 'Branch') }}
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

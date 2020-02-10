<div class="form-group {{ $errors->has('bank_name') ? 'has-error' : ''}}">
    <label for="bank_name" class="control-label">{{ 'Bank Name' }}</label>
    <input class="form-control" name="bank_name" type="text" id="bank_name" value="{{ isset($bank->bank_name) ? $bank->bank_name : ''}}" required>
    {!! $errors->first('bank_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('account_name') ? 'has-error' : ''}}">
    <label for="account_name" class="control-label">{{ 'Account Name' }}</label>
    <input class="form-control" name="account_name" type="text" id="account_name" value="{{ isset($bank->account_name) ? $bank->account_name : ''}}" required>
    {!! $errors->first('account_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('branch') ? 'has-error' : ''}}">
    <label for="branch" class="control-label">{{ 'Branch' }}</label>
    <input class="form-control" name="branch" type="text" id="branch" value="{{ isset($bank->branch) ? $bank->branch : ''}}" required>
    {!! $errors->first('branch', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('account_Id') ? 'has-error' : ''}}">
    <label for="account_Id" class="control-label">{{ 'Account Id' }}</label>
    <input class="form-control" name="account_Id" type="text" id="account_Id" value="{{ isset($bank->account_Id) ? $bank->account_Id : ''}}" required>
    {!! $errors->first('account_Id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

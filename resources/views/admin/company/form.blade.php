<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name"
        value="{{ isset($company->name) ? $company->name : ''}}">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('logo1') ? 'has-error' : ''}}">
    <label for="logo1" class="control-label">{{ 'Logo 1' }}</label>
    <input class="form-control" name="logo1" type="file" id="logo1"
        value="{{ isset($company->logo1) ? $company->logo1 : ''}}">
    {!! $errors->first('logo1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('logo2') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Logo 2' }}</label>
    <input class="form-control" name="logo2" type="file" id="logo2"
        value="{{ isset($company->logo2) ? $company->logo2 : ''}}">
    {!! $errors->first('logo2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email"
        value="{{ isset($company->email) ? $company->email : ''}}">
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <input class="form-control" name="address" type="text" id="address"
        value="{{ isset($company->address) ? $company->address : ''}}">
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('break_time') ? 'has-error' : ''}}">
    <label for="break_time" class="control-label">{{ 'Break time ' }}</label>
    <input class="form-control" name="break_time" type="text" id="break_time" placeholder="In minute"
        value="{{ isset($company->break_time) ? $company->break_time : ''}}">
    {!! $errors->first('break_time', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('holidays') ? 'has-error' : ''}}">
    <label for="holidays" class="control-label">{{ 'Holidays' }}</label>
    @php
    // $days = ['nothing'];
    $days= json_decode($company->holidays);
    @endphp
    <select class="select-multiple form-control " name="holidays[]" multiple="multiple"
        value="{{ isset($company->holidays) ? $company->holidays : ''}}" required>
        <option value='mon' {{ in_array("mon", $days) ? 'selected' : '' }}>Monday</option>
        <option value='tue' {{ in_array("tue", $days) ? 'selected' : '' }}>Tuesday</option>
        <option value='wed' {{ in_array("wed", $days) ? 'selected' : '' }}>Wednesday</option>
        <option value='thu' {{ in_array("thu", $days) ? 'selected' : '' }}>Thursday</option>
        <option value='fri' {{ in_array("fri", $days) ? 'selected' : '' }}>Friday</option>
        <option value='sat' {{ in_array("sat", $days)  ? 'selected' : '' }}>Saturday</option>
        <option value='sun' {{ in_array("sun", $days)  ? 'selected' : '' }}>Sunday</option>
    </select>
    {{-- <input class="form-control" name="holidays" type="text" id="holidays" value="{{ isset($company->holidays) ? $company->holidays : ''}}"
    required> --}}
    {!! $errors->first('holidays', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
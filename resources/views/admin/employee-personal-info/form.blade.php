<div class="form-group {{ $errors->has('employee_id') ? 'has-error' : ''}}">
    <label for="employee_id" class="control-label">{{ 'Employee' }}</label>
    <select name="employee_id" id="employee_id" class="select form-control">
        @foreach (Hr::findAll('employees') as $item)
            <option value="{{$item->id}}" {{ (Hr::isAdmin()) ? 'disable' : ''}}
                @if(isset($employeepersonalinfo->employee_id))
                    @if($employeepersonalinfo->employee_id == $item->id)  selected @endif
                @endif>
                {{$item->fname.' '.$item->lname}}
            </option>
        @endforeach
        {{-- @foreach (Hr::findAll('employees') as $item)
            <option value="{{$item->id}}">{{$item->fname.' '.$item->lname}}</option>
        @endforeach --}}
    </select>
    {{-- <input class="form-control" name="employee_id" type="number" id="employee_id" value="{{ isset($employeepersonalinfo->employee_id) ? $employeepersonalinfo->employee_id : ''}}" required> --}}
    {!! $errors->first('employee_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('picture') ? 'has-error' : ''}}">
    <label for="picture" class="control-label">{{ 'Picture' }}</label>
    <input class="form-control" name="picture" type="file" id="picture" value="{{ isset($employeepersonalinfo->picture) ? $employeepersonalinfo->picture : ''}}" >
    {!! $errors->first('picture', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
    <label for="age" class="control-label">{{ 'Age' }}</label>
    <input class="form-control" name="age" type="text" id="age" value="{{ isset($employeepersonalinfo->age) ? $employeepersonalinfo->age : ''}}" >
    {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ isset($employeepersonalinfo->address) ? $employeepersonalinfo->address : ''}}" >
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
    <label for="mobile" class="control-label">{{ 'Mobile' }}</label>
    <input class="form-control" name="mobile" type="text" id="mobile" value="{{ isset($employeepersonalinfo->mobile) ? $employeepersonalinfo->mobile : ''}}" >
    {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($employeepersonalinfo->email) ? $employeepersonalinfo->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
    <label for="file" class="control-label">{{ 'File' }}</label>
    <input class="form-control" name="file" type="file" id="file" value="{{ isset($employeepersonalinfo->file) ? $employeepersonalinfo->file : ''}}" >
    {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

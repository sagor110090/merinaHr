<div class="form-group {{ $errors->has('category_name') ? 'has-error' : ''}}">
    <label for="category_name" class="control-label">{{ 'Category Name' }}</label>
    <input class="form-control" name="category_name" type="text" id="category_name" value="{{ isset($expansecategory->category_name) ? $expansecategory->category_name : ''}}" required>
    {!! $errors->first('category_name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

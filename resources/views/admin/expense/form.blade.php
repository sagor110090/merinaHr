<div class="form-group {{ $errors->has('expanse_categories_id') ? 'has-error' : ''}}">
    <label for="expanse_categories_id" class="control-label">{{ 'Expanse Categories' }}</label>
    <select name="bank_id" id="bank_id" class="select form-control">
        @foreach (Hr::findAll('expanse_categories') as $item)
            <option value="{{$item->id}}">{{$item->category_name}}</option>
        @endforeach
    </select>
    {{-- <input class="form-control" name="expanse_categories_id" type="number" id="expanse_categories_id" value="{{ isset($expense->expanse_categories_id) ? $expense->expanse_categories_id : ''}}" required> --}}
    {!! $errors->first('expanse_categories_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    <label for="amount" class="control-label">{{ 'Amount' }}</label>
    <input class="form-control" name="amount" type="text" id="amount" value="{{ isset($expense->amount) ? $expense->amount : ''}}" required>
    {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label">{{ 'Date' }}</label>
    <input class="form-control" name="date" type="date" id="date" value="{{ isset($expense->date) ? $expense->date : ''}}" required>
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

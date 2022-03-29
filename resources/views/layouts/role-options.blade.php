<option selected value="" disabled>Select</option>
@if(isset($roles))
  @foreach($roles as $role) 
      <option value="{{ $role->id }}">{{ $role->name }}</option>
  @endforeach
@endif
@if(isset($users))
  @foreach($users as $user) 
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->address }}</td>
        <td>{{ $user->role_id }}</td>
        <td>
          <div class="btn btn-danger">Delete</div>
          <div class="btn btn-primary">&#9998;Edit</div>
        </td>
      </tr>
  @endforeach
@endif
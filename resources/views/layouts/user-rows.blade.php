@if(isset($users))
  @foreach($users as $user) 
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->address }}</td>
        <td>{{ $user->role->name }}</td>
        <td>
          <button class="btn btn-danger" id="delete-user-btn">Delete</button>
          <button class="btn btn-primary" id="edit-user-btn">&#9998;Edit</button>
        </td>
      </tr>
  @endforeach
@endif
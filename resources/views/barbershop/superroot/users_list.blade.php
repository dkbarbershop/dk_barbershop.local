<!-- <input type="hidden" name="_token" value = "{{-- csrf_token() --}}"> -->
<table  class="table table-sm highlight" id="list_user">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Login</th>
      <th scope="col">Привилегии</th>
      <th scope="col">e-mail</th>
    </tr>
  </thead>
  <tbody>
	@foreach ($usersList as $list)
	<tr id="row{{ $loop->iteration }}">
    <td class="d-none">{{ $list->id }}</td>
	  <td> {{ $loop->iteration }}</td>
	  <td> {{ $list->login }}</td>
    <td> {{ $list->role }}</td>
	  <td> {{ $list->email }}</td>
	</tr>
   @endforeach
  </tbody>
</table>
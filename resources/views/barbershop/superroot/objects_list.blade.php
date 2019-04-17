<input type="hidden" name="_token" value = "{{ csrf_token() }}">
<table class="table table-sm" id="objects_list">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Название русск.</th>
      <th scope="col">Название англ.</th>
      <th scope="col">Адрес</th>
    </tr>
  </thead>
  <tbody>
	@foreach ($bsobjects as $bsobject)
	<tr>
    <td class="d-none">{{ $bsobject->id }}</td>
	  <td> {{ $loop->iteration }}</td>
	  <td> {{ $bsobject->name_rus }}</td>
	  <td> {{ $bsobject->name }}</td>
	  <td> {{ $bsobject->address }}</td>
	</tr>
   @endforeach
  </tbody>
</table>





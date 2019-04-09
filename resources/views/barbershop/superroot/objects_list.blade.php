<table class="table table-sm">
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
	<tr >
	  <td> {{$bsobject->id}}</td>
	  <td> {{$bsobject->name_rus}}</td>
	  <td> {{$bsobject->name}}</td>
	  <td> {{$bsobject->address}}</td>
	</tr>
   @endforeach
  </tbody>
</table>





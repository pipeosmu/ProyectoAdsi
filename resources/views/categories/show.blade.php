<table class="table table-striped">
	<tbody>			   
		<tr>
		  <th>NOMBRE:</th>
		  <td>{{ $query->name_category }}</td>
		</tr>
		<tr>
		  <th>IMAGEN:</th>
		  <td><img src="{{ $query->image }}" alt="" class="img-thumbnail" width="300"></td>
		</tr>
		<tr >
		  <th>CREADA:</th>
		  <td>{{ $query->created_at }}</td>
		</tr>
		<tr>
		  <th>ACTUALIZADA:</th>
		  <td>{{ $query->updated_at }}</td>
		</tr>
	</tbody>
</table>
          
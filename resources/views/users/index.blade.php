@extends('layouts.main')

@section('content')
    <h2>Benutzer</h2>
    <div class="table-responsive">
	    <table class="table table-striped table-hover">
	    	<thead>
	    		<tr>
		    		<th>Name</th>
		    		<th>Vorname</th>
		    		<th>Benutzername</th>
		    		<th width="40%">Bearbeiten</th>
		    	</tr>
	    	</thead>
	    	<tbody>
	    @foreach($users as $user)
		    	<tr>
		        	<td>{!! $user->lastname !!}</td>
		        	<td>{!! $user->firstname !!}</td>
		        	<td>{!! $user->username !!}</td>
		        	<td><div class="btn-group">{!! HTML::link('/users/show/'.$user->id, 'Ansehen', array('class'=>'btn btn-default')) !!}{!! HTML::link('/users/edit/'.$user->id, 'Bearbeiten', array('class'=>'btn btn-default')) !!}{!! HTML::link('/users/delete/'.$user->id, 'Löschen', array('class'=>'btn btn-default', 'onClick'=>'return confirm(\'Wirklich löschen?\');')) !!}</div></td>
		        </tr>
	    @endforeach
	    	</tbody>
	   	</table>
	</div>
	{!! str_replace('/?', '?', $users->render()) !!}
	<br/>
	

	{!! HTML::link('users/new', 'Hinzufügen', array('class' => 'btn btn-default'))!!}
	{!! HTML::link('#', 'Zurück', array('class' => 'btn btn-default', 'onClick="javascript:history.back();return false;"'))!!}
@stop
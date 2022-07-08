@extends('layout')
@section('content')
<div id="app-my-team" class="container" v-cloak>
  <div class="progress mt-2" v-if="playersLoading">
    <div class="progress-bar progress-bar-striped progress-bar-animated" 
    role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
  </div>

  <div class="alert alert-primary mt-2" role="alert" v-if="!playersLoading && !status">
    <h3>
      Tu equipo no tiene jugadores
    </h3>
    <p>
      Ve y selecciona una liga para descubrir que equipos y jugadores las conforman,
       y así poder crear tu propio equipo.
    </p>
  </div> 

  <table class="table table-hover" v-if="!playersLoading && players.length > 0">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Posición</th>        
        <th scope="col">Nro. camiseta</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="player in players">        
        <td>
          @{{ player.name }}
        </td>
        <td>
          @{{ player.position }}
        </td>
        <td>
          @{{ player.shirtNumber }}
        </td>        
      </tr>
    </tbody>
  </table>
</div>
@endsection
@section('extra-js')
<script src="{{ asset('js/vue/team/my-team.js') }}"></script>
@endsection
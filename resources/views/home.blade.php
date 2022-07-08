@extends('layout')
@section('content')
<div id="app-competitions" class="container" v-cloak>
  <div class="alert alert-primary mt-2" role="alert">
    <h3>
      Crea tu equipo!!!
    </h3>
    <p>
      Selecciona una liga, descubre que equipos y jugadores la conforman para crear tu propio equipo.
    </p>
  </div> 

  <div class="progress" v-if="competitionsLoading">
    <div class="progress-bar progress-bar-striped progress-bar-animated" 
    role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
  </div>

  <table class="table table-hover" v-if="!competitionsLoading && competitions.length > 0">
    <thead>
      <tr>
        <th scope="col" class="text-center">Liga</th>
        <th scope="col">País</th>        
        <th scope="col">Temporada actual</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="competition in competitions">        
        <td>
          <img :src="competition.emblem" 
          class="rounded image-responsive cursor-link"
          v-on:click="show(competition)" 
          alt="emblem">
          @{{ competition.name }}
        </td>
        <td>
          @{{ competition.area.name }}
        </td>
        <td>
          @{{ competition.currentSeason.startDate | fecha_dmy }} - @{{ competition.currentSeason.endDate | fecha_dmy }}
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
@section('extra-js')
<script src="{{ asset('js/vue/home/index.js') }}"></script>
@endsection
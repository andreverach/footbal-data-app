@extends('layout')
@section('content')
<div id="app-team-view" class="container" v-cloak>
  <div class="row mt-2" v-if="team !== null">
    <!-- oculto en xs -->
    <div class="d-none d-sm-block col-md-3 col-lg-3">
      <img :src="team.crest" class="rounded mx-auto d-block img-thumbnail" alt="Emblem">
    </div>
    <div class="col-sm-12 col-md-9 col-lg-9">
      <ul class="list-group list-group-flush">
        <li class="list-group-item  d-flex justify-content-between align-items-start">
          Equipo: @{{ team.name }}
          <span class="badge bg-primary rounded-pill">
            @{{ team.area.code }}
          </span>
        </li>
        <li class="list-group-item">
          Sitio web: @{{ team.website }}          
        </li>
        <li class="list-group-item">
          Dr. Técnico: @{{ team.coach.name }}          
        </li>
        <li class="list-group-item">
          Competiciones actuales: 
          <ol>
            <li v-for="competition in team.runningCompetitions">
              @{{ competition.name }}
            </li>
          </ol>
        </li>
      </ul>
    </div>
  </div>
  <div class="progress mt-2" v-if="teamLoading">
    <div class="progress-bar progress-bar-striped progress-bar-animated" 
    role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
  </div>
  <table class="table table-hover" v-if="!teamLoading && team !== null">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Posición</th>        
        <th scope="col">Nacionalidad</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="player in team.squad" v-on:click="show(player)" class="cursor-link">        
        <td>
          @{{ player.name }}
        </td>
        <td>
          @{{ player.position }}
        </td>
        <td>
          @{{ player.nationality }}
        </td>        
      </tr>
    </tbody>
  </table>
</div>
@endsection
@section('extra-js')
<script src="{{ asset('js/vue/team/index.js') }}"></script>
@endsection
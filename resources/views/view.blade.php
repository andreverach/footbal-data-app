@extends('layout')
@section('content')
<div id="app-competitions-view" class="container" v-cloak>
  <div class="row mt-2" v-if="competition !== null">
    <!-- oculto en xs -->
    <div class="d-none d-sm-block col-md-3 col-lg-3">
      <img :src="competition.competition.emblem" class="rounded mx-auto d-block img-thumbnail" alt="Emblem">
    </div>
    <div class="col-sm-12 col-md-9 col-lg-9">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          Competición: @{{ competition.competition.name }}
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
          País: @{{ competition.area.name }}
          <span class="badge bg-primary rounded-pill">
            @{{ competition.area.code }}
          </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
          Tipo de Competición: @{{ competition.competition.type }}
          <span class="badge bg-primary rounded-pill">
            @{{ competition.competition.code }}
          </span>
        </li>
        <li class="list-group-item">
          Inicio de temporada: 
          @{{ competition.season.startDate | fecha_dmy }}
        </li>
        <li class="list-group-item">
          Fin de temporada:
          @{{ competition.season.endDate | fecha_dmy}}
        </li>
      </ul>
    </div>
  </div>
  <div class="progress mt-2" v-if="competitionLoading">
    <div class="progress-bar progress-bar-striped progress-bar-animated" 
    role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
  </div>
  <table class="table table-hover" v-if="!competitionLoading && competition !== null">
    <thead>
      <tr>
        <th scope="col">Equipo</th>
        <th scope="col">Jugados</th>        
        <th scope="col">Ganados</th>
        <th scope="col">Empatados</th>
        <th scope="col">Perdidos</th>
        <th scope="col">Puntaje</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="team in competition.standings[0].table">        
        <td>
          <img :src="team.team.crest" 
          class="rounded image-responsive cursor-link"
          v-on:click="show(team)"
          alt="emblem">
          @{{ team.team.name }}
        </td>
        <td>
          @{{ team.playedGames }}
        </td>
        <td>
          @{{ team.won }}
        </td>
        <td>
          @{{ team.draw }}
        </td>
        <td>
          @{{ team.lost }}
        </td>
        <td>
          @{{ team.points }}
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
@section('extra-js')
<script src="{{ asset('js/vue/home/view.js') }}"></script>
@endsection
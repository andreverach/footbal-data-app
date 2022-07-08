var competitions_list = new Vue({
  el: '#app-competitions-view',
  data: {
    url: 'competitions',
    config: {
      headers: {
        Accept: 'application/json',
      }
    },
    competitionLoading: false,
    competition: null,
    savingTeam: false,
  },
  created(){
    this.getCompetition();
  },
  computed: {
    apiUrl: function(){
      return this.$base_api + this.url;
    },
    urlTeams: function(){
      return this.$base_api + 'teams';
    },
  },
  methods: {
    async getCompetition(){
      try{
        this.competitionLoading = true;
        let activatedRoute = window.location.href;
        let params = activatedRoute.split('/');
        await axios.get(this.apiUrl + '/' + params[params.length - 1], this.config)
        .then(r => {
          console.log('Competición: ', r.data);
          this.competition = r.data;
          this.competitionLoading = false;
        })
        .catch(e => {
          this.competitionLoading = false;
          this.competition = null;
        });
      }catch(error){        
      }
    },    
    show(team){
      window.location.href = this.urlTeams + '/view/' + team.team.id;
    }
  }
});  
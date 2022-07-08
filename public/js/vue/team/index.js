var competitions_list = new Vue({
  el: '#app-team-view',
  data: {
    url: 'team',
    config: {
      headers: {
        Accept: 'application/json',
      }
    },
    teamLoading: false,
    team: null,
  },
  created(){
    this.getTeam();
  },
  computed: {
    apiUrl: function(){
      return this.$base_api + this.url;
    },
    playerUrl: function(){
      return this.$base_api + 'players';
    },
  },
  methods: {
    async getTeam(){
      try{
        this.teamLoading = true;
        let activatedRoute = window.location.href;
        let params = activatedRoute.split('/');
        await axios.get(this.apiUrl + '/' + params[params.length - 1], this.config)
        .then(r => {
          console.log('Equipo: ', r.data);
          this.team = r.data;
          this.teamLoading = false;
        })
        .catch(e => {
          this.teamLoading = false;
          this.team = null;
        });
      }catch(error){
        
      }
    },
    async show(player){
      //confirm
      try{
        await axios.get(this.playerUrl + '/' + player.id, this.config)
        .then(r => {
          if(r.data.status){
            alert('Jugador agregado, tienes ' + r.data.data.length + ' jugadores en tu equipo.');
          }else{
            alert(r.data.message);
          }
        })
        .catch(e => {
        });
      }catch(error){
        
      }
    },
  }
});  
var competitions_list = new Vue({
  el: '#app-my-team',
  data: {
    url: 'players',
    config: {
      headers: {
        Accept: 'application/json',
      }
    },
    playersLoading: false,
    players: [],
    status: false    
  },
  created(){
    this.getMyTeam();
  },
  computed: {
    apiUrl: function(){
      return this.$base_api + this.url;
    }
  },
  methods: {
    async getMyTeam(){
      try{
        this.playersLoading = true;
        await axios.get(this.apiUrl + '/', this.config)
        .then(r => {
          console.log('Mi equipo: ', r.data);
          this.players = r.data;
          this.playersLoading = false;
          this.status = r.data.status;
        })
        .catch(e => {
          this.playersLoading = false;
          this.players = [];
        });
      }catch(error){
        console.log('Errorr Catch: ', error);
      }
    }   
  }
});  
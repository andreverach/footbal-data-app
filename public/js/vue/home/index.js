var competitions_list = new Vue({
  el: '#app-competitions',
  data: {
    url: 'competitions',
    config: {
      headers: {
        Accept: 'application/json',
      }
    },
    competitionsLoading: false,
    competitions: [],
  },
  created(){    
    this.getCompetitions();
  },
  computed: {
    apiUrl: function(){
      return this.$base_api + this.url;
    },
  },
  methods: {
    async getCompetitions(){
      try{
        this.competitionsLoading = true;
        await axios.get(this.apiUrl, this.config)
        .then(r => {
          if(r.data.errorCode === 429){
            alert('Has superado el límite de peticiones por minuto!');
          }else{
            this.competitions = r.data.competitions;
            this.competitionsLoading = false;
          } 
          console.log('Competiciones/Ligas: ', r.data);
        })
        .catch(e => {
          this.competitionsLoading = false;
          this.competitions = [];
        });
      }catch(error){        
      }
    },
    show(competition){
      window.location.href = this.apiUrl + '/view/' + competition.id;
    },
  }
});  
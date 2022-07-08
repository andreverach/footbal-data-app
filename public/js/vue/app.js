switch (window.location.hostname){
  case 'localhost':
        Vue.prototype.$base_api = "http://localhost:8000/";
        break;
  case '127.0.0.1':
        Vue.prototype.$base_api = "http://127.0.0.1:8000/";
        break;
}
Vue.prototype.$myToken = "acffdcaaece04eefad8e9a602eb117ee";

Vue.filter("fecha_dmy", function (value) {
      let fecha = new Date(value).toJSON().slice(0,10);
      var formato = fecha.split('-');
      formato = formato[2] + '/' + formato[1] + '/' + formato[0];
      return formato;
});
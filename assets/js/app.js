//service url
var BASE_URL = window.location.protocol + '//' + window.location.host + '/Todo/';
var urlAPI = BASE_URL + 'todo';

var todo = new Vue({
  el: '#todo',
  data: {
    todo: {
      id: '',
      nombre_usuario: '',
      nombre_tarea: '',
      descripcion_tarea:'',
    },
    tareas:[],
    showListRows:true,
    formAdd:false,
    formUpdate:false,
  },
  mounted: function () {
    this.todasLasTareas();
  },
  methods: {
    todasLasTareas: function ()
    {
      this.$http.get(urlAPI)
        .then(function (resultado) {
          this.tareas = resultado.data;
          console.log(this.tareas);
        });
    },
     add: function () {
      this.$http.post(urlAPI,
      {
        'nombre_usuario': this.todo.nombre_usuario,
        'nombre_tarea': this.todo.nombre_tarea,
        'descripcion_tarea': this.todo.descripcion_tarea,
      })
      .then(function (data) {
        this.hideAddForm();
        this.todasLasTareas();
      });
    },
    update: function () {
        this.$http.put(urlAPI + '/' +
        this.todo.id + '/' +
        this.todo.nombre_usuario + '/' +
        this.todo.nombre_tarea + '/' +
        this.todo.descripcion_tarea )
        .then(function (data) {
          this.hideUpdateForm();
          this.todasLasTareas();
        });
    },
    rowDelete: function (id, nombre_tarea) {
      swal({
        title: "¿Eliminar?",
        text: nombre_tarea,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "¡Si, eliminar!",
        cancelButtonText: "¡No, cancelar!",
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
      }).then(function () {
        //Instance of object Vue
        todo.$http.delete(BASE_URL + 'todo/' + id)
          .then(function () {
            this.todasLasTareas();
            swal("¡Eliminado!", "Se elimino correctamente el registro", "success");
          });
      }, function (dismiss) {
        if (dismiss === 'cancel'){
          swal('Cacelado', 'No se elimino el registro', 'error');
        }
      });
      console.log("sss");
      this.todasLasTareas();
    },
    showAddForm: function(){
      this.showListRows = false;
      this.formAdd = true;
    },
     hideAddForm: function(){
      this.todo = {
        id: '',
        nombre_usuario: '',
        nombre_tarea: '',
        descripcion_tarea:'',
      };
      this.showListRows = true;
      this.formAdd = false;
      this.todasLasTareas();
    },
    showUpdateForm: function (id, nombre_usuario, nombre_tarea, descripcion_tarea) {
      this.todo = {
        id : id,
        nombre_usuario : nombre_usuario,
        nombre_tarea : nombre_tarea,
        descripcion_tarea : descripcion_tarea
      };

      this.showListRows = false;
      this.formUpdate = true;
    },
    hideUpdateForm: function(){
      this.todo = {
        id : '',
        nombre_usuario : '',
        nombre_tarea : '',
        descripcion_tarea : '',
      };

      this.formUpdate = false;
      this.showListRows = true;
    },
  }
});

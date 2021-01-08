new Vue({
    el:'#app',
    data: {
        url:"https://glassesoptica.herokuapp.com/",
        rut:"",
        fecha:"",
        recetas: [],
        receta: {}
    },
    methods:{
        buscarRut: async function(){
            var recurso = "controllers/BuscarRecetaRut.php";
            var form = new FormData();
            form.append("rut", this.rut);
            try {
                const res = await fetch(this.url + recurso,{
                    method: "post",
                    body: form,
                });
                const data = await res.json();
                console.log(data);
                this.recetas = data;
            } catch (error) {
                console.log(error);
            }
        },
        buscarFecha: async function() {
            var recurso = "controllers/BuscarRecetaFecha.php";
            var form = new FormData();
            form.append("fecha", this.fecha);
            try {
                const res = await fetch(this.url + recurso,{
                    method: "post",
                    body: form,
                });
                const data = await res.json();
                console.log(data)
                this.recetas = data;
            } catch (error) {
                console.log(error);
            }
        },
        abrirModal: function(receta){
            this.receta = receta;
            var modal = document.getElementById("modal1");
            var instance = M.Modal.getInstance(modal);
            instance.open();
        },

        generarPDF: function(id){
            //alert(id),
            window.open(this.url+"controllers/ExportarPDF.php?id="+id, "_blank");
        },
    },
    created(){}
});
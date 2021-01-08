new Vue({
    el:'#app',
    data:{
        rut: "",
        url: "http://localhost/Optica_2020/",
        cliente: {},
        esta: false,
        //para cargar los combo box
        id_material_cristal:'',
        id_armazon:'',
        id_tipo_cristal:'',
        materiales:[],
        armazones:[],
        tipoCristal:[],
        //para los datos de la receta
        tipoLente: [],
        prisma: '',
        distancia: '',
        base: '',
        esf_oi: '',
        cil_oi: '',
        eje_oi: '',
        esf_od: '',
        cil_od: '',
        eje_od: '',
        rut_medico: '',
        nombre_medico: '',
        obs: '',
        precio: '',
        fechaEntrega: '',
        fechaRetiro: '',
        fechaVisita: '',
    },
    methods:{
        buscar: async function(){
            const recurso = "controllers/BuscarClienteController.php";
            var form = new FormData();
            form.append("rut", this.rut);
            try {
                const res = await fetch(this.url + recurso, {
                    method: "post",
                    body: form,
                });
                const data = await res.json();
                console.log(data);
                if(data == null){
                    M.toast({html:'rut no encontrado'});
                    this.esta = false;
                    this.cliente = {};
                } else {
                    this.cliente = data;
                    this.esta = true;
                }
            } catch (error) {
                console.log(error);
            }
        },

        guardar: async function(){
            var form = new FormData();
            form.append("tipo_lente",this.tipoLente);
            form.append("esfera_oi",this.esf_oi);
            form.append("esfera_od",this.esf_od);
            form.append("cilindro_oi",this.cil_oi);
            form.append("cilindro_od",this.cil_od);
            form.append("eje_oi",this.eje_oi);
            form.append("eje_od",this.eje_od);
            form.append("prisma",this.prisma);
            form.append("base",this.base);
            form.append("armazon",this.id_armazon);
            form.append("material_cristal",this.id_material_cristal);
            form.append("tipo_cristal",this.id_tipo_cristal);
            form.append("distancia_pupilar",this.distancia);
            form.append("valor_lente",this.precio);
            form.append("fecha_entrega",this.fechaEntrega);
            form.append("fecha_retiro",this.fechaRetiro);
            form.append("observacion",this.obs);
            form.append("rut_cliente",this.rut);
            form.append("fecha_visita_medico",this.fechaVisita);
            form.append("rut_medico",this.rut_medico);
            form.append("nombre_medico",this.nombre_medico);
            form.append("estado",0);
            try{
                var recurso = 'controllers/InsertarReceta.php';
                const res = await fetch(this.url+recurso,{
                    method:"post",
                    body:form,
                });
                const resp = await res.json();
                console.log(resp);
                M.toast({html:"Receta creada!"});
                this.rut='';
                this.tipoLente='';
                this.esf_oi='';
                this.esf_od='';
                this.cil_oi='';
                this.cil_od='';
                this.eje_oi='';
                this.eje_od='';
                this.prisma='';
                this.base='';
                this.id_armazon='';
                this.id_material_cristal='';
                this.id_tipo_cristal='';
                this.distancia='';
                this.precio='';
                this.fechaEntrega='';
                this.fechaRetiro='';
                this.obs='';
                this.rut='';
                this.fechaVisita='';
                this.rut_medico='';
                this.nombre_medico='';
                this.esta=false;
            }catch(error){
                console.log(error);
            }
        },

        //para cargar todos los materiales
        cargarMateriales: async function(){
            try {
                var recurso = "controllers/GetMaterialCristal.php";
                const res = await fetch(this.url+recurso);
                const data = await res.json();
                this.materiales=data;
                console.log(data);
            } catch (error) {
                console.log(error);
            }
        },

        cargarArmazones: async function(){
            try {
                var recurso = "controllers/GetArmazon.php";
                var res = await fetch(this.url+recurso);
                const data = await res.json();
                this.armazones = data;
                console.log(data);
            } catch (error) {
                console.log(error);
            }
        },

        cargarTipos: async function(){
            try {
                var recurso = "controllers/GetTipoCristal.php";
                var res = await fetch(this.url+recurso);
                const data = await res.json();
                this.tipoCristal = data;
                console.log(data);
            } catch (error) {
                console.log(error);
            }
        }
    },
    created(){
        this.cargarMateriales();
        this.cargarArmazones();
        this.cargarTipos();
    }
});
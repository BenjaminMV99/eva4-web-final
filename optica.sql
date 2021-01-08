drop database if exists optica_2020;
create database optica_2020;
use optica_2020;

create table usuario(
	rut varchar(20),
    nombre varchar(50),
    rol varchar(20),
	
    clave varchar(100),
    estado int,
    primary key(rut)
);

insert into usuario values('admin', 'Admnistrador','administrador', md5('administrador') ,1);

create table cliente(
	rut_cliente varchar(20),
    nombre_cliente varchar(50),
    direccion_cliente varchar(100),
    telefono_cliente varchar(20),
    fecha_creacion date,
    email_cliente varchar(50),
    primary key(rut_cliente)
);



create table tipo_cristal(
	id_tipo_cristal int auto_increment,
    tipo_cristal varchar(20),
    primary key(id_tipo_cristal)
);
insert into tipo_cristal values(null, 'Monofocal');
insert into tipo_cristal values(null, 'Bifocal');
insert into tipo_cristal values(null, 'Multifocal');

create table material_cristal(
	id_material_cristal int auto_increment,
    material_cristal varchar(20),
    primary key(id_material_cristal)
);
insert into material_cristal values(null, 'Orgánico');
insert into material_cristal values(null, 'Policarbonato');
insert into material_cristal values(null, 'Mineral');
insert into material_cristal values(null, 'Alto Indice');

create table armazon(
	id_armazon int auto_increment,
    nombre_armazon varchar(20),
    primary key(id_armazon)
);

insert into armazon values(null, 'Intermedio');
insert into armazon values(null, 'Gama Alta');
insert into armazon values(null, 'Económico');



create table receta(
	id_receta int auto_increment,
    tipo_lente varchar(30),
    esfera_oi double,
    esfera_od double,
    cilindro_oi double,
    cilindro_od double,
    eje_oi int,
    eje_od int,
    prisma int,
    base varchar(20),
    armazon int,
    material_cristal int,
    tipo_cristal int,
    distancia_pupilar int,
    valor_lente int,
    fecha_entrega date,
    fecha_retiro date,
    observacion varchar(100),
    rut_cliente varchar(20),
    fecha_visita_medico date,
    rut_medico varchar(20),
    nombre_medico varchar(100),
    rut_usuario varchar(20),
    estado int,
    
    primary key(id_receta),
    foreign key(armazon) references armazon(id_armazon) on delete set null,
    foreign key(material_cristal) references material_cristal(id_material_cristal) on delete set null,
    foreign key(tipo_cristal) references tipo_cristal(id_tipo_cristal) on delete set null,
    foreign key(rut_cliente) references cliente(rut_cliente) on delete set null,
    foreign key(rut_usuario) references usuario(rut) on delete set null
    
);





//estado de la barra   
  //if(){
    //Barra arriba
   // barra.write(90);
  //}else{
     //Barra abajod
   // barra.write(0);
 // }












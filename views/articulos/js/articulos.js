$(function () {
    var table = new DataTable('#tbl_registros', {
        paging: false,
        searching: false,
        info: false,
        "language": {
            "emptyTable": "No hay datos disponibles en la tabla"
        }
    });

    function init(){
        buscarProductos();
    }

    function buscarProductos(){
        $.ajax({
            url: 'views/articulos/articulos.php',
            data: {
                controlador: 'articulos',
                accion:'index'
            },
            type: 'POST',
            success: function (data){
                data = JSON.parse(data);
                console.log(data);
                table.clear().draw();
                $.each(data.articulos, function(x,row){
                    var btn_editar = "<button id='"+row.id_articulo+"' class='btn btn-primary'>Modificar</a></td>";
                    var btn_eliminar = "<button id='"+row.id_articulo+"' class='btn btn-danger'>Eliminar</a></td>";
                    var precio=Number(row.precio);
                    var iva = Number(row.Iva);
                    var total = precio + iva;
                    table.row.add([
                        row.nombre_articulo,
                        row.notas,
                        precio.toLocaleString('es-MX', {minimumFractionDigits: 2, maximumFractionDigits: 2}),
                        iva.toLocaleString('es-MX', {minimumFractionDigits: 2, maximumFractionDigits: 2}),
                        total.toLocaleString('es-MX', {minimumFractionDigits: 2, maximumFractionDigits: 2}),
                        btn_editar,
                        btn_eliminar
                    ]);
                });
                table.draw();
            },
        });
    }

    init();
    console.log('INIT');

    //FUNCIONES
    function limpiar(){
        $('#id').val("");
        $('#nombre_articulo').val("");
        $('#notas').val("");
        $('#precio').val("");
        $('#lbl_titulo').val("");
        $('#modal_articulos').modal("hide");
        $('#lbl_alert').empty();
        $('#lbl_alert').hide();
        $('#lbl_alert_modal').empty();
        $('#lbl_alert_modal').hide();

    }

    //EVENTOS
    $('#btn_agregar').on('click', function(){
        $('#modal_articulos').modal("show");
        $('#lbl_titulo').text('Agregar Artículos');
    })

    $('#tbl_registros').on('click', '.btn-primary', function(){
        console.log(this);
        var id_articulo = this.id;
        if(id_articulo){
            $.ajax({
                url: 'views/articulos/articulos.php',
                data: {
                    controlador: 'articulos',
                    accion:'modificar',
                    id: id_articulo
                },
                type: 'POST',
                success: function (data){
                    data = JSON.parse(data);
                    console.log(data);
                    $('#modal_articulos').modal("show");
                    $('#lbl_titulo').text('Edición de Artículos');
                    $('#id').val(data.articulos.id_articulo);
                    $('#nombre_articulo').val(data.articulos.nombre_articulo);
                    $('#notas').val(data.articulos.notas);
                    $('#precio').val(data.articulos.precio);
                },
            });
        }else{
            console.log('Error al obtener el id del elemento');
        }
    })

    $('#tbl_registros').on('click', '.btn-danger', function(){        
        id_articulo = this.id;
        if(id_articulo){
            $.ajax({
                url: 'views/articulos/articulos.php',
                data: {
                    controlador: 'articulos',
                    accion:'eliminar',
                    id: id_articulo
                },
                type: 'POST',
                success: function (data){
                    data = JSON.parse(data);
                    console.log(data);                    
                    buscarProductos();
                    alertas('lbl_alert','success', 'Se eliminó el producto correctamente');
                },
            });
        }else{
            console.log('Error al obtener el id del elemento');
        }
    })

    $('#modal_articulos').on('click', '#btn_guardar', function(){
        if($('#nombre_articulo').val() != '' && $('#precio').val() != ''){
            var accion = 'actualizar';
            if($('#id').val() == '') accion = 'guarda';
            $.ajax({
                url: 'views/articulos/articulos.php',
                data: {
                    controlador: 'articulos',
                    accion: accion,
                    id: $('#id').val(),
                    nombre_articulo: $('#nombre_articulo').val(),
                    notas: $('#notas').val(),
                    precio: $('#precio').val()
                },
                type: 'POST',
                success: function (data){
                    data = JSON.parse(data);
                    console.log(data);
                    $('#modal_articulos').modal("hide");                   
                    alertas('lbl_alert','success', 'Artículo guardado exitosamente.');
                    buscarProductos();
                },
            });
        }else{
            alertas('lbl_alert_modal','warning', 'Favor de llenar los campos obligatorios.');
        }
    })

    $('#modal_articulos').on('hidden.bs.modal', function (e) {
        limpiar();
      })

    function alertas(componente, clase, mensaje){
        $('#'+componente).empty();
        var elemento = '<div class="alert alert-'+clase+'" role="alert">'+mensaje+'</div>';
        $('#'+componente).append(elemento);
        $('#'+componente).show();
        setTimeout(function(){
            $('#'+componente).hide();
            $('#'+componente).empty();
        }, 5000);
    }

  });
  
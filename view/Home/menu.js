//Teclado funcional! commit 4
$(function() {
    let edit = false
    hands_section()
    hands_Menu()


    function hands_section() {

        $('#Drivers_section').hide()
        $('#Reports_section').hide()
        $('#header_search').show()
        $('#Home_section').show()
        $('#Products_section').hide()
        list_Client()
        delete_client()

        $('#Drivers').click(function() {
            $('#Home_section').hide()
            $('#Reports_section').hide()
            $('#Drivers_section').show()
            $('#header_search').hide()
            $('#Products_section').hide()
            list_Drivers()
            delete_driver()
            register_driver()
        })

        $('#Home').click(function() {

            $('#Drivers_section').hide()
            $('#Reports_section').hide()
            $('#header_search').show()
            $('#Home_section').show()
            $('#Products_section').hide()
            list_Client()

        })

        $('#Reports').click(function() {
            $('#Drivers_section').hide()
            $('#Home_section').hide()
            $('#Reports_section').show()
            $('#header_search').hide()
            $('#Products_section').hide()

        })

        $('#Productos').click(function() {
            $('#Drivers_section').hide()
            $('#Home_section').hide()
            $('#Reports_section').hide()
            $('#header_search').hide()
            $('#Products_section').show()
            $('#New_product').hide()
            borrar_chela()
            list_Products()

            register_producto()
            $('#btn-newproduct').click(function() {

                if ($('#New_product').is(":visible")) {
                    $('#New_product').hide()
                } else {
                    $('#New_product').show()
                }

                if ($('#New_product').is(":invisible")) {
                    $('#New_product').show()
                } else {
                    $('#New_product').hide()
                }
            })
        })



    }


    function hands_Menu() {
        $('#open-menu').hide()

        $("#icon-menu").click(function() {
            if ($('#menu-bar').is(':visible')) {
                $('#open-menu').show()
                $('#menu-bar').hide()
                $('#header_search').hide()
            } else {
                $('#menu-bar').show()
                $('#open-menu').hide()
            }

        });

        $("#open-menu").click(function() {
            if ($('#menu-bar').is(':visible')) {
                $('#open-menu').show()
            } else {
                $('#menu-bar').fadeIn('20')
                $('#menu-bar').show()
                $('#open-menu').hide()
            }

        })

    }


    function list_Client() {
        $.ajax({
            url: '../../controller/list_client.php',
            type: 'GET',
            success: function(response) {
                let clientsObject = JSON.parse(response);
                let row_design = ''
                clientsObject.forEach(client => {
                    row_design += `<tr style="background:#FFFFFF;" class="row-reverse" client_id="${client.key_client_b}">
           
            <td >${client.fecha_venta}</td>
            <td >${client.nombre_proveedor}</td>
            <td >${client.nombre_producto}</td>
            <td >${client.presentacion_producto}</td>
            <td >${client.cantidad_producto}</td>
            <td ><p>S/${client.importe_venta}</p></td>
            <td >${client.tipo_pago}</td>
            <td>
            <button class="client-delete btn btn-danger py-1 mt-1" style="font-size:10px;">
            Cancelar
            </button>
            </td>
            </tr>`
                })
                $('#clients').html(row_design)
            }
        })
    }


    function delete_client() {

        $(document).on('click', '.client-delete', function() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: '¿Desea eliminar venta?',
                text: "Se borrará de la base base de datos.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar',
                cancelButtonText: 'No, Cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    swalWithBootstrapButtons.fire(
                        'Eliminado!',
                        'Venta eliminado satisfactoriamente.',
                        'success'
                    )
                    let element = $(this)[0].parentElement.parentElement;
                    let id_client_f = $(element).attr('client_id');
                    $.post('../../controller/delete_client.php', { id_client_f }, function(response) {
                        list_Client()
                    })
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'Operación cancelada.',
                        'error'
                    )
                }
            })
        })

    }


    function list_Drivers() {

        $.ajax({
            url: '../../controller/list_driver.php',
            type: 'GET',
            success: function(response) {
                let driversObject = JSON.parse(response);
                let template_ui = ''
                driversObject.forEach(driver => {
                    template_ui += `
                <tr driver_id="${driver.key_driver_b}" class="bg-light">
                    <td style="display:none;">${driver.key_driver_b}</td>
                    <td>
                    <img style="width:9em; height:9em; margin-left:2em; margin-right:2em;" src="../../resource/drivers_photo/${driver.photo__driver_b}"  class="rounded-circle " title="Provider">
                    </td>
                    div
                    <td class="pt-5 mt-5">${driver.enrollment_driver_b}</td>
                    <td class="pt-5 mt-5">${driver.name_driver_b}</td>
                    <td class="pt-5 mt-5"> ${driver.dni_driver_b}</td>
                    <td class="pt-5 mt-5">${driver.phone_driver_b}</td>

                    <td class="pt-5 mt-5">
                    <button class="driver-edit btn btn-primary" style="font-size:12px;">
                    Editar
                    </button>
                    <button class="driver-delete btn btn-danger" style="font-size:12px;">
                    Borrar
                    </button>
                    </td>

                 </tr>`
                })
                $('#drivers').html(template_ui)
            }
        })
    }


    function list_Products() {

        $.ajax({
            url: '../../controller/list_product.php',
            type: 'GET',
            success: function(response) {
                let driversObject = JSON.parse(response);
                let template_ui = ''
                driversObject.forEach(driver => {
                    template_ui += `<div
                     product_id="${driver.key_product_b}" class="productito card text-dark bg-light mb-3 
                    mt-4 pb-3 mr-4 ml-4 " style="max-width: 20rem; -webkit-box-shadow: 5px 4px
                     16px -7px rgba(0,0,0,0.75); -moz-box-shadow: 5px 4px 16px -7px rgba(0,0,0,0.75);
                     box-shadow: 5px 4px 16px -7px rgba(0,0,0,0.75);">
                        <nav  style="display:flex; aling-items:center; justify-content: end;">
                            <span  style="font-size:1.8em; cursor:pointer;" class="delete-chela text-danger mr-2" >
                            <i  class="fas fa-backspace"></i>  
                            </span>
                        </nav>
                    <nav style="display:flex; justify-content:center;">
                        <img class="card-img-top"  src="../../resource/products_photo/${driver.photo_product_b}" style="width:300px; height:330px; " alt="Card image cap">
                    </nav>
                    <div class="card-header"><h5><string>${driver.nombre_producto_b}</string></h5></div>
                    <div class="card-body text-dark border-danger mb-3">
                      <p class="card-text">${driver.descripcion_producto_b}</p>
                    </div>
                    <nav style="display:flex; justify-content:center; align-items:center;">
                        <h5>S/ <span class="badge badge-primary text-center ">${driver.precio_producto_b}</span></h5>
                    </nav>
                  </div>`
                })
                $('#Listar_product').html(template_ui)
            }
        })
    }


    function borrar_chela() {
        $(document).on('click', '.delete-chela', function() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: '¿Desea borrar éste producto?',
                text: "Se borrará de la base base de datos.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Borrar',
                cancelButtonText: 'No, Cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    swalWithBootstrapButtons.fire(
                        'Eliminado!',
                        'Producto borrado satisfactoriamente.',
                        'success'
                    )
                    let element = $(this)[0].parentElement.parentElement;
                    let id_product_f = $(element).attr('product_id');

                    $.post('../../controller/delete_product.php', { id_product_f }, function(response) {
                        list_Products()
                    })
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'Operación cancelada.',
                        'error'
                    )
                }
            })
        })
    }


    function delete_driver() {
        $(document).on('click', '.driver-delete', function() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: '¿Desea eliminar proveedor?',
                text: "Se borrará de la base base de datos.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar',
                cancelButtonText: 'No, Cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    swalWithBootstrapButtons.fire(
                        'Eliminado!',
                        'Proveedor eliminado satisfactoriamente.',
                        'success'
                    )
                    let element = $(this)[0].parentElement.parentElement;
                    let id_driver_f = $(element).attr('driver_id');
                    console.log(id_driver_f);
                    $.post('../../controller/delete_driver.php', { id_driver_f }, function(response) {
                        list_Drivers()
                    })
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'Operación cancelada.',
                        'error'
                    )
                }
            })
        })
    }


    function register_driver() {
        $('#drivers-form').submit(function(e) {
            var parametros = new FormData($("#drivers-form")[0])
                //si edit es falso se enviará a driver_info de lo contrario a edit driver
            let url = edit === false ? '../../model/driver_info.php' : '../../controller/edit_driver.php'
            edit = false
            $.ajax({
                data: parametros,
                url: url,
                type: "POST",
                contentType: false,
                processData: false,
                success: function(response) {
                    list_Drivers()
                    $('#drivers-form').trigger('reset')
                }
            })
            e.preventDefault()
        })
    }


    function register_producto() {
        $('#products-form').submit(function(e) {
            var parametros = new FormData($("#products-form")[0])

            $.ajax({
                data: parametros,
                url: '../../model/product_info.php',
                type: "POST",
                contentType: false,
                processData: false,
                success: function(response) {
                    list_Products()
                    $('#products-form').trigger('reset')
                }
            })
            e.preventDefault()
        })
    }



});
@extends('layouts.public')

@section('contenido')
<style>
    .body_politicas{
        background: white;
        padding: 25px;;
    }
</style>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-12 d-flex justify-content-center">
            <p>
                <h5><strong>POLÍTICAS DE PRIVACIDAD Y USO DE DATOS PERSONALES</strong></h5>
            </p>
        </div>
        <div class="col-10  body_politicas">            
            <p>
                En cumplimiento de lo dispuesto por la Ley N° 29733, Ley de Protección de Datos Personales y su
                reglamento aprobado por Decreto Supremo N° 003-2013-JUS,{{config('app.name', 'PedidosApp')}} desea poner
                en conocimiento de sus usuarios, los siguientes aspectos relacionados con sus datos personales:
            </p>

            <h6><strong>1. IDENTIDAD Y DOMICILIO DEL TITULAR DEL BANCO DE DATOS PERSONALES</strong></h6>
            <p>
                El Usuario, al proporcionar a {{config('app.name', 'PedidosApp')}}, sus datos de carácter personal a
                través de los formularios electrónicos de la Web o de la Aplicación, consiente expresamente que
                {{config('app.name', 'PedidosApp')}} pueda tratar esos datos en los términos de esta cláusula de
                Política de Privacidad y Protección de Datos y para los fines aquí expresados.
            </p>

            <p>
                Antes de registrase en {{config('app.name', 'PedidosApp')}} los Usuarios deben leer la presente Política
                de Privacidad y Protección de Datos. Al marcar el botón “registrarse”, los Usuarios afirman que han
                leído y que consienten expresamente las presente Política de Privacidad de Datos, en particular la
                finalidad con la que se recopilan los datos, así como cualquier cesión de datos prevista en la presente
                Política de Privacidad.
            </p>
            <p>

                Al registrarse, los Usuarios deberán proporcionar algunos datos para la creación de su cuenta y la
                edición de su perfil. Éstos deberán proporcionar los siguientes datos: nombre de Usuario, correo
                electrónico, número de teléfono número de DNI si es un negocio proporcionará sus datos como número de
                Ruc, teléfono, nombre de la empresa datos del representante como nombre apellidos, dni, y teléfono.
                Asimismo, {{config('app.name', 'PedidosApp')}}siempre y cuando los Usuarios lo autoricen, recogerá datos
                relacionados con su localización, incluyendo la localización geográfica en tiempo real del ordenador o
                dispositivo móvil de los Usuario.
            </p>

            <p>
                La información y datos facilitados por el Usuario estarán en todo momento disponibles en su cuenta de
                usuario y podrán ser modificados por el Usuario a través de la opción editar perfil.
            </p>

            <p>
                El Usuario se compromete a introducir datos reales y veraces. Asimismo, será el único responsable de los
                daños y perjuicios que {{config('app.name', 'PedidosApp')}} o terceros pudieran sufrir como consecuencia
                de la falta de veracidad, inexactitud, falta de vigencia y autenticidad de los datos facilitados.
            </p>

         

            <p>
                Se informa al usuario que, cualquier tratamiento de datos personales, se ajusta a lo establecido por la
                legislación en PERÚ en la materia (Ley N° 29733 y su reglamento).
            </p>

         
           <h6><strong> 2. PLAZO DE CONSERVACIÓN DE LOS DATOS Y MEDIDAS DE SEGURIDAD</strong></h6>
            <p>
                Los datos personales proporcionados se conservarán mientras se mantenga la relación contractual y/o no se
            solicite su cancelación por el titular del dato.  {{config('app.name', 'PedidosApp')}} tiene implementadas las medidas
            técnicas, organizativas y legales que garantizan la seguridad y confidencialidad de los datos personales.
            </p>

           <h6><strong> 3. TRATAMIENTO DE DATOS PERSONALES PARA OTROS USOS</strong></h6>
            <p>
                Adicionalmente, usted autoriza a  {{config('app.name', 'PedidosApp')}} para que:
            </p>

          <p>
            (i)  {{config('app.name', 'PedidosApp')}} realice tratamientos de vuestros datos para gestionar listas de clientes,
            realizar estudios de mercado y evaluaciones financieras, registrar y analizar historiales de compra y
            elaborar perfiles de compra, efectuar acciones de publicidad y prospección comercial, ofrecimiento de
            promociones comerciales, fines estadísticos o históricos, comercio electrónico, remitir (vía medio físico,
            electrónico o telefónico) publicidad, obsequios, información de ofertas y/o promociones.
          </p>

        </div>
    </div>
</div>


@endsection
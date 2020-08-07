@extends('layouts.public')

@section('contenido')
<style>
    .bodyTYC,
    .tab-pane {
        background: white;
        padding: 20px;
    }
</style>


<div class="container">
    <div class="row d-flex justify-content-center">

        <div class="col-10">
            <div class="col-12 text-center">
                <p>
                    <h2>Terminos y conduciones de uso de la publicación web y/o aplicativo {{ config('app.name', 'Pedidos') }}</h2>
                </p>
            </div>
            <div class="col-12 bodyTYC">
                <p>
                    Los presentes Términos y Condiciones de servicio regulan la relación contractual entre los Consumidores
                    (en adelante, “Usuarios”), con {{ config('app.name', 'Pedidos') }}.sac. El servicio se encuentra
                    dirigido exclusivamente a residentes en la República de Perú. Los Consumidores se encontrarán sujetos a
                    los Términos y Condiciones Generales respectivos, junto con todas las demás políticas y principios
                    que rige {{ config('app.name', 'Pedidos') }} y que son incorporados al presente por referencia.
                </p>
                <p>
                    <strong>EL USUARIO DECLARA HABER LEÍDO Y ENTENDIDO TODAS LAS CONDICIONES ESTABLECIDAS EN LAS
                        POLÍTICAS DE PRIVACIDAD Y LOS PRESENTES TÉRMINOS Y CONDICIONES GENERALES, Y MANIFIESTA SU
                        CONFORMIDAD Y ACEPTACIÓN AL MOMENTO DE REGISTRARSE Y/O HACER USO DEL APLICATIVO
                        “{{ config('app.name', 'Pedidos') }}”. CUALQUIER PERSONA QUE NO ACEPTE O SE ENCUETRE EN
                        DESACUERDO CON ESTOS TÉRMINOS Y CONDICIONES GENERALES, LOS CUALES TIENEN UN CARÁCTER OBLIGATORIO
                        Y VINCULANTE, DEBERÁ ABSTENERSE DE UTILIZAR EL SITIO Y/O EL APLICATIVO</strong>.
                </p>
                <p>
                    {{ config('app.name', 'Pedidos') }} deja constar los terminos y condiciones segun el uso de la
                    aplicación. Se considera CONSUMIDOR a cualquier persona natural que desee realizar el pedido de
                    cualquier producto. Se cosidera ESTABLESIMIENTO al usuario que registre un negocio quien publicará y
                    vendera sus productos a travez de {{ config('app.name', 'Pedidos') }}.
                </p>
            </div>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true">CONSUMIDOR</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                        aria-controls="nav-profile" aria-selected="false">ESTABLESIMIENTO</a>

                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <h6><strong>1. El SITIO WEB Y/O APLICACIÓN</strong></h6>

                    <p>
                        Por consumidor se entiende a la persona natural que ingrese al sitio o descargue la Aplicación
                        (en adelante, el “consumidor”). La Aplicación se encuentra dirigida exclusivamente a personas
                        naturales residentes de la República del Perú. {{ config('app.name', 'Pedidos') }} pone la
                        Aplicación a disposición de los consumidores, sin costo alguno, para la adquisición de productos
                        que sean ofrecidos por los distintos establesimientos adheridas a la Aplicación (en adelante,
                        las establesimientos), permitiendo que de esa forma se unan los consumidores y las Establecimientos. El
                        acceso a la Aplicación es gratuito. Es requisito obligatorio para descargar y utilizar la
                        Aplicación, la aceptación previa de los Términos y Condiciones, no
                        pudiendo aducirse el desconocimiento de los mismos. Al aceptar estos Términos y Condiciones, los
                        Consumidores declaran haberse informado de manera clara, comprensible e inequívoca de los mismos.
                    </p>


                    <h6><strong> 2. CAPACIDAD PARA CONTRATAR</strong></h6>
                    <p>

                        La Aplicación está disponible sólo para aquellas personas naturales que tengan capacidad legal
                        para
                        contratar, según lo dispuesto por la legislación peruana vigente. Si un Usuario no tiene
                        capacidad
                        legal para contratar, debe abstenerse de utilizar el sitio web o Aplicación. En cualquier
                        momento se podrá
                        suspender, de forma temporal, la participación de Consumidores y/o resolver el presente acuerdo,
                        respecto de los que se compruebe que carecen de capacidad legal para usar la Aplicación o cuando
                        al
                        registrarse brinden información que sea falsa, inexacta, fraudulenta y en los demás casos
                        previstos
                        en este documento. Si bien quienes no tengan capacidad para contratar deben abstenerse de
                        efectuar
                        pedidos a través de la Aplicación, en caso de hacerlo, se entiende que lo realizan a través de
                        sus
                        padres o tutores, siendo éstos plenamente responsables por sus actos. Los padres, tutores o
                        responsables de los menores de edad o incapaces que utilicen la Aplicación serán responsables
                        por
                        dicho uso, incluyendo cualquier cargo, facturación o daño que se derive del mismo, y se entiende
                        que
                        aceptan los presentes Términos y Condiciones. En cumplimiento de la Ley N° 28681 y su
                        Reglamento,
                        aprobado por D.S. No.012-2009-SA, que regulan la comercialización, consumo y publicidad de
                        bebidas
                        alcohólicas, así como la Ley General para la Prevención y Control de Riesgos del Consumo de
                        Tabaco
                        N° 28705 y su Reglamento aprobado por D.S. No.015-2008-SA la compra de bebidas alcohólicas y
                        tabaco está restringida a mayores de 18 años, por lo que previo a la entrega, el distribuidor
                        exigirá al Usuario la exhibición del documento de identidad a efectos de verificar la mayoría de
                        edad.
                    </p>

                    <h6><strong> 3. REGISTRO EN EL SISTEMA WEB Y/O APLICACIÓN</strong></h6>
                    <p>
                        Para el acceso y utilización del sistema web y/o aplicación será necesario el registro del
                        Usuario. A los efectos del registro del Usuario, se le solicitará que cree una cuenta debiendo
                        ingresar en el Formulario de Registro (en adelante, el “Formulario de Registro”) la totalidad de
                        los siguientes datos de carácter personal: Nombre y Apellido, Dirección de Entrega, dirección de
                        correo electrónico (e-mail), y Teléfono (en adelante, los “Datos Personales”). El Usuario
                        declara y garantiza la veracidad, exactitud, vigencia y autenticidad de los Datos Personales
                        ingresados en el Formulario de Registro y asume el compromiso de mantener dichos Datos
                        Personales actualizados. Si no lo hace, estará incurriendo en un incumplimiento de estos
                        Términos y Condiciones, lo que podría dar lugar, entre otras cosas, a la resolución inmediata de
                        estos Términos y Condiciones y del uso de la Aplicación.
                    </p>
                    <h6><strong>4. USO DEL SITIO WEB Y LA APLICACIÓN. PRECIOS Y PRODUCTOS INFORMADOS EN EL SITIO WEB Y
                        APLICACIÓN</strong></h6>


                    <p>{{ config('app.name', 'Pedidos') }} podrá modificar en cualquier momento cualquier información
                        contenida en la Aplicación, incluyendo la relacionada con productos, precios, disponibilidad y
                        condiciones, respetando los pedidos que han sido aceptadas hasta dicho momento, por lo que las
                        modificaciones solo se referirán a operaciones futuras. Todos los precios en en sitio web y
                        Aplicación estarán expresados en soles, moneda de curso legal de la República del Perú, e
                        incluyen el I.G.V. La información sobre los productos y precios está sujeta a cambios sin previo
                        aviso. El costo de delivery se sumara al precio total depel Pedidos. Todas las promociones que
                        se publiquen en la Aplicación se regirán por sus respectivas bases y condiciones, las que se
                        encontrarán disponibles en el sitio web y Aplicación donde deberán ser leídas y aceptadas por el
                        Usuario.</p>

                    <h6><strong>5. FORMA DE PAGO</strong></h6>
                    <p> El consumidor realizara el pedido y espesificará que tiepo de comprobante desea recibir
                        {{ config('app.name', 'Pedidos') }} se encargara de comprar el producto y solicitar en
                        cumplimiento de la normativa
                        fiscal vigente el comprobante de venta al establecimiento de acuerdo a lo solicitado por el
                        consumidor. El consumidor reembolsará el total de la compra mas el monto total por el delívery
                        al momento de recibir su producto.
                        Cuando la Aplicación pone a disposición de los Consumidores finales una promoción y/o descuento,
                        dichos beneficios son concedidos directamente por el establecimiento a cada consumidor final en
                        el marco de su política de comercialización y de fomento de uso de la Aplicación.
                    </p>
                    <h6><strong>6. ALCANCE TERRITORIAL </strong></h6>
                    <p>
                        Los productos ofrecidos por las establecimientos en el sitio web y Aplicación estarán
                        disponibles para su pedido y entrega en la Ciudad de Cajamarca.
                    </p>

                    <H6><strong>7. PROCEDIMIENTO PARA EFECTUAR UN PEDIDO EN LINEA CON ENTREGA A DOMICILIO</strong></H6>
                    <P>
                        Para hacer pedidos a través del sitio web y Aplicación, el Usuario deberá seguir los pasos que
                        se describen a
                        continuación:
                    </p>
                    <p>
                        1. Registrarse en el sitio web ingresando sus datos personales y domicilio de entrega.</p>

                    <p>
                        2. Seleccionar los productos que se desee comprar y agregarlos al “carro de compras”;
                    </p>

                    <p>
                        3. Seleccionar la opción realizar pedido habilitada en la Aplicación.
                    </p>
                    <p>

                        4. El Usuario tiene que confirmar que todos los datos del pedido, dirección de entrega, monto de
                        pago son correctos.
                    </p>

                    <p>
                        5. El Usuario recibe una confirmación de que {{ config('app.name', 'Pedidos') }} aceptó el
                        pedido.
                    </p>
                    <p>

                        6. Luego de recibida esta notificación el pedido no puede cancelarse.
                    </p>

                    <p>
                        7. {{ config('app.name', 'Pedidos') }}, a través de su repartidor, entrega la mercadería en el
                        domicilio proporcionado por el Consumidor. De no encontrarse el Consumidor en el domicilio al
                        momento de la entrega el repartidor se comunicará con el Usuario al teléfono suministrado. De no
                        ser posible contactarse el Consumidor, el pedido será cancelado.
                    </p>

                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <h6><strong>1. El SITIO WEB Y/O APLICACIÓN</strong></h6>
<p>
    Por Establecimiento se entiende a la persona natural o jurídica titular de un comercio que se registre para aceptar pedidos de Consumidores (conforme este término se define más abajo). Sujeto al cumplimiento de los Términos y Condiciones, {{ config('app.name', 'Pedidos') }} pone a disposición de los Establecimientos el sistema web y aplicación, para el ofrecimiento y venta de los productos a los Consumidores de la Aplicación (en adelante, los "Consumidores"). El uso del sistema web y Aplicación es gratuito. Es requisito obligatorio para ofrecer los productos en el sistema web y Aplicación, la aceptación de los Términos y Condiciones, no pudiendo aducirse el desconocimiento de los mismos. Al aceptar estos Términos y Condiciones, los Establecimientos declaran haberse informado de manera clara, comprensible e inequívoca de los mismos. 
</p>
<h6><strong>2. CAPACIDAD PARA CONTRATAR </strong></h6>
<p>
    El sistema web y Aplicación está disponible sólo para aquellas Establecimientos que tengan capacidad para contratar, vender, según lo dispuesto por la legislación peruana vigente. Para registrarse como Establecimiento se debe contar con un establecimiento comercial donde se ofrezcan a la venta los productos admitidos por el sistema web y Aplicación. El Establecimiento autoriza a {{ config('app.name', 'Pedidos') }} para publicar productos disponibles en la respectiva Establecimiento con sus respectivos precios. Si un Establecimiento no tiene capacidad legal para vender y/o comercializar sus productos, debe abstenerse de utilizar el sistema web y Aplicación.
</p>


<h6><strong> 3. REGISTRO EN EL SISTEMA WEB Y/O APLICACIÓN</strong></h6>

<p>
    Para el acceso y utilización del sistema web y aplicación Aplicación será necesario el registro del Establecimiento. A los efectos del registro del Establecimiento, se le solicitará que cree una cuenta debiendo ingresar en el Formulario de Registro (en adelante, el “Formulario de Registro”) la totalidad de los siguientes datos de carácter personal (los “Datos Personales”): - En caso de persona natural, Nombre y Apellido, Documento Nacional de Identidad, Registro Único de Contribuyente (RUC), Domicilio Fiscal y Domicilio Particular, Dirección de correo electrónico (e-mail), y Teléfono. - En caso de persona jurídica, Razón o Denominación Social, RUC, Domicilio Fiscal y Comercial, Dirección de Correo Electrónico (e-mail), y Teléfono. También deberá identificar a una persona de contacto. Toda cuenta es personal e intransferible. El Establecimiento declara y garantiza la veracidad, exactitud, vigencia y autenticidad de los Datos Personales ingresados en el Formulario de Registro y asume el compromiso de mantener dichos Datos Personales actualizados. Si no lo hace, estará incurriendo en un incumplimiento de estos Términos y Condiciones, lo que podría dar lugar, entre otras cosas, a la resolución inmediata de estos Términos y Condiciones y del uso del sistema web y Aplicación. El Establecimiento es responsable de mantener la confidencialidad de su cuenta, nombre de usuario y contraseña, y acepta asumir la responsabilidad por todas las actividades que realicen en su cuenta. {{ config('app.name', 'Pedidos') }} no será responsable por la veracidad, exactitud, vigencia y autenticidad de los Datos Personales ingresados por la Establecimiento. El registro permitirá al Establecimiento ofrecer los productos incluidos en el catálogo del sistema web y Aplicación.
</p>

<h6><strong>4. COMENZAR A OPERAR</strong></h6>
<p>
    
El Establecimiento deberá registrar sus productos y configurar los dias y horas de atención, de esta manera cuando un consumidor desee realizar un pedido si esta no esta detro del horario de atencion en consumidor no podrá realizar su pedido. 
</p>
<h6><strong>5. FACTURACIÓN</strong></h6>
La Establecimiento que vende el producto será la exclusiva responsable y encargada emitir el comprobante de pago respecto de cada venta que realice, en cumplimiento de la normativa fiscal vigente, a excepción de aquellos casos en que, por el monto de la venta, la legislación tributaria no establece la obligación de emitir comprobante de pago.

<h6><strong>6. AVISOS PUBLICITARIOS</strong></h6>
{{ config('app.name', 'Pedidos') }} podrá incluir comerciales y avisos publicitarios en el sistema web y Aplicación.

<h6><strong>6.  MODIFICACIONES Al SISTEMA WEB Y APLICACIÓN</strong></h6>
{{ config('app.name', 'Pedidos') }} podrá agregar funciones o funcionalidades, mejorar, cambiar o modificar el sistema web y Aplicación en cualquier momento a su exclusivo criterio, procurando notificar dichas modificaciones a las Establecimientos.

<h6><strong>7. DISPONIBILIDAD DEL SISTEMA WEB Y APLICACIÓN</strong></h6>
<p>
    El Establecimiento comprende y acepta que el sistema web y Aplicación puede no siempre estar disponible debido a dificultades técnicas o fallas de Internet, o por cualquier otro motivo ajeno a {{ config('app.name', 'Pedidos') }}.
</p>

<h6><strong>8. POLÍTICA DE PRIVACIDAD, SEGURIDAD Y PROTECCIÓN DE DATOS PERSONALES</strong></h6>
<p>
    El sistema web y Aplicación recopila información de identificación personal cuando el Establecimiento se registra en ella y hace uso de ella. Se informa al Establecimiento que los datos personales que estos entreguen o que se recopile a través del sistema web y Aplicación serán incorporados a un banco de datos administrado por {{ config('app.name', 'Pedidos') }}.
</p>

<p>
    Cada Establecimiento es responsable por la veracidad, exactitud, vigencia y autenticidad de la información suministrada y se compromete a mantenerla debidamente actualizada. Sin perjuicio de lo anterior, el Establecimiento autoriza a {{ config('app.name', 'Pedidos') }} a verificar la veracidad de los datos personales facilitados a través de información obtenida de fuentes de acceso público o de entidades que puedan brindarle dicha información.
</p>

<h6><strong>9. PROPIEDAD INTELECTUAL</strong></h6>

El Establecimiento reconoce y acepta que el sistema web y Aplicación, así como todos sus contenidos, es un producto de propiedad de {{ config('app.name', 'Pedidos') }}. Asimismo, reconoce y acepta que todos los derechos, títulos e intereses asociados al sistema web y Aplicación, incluyendo derechos de propiedad intelectual asociados y todas las mejoras, modificaciones, revisiones son propiedad de {{ config('app.name', 'Pedidos') }} .


<h6><strong>10. MODIFICACIONES A LOS TÉRMINOS Y CONDICIONES</strong></h6>
<p>
    Los Establecimientos aceptan y reconocen que {{ config('app.name', 'Pedidos') }} podrá modificar estos Términos y Condiciones, en cualquier momento, y sin necesidad de aviso previo, por lo que la versión actualizada de los mismos se reputará conocida y aceptada por las Establecimientos. La versión actualizada de estos Términos y Condiciones se encontrará disponible en el sistema web y aplicación, y las modificaciones entrarán en vigencia a las 24 (veinticuatro) horas de su publicación, siendo responsabilidad de los Establecimientos revisar los Términos y Condiciones vigentes al momento de la navegación. En caso de que la Establecimiento no estuviera de acuerdo con las modificaciones mencionadas, deberá cesar el uso de los servicios y/o información ofrecidos a través del sistema web y aplicación Aplicación.
</p>

<h6><strong>11. LEY Y JURISDICCIÓN APLICABLE</strong></h6>
<p>
    Los presentes Términos y Condiciones se rigen por las leyes de la República del Perú. Las partes renuncian al fuero que pudiera corresponder a su domicilio y acuerdan que cualquier disputa será sometida a la jurisdicción de los Tribunales del Cercado de Lima, salvo que la legislación aplicable determine de forma imperativa otro fuero o legislación distinta.
</p>


 
                </div>

            </div>



        </div>
    </div>
</div>


@endsection
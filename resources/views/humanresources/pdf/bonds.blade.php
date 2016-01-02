<h1>{!! $format->name !!}</h1>
<p>Santiago, $fecha :

Yo, {!! $trabajador->name !!}, RUT: {!! $trabajador->rut !!}, 
trabajador de la empresa $cliente->razon_social, RUT: $cliente->rut, 
declaro haber recibido el siguientes monto imponible de $ $monto - 
({$string->mostrar($bono->monto)}), por el concepto de $bono->descripcion , 
el cual será Liquidado en la Remuneración del presente mes.
</p>


<p>
{!! $content !!}
</p>
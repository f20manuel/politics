<table width="100%" style="border: 1px solid">
    <thead>
        <tr>
            <th>id</th>
            <th>Cédula C.</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Género</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Teléfono</th>
            <th>Fecha de Nacimiento</th>
            <th>Departamento</th>
            <th>Municipio</th>
            <th>Comuna</th>
            <th>Dirección</th>
            <th>Nivel Académico</th>
            <th>Ocupación</th>
            <th>Estado de Apoyo</th>
            <th>Observación</th>
        </tr>
    </thead>
    <tbody width="100%">
        @foreach ($lideres as $lider)
            <tr>
                <td>{{ $lider->id }}</td>
                <td>{{ $lider->cc }}</td>
                <td>{{ $lider->nombre }}</td>
                <td>{{ $lider->apellidos }}</td>
                <td>
                    <?php $genero = $generos->where('id', $lider->genero_id)->first(); ?>
                    {{ $genero->name }}
                </td>
                <td>{{ $lider->email }}</td>
                <td>{{ $lider->celular }}</td>
                <td>{{ $lider->telefonos }}</td>
                <td>{{ $lider->fecha_nacimiento->format('d/m/Y') }}</td>
                <td>
                    <?php $departamento = $departamentos->where('id', $lider->departamento_id)->first(); ?>
                    {{ $departamento->name }}
                </td>
                <td>
                    <?php $municipio = $municipios->where('id', $lider->municipio_id)->first(); ?>
                    {{ $municipio->name }}
                </td>
                <td>
                    <?php $comuna = $comuna_id->where('id', $lider->comuna_id)->first(); ?>
                    {{ $comuna->name }}
                </td>
                <td>{{ $lider->direccion }}</td>
                <td>
                    <?php $nivel = $niveles_academicos->where('id', $lider->nivel_academico_id)->first(); ?>
                    {{ $nivel->name }}
                </td>
                <td>
                    <?php $ocupacion = $ocupaciones->where('id', $lider->ocupacion_id)->first(); ?>
                    {{ $ocupacion->name }}
                </td>
                <td>
                    <?php $estado = $estado_apoyo->where('id', $lider->estado_apoyo_id)->first(); ?>
                    {{ $estado->name }}
                </td>
                <td>{{ $lider->observacion }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

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
        @foreach ($personas as $persona)
            <tr>
                <td>{{ $persona->id }}</td>
                <td>{{ $persona->cc }}</td>
                <td>{{ $persona->nombre }}</td>
                <td>{{ $persona->apellidos }}</td>
                <td>
                    <?php $genero = $generos->where('id', $persona->genero_id)->first(); ?>
                    {{ $genero->name }}
                </td>
                <td>{{ $persona->email }}</td>
                <td>{{ $persona->celular }}</td>
                <td>{{ $persona->telefonos }}</td>
                <td>{{ $persona->fecha_nacimiento->format('d/m/Y') }}</td>
                <td>
                    <?php $departamento = $departamentos->where('id', $persona->departamento_id)->first(); ?>
                    {{ $departamento->name }}
                </td>
                <td>
                    <?php $municipio = $municipios->where('id', $persona->municipio_id)->first(); ?>
                    {{ $municipio->name }}
                </td>
                <td>
                    <?php $comuna = $comuna_id->where('id', $persona->comuna_id)->first(); ?>
                    {{ $comuna->name }}
                </td>
                <td>{{ $persona->direccion }}</td>
                <td>
                    <?php $nivel = $niveles_academicos->where('id', $persona->nivel_academico_id)->first(); ?>
                    {{ $nivel->name }}
                </td>
                <td>
                    <?php $ocupacion = $ocupaciones->where('id', $persona->ocupacion_id)->first(); ?>
                    {{ $ocupacion->name }}
                </td>
                <td>
                    <?php $estado = $estado_apoyo->where('id', $persona->estado_apoyo_id)->first(); ?>
                    {{ $estado->name }}
                </td>
                <td>{{ $persona->observacion }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

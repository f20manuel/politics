$(document).ready(
    function()
    {
        function buscar(){
            var search = $('input[name="search"]').val();
                $.ajax({
                    url: '/search/personas',
                    type: 'POST',
                    data: {search:search},
                    success: function(data)
                    {
                        $('#foreachPersonaSearch').html(data);
                    }
                });
        }

        //Buscar Personas
        $('input[name="search"]').change(
            function(e)
            {
                e.preventDefault();
                buscar();
            }
        )

        $('input[name="search"]').keyup(
            function(e)
            {
                e.preventDefault();
                buscar();
            }
        )

        $('select[name="departamento_id"]').change(
            function()
            {
                var token = $('input[name="_token"]').val();
                var departamento_id = $('select[name="departamento_id"]').val();
                $.ajax({
                    url: '/enviarDepartamento',
                    type: 'POST',
                    data: {
                        token:token,
                        departamento_id:departamento_id
                    },
                    success: function(data)
                    {
                        $('#municipio_select').html(data);
                    }
                });
            }
        )

        $('select[name="municipio_id"]').change(
            function()
            {
                var token = $('input[name="_token"]').val();
                var departamento_id = $('select[name="departamento_id"]').val();
                var municipio_id = $('select[name="municipio_id"]').val();
                $.ajax({
                    url: '/enviarMunicipio',
                    type: 'POST',
                    data: {
                        token:token,
                        departamento_id:departamento_id,
                        municipio_id:municipio_id
                    },
                    success: function(data)
                    {
                        $('#comuna_select').html(data);
                    }
                });
            }
        )
    }
);

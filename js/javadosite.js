   $(document).ready(function(){

        $('#campo').keyup(function(){

            $('#formcons').submit(function(){
                var dados = $(this).serialize();

                $.ajax({
                    url: 'relatorios.controller.php',
                    method: 'post',
                    dataType: 'html',
                    data: dados,
                    success: function(data){
                        $('#resultado').empty().html(data);
                    }
                });

                return false;
            });

            $('#formcons').trigger('submit');

        });
    });
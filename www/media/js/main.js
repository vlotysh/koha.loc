 $(document).ready(function(){
            $("#send").click(function(){ // при нажатии кнопки добавления новой статьи
                console.log('Все ок!');
                $('#text').html('Началось!');
               $.ajax({
                   
                   type: "POST",
                   async: false,
                   url: "/profile/addpm",
                   dataType: "json",
                   success: function(result) {
                    
                     $('#text').delay(3000).html(result.code);
                     $('#content').val('');//ОЧистка формы
                   }
               })
        });
        
 });
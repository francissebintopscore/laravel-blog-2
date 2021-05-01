$(document).ready(function(){



    $('#tags-search').on('keyup',function(){
        // console.log($(this).val());

        $.get("http://127.0.0.1:8000/tag/search", {search: $(this).val() } , function(data, status){
            // alert("Data: " + data + "\nStatus: " + status);
            if( status != 'success' )
                return;
            var data =JSON.parse(data);
            var len = data.length;

            var options = '';
            for( var i=0; i<len; i++ ){
                options += '<option value="' + data[i].id + '" >' + data[i].id + ':' + data[i].name + '</option>';
            }
            console.log(data);
            $('#tag-selection').empty();
            $('#tag-selection').append(options);
            $('#tag-selection').removeAttr('hidden');
        });
    });

});
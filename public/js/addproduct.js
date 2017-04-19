/**
 * Created by Clemsouille on 18/04/2017.
 */
var i =0;
var img = 'image';
$(document).ready(function () {
    $('#addimage').click(function() {
        i += 1;
        var name = 'image'+i;
        $('#addimage').before(" <div class='form-group' id='img'> <input type='file' name='"+name +"'size='40'> </div>");
    });

    
});